<div class="post-entry post-entry--top-margin">
<?php 
	the_content();
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:','bildpress' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page','bildpress' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text"> </span>',
	) );
	
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif; ?>
</div>