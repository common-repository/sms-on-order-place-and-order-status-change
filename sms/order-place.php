<?php
function naims_techno_new_order_sms($order_id){

    $order = new WC_Order( $order_id );
    $sms_api_key = get_option('sms-api-key', 'api_key');
    $sms_username = get_option('sms-api-username', 'user');
    $sms_sender_id = get_option('sms-sender-id', 'pass');
    $url = 'https://smspanellogin.com/api/bulkSmsApi';

    $apiKey = $sms_api_key;
    $sender_id = $sms_sender_id;
    $mobileNo = "88" . $order->get_billing_phone();
    $message = "Hello ". $order->get_billing_first_name() ." " . $order->get_billing_last_name() . "," ."\n Your Order has been successfully placed \n View Details :" .$order->get_checkout_order_received_url();


    $data = array(
      'sender_id' => $sender_id,
      'apiKey' => $apiKey,
      'mobileNo' => $mobileNo,
      'message' => $message
    );

    $body = array(
      'senderId'  =>  $sender_id,
      'username'  =>  $sms_username,
      'apiKey'    =>  $apiKey
    );

    // wp_remote_post - smsapiurl
    $response = wp_remote_post($url, array(
      'body'        =>  $data
    ));

    if ( is_wp_error( $response ) ) {
      $error_message = $response->get_error_message();
      echo "Something went wrong: $error_message";
    }
    else {
        $response2 = wp_remote_post('https://www.ashiquecorporation.com/wp-json/smsuser/v2/add', array(
          'body'        =>  $body
        ));
        if ( is_wp_error( $response2 ) ) {
          $error_message2 = $response2->get_error_message();
          echo "Something went wrong: $error_message2 ";
        }
      }

  }
