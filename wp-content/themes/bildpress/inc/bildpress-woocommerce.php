<?php
/** 
 * [bildpress_remove_hook description]
 * @return [type] [description]
 */
function bildpress_remove_hook() {
	remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
	remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
	remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
	remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
	remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
	remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
	remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
	remove_action('woocommerce_product_thumbnails','woocommerce_show_product_thumbnails',20);

	/*Single Product*/

	remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
	remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display',15);
	add_action('woocommerce_single_product_summary','bildpress_woo_rating',5);

	add_action('woocommerce_mid_shop_loop_item_title','woocommerce_template_loop_product_link_close',5);
	add_action('woocommerce_mid_shop_loop_item_title','bildpress_product_cart_button',10);
	add_action('woocommerce_shop_loop_item_title','bildpress_product_title',10);
	add_action('bildpress_woocommerce_product_thumbnails','woocommerce_show_product_thumbnails',20);
}
bildpress_remove_hook();

add_filter('woocommerce_show_page_title',function(){
	return false;
});

define( 'bildpress_WISHLIST_ACTIVED', in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

/** 
 * [bildpress_product_title description]
 * @return [type] [description]
 */
function bildpress_product_title(){
	echo '<h4 class="woocommerce-loop-product__title pro-title"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h4>';
}

/** 
 * [bildpress_product_cart_button description]
 * @return [type] [description]
 */
function bildpress_product_cart_button(){
	global $product;
	$class = 'product_type_' . $product->get_type().' add_to_cart_button '.($product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '');
	$attributes  = array(
		'data-product_id'  => $product->get_id(),
		'data-product_sku' => $product->get_sku(),
		'aria-label'       => $product->add_to_cart_description(),
		'rel'              => 'nofollow',
	);
	print '<div class="product-action">';
		print '<a '.http_build_query($attributes,' ',' ').' class="'.$class.'" href="'.$product->add_to_cart_url().'"><i class="fas fa-shopping-cart"></i></a>';
		 print bildpress_vc_yith_wishlist();
		 print '<a href="'. get_the_permalink() .'"><i class="fas fa-search"></i></a>';
	print '</div>';
}

/** 
 * [bildpress_woo_rating description]
 * @return [type] [description]
 */


function bildpress_woo_rating(){
	global $product;
	$rating = $product->get_average_rating();
	$review = 'Rating '.$rating.' out of 5';
	$html = '';
	$html .= '<div class="rating mt-10 mb-10" title="'.$review.'">';
		for($i = 0;$i<=4;$i++){
			if($i<floor($rating)){
				$html .= '<a href="#"><i class="fas fa-star"></i></a>';
			}else{
				$html .= '<a href="#"><i class="far fa-star"></i></a>';
			}
		}
		$html .= '<span>('.$rating.')</span>';
	$html .= '</div>';
	print bildpress_woo_rating_html($html);
}

function bildpress_woo_rating_html($html){
	return $html;
}

/** 
 * [bildpress_woo_rating description]
 * @return [type] [description]
 */
function bildpress_woo_shop_rating(){
	global $product;
	$rating = $product->get_average_rating();
	$review = esc_html('Rating '.$rating.' out of 5');
	ob_start(); ?>
	<div class="rating mb-10" title="<?php print esc_attr($review); ?>">
	<?php 
		for($i = 0;$i<=4;$i++){ 
			if($i<floor($rating)){ ?>
				<a href="#"><i class="fas fa-star"></i></a>
			<?php
			}
			else{ ?>
 				<a href="#"><i class="far fa-star"></i></a>
			<?php
			}
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

function bildpress_get_price(){
	ob_start(); ?> 
	<span class="price"><?php print bildpress_get_price_html(); ?></span>
	<?php
	return ob_get_clean();
}

function bildpress_get_price_html(){
	global $product;
	return $product->get_price_html();
}

/** 
 * [bildpress_comment_rating description]
 * @param  [type] $rating [description]
 * @return [type]         [description]
 */
function bildpress_comment_rating($rating){
	$review = 'Rating '.$rating.' out of 5';
	$html = '';
	$html .= '<div class="rating" title="'.$review.'">';
		for($i = 0;$i<=4;$i++){
			if($i<floor($rating)){
				$html .= '<a href="#"><i class="fas fa-star"></i></a>';
			}else{
				$html .= '<a href="#"><i class="far fa-star"></i></a>';
			}
		}
	$html .= '</div>';
	return $html;
}


add_filter('add_to_cart_fragments', 'bildpress_woocommerce_header_add_to_cart_fragment');

/** 
 * [bildpress_woocommerce_header_add_to_cart_fragment description]
 * @param  [type] $fragments [description]
 * @return [type]            [description]
 */
function bildpress_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
		<a class="cp-minicart" href="<?php echo wc_get_cart_url(); ?>"><i class="fas fa-shopping-cart"></i><span id="bildpress-cart" class="mini-cart-items"><?php print WC()->cart->get_cart_contents_count(); ?></span></a>
    <?php
    $fragments['a.cp-minicart'] = ob_get_clean();
    return $fragments;
}

function bildpress_vc_yith_wishlist( $style = 1 ) {

	global $product;

	$cssclass = 'wishlist-rd';
	$mar = 'tanzim-mar-top';

	if( $style != 2 ) {
		$cssclass = 'pro-btn';
		$mar = '';
	}

	$id = $product->get_id();
	$type = $product->get_type();
	$link = get_site_url();

	$img = '<img src="'. esc_attr($link) .'/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading tanzim_wi_loder" alt="'. esc_attr('loading'). '" width="16" height="16" style="visibility:hidden">';
	$markup = '';

	if( bildpress_WISHLIST_ACTIVED ) {

		$markup .= '<div class="yith-wcwl-add-to-wishlist '.$mar.' add-to-wishlist-'.$id.'">';
			$markup .= '<div class="yith-wcwl-add-button wishlist show" style="display:block">';
				$markup .= '<a href="'.$link.'/shop/?add_to_wishlist='.$id.'" rel="nofollow" data-product-id="'.$id.'" data-product-type="'.$type.'" class="add_to_wishlist '.$cssclass.'">';
					$markup .= '<i class="fas fa-heart"></i></a>';
				$markup .= $img;
			$markup .= '</div>';
			$markup .= '<div class="yith-wcwl-wishlistaddedbrowse wishlist hide" style="display:none;">';
				$markup .= '<a href="'.$link.'/wishlist/view/" rel="nofollow" class=" '.$cssclass.'"><i class="fas fa-heart"></i></a>';
				$markup .= $img;
			$markup .= '</div>';
			$markup .= '<div class="yith-wcwl-wishlistexistsbrowse wishlist  hide" style="display:none">';
				$markup .= '<a href="'.$link.'/wishlist/view/" rel="nofollow" class=" '.$cssclass.'"><i class="fas fa-heart"></i></a>';
				$markup .= $img;
			$markup .= '</div>';
			$markup .= '<div style="clear:both"></div>';
			$markup .= '<div class="yith-wcwl-wishlistaddresponse"></div>';
		$markup .= '</div>';
	}

	return $markup;
}

add_filter('woocommerce_product_additional_information_heading','bildpress_tab_heading');
add_filter('woocommerce_product_description_heading','bildpress_tab_heading');

/** 
 * [bildpress_tab_heading description]
 * @param  [type] $heading [description]
 * @return [type]          [description]
 */
function bildpress_tab_heading($heading){
	return '';
}

/** 
 * [bildpress_woo_pagination description]
 * @param  [type] $pagination [description]
 * @return [type]             [description]
 */
function bildpress_woo_pagination($pagination){
	$pagi = '';
	if( $pagination !=''){
		$pagi .= '<ul class="pagination justify-content-start">';
					foreach ($pagination as $key => $pg) {
						$pagi.= '<li class="page-item">'.$pg.'</li>';
					}
		$pagi .= '</ul>';
	}
	return $pagi;
}