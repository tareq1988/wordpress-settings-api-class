<?php
/**
 * Plugin Name: WordPress Settings API
 * Plugin URI: https://tareq.co/2012/06/wordpress-settings-api-php-class/
 * Description: WordPress Settings API testing
 * Author: Tareq Hasan
 * Author URI: https://tareq.co
 * Version: 1.3
 */

require_once dirname( __FILE__ ) . '/src/class.settings-api.php';
require_once dirname( __FILE__ ) . '/example/oop-example.php';

new WeDevs_Settings_API_Test();