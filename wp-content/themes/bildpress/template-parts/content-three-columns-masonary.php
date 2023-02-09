<?php 
$massonary_img_id = get_post_meta(get_the_ID(), 'massionary_three_blog_image_id', true);
$massonary_img = get_post_meta(get_the_ID(), 'massionary_three_blog_image', true);
?>
<div class="col-lg-4 col-md-6 grid-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-40'); ?>>
        <?php 
        if(!empty( $massonary_img_id )): ?>
            <div class="postbox__thumb mb-25">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php print esc_url( $massonary_img ); ?>" alt="<?php print bildpress_img_alt_text($massonary_img_id); ?>">
                </a>
            </div>
        <?php 
        endif; ?>

        <div class="postbox__text ">
            <div class="post-meta mb-10">
                <span> <a href="#<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="ti-user"></i> <?php print get_the_author(); ?></a> </span>
                <span><a href="<?php comments_link(); ?>"><i class="ti-comment"></i> <?php comments_number(); ?></a></span>
            </div>
            <h3 class="blog-title blog-title-sm">
                <a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 10, ''); ?></a>
            </h3>
            <div class="post-text">
                <p><?php print wp_trim_words(get_the_content(), 30, ''); ?></p>
            </div>
            <!-- blog btn -->
            <?php 
                if (rtl_enable()) {
                    $bildpress_blog_btn_rtl = get_theme_mod('bildpress_blog_btn_rtl','Read More'); 
                 }
                else { 
                    $bildpress_blog_btn = get_theme_mod('bildpress_blog_btn','Read More'); 
                }
                
                $bildpress_blog_btn_switch     = get_theme_mod('bildpress_blog_btn_switch');  
            ?>

            <?php if(!empty($bildpress_blog_btn_switch)) : ?>
            <div class="read-more mt-30">
                <a href="<?php the_permalink(); ?>" class="btn orange-bg bl-btn"><?php print esc_html($bildpress_blog_btn); ?></a>
            </div>
            <?php endif; ?>

        </div>
    </article>
</div>



