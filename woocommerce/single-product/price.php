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

	$terms = get_the_terms ( $product->id, 'product_cat' );
	foreach ( $terms as $term ) {
		array_push($parent_category_slugs, $term->slug);
	}

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
	 <?php 
	} else if (in_array("router", $parent_category_slugs)){ ?>
	
		<tr>
			<td><label for="">Rack Mount :</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_rack_mount', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">Interface:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_interface', true)); ?></td>
		</tr>
	<?php	} else if (in_array("firewall", $parent_category_slugs)){ ?>
	
		<tr>
			<td><label for="">Rack Mount :</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_rack_mount_fw', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">NGFW Throughput:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_ngfw_throughput', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">Threat Protection Throughput:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_threat_protection_throughput', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">New Sessions sec:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_new_sessions_sec', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">Concurrent Sessions:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_concurrent_sessions', true)); ?></td>
		</tr>
	<?php	} else if (in_array("ip-telephony", $parent_category_slugs)){ ?>
	
		<tr>
			<td><label for="">PoE_Option :</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_PoE_Option', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">Adapter:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_Adapter', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">SIP:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_SIP', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">Lines:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_Lines', true)); ?></td>
		</tr>
		<tr>
			<td><label for="">Conference_Call:</label></td>
			<td><?php echo esc_attr(get_post_meta($product->id, '_Conference_Call', true)); ?></td>
		</tr>
	<?php	} else if (in_array("ip-telephony", $parent_category_slugs)){ ?>
	
	<tr>
		<td><label for="">PoE_Option :</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_PoE_Option', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">Adapter:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_Adapter', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">SIP:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_SIP', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">Lines:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_Lines', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">Conference_Call:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_Conference_Call', true)); ?></td>
	</tr>
<?php	}  else if (in_array("wi-fi", $parent_category_slugs)){ ?>
	
	<tr>
		<td><label for="">Wi_Fi :</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_Wi_Fi', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">SSID_Security:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_SSID_Security', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">Antena:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_Antena', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">Mimo_Streams:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_Mimo_Streams', true)); ?></td>
	</tr>
	<tr>
		<td><label for="">PoE_Injector:</label></td>
		<td><?php echo esc_attr(get_post_meta($product->id, '_PoE_Injector', true)); ?></td>
	</tr>
<?php	} ?>

	
		<tr>
		  <td><label for="">Availability:</label></td>
			<td>
				<?php 
					$stock_status = "";
					if( $product->get_stock_status() == "outofstock" ){
						$stock_status = "<span class='out-of-stock'>Out of stock</span>";
					}else if( $product->get_stock_status() == "instock" ){
						$stock_status = "<span class='in-stock'>In stock</span>";
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
