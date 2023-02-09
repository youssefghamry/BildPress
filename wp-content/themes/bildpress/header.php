<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bildpress
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php    
        $bildpress_preloader = get_theme_mod('bildpress_preloader', true); 
        $bildpress_back_to_top = get_theme_mod('bildpress_preloader', true); 
    ?>

    <?php if(!empty($bildpress_back_to_top)) : ?>
    <!-- back to top start -->
    <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
    </div>
    <!-- back to top end -->
    <?php endif; ?>

    <?php if(!empty($bildpress_preloader)) : ?>
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- header start -->
    <?php do_action('bildpress_header_style'); ?>
    <!-- header end -->
    <!-- wrapper-box start -->
    <?php do_action('bildpress_before_main_content'); ?>
    
