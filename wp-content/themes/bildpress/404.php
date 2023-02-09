<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bildpress
 */

get_header();
?>

<div class="error-area pt-100 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
            	<?php
            		$bildpress_error_404_text = get_theme_mod('bildpress_error_404_text','404'); 
            		$bildpress_error_title = get_theme_mod('bildpress_error_title','Page not found '); 
            		$bildpress_error_link_text = get_theme_mod('bildpress_error_link_text','Back To Home '); 
            		$bildpress_error_desc = get_theme_mod('bildpress_error_desc','Oops! The page you are looking for does not exist. It might have been moved or deleted. '); 
            	?>
				<div class="error-404 not-found">
					<div class="page-content">
	                    <div class="error-404-content text-center">
	                        <h1 class="error-404-title"><?php print esc_html( $bildpress_error_404_text ); ?></h1>
	                        <h2 class="error-title"><?php print esc_html( $bildpress_error_title ); ?></h2>
	                        <div class="error-content">
	                            <div class="error-text">
	                                <span><?php print esc_html( $bildpress_error_desc ); ?></span>
	                            </div>
	                            <div class="error-btn-bh">
	                            	<a href="<?php print esc_url(home_url('/')); ?>" class="site__btn1">
	                            		<?php print esc_html($bildpress_error_link_text); ?>
	                            	</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
