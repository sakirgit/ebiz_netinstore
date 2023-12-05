<?php
   function get_product_by_sku( $sku ) {
    global $wpdb;
    $product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $sku ) );
    if ( $product_id ) return new WC_Product( $product_id );
    return null;
 }
/**
 * Enqueue script and styles for child theme
 */
function woodmart_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), rand(0,9999) );
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




include_once 'inc/custom-product-upload.php';
include_once 'inc/custom-product-meta-box.php';
include_once 'inc/custom-functions.php';

include_once 'woocommerce/single-product/tab-specification-dashboard.php';
include_once 'woocommerce/single-product/tab-specification.php';

/** to change the position of excerpt **/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 21 );

function fnc_woocommerce_single_variation(){
    echo 6456456;
}
add_action( 'woocommerce_single_variation', 'fnc_woocommerce_single_variation' );


/**
 * Output the product short description (excerpt).
 */
function woocommerce_template_single_excerpt() {
    global $product;
?>
	<table class="short_description_tbl">
	 <tr>
		  <td><label for="power_poe">Model Name:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, '_model_name', true)); ?></td>
		</tr>
	</table>
<?php 
    wc_get_template( 'single-product/short-description.php' );
}


/* ======================= Get all parent category slugs by product ID =========================== */



include_once 'inc/product_img_upload.php';
include_once 'inc/product-compare-sc.php';

/* ======================= ========================================== =========================== */






