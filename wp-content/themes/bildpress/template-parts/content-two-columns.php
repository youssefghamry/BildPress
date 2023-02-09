<div class="col-lg-6 col-md-6">
    <div id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image news-wrapper mb-60'); ?>>
        <?php if( has_post_thumbnail() ): ?>
        <div class="news-img">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
            </a>
        </div>
        <?php endif; ?>


        <div class="news-box">
            <div class="news-text">
                <div class="blog-meta-top mb-15">
                    <?php print bildpress_get_category(); ?>
                    <span>-</span>
                    <span><a href="<?php echo get_day_link('', '', ''); ?>"><?php the_time(get_option('date_format')); ?></a></span>
                </div>
                <h4><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 10, ''); ?></a></h4>
                <div class="news-meta">
                    <span> <a href="#<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="ti-user"></i> <?php print get_the_author(); ?></a> </span>
                    <span><a href="<?php comments_link(); ?>"><i class="ti-comment"></i> <?php comments_number(); ?></a></span>
                </div>
            </div>
        </div>
    </div>
</div>



