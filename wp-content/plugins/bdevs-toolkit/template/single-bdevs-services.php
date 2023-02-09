<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>


        <section class="service_details">
            <div class="content_box_120">
                <div class="container">
                    <?php 
                    if( have_posts() ):
                        while( have_posts() ): the_post();
                            $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
                            $department_sub_title = function_exists('get_field') ? get_field('department_sub_title') : '';
                            $department_title = function_exists('get_field') ? get_field('department_title') : '';

                            // video
                            $department_video_image = function_exists('get_field') ? get_field('department_video_image') : '';
                            $department_video_url = function_exists('get_field') ? get_field('department_video_url') : '';

                            // department short info
                            $department_bottom_text = function_exists('get_field') ? get_field('department_bottom_text') : '';  

                    ?>
                    <div class="row">
                        <?php if ( is_active_sidebar( 'services-sidebar' ) ) : ?>
                        <div class="col-xl-4 order-2 order-xl-0">
                            <?php do_action("bildpress_service_sidebar"); ?>
                        </div>
                        <?php endif; ?>
                        <div class="col-xl-8">
                            <div class="service_details__wrapper">
                                <?php if (!empty($department_details_thumb['url'])) : ?>
                                <div class="service_details__thumb1 mb-50">
                                    <img src="<?php echo esc_url($department_details_thumb['url']); ?>" alt="">
                                </div>
                                <?php endif; ?>

                                <div class="service_details__content">
                                    <div class="title_style1 mb-35">
                                        <?php if (!empty($department_sub_title)) : ?>
                                        <h5><?php echo esc_html($department_sub_title); ?></h5>
                                        <?php endif; ?> 

                                        <?php if (!empty($department_title)) : ?>
                                        <h2 class="sv-details-title"><?php echo esc_html($department_title); ?></h2>
                                        <?php endif; ?>
                                    </div>
                                    <?php the_excerpt(); ?>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile; wp_reset_query();
                    endif; 
                    ?>
                </div>
            </div>
        </section>



<?php get_footer();  ?>