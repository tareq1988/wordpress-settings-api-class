<?php

/**
 * Plugin Name: WordPress Settings API
 * Plugin URI: http://tareq.wedevs.com/2012/06/wordpress-settings-api-php-class/
 * Description: WordPress Settings API testing
 * Author: Tareq Hasan
 * Author URI: http://tareq.weDevs.com
 * Version: 0.1
 */
require_once dirname( __FILE__ ) . '/class.settings-api.php';

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('WeDevs_Settings_API_Test' ) ):
class WeDevs_Settings_API_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

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
        add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'wedevs_basics',
                'title' => __( 'Basic Settings', 'wedevs' )
            ),
            array(
                'id' => 'wedevs_advanced',
                'title' => __( 'Advanced Settings', 'wedevs' )
            ),
            array(
                'id' => 'wedevs_others',
                'title' => __( 'Other Settings', 'wpuf' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'wedevs_basics' => array(
                array(
                    'name' => 'text_val',
                    'label' => __( 'Text Input (integer validation)', 'wedevs' ),
                    'desc' => __( 'Text input description', 'wedevs' ),
                    'type' => 'text',
                    'default' => 'Title',
                    'sanitize_callback' => 'intval'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __( 'Textarea Input', 'wedevs' ),
                    'desc' => __( 'Textarea description', 'wedevs' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __( 'Checkbox', 'wedevs' ),
                    'desc' => __( 'Checkbox Label', 'wedevs' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wedevs' ),
                    'desc' => __( 'A radio button', 'wedevs' ),
                    'type' => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wedevs' ),
                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
                    'type' => 'multicheck',
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wedevs' ),
                    'desc' => __( 'Dropdown description', 'wedevs' ),
                    'type' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wedevs' ),
                    'desc' => __( 'Password description', 'wedevs' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wedevs' ),
                    'desc' => __( 'File description', 'wedevs' ),
                    'type' => 'file',
                    'default' => ''
                )
            ),
            'wedevs_advanced' => array(
                array(
                    'name' => 'text',
                    'label' => __( 'Text Input', 'wedevs' ),
                    'desc' => __( 'Text input description', 'wedevs' ),
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __( 'Textarea Input', 'wedevs' ),
                    'desc' => __( 'Textarea description', 'wedevs' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __( 'Checkbox', 'wedevs' ),
                    'desc' => __( 'Checkbox Label', 'wedevs' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wedevs' ),
                    'desc' => __( 'A radio button', 'wedevs' ),
                    'type' => 'radio',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wedevs' ),
                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
                    'type' => 'multicheck',
                    'default' => array('one' => 'one', 'four' => 'four'),
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wedevs' ),
                    'desc' => __( 'Dropdown description', 'wedevs' ),
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wedevs' ),
                    'desc' => __( 'Password description', 'wedevs' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wedevs' ),
                    'desc' => __( 'File description', 'wedevs' ),
                    'type' => 'file',
                    'default' => ''
                )
            ),
            'wedevs_others' => array(
                array(
                    'name' => 'text',
                    'label' => __( 'Text Input', 'wedevs' ),
                    'desc' => __( 'Text input description', 'wedevs' ),
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __( 'Textarea Input', 'wedevs' ),
                    'desc' => __( 'Textarea description', 'wedevs' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __( 'Checkbox', 'wedevs' ),
                    'desc' => __( 'Checkbox Label', 'wedevs' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wedevs' ),
                    'desc' => __( 'A radio button', 'wedevs' ),
                    'type' => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wedevs' ),
                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
                    'type' => 'multicheck',
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wedevs' ),
                    'desc' => __( 'Dropdown description', 'wedevs' ),
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wedevs' ),
                    'desc' => __( 'Password description', 'wedevs' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wedevs' ),
                    'desc' => __( 'File description', 'wedevs' ),
                    'type' => 'file',
                    'default' => ''
                )
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

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
endif; 

$settings = new WeDevs_Settings_API_Test();