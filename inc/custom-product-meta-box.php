<?php 


/* ============================================================ */
// Add custom meta box to single product edit page
function custom_product_meta_box() {
   add_meta_box(
       'custom_product_data',
       'More product data:',
       'render_custom_product_meta_box',
       'product',
       'normal',
       'high'
   );
}
add_action('add_meta_boxes', 'custom_product_meta_box');

// Render the custom meta box with vertical tabs and fields
function render_custom_product_meta_box($post) {
   ?>
   <p class="">
       <label for="_model_name">Model Name:</label>
       <input type="text" style="min-width: 500px;" name="_model_name" id="_model_name" value="<?php echo esc_attr(get_post_meta($post->ID, '_model_name', true)); ?>">
   </p>
   <div class="custom-product-tabs">
       <ul class="nav nav-tabs">
           <li class="active"><a href="#switch-tab" data-toggle="tab">Product data for Switch</a></li>
           <li><a href="#router-tab" data-toggle="tab">Product data for Router</a></li>
           <li><a href="#firewall-tab" data-toggle="tab">Product data for Firewall</a></li>
           <li><a href="#wireless-tab" data-toggle="tab">Product data for Wireless</a></li>
           <li><a href="#ipphone-tab" data-toggle="tab">Product data for IP Phone</a></li>
       </ul>
        
       <div class="tab-content">
           <div class="tab-pane active" id="switch-tab">
               <table>
               <tbody>
                 <tr>
                   <td><label for="_power_supply">Power Supply:</label></td>
                   <td><input type="text" name="_power_supply" id="_power_supply" value="<?php echo esc_attr(get_post_meta($post->ID, '_power_supply', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="_form_factor">Form Factor:</label></td>
                   <td><input type="text" name="_form_factor" id="_form_factor" value="<?php echo esc_attr(get_post_meta($post->ID, '_form_factor', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="_switching_capacity">Switching Capacity:</label></td>
                   <td><input type="text" name="_switching_capacity" id="_switching_capacity" value="<?php echo esc_attr(get_post_meta($post->ID, '_switching_capacity', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="_forwarding_rate">Forwarding Rate:</label></td>
                   <td><input type="text" name="_forwarding_rate" id="_forwarding_rate" value="<?php echo esc_attr(get_post_meta($post->ID, '_forwarding_rate', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="_mac_table">MAC Table:</label></td>
                   <td><input type="text" name="_mac_table" id="_mac_table" value="<?php echo esc_attr(get_post_meta($post->ID, '_mac_table', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="_warranty">Warranty:</label></td>
                   <td><input type="text" name="_warranty" id="_warranty" value="<?php echo esc_attr(get_post_meta($post->ID, '_warranty', true)); ?>"></td>
                 </tr>
               </tbody>
               </table>
           </div>
           <div class="tab-pane" id="router-tab">
              <table>
                <tbody>
                  <tr>
                    <td><label for="_rack_mount">Rack Mount:</label></td>
                    <td><input type="text" name="_rack_mount" id="_rack_mount" value="<?php echo esc_attr(get_post_meta($post->ID, '_rack_mount', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_interface">Interface:</label></td>
                    <td><input type="text" name="_interface" id="_interface" value="<?php echo esc_attr(get_post_meta($post->ID, '_interface', true)); ?>"></td>
                  </tr>
                </tbody>
              </table>
           </div>
           <div class="tab-pane" id="firewall-tab">
              <table>
                  <tbody>
                    <tr>
                      <td><label for="_rack_mount">Rack Mount:</label></td>
                      <td><input type="text" name="_rack_mount_fw" id="_rack_mount_fw" value="<?php echo esc_attr(get_post_meta($post->ID, '_rack_mount_fw', true)); ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="_ngfw_throughput">NGFW Throughput:</label></td>
                      <td><input type="text" name="_ngfw_throughput" id="_ngfw_throughput" value="<?php echo esc_attr(get_post_meta($post->ID, '_ngfw_throughput', true)); ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="_threat_protection_throughput">Threat Protection Throughput:</label></td>
                      <td><input type="text" name="_threat_protection_throughput" id="_threat_protection_throughput" value="<?php echo esc_attr(get_post_meta($post->ID, '_threat_protection_throughput', true)); ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="_new_sessions_sec">New Sessions sec:</label></td>
                      <td><input type="text" name="_new_sessions_sec" id="_new_sessions_sec" value="<?php echo esc_attr(get_post_meta($post->ID, '_new_sessions_sec', true)); ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="_concurrent_sessions">Concurrent Sessions:</label></td>
                      <td><input type="text" name="_concurrent_sessions" id="_concurrent_sessions" value="<?php echo esc_attr(get_post_meta($post->ID, '_concurrent_sessions', true)); ?>"></td>
                    </tr>
                  </tbody>
              </table>
           </div>
           <div class="tab-pane" id="wireless-tab">
                Add content for Product data for Wireless tab
           </div>
           <div class="tab-pane" id="ipphone-tab">
            
              <table>
                <tbody>
                  <tr>
                    <td><label for="_PoE_Option">PoE_Option:</label></td>
                    <td><input type="text" name="_PoE_Option" id="_PoE_Option" value="<?php echo esc_attr(get_post_meta($post->ID, '_PoE_Option', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_Adapter">Adapter:</label></td>
                    <td><input type="text" name="_Adapter" id="_Adapter" value="<?php echo esc_attr(get_post_meta($post->ID, '_Adapter', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_SIP">_SIP:</label></td>
                    <td><input type="text" name="_SIP" id="_SIP" value="<?php echo esc_attr(get_post_meta($post->ID, '_SIP', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_Lines">_Lines:</label></td>
                    <td><input type="text" name="_Lines" id="_Lines" value="<?php echo esc_attr(get_post_meta($post->ID, '_Lines', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="Conference_Call">_Conference_Call:</label></td>
                    <td><input type="text" name="_Conference_Call" id="_Conference_Call" value="<?php echo esc_attr(get_post_meta($post->ID, '_Conference_Call', true)); ?>"></td>
                  </tr>
                </tbody>
              </table>
           </div>
           <div class="tab-pane" id="wifi-tab">
            
              <table>
                <tbody>
                  <tr>
                    <td><label for="_Wi_Fi">_Wi_Fi:</label></td>
                    <td><input type="text" name="_Wi_Fi" id="_Wi_Fi" value="<?php echo esc_attr(get_post_meta($post->ID, '_Wi_Fi', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_SSID_Security">_SSID_Security:</label></td>
                    <td><input type="text" name="_SSID_Security" id="_SSID_Security" value="<?php echo esc_attr(get_post_meta($post->ID, '_SSID_Security', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_Antena">_Antena:</label></td>
                    <td><input type="text" name="_Antena" id="_Antena" value="<?php echo esc_attr(get_post_meta($post->ID, '_Antena', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_Mimo_Streams">_Mimo_Streams:</label></td>
                    <td><input type="text" name="_Mimo_Streams" id="_Mimo_Streams" value="<?php echo esc_attr(get_post_meta($post->ID, '_Mimo_Streams', true)); ?>"></td>
                  </tr>
                  <tr>
                    <td><label for="_PoE_Injector">_PoE_Injector:</label></td>
                    <td><input type="text" name="_PoE_Injector" id="_PoE_Injector" value="<?php echo esc_attr(get_post_meta($post->ID, '_PoE_Injector', true)); ?>"></td>
                  </tr>
                </tbody>
              </table>
           </div>
       </div>
   </div>
   <?php
}

