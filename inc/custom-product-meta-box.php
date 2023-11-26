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
           <li><a href="#router-tab" data-toggle="tab">Product data for Firewall</a></li>
           <li><a href="#wireless-tab" data-toggle="tab">Product data for Wireless</a></li>
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
           <div class="tab-pane" id="wireless-tab">
                Add content for Product data for Wireless tab
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
   }
}
add_action('save_post', 'ntn_save_custom_product_meta');

