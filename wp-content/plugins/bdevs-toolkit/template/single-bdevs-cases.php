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
                        $department_quote_text = function_exists('get_field') ? get_field('department_quote_text') : '';
                        $case_sub_title = function_exists('get_field') ? get_field('case_sub_title') : '';
                        $department_info_list = function_exists('get_field') ? get_field('cases_info') : '';
                        $gallery_images =  function_exists('acf_photo_gallery') ? acf_photo_gallery('department_gallery', get_the_id()) : ''; 
                ?>                    
                <div class="row">
                    <div class="col-xl-12">
                        <div class="service_details__wrapper">
                            <?php if (!empty($department_details_thumb['url'])) : ?>
                            <div class="service_details__thumb1 mb-50">
                                <img src="<?php echo esc_url($department_details_thumb['url']); ?>" alt="">
                                <?php if (!empty($department_info_list)) : ?>
                                <div class="case-info">
                                    <?php echo wp_kses_post($department_info_list); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <div class="service_details__content">
                                <div class="title_style1 mb-35">
                                    <?php if (!empty($case_sub_title)) : ?>
                                    <h5><?php echo wp_kses_post($case_sub_title); ?></h5>
                                    <?php endif; ?>
                                    <h2 class="sv-details-title"><?php the_title(); ?></h2>
                                </div>
                                <div class="service-content-inner service-excerpt fix mb-30">
                                    <?php if (!empty($department_quote_text)) : ?>
                                    <span><?php echo esc_html($department_quote_text); ?></span>
                                    <?php endif; ?>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                            <?php the_content(); ?>

                            <?php if (!empty($gallery_images)) : ?>
                            <div class="service-doctors mt-50">
                                <div class="row">
                                    <?php foreach( $gallery_images as $key => $image ) :  ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="serv-g-image mb-30">
                                            <img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="img">
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
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