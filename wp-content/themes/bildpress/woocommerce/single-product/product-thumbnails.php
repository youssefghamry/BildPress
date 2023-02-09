<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     6.0.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $post, $product, $woocommerce;
$attachment_ids = $product->get_gallery_image_ids();
$fea_image = array(get_post_thumbnail_id());
$attachment_ids = array_merge($fea_image,$attachment_ids);
$i=1;
$markup = '';
$markup .= '<div class="shop-thumb-tab mb-30"><ul class="nav" id="myTab2" role="tablist">';
	foreach ( $attachment_ids as $attachment_id ){
		$class = ($i==1)?'active':'';
		$image_attributes = wp_get_attachment_image_src( $attachment_id,array(300,300));
		if($image_attributes[0]!=''){
			$id = 'a'.$i;
			$markup .= '<li class="nav-item">';
				$markup .= '<a class="nav-link '.$class.'" id="'.$id.'-tab" data-toggle="tab" href="#'.$id.'" role="tab" aria-controls="'.$id.'" aria-selected="true"><img class="bildpress-thumb" src="'.current($image_attributes).'" alt="'.esc_attr__('image','bildpress').'" ></a>';
			$markup .= '</li>';
			$i++;
		}
	}
$markup .= '</ul></div>';

echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $markup, $attachment_id );