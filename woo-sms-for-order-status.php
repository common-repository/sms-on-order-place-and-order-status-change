<?php
/*
Plugin Name: wooSMS Techno71 
Plugin URI:  http://woopearl.com
Description: This plugin helps to send SMS on order place and Order Status change with the Techno71 SMS api. The pro version will include sms on woocommerce status changes.
Version:     1.1
Author:      Naim-Ul-Hasan
Author URI:  https://www.facebook.com/naim.ulhassan.5074/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: naim
*/


defined('ABSPATH') or die('Only a foolish person try to access directly to see this white page. :-) ');

/**
 * Plugin language
 */
load_plugin_textdomain( 'naim', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );



 // Setup
 define('NT_SMS_FILE_URL', __FILE__ );



 // Includes
 include('includes/activate.php');
 include('includes/deactivate.php');
 include('sms/order-place.php');
 include('admin/admin-menu.php');
 include('admin/admin-sms.php');
 include('uninstall.php');



// Hooks
 register_activation_hook( __FILE__, 'naims_techno_sms_activate_plugin');
 register_deactivation_hook( __FILE__, 'naims_techno_sms_deactivate_plugin');
 register_uninstall_hook( __FILE__, 'naims_techno_sms_uninstall_plugin');
 add_action("admin_menu", "naims_techno_add_sms_submenu_page");
 add_action( 'woocommerce_new_order', 'naims_techno_new_order_sms',  1, 1  );

