<?php
/**
 * This page shows the procedural or functional example
 *
 * OOP way example is given on the main plugin file.
 *
 * @author Tareq Hasan <tareq@weDevs.com>
 */


/**
 * Registers settings section and fields
 */
function wedevs_admin_init() {

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

    $fields = array(
        'wedevs_basics' => array(
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
                'default' => 'no',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
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
            )
        )
    );

    $settings_api = WeDevs_Settings_API::getInstance();

    //set sections and fields
    $settings_api->set_sections( $sections );
    $settings_api->set_fields( $fields );

    //initialize them
    $settings_api->admin_init();
}

add_action( 'admin_init', 'wedevs_admin_init' );

/**
 * Register the plugin page
 */
function wedevs_admin_menu() {
    add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', 'wedevs_plugin_page' );
}

add_action( 'admin_menu', 'wedevs_admin_menu' );

/**
 * Display the plugin settings options page
 */
function wedevs_plugin_page() {
    $settings_api = WeDevs_Settings_API::getInstance();

    echo '<div class="wrap">';
    settings_errors();

    $settings_api->show_navigation();
    $settings_api->show_forms();

    echo '</div>';
}