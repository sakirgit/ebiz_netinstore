<?php 


// Add this to your theme's functions.php or enqueue a separate JS file
function product_img_up_enqueue_custom_scripts() {
   wp_enqueue_script('custom-product-img-upload', get_stylesheet_directory_uri() . '/js/custom-product-img-upload.js', array('jquery'), null, true);

   // Pass the ajax_url to script.js
   wp_localize_script('custom-product-upload', 'custom_product_upload_vars', array(
       'ajax_url' => admin_url('admin-ajax.php'),
   ));
}
add_action('admin_enqueue_scripts', 'product_img_up_enqueue_custom_scripts');
/* ============================================================================================== */
function custom_product_image_upload() {
   $directoryName = sanitize_text_field($_POST['directory_name']);
   $directoryPath = get_stylesheet_directory() . '/images/product-images/' . $directoryName;
   $productImagesURL = get_stylesheet_directory_uri() . '/images/product-images/' . $directoryName;

   if (file_exists($directoryPath) && is_dir($directoryPath)) {
       $imageFiles = scandir($directoryPath);
       $data_t = [];
       foreach ($imageFiles as $imageFile) {
           if ($imageFile !== '.' && $imageFile !== '..') {
               // Assuming SKU is the filename without extension
               $file_name = pathinfo($imageFile, PATHINFO_FILENAME);

               if( strpos($file_name, ",") ) {
                   
                   $file_name = explode(",", $file_name);
                   foreach($file_name as $file_name_k => $file_name_v){ 
                       $product = get_product_by_sku(trim($file_name_v));
                       if ($product->id) {
                           $image_url = $productImagesURL . '/' . $imageFile;
                           ntn_image_add_to_product($product->id, $image_url);
                           array_push($data_t, trim($file_name_v));
                       }
                   }
               }else{

                   $product = get_product_by_sku($file_name);

                   if ($product->id) {

                       $image_url = $productImagesURL . '/' . $imageFile;

                       ntn_image_add_to_product($product->id, $image_url);
   
                       array_push($data_t, trim($file_name));
                   }
               }
           }
       }
       wp_send_json_success(["data" => $data_t, "message" => "Product images uploaded successfully!"]);
       
   } else {
       wp_send_json_error('Invalid directory or directory not found.');
   }
}
add_action('wp_ajax_custom_product_image_upload', 'custom_product_image_upload');
add_action('wp_ajax_nopriv_custom_product_image_upload', 'custom_product_image_upload');


function ntn_image_add_to_product($product_id, $image_url){

   // Download and attach image to product
   $image_id = media_sideload_image($image_url, $product_id, '', 'id');

   if (!is_wp_error($image_id)) {
       // Set the downloaded image as the product's featured image
       return set_post_thumbnail($product_id, $image_id);
       // Update product gallery with the new image
   //    update_post_meta($product->id, '_product_image_gallery', $image_id);
   } else {
       // Handle error if image download fails
       return error_log("Failed to download image for SKU $image_url. Error: " . $image_id->get_error_message());
   }
}


