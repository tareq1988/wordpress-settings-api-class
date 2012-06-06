<?php

/**
 * Plugin Name: WordPress Settings API
 * Plugin URI: http://tareq.weDevs.com
 * Description: WordPress Settings API testing
 * Author: Tareq Hasan
 * Author URI: http://tareq.weDevs.com
 */
require_once dirname( __FILE__ ) . '/class.settings-api.php';

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
class WeDevs_Settings_API_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API();

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        $page = add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = apply_filters( 'wpuf_settings_sections', array(
            array(
                'id' => 'wpuf_labels',
                'title' => __( 'Labels', 'wpuf' ),
                'callback' => 'labels'
            ),
            array(
                'id' => 'wpuf_posting',
                'title' => __( 'Frontend Posting', 'wpuf' ),
                'callback' => 'posting'
            ),
            array(
                'id' => 'wpuf_dashboard',
                'title' => __( 'Dashboard', 'wpuf' ),
                'callback' => 'dashboard'
            )
                ) );

        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'wpuf_labels' => array(
                array(
                    'name' => 'title_label',
                    'label' => __( 'Post title label', 'wpuf' ),
                    'desc' => __( 'Label for post title', 'wpuf' ),
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'name' => 'title_help',
                    'label' => __( 'Post title help text', 'wpuf' ),
                    'desc' => __( 'Description for post title. Will be shown as help text, leave empty if you don\'t want anything', 'wpuf' ),
                    'type' => 'text'
                ),
                array(
                    'name' => 'cat_label',
                    'label' => __( 'Post category label', 'wpuf' ),
                    'desc' => __( 'Label for post category', 'wpuf' ),
                    'type' => 'text',
                    'default' => 'Category'
                ),
                array(
                    'name' => 'test_mode',
                    'label' => __( 'Test Mode', 'edd' ),
                    'desc' => __( 'While in test mode no live transactions are processed. To fully use test mode, you must have a sandbox (test) account for the payment gateway you are testing.', 'edd' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'accepted_cards',
                    'label' => __( 'Accepted Payment Method Icons', 'edd' ),
                    'desc' => __( 'Display icons for the selected payment methods', 'edd' ) . '<br/>' . __( 'You will also need to configure your gateway settings if you are accepting credit cards', 'edd' ),
                    'type' => 'multicheck',
                    'options' => array(
                        'mastercard' => 'Mastercard',
                        'visa' => 'Visa',
                        'american_express' => 'American Express',
                        'discover' => 'Discover',
                        'paypal' => 'PayPal'
                    )
                ),
            ),
            'wpuf_posting' => array(
                array(
                    'name' => 'post_status',
                    'label' => __( 'Post Status', 'wpuf' ),
                    'desc' => __( 'Default post status after a user submits a post', 'wpuf' ),
                    'type' => 'select',
                    'options' => array(
                        'publish' => __( 'Publish' ),
                        'draft' => __( 'Draft', 'wpuf' ),
                        'pending' => __( 'Pending', 'wpuf' )
                    )
                ),
                array(
                    'name' => 'post_author',
                    'label' => __( 'Post Author', 'wpuf' ),
                    'desc' => __( 'The poster will be the post author by default. If you want to set the post author as an another user, you may select <b>MAP TO OTHER USER</b>', 'wpuf' ),
                    'type' => 'select',
                    'options' => array(
                        'original' => __( 'Original Author', 'wpuf' ),
                        'to_other' => __( 'Map to other user', 'wpuf' )
                    )
                ),
            ),
            'wpuf_dashboard' => array(
                array(
                    'name' => 'list_post_range',
                    'label' => 'How many posts in a page?',
                    'desc' => 'Configure how many posts will be shown in one page',
                    'type' => 'text',
                    'size' => 2
                ),
                array(
                    'name' => 'list_user_info',
                    'label' => 'Show user bio',
                    'desc' => 'Users Biographical info will be shown on the dashboard',
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'list_contact_info',
                    'label' => 'Show User contact info',
                    'desc' => 'Contact information from users profile will be shown under author bio. So Author Bio must be <b>enabled</b>',
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'list_post_count',
                    'label' => 'Show post count',
                    'desc' => 'Show how many posts are created by the user',
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'list_user_cs',
                    'label' => 'Show users custom fields',
                    'desc' => 'If you want to show users other custom fields, list the custom fields names by separating with comma',
                    'type' => 'textarea',
                    'rows' => 3,
                    'cols' => 40
                ),
                array(
                    'name' => 'dashboard_page',
                    'label' => 'Dashboard Page',
                    'desc' => 'Which Page to use as dashboard',
                    'type' => 'select',
                    'options' => $this->get_pages()
                ),
            ),
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';
        settings_errors();

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}

$settings = new WeDevs_Settings_API_Test();