// Save the custom meta box data
function ntn_save_custom_product_meta($post_id) {
   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
   if ($post_id && get_post_type($post_id) === 'product') {
       update_post_meta($post_id, '_model_name', sanitize_text_field($_POST['_model_name']));
       update_post_meta($post_id, '_power_poe', sanitize_text_field($_POST['_power_poe']));
       update_post_meta($post_id, '_form_factor', sanitize_text_field($_POST['_form_factor']));
       update_post_meta($post_id, '_forwarding_rate', sanitize_text_field($_POST['_forwarding_rate']));
       update_post_meta($post_id, '_switching_capacity', sanitize_text_field($_POST['_switching_capacity']));
       update_post_meta($post_id, '_mac_table', sanitize_text_field($_POST['_mac_table']));
       
       update_post_meta($post_id, '_warranty', sanitize_text_field($_POST['_warranty']));

       update_post_meta($post_id, '_rack_mount', sanitize_text_field($_POST['_rack_mount']));
       update_post_meta($post_id, '_interface', sanitize_text_field($_POST['_interface']));

       update_post_meta($post_id, '_rack_mount_fw', sanitize_text_field($_POST['_rack_mount_fw']));
       update_post_meta($post_id, '_ngfw_throughput', sanitize_text_field($_POST['_ngfw_throughput']));
       update_post_meta($post_id, '_threat_protection_throughput', sanitize_text_field($_POST['_threat_protection_throughput']));
       update_post_meta($post_id, '_new_sessions_sec', sanitize_text_field($_POST['_new_sessions_sec']));
       update_post_meta($post_id, '_concurrent_sessions', sanitize_text_field($_POST['_concurrent_sessions']));


       update_post_meta($post_id, '_PoE_Option', sanitize_text_field($_POST['_PoE_Option']));
       update_post_meta($post_id, '_Adapter', sanitize_text_field($_POST['_Adapter']));
       update_post_meta($post_id, '_SIP', sanitize_text_field($_POST['_SIP']));
       update_post_meta($post_id, '_Lines', sanitize_text_field($_POST['_Lines']));
       update_post_meta($post_id, '_Conference_Call', sanitize_text_field($_POST['_Conference_Call']));

       update_post_meta($post_id, '_Wi_Fi', sanitize_text_field($_POST['_Wi_Fi']));
       update_post_meta($post_id, '_SSID_Security', sanitize_text_field($_POST['_SSID_Security']));
       update_post_meta($post_id, '_Antena', sanitize_text_field($_POST['_Antena']));
       update_post_meta($post_id, '_Mimo_Streams', sanitize_text_field($_POST['_Mimo_Streams']));
       update_post_meta($post_id, '_PoE_Injector', sanitize_text_field($_POST['_PoE_Injector']));

   }
}
add_action('save_post', 'ntn_save_custom_product_meta');

