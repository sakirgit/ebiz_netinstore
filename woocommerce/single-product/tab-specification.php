<?php 

/**
 * @snippet       New Product Tab @ WooCommerce Single Product
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
 add_filter( 'woocommerce_product_tabs', 'netinstore_add_product_tab', 1 );
   
 function netinstore_add_product_tab( $tabs ) {
    $tabs['docs'] = array(
       'title' => __( 'Specification', 'woocommerce' ), // TAB TITLE
       'priority' => 0, // TAB SORTING (DESC 10, ADD INFO 20, REVIEWS 30)
       'callback' => 'netinstore_docs_product_tab_content', // TAB CONTENT CALLBACK
    );
    return $tabs;
 }
  
 function netinstore_docs_product_tab_content() {
    global $product;
//    echo 'Whatever content for ' . $product->get_name();
//    echo ''. $product->get_id();
    echo get_post_meta($product->get_id(), '_product_specification', true);
 }



