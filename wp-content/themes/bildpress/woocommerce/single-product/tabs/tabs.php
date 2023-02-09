<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
$i = $j = 0;
if ( ! empty( $tabs ) ) : ?>

<div class="bakix-details-tab">
	<ul class="nav text-center justify-content-center pb-30 mb-30" id="myTab1" role="tablist">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<?php $cl = ($j==0)?' active show':''; ?>
			<li class="nav-item">
				<a class="nav-link <?php print esc_html($cl); ?>" data-toggle="tab" href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
			</li>
		<?php $j++; endforeach; ?>
	</ul>
</div>
	<div class="tab-content" id="myTabContent2">
		<?php foreach ( $tabs as $key => $tab ) : ?>
		<?php $cl = ($i==0)?'active show':''; ?>
			<div class="tab-pane fade <?php print esc_html($cl); ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<div class="event-text">
					<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
				</div>
			</div>
		<?php $i++; endforeach; ?>
	</div>


<?php endif; ?>
