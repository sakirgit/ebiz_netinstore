<?php
/**
 * Enqueue script and styles for child theme
 */
function woodmart_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), woodmart_get_theme_info( 'Version' ) );
    wp_enqueue_script('netinstore-custom', get_stylesheet_directory_uri() . '/js/netinstore-custom.js', array('jquery'), woodmart_get_theme_info( 'Version' ), true);
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 10010 );

function enqueue_custom_dashboard_assets() {
    // Enqueue the custom CSS file for the dashboard
    wp_enqueue_style('custom-dashboard-css', get_stylesheet_directory_uri() . '/css/admin-style.css');

    // Enqueue the custom JavaScript file for the dashboard
    wp_enqueue_script('custom-dashboard-js', get_stylesheet_directory_uri() . '/js/admin-netinstore-custom.js', array('jquery'), '1.0', true);
}

add_action('admin_enqueue_scripts', 'enqueue_custom_dashboard_assets');



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
                    // Prepare the product data
                    $product_data = array(
                        'post_title' => $product['Name'],
                        'post_content' => $product['Description'] . '<br>' . '<table>
                          <tr>
                            <th>Model</th>
                            <td>' . $product['Model'] . '</td>
                          </tr>
                          <tr>
                            <th>Power_PoE</th>
                            <td>' . $product['Power_PoE'] . '</td>
                          </tr>
                          <tr>
                            <th>Form_Factor</th>
                            <td>' . $product['Form_Factor'] . '</td>
                          </tr>
                          <tr>
                            <th>Switching_Capacity</th>
                            <td>' . $product['Switching_Capacity'] . '</td>
                          </tr>
                          <tr>
                            <th>MAC_Table</th>
                            <td>' . $product['MAC_Table'] . '</td>
                          </tr>
                          <tr>
                            <th>Warranty</th>
                            <td>' . $product['Warranty'] . '</td>
                          </tr>
                        </table>',
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
						  update_post_meta($product_id, '_price', trim($product['Price']));
						  update_post_meta($product_id, '_sku', $product['SKU']);
						  
						  update_post_meta($product_id, '_stock_status', $stock_status);
						  
					  
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

                // Success message
                echo 'Products have been inserted successfully.';
            } else {
                echo 'File upload failed.';
            }
        }
    }
    ?>
    <div class="wrap">
        <h2>Product Upload</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="json_file">
            <input type="submit" value="Upload and Insert Products">
        </form>
    </div>
    <?php
}

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
                    <td><label for="power_poe">Power PoE:</label></td>
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
        update_post_meta($post_id, 'switching_capacity', sanitize_text_field($_POST['switching_capacity']));
        update_post_meta($post_id, 'mac_table', sanitize_text_field($_POST['mac_table']));
        update_post_meta($post_id, 'warranty', sanitize_text_field($_POST['warranty']));
    }
}
add_action('save_post', 'save_custom_product_meta');



function nt_custom_product_meta($params){
    echo "<pre>";
    print_r($params);
    echo "</pre>";
}
//add_action( 'woocommerce_before_add_to_cart_form', 'nt_custom_product_meta' );


/* ======================== Get all parent category slugs by product ID =========================== */
function get_all_parent_category_slugs_by_product_id($product_id) {
    $product = wc_get_product($product_id);
    $category_slugs = array();

    if ($product) {
        $product_categories = wc_get_product_terms($product_id, 'product_cat');

        foreach ($product_categories as $product_category) {
            // Get all parent categories for the current category
            $parent_categories = get_ancestors($product_category->term_id, 'product_cat');

            if (!empty($parent_categories)) {
                // Loop through parent categories and add their slugs to the array
                foreach ($parent_categories as $parent_category_id) {
                    $parent_category = get_term($parent_category_id, 'product_cat');
                    $category_slugs[] = $parent_category->slug;
                }
            }
        }
    }

    return $category_slugs;
}






