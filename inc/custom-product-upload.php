<?php 

function allow_json_uploads($mimes) {
   $mimes['json'] = 'application/json';
   return $mimes;
}
add_filter('upload_mimes', 'allow_json_uploads');

function register_product_upload_menu() {
   add_menu_page(
       'Product Upload',     // Page Title
       'Product Upload',     // Menu Title
       'manage_options',     // Capability (who can access)
       'product-upload',     // Menu Slug
       '__product_upload_page' // Callback function to display the page
   );
}
add_action('admin_menu', 'register_product_upload_menu');

function __product_upload_page() {
   if( isset($_POST['custom_product_upload_submission']) ) {
      
      if (isset($_FILES['json_file'])) {
         // Check if there was an error during file upload
         if ($_FILES['json_file']['error'] !== 0) {
            echo 'File upload error.';
         } else {
            // Handle file upload
            $uploaded_file = wp_handle_upload($_FILES['json_file'], array('test_form' => false));
            
            //  /*
            echo "<pre>";
            print_r($uploaded_file);
            echo "</pre>";
         //	 exit;
            // */
            if (isset($uploaded_file['file'])) {
               // Get the uploaded file path
               $json_file_path = $uploaded_file['file'];

               // Read the JSON data from the uploaded file
               $json_data = file_get_contents($json_file_path);

               // Convert the JSON data to an array
               $products = json_decode($json_data, true);

               // Insert products into WooCommerce
               foreach ($products as $product) {
                     if( $product['SKU'] != "" ){

                        // Prepare the product data
                        $product_data = array(
                           'post_title' => $product['Model'],
                           'post_content' => $product['Description'],
                           'post_status' => 'publish',
                           'post_type' => 'product',
                        );

                        // Insert the product into WooCommerce
                        $product_id = wp_insert_post($product_data);
                           
                                 $stock_status = "onbackorder";
                                 if( $product['Lead_Time'] == "In Stock" ){
                                    $stock_status = "instock";
                                 }
                                 
                           // Set the product price
                           update_post_meta($product_id, '_regular_price', trim($product['Price']));
                           update_post_meta($product_id, '_sku', $product['SKU']);
                           
                           update_post_meta($product_id, '_stock_status', $stock_status);

                           update_post_meta($product_id, 'model_name', $product['Name']);
                           update_post_meta($product_id, 'power_poe', $product['Power_PoE']);
                           update_post_meta($product_id, 'form_factor', $product['Form_Factor']);
                           update_post_meta($product_id, 'switching_capacity', $product['Switching_Capacity']);
                           update_post_meta($product_id, 'mac_table', $product['MAC_Table']);
                           update_post_meta($product_id, 'warranty', $product['Warranty']);
                           
                        
                           if( trim($product['Category']) == "Cisco CBS350" ){
                                 $category_id = 80;
                           }else if( trim($product['Category']) == "Cisco C1000" ){
                                 $category_id = 81;
                           }else if( trim($product['Category']) == "Cisco C9200" ){
                                 $category_id = 82;
                           }else if( trim($product['Category']) == "Cisco C9300" ){
                                 $category_id = 83;
                           }else if( trim($product['Category']) == "Cisco C9500" ){
                                 $category_id = 84;
                           }
                           
                           // Set the product category
                           wp_set_post_terms($product_id, $category_id, 'product_cat');
                                                      
                        // You may need to set other product attributes and categories as well
                        // For example, to set categories, use wp_set_post_terms()
                     }
               }

               // Success message
               echo 'Products have been inserted successfully.';
            } else {
               echo 'File upload failed.';
            }
         }
   }
   }
   ?>
   <div class="wrap">
       <h2>Product Upload</h2>
       <form method="post" enctype="multipart/form-data">
           <input type="file" name="json_file">
           <input type="submit" name="custom_product_upload_submission" value="Upload and Insert Products">
       </form>
       <hr>
       
       <h2>Product thumbnail Upload</h2>
       <form method="post" enctype="multipart/form-data">
           <input type="file" name="json_file">
           <input type="submit" name="custom_product_upload_submission" value="Upload and Insert Products">
       </form>
   </div>
   <?php
}

