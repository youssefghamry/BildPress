<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 6.0.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

?>

<?php
	$html = '';
	$attachment_ids = $product->get_gallery_image_ids();
	$post_thumbnail_id = array(get_post_thumbnail_id());
	$attachment_ids = array_merge($post_thumbnail_id,$attachment_ids);
	$i=1;
	foreach ( $attachment_ids as $attachment_id ){
		$class = ($i==1)?'show active':'';
		$image_attributes = wp_get_attachment_image_src( $attachment_id,array(600,400));
		if($image_attributes[0]!=''){
			$id = 'a'.$i;
			$html .=  '<div class="tab-pane fade '.$class.'" id="'.$id.'">';
				$html .= '<img src="'.$image_attributes[0].'" alt="'.esc_attr__('img','bildpress').'">';
			$html .= '</div>';
			$i++;
		}
	}
?>


<div class="tab-content mb-20" id="myTabContent3">
	<?php echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); ?>
</div>

<?php do_action( 'bildpress_woocommerce_product_thumbnails' ); ?>

<?php do_action( 'woocommerce_product_thumbnails' ); ?>


