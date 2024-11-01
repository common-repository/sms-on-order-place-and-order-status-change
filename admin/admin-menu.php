<?php
function naims_techno_add_sms_submenu_page(){
  add_submenu_page( 'woocommerce', 'Techno71 API Integration Page', 'Techno71 SMS Integration',
    'manage_options', 'naims-techno-sms-integration', 'naims_techno_sms_function');
}