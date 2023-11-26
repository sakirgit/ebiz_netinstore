<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
	$parent_category_slugs = get_all_parent_category_slugs_by_product_id($product->id);
	/*
	echo "<pre>";
	print_r($parent_category_slugs);
	echo "</pre>";
	*/
?>
	 <table>
	 <tbody>
	 
	 <?php 
		if (in_array("switch", $parent_category_slugs)){ ?>
		<tr>
		  <td><label for="">Power Supply :</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, '_power_supply', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="">Form Factor:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, '_form_factor', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="">Switching Capacity:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, '_switching_capacity', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="">Forwarding Rate:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, '_forwarding_rate', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="">MAC Table:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, '_mac_table', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="">Availability:</label></td>
			<td>
				<?php 
					$stock_status = "";
					if( $product->get_stock_status() == "outofstock" ){
						$stock_status = "<span class='out-of-stock'>Out of stock</span>";
					}else if( $product->get_stock_status() == "instock" ){
						$stock_status = "<span class='in-stock'>In stock</span>";
					}else{
						$stock_status = "On backorder";
					}
					echo $stock_status; 
				?>
			</td>
		</tr>
		<tr>
		  <td><label for="">Warranty:</label></td>
		  <td><?php 
		  $warranty =  get_post_meta($product->id, '_warranty', true);
		  
			if( $warranty == "1 Year" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_1-year-warranty.png' />";
			}else if( $warranty == "2 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_2-years-warranty.png' />";
			}else if( $warranty == "3 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_3-years-warranty.png' />";
			}else if( $warranty == "4 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_4-years-warranty.png' />";
			}else if( $warranty == "5 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_5-years-warranty.png' />";
			}else if( $warranty == "6 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_6-years-warranty.png' />";
			}else if( $warranty == "7 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_7-years-warranty.png' />";
			}else if( $warranty == "8 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_8-years-warranty.png' />";
			}else if( $warranty == "9 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_9-years-warranty.png' />";
			}else if( $warranty == "10 Years" ){
				$warranty = "<img src='" . get_stylesheet_directory_uri() . "/images/warranty/icon_10-years-warranty.png' />";
			}
		  	echo $warranty; 
			?></td>
		</tr>
	 <?php 
	} else {
		echo "";
	} ?>
	 </tbody>
	 </table>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
<?php 
	if( empty($product->get_price_html()) ){
		echo "Call for price";
	}else{
		echo $product->get_price_html();
	} 
?>
</p>
