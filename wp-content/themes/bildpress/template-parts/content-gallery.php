<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bildpress
 */

$bildpress_blog_date_switch = get_theme_mod('bildpress_blog_date_switch', true);
$bildpress_blog_user_switch = get_theme_mod('bildpress_blog_user_switch', true);
$bildpress_blog_comments_switch = get_theme_mod('bildpress_blog_comments_switch', true);

$gallery_images =  function_exists('acf_photo_gallery') ? acf_photo_gallery('gallery_images', get_the_id()) : ''; 

if( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox postbox-2 singel-post format-gallery mb-50'); ?> >
        <?php if (!empty($gallery_images)) : ?>
            <div class="post_gallery owl-carousel">
                <?php foreach( $gallery_images as $key => $image ) :  ?>
                <div class="single-postbox-gallery">
                    <img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="<?php print esc_attr__('gallery image','bildpress'); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="postbox_text postbox_text_single">
            <div class="post-meta mb-15">
                <?php if( !empty($bildpress_blog_date_switch) ): ?>
                    <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
                <?php endif; ?>

                <?php if( !empty($bildpress_blog_user_switch) ): ?>
                    <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <?php endif; ?>
                <?php if( !empty($bildpress_blog_comments_switch) ): ?>
                    <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
                <?php endif; ?>
            </div>
            <h3 class="blog-title">
                <?php the_title(); ?>
            </h3>
            <div class="post-text mb-20">
               <?php the_content(); ?> 
                <?php
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'bildpress' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <?php print bildpress_get_tag(); ?>
        </div>
    </article>
<?php
else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox postbox-2 format-gallery mb-50'); ?>>
        <?php if (!empty($gallery_images)) : ?>
            <div class="post_gallery owl-carousel">
                <?php foreach( $gallery_images as $key => $image ) :  ?>
                <div class="single-postbox-gallery">
                    <img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="<?php print esc_attr__('gallery image','bildpress'); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="postbox_text pt-50">
            <div class="post-meta mb-15">
                <?php if( !empty($bildpress_blog_date_switch) ): ?>
                    <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
                <?php endif; ?>

                <?php if( !empty($bildpress_blog_user_switch) ): ?>
                    <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <?php endif; ?>
                <?php if( !empty($bildpress_blog_comments_switch) ): ?>
                    <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
                <?php endif; ?>
            </div>
            <h3 class="blog-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="post-text mb-20">
                <?php the_excerpt(); ?>
            </div>
            <!-- blog btn -->
            <?php 
                if (rtl_enable()) {
                    $bildpress_blog_btn_rtl = get_theme_mod('bildpress_blog_btn_rtl','Read More'); 
                 }
                else { 
                    $bildpress_blog_btn = get_theme_mod('bildpress_blog_btn','Read More'); 
                }
                
                $bildpress_blog_btn_switch     = get_theme_mod('bildpress_blog_btn_switch', true);  
            ?>

            <?php if(!empty($bildpress_blog_btn_switch)) : ?>
            <div class="read-more-btn mt-30">
                <a href="<?php the_permalink(); ?>" class="site__btn1">
                    <?php print esc_html($bildpress_blog_btn); ?>
                </a>
            </div>
            <?php endif; ?>

        </div>
    </article>
<?php
endif; ?>


