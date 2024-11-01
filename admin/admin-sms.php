<?php
function naims_techno_sms_function(){

    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized user');
    }
  
    if (isset($_POST['save'])) {
  
        // validate sms-api-key
        if (isset($_POST['sms-api-key'])) {

          // sanitize sms-api-key
          $api_key = sanitize_text_field($_POST["sms-api-key"]);
          update_option('sms-api-key', $api_key);
        }
    

        // validate sms-api-username
        if (isset($_POST['sms-api-username'])) {

          // sanitize sms-api-username
          $username = sanitize_text_field($_POST["sms-api-username"]);
          update_option('sms-api-username', $username);
        }
    
        if (isset($_POST['sms-sender-id'])) {
          $sender_id = $_POST["sms-sender-id"];
          update_option('sms-sender-id', $sender_id);
        }
    
        echo '<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible">
        <p><strong>Settings saved.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
  
    }
  
    $sms_api_key = get_option('sms-api-key', 'api_key');
    $sms_username = get_option('sms-api-username', 'user');
    $sms_sender_id = get_option('sms-sender-id', 'pass');
    ?>
    <div class="wrap woocommerce">
      <form method="post" id="technoform" action="" enctype="multipart/form-data">
      <?php settings_errors(); ?>
      <h1>SMS API Integration</h1>
      <table class="form-table">
        <tbody>
          <tr valign="top">
            <th scope="row" class="titledesc">
              <label for="sms-api-key">API KEY </label>
            </th>
            <td class="forminp">
              <fieldset>
                <legend class="screen-reader-text"><span>API Key</span></legend>
                <input class="input-text regular-input " type="text" name="sms-api-key" id="sms-api-key" style="" value="<?php echo $sms_api_key; ?>" placeholder="">
                <p class="description">The API KEY you have got from Techno71 account. It can be like this ( TW9oYWF6b246Tn9oYWF6b244NzU= ) </p>
              </fieldset>
            </td>
          </tr>
  
          <tr valign="top">
            <th scope="row" class="titledesc">
              <label for="sms-api-username">Username </label>
            </th>
            <td class="forminp">
              <fieldset>
                <legend class="screen-reader-text"><span>Username</span></legend>
                <input class="input-text regular-input " type="text" name="sms-api-username" id="sms-api-username" style="" value="<?php echo $sms_username; ?>" placeholder="">
                <p class="description">The Username of your API (Don't have an account... <a target="_blank" href="https://www.facebook.com/techno71.bd/">Get it here </a>)</p>
              </fieldset>
            </td>
          </tr>
  
          <tr valign="top">
            <th scope="row" class="titledesc">
              <label for="sms-sender-id">ID </label>
            </th>
            <td class="forminp">
              <fieldset>
                <legend class="screen-reader-text"><span>ID</span></legend>
                <input class="input-text regular-input " type="password" name="sms-sender-id" id="sms-sender-id" style="" value="<?php echo $sms_sender_id; ?>" placeholder="">
                <p class="description">The Sender Id of your account (you will find in your update profile option in your account)</p>
              </fieldset>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row" class="titledesc">
              <label>Get Full Features</label>
            </th>
            <td scope="row" class="titledesc">
              <label>For the SMS on every order status change, please contact the author <a href="https://www.facebook.com/naim.ulhassan.5074/">Naim-Ul-Hasan</a> of <a href="https://woopearl.com">Mohaazon It Solution (woopearl)</a></label>
            </td>
          </tr>
  
        </tbody>
      </table>
  
      <p class="submit">
        <?php wp_nonce_field( 'sms_nonce_field' ); ?>
        <button name="save" class="button-primary woocommerce-save-button" type="submit" value="Save changes">Save changes</button>
  
      </p>
    </form>
    </div>
    <?php
  }