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
   <p>
       <label for="model_name">Model Name:</label>
       <input type="text" name="model_name" id="model_name" value="<?php echo esc_attr(get_post_meta($post->ID, 'model_name', true)); ?>">
   </p>
   <div class="custom-product-tabs">
       <ul class="nav nav-tabs">
           <li class="active"><a href="#switch-tab" data-toggle="tab">Product data for Switch</a></li>
           <li><a href="#router-tab" data-toggle="tab">Product data for Router</a></li>
           <li><a href="#wireless-tab" data-toggle="tab">Product data for Wireless</a></li>
       </ul>
        
       <div class="tab-content">
           <div class="tab-pane active" id="switch-tab">
               <table>
               <tbody>
                 <tr>
                   <td><label for="power_poe">Power Supply:</label></td>
                   <td><input type="text" name="power_poe" id="power_poe" value="<?php echo esc_attr(get_post_meta($post->ID, 'power_poe', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="form_factor">Form Factor:</label></td>
                   <td><input type="text" name="form_factor" id="form_factor" value="<?php echo esc_attr(get_post_meta($post->ID, 'form_factor', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="switching_capacity">Switching Capacity:</label></td>
                   <td><input type="text" name="switching_capacity" id="switching_capacity" value="<?php echo esc_attr(get_post_meta($post->ID, 'switching_capacity', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="switching_capacity">Forwarding Rate:</label></td>
                   <td><input type="text" name="forwarding_rate" id="forwarding_rate" value="<?php echo esc_attr(get_post_meta($post->ID, 'forwarding_rate', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="mac_table">MAC Table:</label></td>
                   <td><input type="text" name="mac_table" id="mac_table" value="<?php echo esc_attr(get_post_meta($post->ID, 'mac_table', true)); ?>"></td>
                 </tr>
                 <tr>
                   <td><label for="warranty">Warranty:</label></td>
                   <td><input type="text" name="warranty" id="warranty" value="<?php echo esc_attr(get_post_meta($post->ID, 'warranty', true)); ?>"></td>
                 </tr>
               </tbody>
               </table>
           </div>
           <div class="tab-pane" id="router-tab">
                Add content for Product data for Router tab 
           </div>
           <div class="tab-pane" id="wireless-tab">
                Add content for Product data for Wireless tab
           </div>
       </div>
   </div>
   <?php
}

// Save the custom meta box data
function save_custom_product_meta($post_id) {
   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
   if ($post_id && get_post_type($post_id) === 'product') {
       update_post_meta($post_id, 'model_name', sanitize_text_field($_POST['model_name']));
       update_post_meta($post_id, 'power_poe', sanitize_text_field($_POST['power_poe']));
       update_post_meta($post_id, 'form_factor', sanitize_text_field($_POST['form_factor']));
       update_post_meta($post_id, 'forwarding_rate', sanitize_text_field($_POST['forwarding_rate']));
       update_post_meta($post_id, 'switching_capacity', sanitize_text_field($_POST['switching_capacity']));
       update_post_meta($post_id, 'mac_table', sanitize_text_field($_POST['mac_table']));
       update_post_meta($post_id, 'warranty', sanitize_text_field($_POST['warranty']));
   }
}
add_action('save_post', 'save_custom_product_meta');

