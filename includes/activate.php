<?php
function naims_techno_sms_activate_plugin(){
    if(version_compare(get_bloginfo('version'), '5.0', '<')){
        wp_die('you must update wordpress to use this plugin');
    }  
    
}