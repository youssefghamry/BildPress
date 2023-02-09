<?php

/**
* Template Name: Page Sidebar
 * @package bildpress
 */

get_header();

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12 ;

?>

<div class="page-area pt-120 pb-120">
    <div class="container">
		<div class="row">
			<div class="col-lg-<?php print esc_attr($blog_column); ?>">
				<div class="bildpress-page-content">
					<?php 
					if( have_posts() ):
						while(  have_posts() ): the_post();
							get_template_part('template-parts/content','page');
						endwhile;
					else:
						get_template_part('template-parts/content', 'none');
					endif; ?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		        <div class="col-lg-4">
					<?php get_sidebar(); ?>
	            </div>
			<?php endif; ?>
		</div>
    </div>
</div>

<?php
get_footer();
