<div class="col-lg-6 col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-40'); ?>>
        <?php 
        if( has_post_thumbnail() ): ?>
            <div class="postbox__thumb mb-25">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
                </a>
            </div>
        <?php 
        endif; ?>
        <div class="postbox__text">
            <div class="post-meta mb-15">
                <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
            </div>
            <h3 class="blog-title blog-title-sm">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="post-text">
                <p><?php print wp_trim_words(get_the_content(), 30, ''); ?></p>
            </div>
            <!-- blog btn -->
            <?php 
                $bildpress_blog_btn     = get_theme_mod('bildpress_blog_btn','Read More text'); 
                $bildpress_blog_btn_icon     = get_theme_mod('bildpress_blog_btn_icon','far fa-long-arrow-right'); 
                $bildpress_blog_btn_switch     = get_theme_mod('bildpress_blog_btn_switch'); 
                $bildpress_blog_btn_icon_switch     = get_theme_mod('bildpress_blog_btn_icon_switch'); 

            if( $bildpress_blog_btn_switch ): ?>
            <div class="read-more-btn">
                <a href="<?php the_permalink(); ?>" class="read-more"><?php print esc_html($bildpress_blog_btn); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
            <?php 
            endif; ?>
        </div>
    </article>
</div>



