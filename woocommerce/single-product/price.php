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
		  <td><label for="power_poe">Model Name:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, 'model_name', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="power_poe">Power PoE:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, 'power_poe', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="form_factor">Form Factor:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, 'form_factor', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="switching_capacity">Switching Capacity:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, 'switching_capacity', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="mac_table">MAC Table:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, 'mac_table', true)); ?></td>
		</tr>
		<tr>
		  <td><label for="warranty">Warranty:</label></td>
		  <td><?php echo esc_attr(get_post_meta($product->id, 'warranty', true)); ?></td>
		</tr>
	 <?php 
	} else {
		echo "";
	} ?>
	 </tbody>
	 </table>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
