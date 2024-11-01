<?php
function naims_techno_sms_uninstall_plugin(){
    if (!defined('WP_UNINSTALL_PLUGIN')) {
        die;
    }
     
    $option_name = 'mohaazon-sms-integration';
     
    delete_option($option_name);
}