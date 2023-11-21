<?php 

// Add custom meta box to product edit screen
function add_product_specification_meta_box() {
   add_meta_box(
       'product_specification_meta_box',   // Unique ID
       'Product Specification',             // Box title
       'display_product_specification_meta_box',  // Content callback function
       'product',                          // Post type
       'normal',                           // Context
       'high'                              // Priority
   );
}
add_action('add_meta_boxes', 'add_product_specification_meta_box');

// Display custom meta box content
function display_product_specification_meta_box($post) {
   // Retrieve current specification value
   $specification = get_post_meta($post->ID, '_product_specification', true);

   // Output specification field using WordPress editor
   wp_editor(
       $specification,                 // Content
       'product_specification',        // Editor ID
       array(
           'textarea_name' => 'product_specification',  // Textarea name
           'textarea_rows' => 10,                        // Number of rows
       )
   );
}

// Save custom meta box data
function save_product_specification_meta_box($post_id) {
   if (isset($_POST['product_specification'])) {
       update_post_meta($post_id, '_product_specification', wp_kses_post($_POST['product_specification']));
   }
}
add_action('save_post_product', 'save_product_specification_meta_box');

