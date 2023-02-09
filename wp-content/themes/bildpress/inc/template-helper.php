<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bildpress
 */

/**
*
* bildpress header
*/

function bildpress_check_header() {
    $bildpress_header_style = function_exists('get_field') ? get_field( 'header_style' ) : NULL;
    $bildpress_default_header_style = get_theme_mod('choose_default_header', 'header-style-1' );

    if( $bildpress_header_style == 'header-style-1' ) {
        bildpress_header_style_1();
    }
    elseif( $bildpress_header_style == 'header-style-2' ) {
        bildpress_header_style_2();
    }  
    elseif( $bildpress_header_style == 'header-style-3' ) {
        bildpress_header_style_3();
    }    
    elseif( $bildpress_header_style == 'header-style-4' ) {
        bildpress_header_style_4();
    }     
    elseif( $bildpress_header_style == 'header-style-5' ) {
        bildpress_header_style_5();
    }  
    elseif( $bildpress_header_style == 'header-style-6' ) {
        bildpress_header_style_6();
    }  
    elseif( $bildpress_header_style == 'header-style-7' ) {
        bildpress_header_style_7();
    }  
    else {
        
        /** default header style **/
        if($bildpress_default_header_style == 'header-style-2') {
            bildpress_header_style_2();
        }
        elseif($bildpress_default_header_style == 'header-style-3') {
            bildpress_header_style_3();
        }
        elseif($bildpress_default_header_style == 'header-style-4') {
            bildpress_header_style_4();
        }
        elseif($bildpress_default_header_style == 'header-style-5') {
            bildpress_header_style_5();
        }
        elseif($bildpress_default_header_style == 'header-style-6') {
            bildpress_header_style_6();
        }
        elseif($bildpress_default_header_style == 'header-style-7') {
            bildpress_header_style_7();
        }
        else {
            bildpress_header_style_1();
        }
    }
}
add_action('bildpress_header_style', 'bildpress_check_header', 10);

/**
* header style 1 + default
*/

function bildpress_header_style_1() {
    $bildpress_topbar_switch = get_theme_mod('bildpress_topbar_switch', false);
    $bildpress_show_button = get_theme_mod('bildpress_show_button', false);
    $bildpress_show_cta = get_theme_mod('bildpress_show_cta', false);
    $bildpress_hamburger_hide = get_theme_mod('bildpress_hamburger_hide', false);
    $bildpress_show_header_search = get_theme_mod('bildpress_show_header_search' , false);
    $bildpress_sticky_switch = get_theme_mod('bildpress_sticky_switch' , true);
    $bildpress_sticky_id =  $bildpress_sticky_switch ? 'header__menu-wrapper' : 'no-sticky';

    $bildpress_header_right = get_theme_mod('bildpress_header_right', false);
    $bildpress_menu_col =  $bildpress_header_right ? 'col-xl-6 col-lg-8 d-none d-lg-block' : 'col-xl-9 col-lg-10 d-none d-lg-block';
    $bildpress_menu_right =  $bildpress_header_right ? 'text-center' : 'text-right';


    $bildpress_social_text = get_theme_mod('bildpress_social_text', 'FB');
    $bildpress_social_link = get_theme_mod('bildpress_social_link', '#');
    $bildpress_comments_link = get_theme_mod('bildpress_comments_link', '#');


    $enable_onepage_menu = function_exists('get_field') ? get_field( 'enable_onepage_menu' ) : NULL;

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
    }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    
    $btn_link = get_theme_mod('bildpress_button_link', '#');

    ?>

    <header class="header home3 header-default">
        <!-- Header Menu Start -->
        <div class="header__menu header-menu-space-3 ">
            <div id="<?php print esc_attr($bildpress_sticky_id); ?>" class="header__menu-wrapper tp-header">
                <div class="container-fluid">
                    <div class="header__menu-outer">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2 col-md-5 col-8 d-flex">
                                <div class="header__logo">
                                    <?php bildpress_header_logo(); ?>
                                </div>
                            </div>
                            <div class="<?php print esc_attr($bildpress_menu_col); ?>">
                                <div class="main-menu <?php print esc_attr($bildpress_menu_right); ?>">
                                    <nav id="mobile-active">
                                        <?php 
                                            if ($enable_onepage_menu) {
                                                bildpress_onepage_menu();
                                            }
                                            else{
                                                bildpress_header_menu();
                                            }
                                        ?>
                                    </nav>
                                </div>
                                <div class="mobile-menu"></div>
                            </div>
                            <?php if( !empty($bildpress_header_right) ): ?>
                            <div class="col-xl-3 col-lg-2 d-none d-lg-block">
                                <div class="header__side-nav text-right">
                                    <ul>
                                        <?php if( !empty($bildpress_social_text) ): ?>
                                        <li class="side-fb">
                                            <a class="nav_btn1" href="<?php print esc_url( $bildpress_social_link ); ?>"><?php print esc_html($bildpress_social_text); ?></a>
                                        </li>
                                        <?php endif;  ?>

                                        <?php if( !empty($bildpress_comments_link) ): ?>
                                        <li class="side-comments">
                                            <a class="nav_btn1" href="<?php print esc_url( $bildpress_comments_link ); ?>"><i class="fas fa-comments"></i></a>
                                        </li>
                                        <?php endif;  ?>

                                        <?php if( !empty($btn_link) ): ?>
                                        <li class="side-btn">
                                            <a class="nav_btn2" href="<?php print esc_url( $btn_link ); ?>"><?php print esc_html($btn_text); ?></a>
                                        </li>
                                        <?php endif;  ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endif;  ?>
                            <!-- mob menu col -->
                            <div class="col-md-7 col-4 d-block d-xl-none d-lg-none text-right">
                                <div class="open-mobile-menu">
                                    <a href="javascript:void(0);">
                                        <i class="fal fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </header>

    <!-- slide-bar start -->
    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <?php bildpress_mobile_logo(); ?>
            <div class="mobile-menu"></div>
            <?php bildpress_mobile_info(); ?>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- slide-bar end -->
    
<?php 
}

/**
* header style 2 
*/
function bildpress_header_style_2() {
    // top left
    $bildpress_mail_id = get_theme_mod('bildpress_mail_id','info@webmail.com');
    $bildpress_mail_url = get_theme_mod('bildpress_mail_url','#');
    $bildpress_phone = get_theme_mod('bildpress_phone','+876 864 764 764');
    $bildpress_phone_number_link = get_theme_mod('bildpress_phone_number_link','+876864764764');
    $bildpress_address = get_theme_mod('bildpress_address','12/A, Mirnada City Tower, NYC');
    $bildpress_sticky_switch = get_theme_mod('bildpress_sticky_switch' , true);
    $bildpress_sticky_id =  $bildpress_sticky_switch ? 'header__menu-wrapper' : 'no-sticky';

    $bildpress_topbar_switch = get_theme_mod('bildpress_topbar_switch', false);
    $bildpress_cart_hide = get_theme_mod('bildpress_cart_hide', false);
    $bildpress_show_button = get_theme_mod('bildpress_show_button', false);
    $bildpress_show_cta = get_theme_mod('bildpress_show_cta', false);
    $bildpress_hamburger_hide = get_theme_mod('bildpress_hamburger_hide', false);
    $bildpress_show_header_search = get_theme_mod('bildpress_show_header_search' , false);
    $btn_text_from_page = get_post_meta(get_the_ID(), 'button_text_from_page', true);

    $bildpress_header_right = get_theme_mod('bildpress_header_right', false);

    $enable_onepage_menu = function_exists('get_field') ? get_field( 'enable_onepage_menu' ) : NULL;

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
    }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    
    $btn_link = get_theme_mod('bildpress_button_link', '#');

    ?>

    <header class="header home1 header-middle-style">
        <!-- Header Top Start -->
         <?php if(!empty($bildpress_topbar_switch)) : ?>
        <div class="header__top1 topbar-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-7 col-8">
                        <div class="header__top1__left text-left text-md-left">
                            <?php if(!empty($bildpress_mail_id)) : ?>
                            <span class="d-m-none"><i class="far fa-envelope"></i> <a href="mailto:<?php echo esc_attr($bildpress_mail_id); ?>"><?php echo esc_html($bildpress_mail_id); ?></a></span>
                            <?php endif; ?>   
                            <?php if(!empty($bildpress_phone)) : ?> 
                            <span><i class="fas fa-phone"></i> <a href="tel:<?php echo esc_attr($bildpress_phone_number_link); ?>"><?php echo esc_html($bildpress_phone); ?></a></span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-5 col-4">
                        <div class="header__top1__right ">
                            <div class="header__top1__right--flag f_right">
                                <?php bildpress_header_lang_defualt(); ?>
                            </div>
                            <div class="header__top1__right--social f_right d-none d-md-block">
                                <?php bildpress_header_social_profiles(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Header Top End -->

        <!-- Header Menu Start -->
        <div class="header__menu header-menu-space white-bg">
            <div id="<?php print esc_attr($bildpress_sticky_id); ?>" class="header__menu-wrapper tp-header">
                <div class="container-fluid">
                    <div class="header__menu-outer">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                                <div class="main-menu1">
                                    <nav>
                                        <?php 
                                            if ($enable_onepage_menu) {
                                                bildpress_onepage_left_menu();
                                            }
                                            else{
                                                bildpress_header_left_menu();
                                            }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-3 col-8 col-md-5">
                                <div class="lext-left text-lg-center">
                                    <div class="logo-middle">
                                        <?php bildpress_header_logo(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <?php if( !empty($btn_link) ): ?>
                                <div class="header__side-nav1 f_right d-none d-xl-block">
                                    <a href="<?php print esc_url( $btn_link ); ?>"><?php print esc_html($btn_text); ?></a>
                                </div>
                                <?php endif;  ?>
                                <div class="main-menu1 menu-right">
                                    <nav>
                                        <?php 
                                            if ($enable_onepage_menu) {
                                                bildpress_onepage_right_menu();
                                            }
                                            else{
                                                bildpress_header_right_menu();
                                            }
                                        ?>   
                                    </nav>
                                </div>
                            </div>
                            <!-- mob menu col -->
                            <div class="col-md-7 col-4 d-block d-xl-none d-lg-none text-right">
                                <div class="open-mobile-menu">
                                    <a href="javascript:void(0);">
                                        <i class="fal fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </header>

    <!-- slide-bar start -->
    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <?php bildpress_mobile_logo(); ?>
            <nav id="mobile-active" class="d-none">
                <?php 
                    bildpress_header_menu();
                ?>
            </nav>

            <div class="mobile-menu"></div>
            <?php bildpress_mobile_info(); ?>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- slide-bar end -->

<?php 
}

/**
* header style 3
*/
function bildpress_header_style_3() {
    $bildpress_topbar_switch = get_theme_mod('bildpress_topbar_switch', false);
    $bildpress_cart_hide = get_theme_mod('bildpress_cart_hide', false);
    $bildpress_show_button = get_theme_mod('bildpress_show_button', false);
    $bildpress_show_cta = get_theme_mod('bildpress_show_cta', false);
    $bildpress_hamburger_hide = get_theme_mod('bildpress_hamburger_hide', false);
    $bildpress_show_header_search = get_theme_mod('bildpress_show_header_search' , false);
    $btn_text_from_page = get_post_meta(get_the_ID(), 'button_text_from_page', true);
    $bildpress_sticky_switch = get_theme_mod('bildpress_sticky_switch' , true);
    $bildpress_sticky_id =  $bildpress_sticky_switch ? 'header__menu-wrapper' : 'no-sticky';


    $bildpress_social_text = get_theme_mod('bildpress_social_text', 'FB');
    $bildpress_social_link = get_theme_mod('bildpress_social_link', '#');
    $bildpress_comments_link = get_theme_mod('bildpress_comments_link', '#');

    $enable_onepage_menu = function_exists('get_field') ? get_field( 'enable_onepage_menu' ) : NULL;

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
    }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    
    $btn_link = get_theme_mod('bildpress_button_link', '#');

    ?>

    <header class="header home3 mt-25">
        <!-- Header Menu Start -->
        <div class="header__menu dark-bg header-menu-space-3">
            <div id="<?php print esc_attr($bildpress_sticky_id); ?>" class="header__menu-wrapper tp-header">
                <div class="container-fluid">
                    <div class="header__menu-outer">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2 col-md-5 col-8 d-flex">
                                <div class="header__logo">
                                    <?php bildpress_header_logo(); ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 d-none d-lg-block">
                                <div class="main-menu text-center">
                                    <nav id="mobile-active">
                                        <?php 
                                            if ($enable_onepage_menu) {
                                                bildpress_onepage_menu();
                                            }
                                            else{
                                                bildpress_header_menu();
                                            }
                                        ?>                                        
                                    </nav>
                                </div>
                                <div class="mobile-menu"></div>
                            </div>
                            <div class="col-xl-3 col-lg-2 d-none d-lg-block">
                                <div class="header__side-nav text-right">
                                    <ul>
                                        <?php if( !empty($bildpress_social_text) ): ?>
                                        <li class="side-fb">
                                            <a class="nav_btn1" href="<?php print esc_url( $bildpress_social_link ); ?>"><?php print esc_html($bildpress_social_text); ?></a>
                                        </li>
                                        <?php endif;  ?>

                                        <?php if( !empty($bildpress_comments_link) ): ?>
                                        <li class="side-comments">
                                            <a class="nav_btn1" href="<?php print esc_url( $bildpress_comments_link ); ?>"><i class="fas fa-comments"></i></a>
                                        </li>
                                        <?php endif;  ?>
                                        <?php if( !empty($btn_link) ): ?>
                                        <li class="side-btn">
                                            <a class="nav_btn2" href="<?php print esc_url( $btn_link ); ?>"><?php print esc_html($btn_text); ?></a>
                                        </li>
                                        <?php endif;  ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- mob menu col -->
                            <div class="col-md-7 col-4 d-block d-xl-none d-lg-none text-right">
                                <div class="open-mobile-menu">
                                    <a href="javascript:void(0);">
                                        <i class="fal fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </header>

    <!-- slide-bar start -->
    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <?php bildpress_mobile_logo(); ?>
            <div class="mobile-menu"></div>
            <?php bildpress_mobile_info(); ?>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- slide-bar end -->

<?php 
}

/**
* header style 4
*/
function bildpress_header_style_4() {
    $bildpress_topbar_switch = get_theme_mod('bildpress_topbar_switch', false);
    $bildpress_show_header_search = get_theme_mod('bildpress_show_header_search' , false);
    $bildpress_show_lang = get_theme_mod('bildpress_show_lang', false);
    $bildpress_show_button = get_theme_mod('bildpress_show_button', false);
    $bildpress_header_right = get_theme_mod('bildpress_header_right', false);

    // top left
    $bildpress_mail_id = get_theme_mod('bildpress_mail_id','info@webmail.com');
    $bildpress_mail_url = get_theme_mod('bildpress_mail_url','#');
    $bildpress_phone = get_theme_mod('bildpress_phone','+876 864 764 764');
    $bildpress_phone_number_link = get_theme_mod('bildpress_phone_number_link','+876864764764');
    $bildpress_address = get_theme_mod('bildpress_address','12/A, Mirnada City Tower, NYC');

    // top right
    $bildpress_support = get_theme_mod('bildpress_support','Support');
    $bildpress_support_url = get_theme_mod('bildpress_support_url','#');
    $bildpress_terms = get_theme_mod('bildpress_terms','Terms & Coditions');
    $bildpress_terms_url = get_theme_mod('bildpress_terms_url','#');

    // menu collum
    $bildpress_menu_col =  $bildpress_header_right ? 'col-xl-7 col-lg-7' : 'col-xl-10 col-lg-10';
    $bildpress_menu_right =  $bildpress_header_right ? '' : 'text-right';

    $bildpress_sticky_switch = get_theme_mod('bildpress_sticky_switch' , true);
    $bildpress_sticky_id =  $bildpress_sticky_switch ? 'header__menu-wrapper' : 'no-sticky';


    $enable_onepage_menu = function_exists('get_field') ? get_field( 'enable_onepage_menu' ) : NULL;

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
     }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    
    $btn_link = get_theme_mod('bildpress_button_link', '#');    

    if (rtl_enable()) {
        $top_btn_text = get_theme_mod('bildpress_top_btn_rtl', 'Get Job Feeds');
     }
    else { 
        $top_btn_text = get_theme_mod('bildpress_top_bt', 'Get Job Feeds');
    }
    
    $top_btn_link = get_theme_mod('bildpress_top_btn_link', '#');
 
    ?>

    <header class="header home1 header-style-4">
        <!-- Header Top Start -->
         <?php if(!empty($bildpress_topbar_switch)) : ?>
        <div class="header__top1 topbar-space">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 offset-xl-3 col-lg-6 col-md-7 col-12 col-sm-5">
                        <div class="header__top1__left text-left text-md-left">
                            <?php if(!empty($bildpress_mail_id)) : ?>
                            <span class="d-m-none"><i class="far fa-envelope"></i> <a href="mailto:<?php echo esc_attr($bildpress_mail_id); ?>"><?php echo esc_html($bildpress_mail_id); ?></a></span>
                            <?php endif; ?>   
                            <?php if(!empty($bildpress_phone)) : ?> 
                            <span><i class="fal fa-phone"></i> <a href="tel:<?php echo esc_attr($bildpress_phone_number_link); ?>"><?php echo esc_html($bildpress_phone); ?></a></span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-5 col-12 col-sm-7">
                        <div class="header__top1__right">
                            <div class="header__top1__right--flag f_right">
                                <?php bildpress_header_lang_defualt(); ?>
                            </div>
                            <div class="header__top1__right--social f_right d-md-block">
                                <?php bildpress_header_social_profiles(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Header Top End -->

        <!-- Header Menu Start -->
        <div class="header__menu header-menu-space dark-bg">
            <div id="<?php print esc_attr($bildpress_sticky_id); ?>" class="header__menu-wrapper tp-header">
                <div class="container-fluid">
                    <div class="header__menu-outer">
                        <div class="row">
                            <div class="col-lg-3 col-8 col-md-5">
                                <div class="header__logo logo-shape">
                                    <?php bildpress_header_logo(); ?>
                                </div>
                            </div>
                            <div class="col-lg-9 d-none d-lg-block">
                                <?php if( !empty($btn_link) ): ?>
                                <div class="header__side-nav1 f_right d-none d-lg-block">
                                    <a href="<?php print esc_url( $btn_link ); ?>"><?php print esc_html($btn_text); ?></a>
                                </div>
                                <?php endif;  ?>
                                <div class="main-menu1">
                                    <nav id="mobile-active">
                                        <?php 
                                            if ($enable_onepage_menu) {
                                                bildpress_onepage_menu();
                                            }
                                            else{
                                                bildpress_header_menu();
                                            }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-7 col-4 d-block d-xl-none d-lg-none text-right">
                                <div class="open-mobile-menu">
                                    <a href="javascript:void(0);">
                                        <i class="fal fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </header>

    <!-- slide-bar start -->
    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <?php bildpress_mobile_logo(); ?>
            <div class="mobile-menu"></div>
            <?php bildpress_mobile_info(); ?>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- slide-bar end -->
    
<?php 
}


/**
* header style 5
*/

function bildpress_header_style_5() {
    $bildpress_topbar_switch = get_theme_mod('bildpress_topbar_switch', false);
    $bildpress_show_button = get_theme_mod('bildpress_show_button', false);
    $bildpress_show_cta = get_theme_mod('bildpress_show_cta', false);
    $bildpress_hamburger_hide = get_theme_mod('bildpress_hamburger_hide', false);
    $bildpress_show_header_search = get_theme_mod('bildpress_show_header_search' , false);

    // top left
    $bildpress_mail_id = get_theme_mod('bildpress_mail_id','info@webmail.com');
    $bildpress_mail_url = get_theme_mod('bildpress_mail_url','#');
    $bildpress_phone = get_theme_mod('bildpress_phone','+876 864 764 764');
    $bildpress_phone_number_link = get_theme_mod('bildpress_phone_number_link','+876864764764');
    $bildpress_address = get_theme_mod('bildpress_address','12/A, Mirnada City Tower, NYC');


    $bildpress_header_right = get_theme_mod('bildpress_header_right', false);
    $bildpress_menu_col =  $bildpress_header_right ? 'col-xl-6 col-lg-8 d-none d-lg-block' : 'col-xl-9 col-lg-10 d-none d-lg-block';
    $bildpress_menu_right =  $bildpress_header_right ? 'text-center' : 'text-right';
    $bildpress_header_search = get_theme_mod('bildpress_header_search', false);


    $bildpress_social_text = get_theme_mod('bildpress_social_text', 'FB');
    $bildpress_social_link = get_theme_mod('bildpress_social_link', '#');
    $bildpress_comments_link = get_theme_mod('bildpress_comments_link', '#');

    $bildpress_sticky_switch = get_theme_mod('bildpress_sticky_switch' , true);
    $bildpress_sticky_id =  $bildpress_sticky_switch ? 'header__menu-wrapper' : 'no-sticky';



    $enable_onepage_menu = function_exists('get_field') ? get_field( 'enable_onepage_menu' ) : NULL;

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
    }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    
    $btn_link = get_theme_mod('bildpress_button_link', '#');

    ?>

    <header class="header home3 home4 header-default">
         <?php if(!empty($bildpress_topbar_switch)) : ?>
        <div class="header__top-area dark-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-7 col-sm-5 col-8">
                        <div class="header-info-list header4-info-list">
                            <?php if(!empty($bildpress_mail_id)) : ?>
                            <span class="d-m-none"><i class="far fa-envelope"></i> <a href="mailto:<?php echo esc_attr($bildpress_mail_id); ?>"><?php echo esc_html($bildpress_mail_id); ?></a></span>
                            <?php endif; ?>   
                            <?php if(!empty($bildpress_phone)) : ?> 
                            <span><i class="fal fa-phone"></i> <a href="tel:<?php echo esc_attr($bildpress_phone_number_link); ?>"><?php echo esc_html($bildpress_phone); ?></a></span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-5 col-sm-7 col-4">
                        <div class="header__top1__right">
                            <div class="header__top1__right--flag header-5-lang f_right">
                                <?php bildpress_header_lang_defualt(); ?>
                            </div>
                            <div class="header__top1__right--social header-5-social  f_right d-none d-md-block">
                                <?php bildpress_header_social_profiles(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Header Menu Start -->
        <div class="header__menu">
            <div id="<?php print esc_attr($bildpress_sticky_id); ?>" class="header__menu-wrapper tp-header home4-tp-header">
                <div class="container">
                    <div class="header__menu-outer">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2 col-md-5 col-8 d-flex">
                                <div class="header__logo header-5-logo">
                                    <?php bildpress_header_logo(); ?>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-10 d-none d-lg-block">
                                <?php if( !empty($bildpress_header_right) ): ?>
                                <div class="header-right-part f-right">
                                    <div class="header-icon">
                                        <?php if( !empty($bildpress_header_search) ): ?>
                                            <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
                                        <?php endif;  ?>
                                        <?php if (BILDPRESS_WOOCOMMERCE_ACTIVED): ?>
                                        <a class="bild-cart" href="<?php echo wc_get_cart_url(); ?>"><i class="far fa-shopping-cart"></i><span><?php echo esc_html(WC()->cart->cart_contents_count); ?></span> </a>
                                        <?php endif;  ?>
                                    </div>
                                </div>
                                <?php endif;  ?>
                                <div class="main-menu f-right">
                                    <nav id="mobile-active">
                                        <?php 
                                            if ($enable_onepage_menu) {
                                                bildpress_onepage_menu();
                                            }
                                            else{
                                                bildpress_header_menu();
                                            }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                            <!-- mob menu col -->
                            <div class="col-md-7 col-4 d-block d-xl-none d-lg-none text-right">
                                <div class="open-mobile-menu">
                                    <a href="javascript:void(0);">
                                        <i class="fal fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </header>

    <!-- slide-bar start -->
    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <?php bildpress_mobile_logo(); ?>
            <div class="mobile-menu"></div>
            <?php bildpress_mobile_info(); ?>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- slide-bar end -->

    
<?php 
}


/**
* header style 6
*/

function bildpress_header_style_6() {
    $bildpress_topbar_switch = get_theme_mod('bildpress_topbar_switch', false);
    $bildpress_show_button = get_theme_mod('bildpress_show_button', false);
    $bildpress_show_cta = get_theme_mod('bildpress_show_cta', false);
    $bildpress_hamburger_hide = get_theme_mod('bildpress_hamburger_hide', false);
    $bildpress_show_header_search = get_theme_mod('bildpress_show_header_search' , false);

    // top left
    $bildpress_mail_id = get_theme_mod('bildpress_mail_id','info@webmail.com');
    $bildpress_mail_url = get_theme_mod('bildpress_mail_url','#');
    $bildpress_phone = get_theme_mod('bildpress_phone','+876 864 764 764');
    $bildpress_phone_number_link = get_theme_mod('bildpress_phone_number_link','+876864764764');
    $bildpress_address = get_theme_mod('bildpress_address','12/A, Mirnada City Tower, NYC');


    $bildpress_header_right = get_theme_mod('bildpress_header_right', false);
    $bildpress_menu_col =  $bildpress_header_right ? 'col-xl-6 col-lg-8 d-none d-lg-block' : 'col-xl-9 col-lg-10 d-none d-lg-block';
    $bildpress_menu_right =  $bildpress_header_right ? 'text-center' : 'text-right';
    $bildpress_header_search = get_theme_mod('bildpress_header_search', false);


    $bildpress_social_text = get_theme_mod('bildpress_social_text', 'FB');
    $bildpress_social_link = get_theme_mod('bildpress_social_link', '#');
    $bildpress_comments_link = get_theme_mod('bildpress_comments_link', '#');

    $bildpress_sticky_switch = get_theme_mod('bildpress_sticky_switch' , true);
    $bildpress_sticky_id =  $bildpress_sticky_switch ? 'header__menu-wrapper' : 'no-sticky';



    $enable_onepage_menu = function_exists('get_field') ? get_field( 'enable_onepage_menu' ) : NULL;

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
    }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    
    $btn_link = get_theme_mod('bildpress_button_link', '#');

    ?>

    <header>
        <div class="header-architect">
            <div class="arc-header-top d-none d-md-block">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="header-arc-top-info p-relative">
                            <?php if(!empty($bildpress_address)) : ?>
                            <li> 
                                <i class="fal fa-map-marker-alt"></i>
                                <span><?php echo esc_html($bildpress_address); ?></span>
                            </li>
                            <?php endif; ?>

                            <?php if(!empty($bildpress_mail_id)) : ?>
                            <li>
                                <i class="fal fa-envelope"></i>
                                <span><a href="mailto:<?php echo esc_attr($bildpress_mail_url); ?>"><?php echo esc_html($bildpress_mail_id); ?></a></span>
                            </li>
                            <?php endif; ?>

                            <?php if(!empty($bildpress_phone)) : ?>
                            <li class="d-none d-lg-inline-block">
                                <i class="fas fa-phone-alt"></i>
                                <span><a href="tel:<?php echo esc_attr($bildpress_phone_number_link); ?>"><?php echo esc_html($bildpress_phone); ?></a></span>
                            </li>
                            <?php endif; ?>
                        </ul>

                        <div class="header__top1__right--flag header-5-lang s-header-lang f_right">
                            <?php bildpress_header_lang_defualt(); ?>
                        </div>

                        <div class="header-social s-header-social f-right">
                            <?php bildpress_header_social_profiles(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header__menu-wrapper" class="arc-header-main header__menu-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top-logo logo-architect s-logo">
                            <?php bildpress_header_logo(); ?>
                        </div>
                        <?php if( !empty($btn_text) ): ?>
                        <a class="site__btn4 arc-header-btn f-right d-none d-xl-block" href="<?php print esc_url( $btn_link ); ?>"><?php print esc_html($btn_text); ?>
                            <span class="site__btn4-icon">
                                <i class="fal fa-long-arrow-right"></i>
                                <i class="fal fa-long-arrow-right"></i>
                            </span>
                        </a>
                        <?php endif; ?>

                        <div class="open-mobile-menu f-right menu-bar-architect d-lg-none ss">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>

                        <div class="header-icon f-right arc-header-icon d-none d-sm-block">
                            <?php if( !empty($bildpress_header_search) ): ?>
                                <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
                            <?php endif;  ?>

                            <?php if (BILDPRESS_WOOCOMMERCE_ACTIVED): ?>
                            <a class="bild-cart" href="<?php echo wc_get_cart_url(); ?>"><i class="far fa-shopping-cart"></i><span><?php echo esc_html(WC()->cart->cart_contents_count); ?></span> </a>
                        <?php endif;  ?>
                        </div>

                        <div class="main-menu2 menu-architect">
                            <nav id="mobile-active">
                                <?php 
                                    if ($enable_onepage_menu) {
                                        bildpress_onepage_menu();
                                    }
                                    else{
                                        bildpress_header_menu();
                                    }
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- slide-bar start -->
    <div class="fix ss">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <?php bildpress_mobile_logo(); ?>
            <div class="mobile-menu"></div>
            <?php bildpress_mobile_info(); ?>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- slide-bar end -->

<?php 
}


/**
* header style 7
*/

function bildpress_header_style_7() {
    $bildpress_topbar_switch = get_theme_mod('bildpress_topbar_switch', false);
    $bildpress_show_button = get_theme_mod('bildpress_show_button', false);
    $bildpress_show_cta = get_theme_mod('bildpress_show_cta', false);
    $bildpress_hamburger_hide = get_theme_mod('bildpress_hamburger_hide', false);
    $bildpress_show_header_search = get_theme_mod('bildpress_show_header_search' , false);

    // top left
    $bildpress_mail_id = get_theme_mod('bildpress_mail_id','info@webmail.com');
    $bildpress_mail_url = get_theme_mod('bildpress_mail_url','#');
    $bildpress_phone = get_theme_mod('bildpress_phone','+876 864 764 764');
    $bildpress_phone_url = get_theme_mod('bildpress_phone_url','tel:876864764764');
    $bildpress_address = get_theme_mod('bildpress_address','12/A, Mirnada City Tower, NYC');


    $bildpress_header_right = get_theme_mod('bildpress_header_right', false);
    $bildpress_menu_col =  $bildpress_header_right ? 'col-xl-6 col-lg-8 d-none d-lg-block' : 'col-xl-9 col-lg-10 d-none d-lg-block';
    $bildpress_menu_right =  $bildpress_header_right ? 'text-center' : 'text-right';
    $bildpress_header_search = get_theme_mod('bildpress_header_search', false);


    $bildpress_social_text = get_theme_mod('bildpress_social_text', 'FB');
    $bildpress_social_link = get_theme_mod('bildpress_social_link', '#');
    $bildpress_comments_link = get_theme_mod('bildpress_comments_link', '#');

    $bildpress_sticky_switch = get_theme_mod('bildpress_sticky_switch' , true);
    $bildpress_sticky_id =  $bildpress_sticky_switch ? 'header__menu-wrapper' : 'no-sticky';



    $enable_onepage_menu = function_exists('get_field') ? get_field( 'enable_onepage_menu' ) : NULL;

    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
    }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    
    $btn_link = get_theme_mod('bildpress_button_link', '#');

    ?>

    <header>
        <div class="header-top-oil p-relative d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="header-top-logo">
                            <a href="#"><img src="<?php print get_template_directory_uri() ?>/assets/img/home-oil/logo/header-top-logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <ul class="header-top-info">
                            <li class="d-none d-xl-inline-block">
                                <div class="top-info-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="top-info-text">
                                    <span>Location</span>
                                    <h5>14/A, Street City, New York, US</h5>
                                </div>
                            </li>
                            <li>
                                <div class="top-info-icon">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="top-info-text">
                                    <span>Mail Us</span>
                                    <h5><a href="mailto:info@webmail.com">info@webmail.com</a></h5>
                                </div>
                            </li>
                            <li class="d-none d-lg-inline-block">
                                <div class="top-info-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="top-info-text">
                                    <span>Call Us</span>
                                    <h5><a href="tel:+876864764764">+876 864 764 764</a></h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php 
}




// bildpress_mobile_info
function bildpress_mobile_info(){
    // side info
    $bildpress_side_hide = get_theme_mod('bildpress_side_hide', false);
    $bildpress_mail_id = get_theme_mod('bildpress_mail_id','info@webmail.com');
    $bildpress_phone = get_theme_mod('bildpress_phone','+876 864 764 764');
    $bildpress_phone_number_link = get_theme_mod('bildpress_phone_number_link','+876864764764');
    $bildpress_address = get_theme_mod('bildpress_address','12/A, Mirnada City Tower, NYC');
    $bildpress_side_info_title = get_theme_mod('bildpress_side_info_title','Contact Info');
    if (rtl_enable()) {
        $btn_text = get_theme_mod('bildpress_button_text_rtl', 'Get A Quote');
     }
    else { 
        $btn_text = get_theme_mod('bildpress_button_text', 'Get A Quote');
    }
    $btn_link = get_theme_mod('bildpress_button_link', '#'); 

    
?>

    <?php if (!empty($bildpress_side_hide)) : ?>
    <div class="contact-infos mt-30 mb-30">
        <div class="contact-list mb-30">
            <?php if (!empty($bildpress_side_info_title)) : ?>
            <h4><?php echo esc_html($bildpress_side_info_title); ?></h4>
            <?php endif; ?> 
            <ul>
                <?php if (!empty($bildpress_address)) : ?>
                <li><i class="fal fa-map"></i><?php echo esc_html($bildpress_address); ?></li>
                <?php endif; ?> 

                <?php if (!empty($bildpress_phone)) : ?>
                <li><i class="fal fa-phone"></i><a href="tell:<?php echo esc_attr($bildpress_phone_number_link); ?>"><?php echo esc_html($bildpress_phone); ?></a></li>
                <?php endif; ?> 

                <?php if (!empty($bildpress_mail_id)) : ?>
                <li><i class="far fa-envelope"></i><a href="mailto:<?php echo esc_attr($bildpress_mail_id); ?>"><?php echo esc_html($bildpress_mail_id); ?></a></li>
                <?php endif; ?> 
            </ul>

            <?php if (!empty($btn_text)) : ?>
            <div class="side-btn mt-30">
                <a href="<?php print esc_url($btn_link); ?>" class="site__btn1"><?php echo esc_html($btn_text); ?></a>
            </div>
            <?php endif; ?> 
            
            <div class="sidebar__menu--social">
                <?php bildpress_header_side_social_profiles(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>  

<?php }

// bildpress_mobile_logo
function bildpress_mobile_logo(){
    // side info    
    $bildpress_mobile_logo_hide = get_theme_mod('bildpress_mobile_logo_hide', false);

    $bildpress_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
    
?>

    <?php if (!empty($bildpress_mobile_logo_hide)) : ?>
    <div class="side__logo mb-25">
        <a href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($bildpress_site_logo); ?>" alt="<?php print esc_attr('logo','bildpress'); ?>" />
        </a>
    </div>
    <?php endif; ?> 



<?php }



/** 
 * [bildpress_extra_info description]
 * @return [type] [description]
 */
function bildpress_extra_info(){
    $bildpress_extra_info_logo   = get_theme_mod('bildpress_extra_info_logo',get_template_directory_uri() . '/assets/img/logo/logo-white.png');

    // about title
    $bildpress_extra_about_title     = get_theme_mod('bildpress_extra_about_title','About Us');
    $bildpress_extra_about_text     = get_theme_mod('bildpress_extra_about_text','We must explain to you how all seds this mistakens idea off denouncing pleasures and praising pain was born and I will give you a completed accounts of the system and expound.');
    $bildpress_extra_button     = get_theme_mod('bildpress_extra_button','CONTACT US');
    $bildpress_extra_button_url     = get_theme_mod('bildpress_extra_button_url','#');

    
    // contact title
    $bildpress_extra_contact_title     = get_theme_mod('bildpress_extra_contact_title','Contact Info');

    // address
    $bildpress_extra_address     = get_theme_mod('bildpress_extra_address','123/A, Miranda City Likaoli Prikano, Dope United States');
    $bildpress_extra_address_icon     = get_theme_mod('bildpress_extra_address_icon','fal fa-rocket');

    // phone 
    $bildpress_extra_phone   = get_theme_mod('bildpress_extra_phone','+0989 7876 9865 9');
    $bildpress_extra_phone_icon   = get_theme_mod('bildpress_extra_phone_icon','far fa-phone');

    // email 
    $bildpress_extra_email  = get_theme_mod('bildpress_extra_email','info@example.com');
    $bildpress_extra_email_icon  = get_theme_mod('bildpress_extra_email_icon','far fa-envelope-open');
    
?>

    <!-- extra info start -->
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <?php if( !empty($bildpress_extra_info_logo) ) : ?>
        <div class="logo-side mb-30">
            <a class="site-logo-2" href="<?php print home_url(); ?>">
                <img src="<?php print esc_url( $bildpress_extra_info_logo ); ?>" alt="<?php esc_attr('Logo', 'bildpress'); ?>" />
            </a>
        </div>
        <?php endif; ?>
        <div class="side-info">
            <div class="contact-list mb-40">
                <?php if( !empty($bildpress_extra_about_title) ) : ?>
                <h4><?php print esc_html( $bildpress_extra_about_title ); ?></h4>
                <?php endif; ?>

                <?php if( !empty($bildpress_extra_about_text) ) : ?>
                <p><?php print esc_html( $bildpress_extra_about_text ); ?></p>
                <?php endif; ?>

                <?php if( !empty($bildpress_extra_button) ) : ?>
                <div class="mt-30 mb-30">
                    <a href="<?php print esc_url( $bildpress_extra_button_url ); ?>" class="site-btn white"><?php print esc_html( $bildpress_extra_button ); ?> <span class="icon"><i class="fal fa-calendar-alt"></i></span> </a>
                </div>
                <?php endif; ?>

            </div>
            <div class="contact-list mb-40">
                <?php if( !empty($bildpress_extra_contact_title) ) : ?>
                <h4><?php print esc_html( $bildpress_extra_contact_title ); ?> </h4>
                <?php endif; ?>

                <?php if( !empty($bildpress_extra_address) ) : ?>
                <p>
                    <i class="<?php print esc_attr( $bildpress_extra_address_icon ); ?>"></i> 
                    <span><?php print esc_html( $bildpress_extra_address ); ?></span>
                </p>
                <?php endif; ?>

                <?php if( !empty($bildpress_extra_phone) ) : ?>
                <p>
                    <i class="<?php print esc_attr( $bildpress_extra_phone_icon ); ?>"></i> 
                    <span><?php print esc_html( $bildpress_extra_phone ); ?></span> 
                </p>
                <?php endif; ?>

                <?php if( !empty($bildpress_extra_email) ) : ?>
                <p>
                    <i class="<?php print esc_attr( $bildpress_extra_email_icon ); ?>"></i>
                    <span><?php print esc_html( $bildpress_extra_email ); ?></span>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- extra info end -->


<?php }

/** 
 * [bildpress_header_lang description]
 * @return [type] [description]
 */
function bildpress_header_lang_defualt() {
    $bildpress_header_lang            = get_theme_mod('bildpress_header_lang',false);
    if( $bildpress_header_lang ): ?>

    <ul>
        <li><a href="#0" class="lang__btn"><?php print esc_html__('EN', 'bildpress'); ?> <i class="ti-arrow-down"></i></a>
        <?php do_action('bildpress_language'); ?>
        </li>
    </ul>

    <?php endif; ?>
<?php 
}



/** 
 * [bildpress_language_list description]
 * @return [type] [description]
 */
function _bildpress_language($mar) {
        return $mar;
}
function bildpress_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul>';
            foreach($languages as $lan){
                $active = $lan['active']==1?'active':'';
                $mar .= '<li class="'.$active.'"><a href="'.$lan['url'].'">'.$lan['translated_name'].'</a></li>';
            }
        $mar .= '</ul>';
    }else{
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
            $mar .= '<li><a href="#">'.esc_html__('USA','bildpress').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('UK','bildpress').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('CA','bildpress').'</a></li>';
            $mar .= '<li><a href="#">'.esc_html__('AU','bildpress').'</a></li>';
        $mar .= ' </ul>';
    }
    print _bildpress_language($mar);
}
add_action('bildpress_language','bildpress_language_list');

// favicon logo
function bildpress_favicon_logo_func() {
    $bildpress_favicon = get_template_directory_uri() . '/assets/img/logo/favicon.png';
    $bildpress_favicon_url = get_theme_mod('favicon_url', $bildpress_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $bildpress_favicon_url ); ?>">

    <?php   
} 
add_action('wp_head', 'bildpress_favicon_logo_func');

// header logo
function bildpress_header_logo() {
    ?>
            <?php 
            $bildpress_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
            $bildpress_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
            $bildpress_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.png';

            $bildpress_site_logo = get_theme_mod('logo', $bildpress_logo);
            $bildpress_secondary_logo = get_theme_mod('seconday_logo', $bildpress_logo_white);
            ?>
             
            <?php
            if( has_custom_logo()){
                the_custom_logo();
            }else{
                
                if( !empty($bildpress_logo_on) ) { ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($bildpress_secondary_logo); ?>" alt="<?php print esc_attr('logo','bildpress'); ?>" />
                    </a>
                <?php 
                }
                else{ ?>
                    <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($bildpress_site_logo); ?>" alt="<?php print esc_attr('logo','bildpress'); ?>" />
                    </a>
                <?php 
                }
            }   
            ?>
    <?php 
} 


/** 
 * [bildpress_header_social_profiles description]
 * @return [type] [description]
 */
function bildpress_header_social_profiles() {
    $bildpress_topbar_fb_url             = get_theme_mod('bildpress_topbar_fb_url', '#');
    $bildpress_topbar_twitter_url       = get_theme_mod('bildpress_topbar_twitter_url', '#');
    $bildpress_topbar_instagram_url      = get_theme_mod('bildpress_topbar_instagram_url', '#');
    $bildpress_topbar_linkedin_url      = get_theme_mod('bildpress_topbar_linkedin_url', '#');
    $bildpress_topbar_youtube_url        = get_theme_mod('bildpress_topbar_youtube_url', '#');
    ?> 
        <ul>
        <?php if (!empty($bildpress_topbar_fb_url)): ?>
          <li><a href="<?php print esc_url($bildpress_topbar_fb_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($bildpress_topbar_twitter_url)): ?>
            <li><a href="<?php print esc_url($bildpress_topbar_twitter_url); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($bildpress_topbar_instagram_url)): ?>
            <li><a href="<?php print esc_url($bildpress_topbar_instagram_url); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($bildpress_topbar_linkedin_url)): ?>
            <li><a href="<?php print esc_url($bildpress_topbar_linkedin_url); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
        <?php endif; ?>        

        <?php if (!empty($bildpress_topbar_youtube_url)): ?>
            <li><a href="<?php print esc_url($bildpress_topbar_youtube_url); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
        <?php endif; ?>
        </ul>
<?php 
}


/** 
 * [bildpress_header_social_profiles description]
 * @return [type] [description]
 */
function bildpress_header_social_profiles_two() {
    $bildpress_topbar_fb_url             = get_theme_mod('bildpress_topbar_fb_url', '#');
    $bildpress_topbar_twitter_url       = get_theme_mod('bildpress_topbar_twitter_url', '#');
    $bildpress_topbar_instagram_url      = get_theme_mod('bildpress_topbar_instagram_url', '#');
    $bildpress_topbar_linkedin_url      = get_theme_mod('bildpress_topbar_linkedin_url', '#');
    $bildpress_topbar_youtube_url        = get_theme_mod('bildpress_topbar_youtube_url', '#');
    ?> 

        <div class="header-social f-right">
            <?php if (!empty($bildpress_topbar_fb_url)): ?>
                <a href="<?php print esc_url($bildpress_topbar_fb_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>

            <?php if (!empty($bildpress_topbar_twitter_url)): ?>
                <a href="<?php print esc_url($bildpress_topbar_twitter_url); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>

            <?php if (!empty($bildpress_topbar_instagram_url)): ?>
                <a href="<?php print esc_url($bildpress_topbar_instagram_url); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>

            <?php if (!empty($bildpress_topbar_linkedin_url)): ?>
                <a href="<?php print esc_url($bildpress_topbar_linkedin_url); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
            <?php endif; ?>        

            <?php if (!empty($bildpress_topbar_youtube_url)): ?>
                <a href="<?php print esc_url($bildpress_topbar_youtube_url); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
            <?php endif; ?>
        </div>
<?php 
}



/** 
 * [bildpress_header_social_profiles description]
 * @return [type] [description]
 */
function bildpress_header_side_social_profiles() {
    $bildpress_topbar_fb_url             = get_theme_mod('bildpress_topbar_fb_url', '#');
    $bildpress_topbar_twitter_url       = get_theme_mod('bildpress_topbar_twitter_url', '#');
    $bildpress_topbar_instagram_url      = get_theme_mod('bildpress_topbar_instagram_url', '#');
    $bildpress_topbar_linkedin_url      = get_theme_mod('bildpress_topbar_linkedin_url', '#');
    $bildpress_topbar_youtube_url        = get_theme_mod('bildpress_topbar_youtube_url', '#');
    ?> 
        <?php if (!empty($bildpress_topbar_fb_url)): ?>
          <a href="<?php print esc_url($bildpress_topbar_fb_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <?php endif; ?>

        <?php if (!empty($bildpress_topbar_twitter_url)): ?>
            <a href="<?php print esc_url($bildpress_topbar_twitter_url); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>

        <?php if (!empty($bildpress_topbar_instagram_url)): ?>
            <a href="<?php print esc_url($bildpress_topbar_instagram_url); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>

        <?php if (!empty($bildpress_topbar_linkedin_url)): ?>
            <a href="<?php print esc_url($bildpress_topbar_linkedin_url); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
        <?php endif; ?>        

        <?php if (!empty($bildpress_topbar_youtube_url)): ?>
            <a href="<?php print esc_url($bildpress_topbar_youtube_url); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
<?php 
}


function bildpress_footer_social_profiles() {
    $bildpress_footer_fb_url             = get_theme_mod('bildpress_footer_fb_url', '#');
    $bildpress_footer_twitter_url       = get_theme_mod('bildpress_footer_twitter_url', '#');
    $bildpress_footer_vine_url      = get_theme_mod('bildpress_footer_vine_url', '#');
    $bildpress_footer_weebly_url        = get_theme_mod('bildpress_footer_weebly_url', '#');
    $bildpress_footer_vuejs_url        = get_theme_mod('bildpress_footer_vuejs_url', '#');
    ?>
        <ul class="mb-0">
            <?php if ($bildpress_footer_fb_url): ?>
            <li><a href="<?php print esc_url($bildpress_footer_fb_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <?php endif; ?>

            <?php if ($bildpress_footer_twitter_url): ?>
            <li><a href="<?php print esc_url($bildpress_footer_twitter_url); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <?php endif; ?>

            <?php if ($bildpress_footer_vine_url): ?>
            <li><a href="<?php print esc_url($bildpress_footer_vine_url); ?>" target="_blank"><i class="fab fa-vine"></i></a></li>
            <?php endif; ?>

            <?php if ($bildpress_footer_weebly_url): ?>
            <li><a href="<?php print esc_url($bildpress_footer_weebly_url); ?>" target="_blank"><i class="fab fa-weebly"></i></a></li>
            <?php endif; ?>

            <?php if ($bildpress_footer_vuejs_url): ?>
            <li><a href="<?php print esc_url($bildpress_footer_vuejs_url); ?>" target="_blank"><i class="fab fa-vuejs"></i></a></li>
            <?php endif; ?>
        </ul>
<?php 
}

/** 
 * [bildpress_header_menu description]
 * @return [type] [description]
 */
function bildpress_header_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Navwalker_Class::fallback',
                'walker'            => new Navwalker_Class
            ));
           ?>
    <?php 
}

/** 
 * [bildpress_header_menu description]
 * @return [type] [description]
 */
function bildpress_onepage_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'onepage-menu',
                'menu_class'        => 'mobile_one_page',
                'container'         => '',
                'fallback_cb'       => 'Navwalker_Class::fallback',
                'walker'            => new Navwalker_Class
            ));
           ?>
    <?php 
}

/** 
 * [bildpress_header_menu left description]
 * @return [type] [description]
 */
function bildpress_header_left_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-left-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Navwalker_Class::fallback',
                'walker'            => new Navwalker_Class
            ));
           ?>
    <?php 
}

function bildpress_onepage_left_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'onepage-left-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Navwalker_Class::fallback',
                'walker'            => new Navwalker_Class
            ));
           ?>
    <?php 
}

/** 
 * [bildpress_header_menu left description]
 * @return [type] [description]
 */
function bildpress_header_right_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-right-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Navwalker_Class::fallback',
                'walker'            => new Navwalker_Class
            ));
           ?>
    <?php 
}

function bildpress_onepage_right_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'onepage-right-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Navwalker_Class::fallback',
                'walker'            => new Navwalker_Class
            ));
           ?>
    <?php 
}

/** 
 * [bildpress_footer_menu description]
 * @return [type] [description]
 */
function bildpress_footer_menu() { 
    
    wp_nav_menu(array(
        'theme_location'    => 'footer-menu',
        'menu_class'        => 'm-0',
        'container'         => '',
        'fallback_cb'       => 'Navwalker_Class::fallback',
        'walker'            => new Navwalker_Class
    ));
 
}


/**
*
* bildpress footer
*/
add_action('bildpress_footer_style', 'bildpress_check_footer', 10);

function bildpress_check_footer() {
    $bildpress_footer_style = function_exists('get_field') ? get_field( 'footer_style' ) : NULL;
    $bildpress_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1' );
   

    if( $bildpress_footer_style == 'footer-style-1' ) {
        bildpress_footer_style_1();
    }    
    elseif( $bildpress_footer_style == 'footer-style-2' ) {
        bildpress_footer_style_2();
    }    
    elseif( $bildpress_footer_style == 'footer-style-3' ) {
        bildpress_footer_style_3();
    }    
    elseif( $bildpress_footer_style == 'footer-style-4' ) {
        bildpress_footer_style_4();
    }    
    else{

        /** default footer style **/
        if($bildpress_default_footer_style == 'footer-style-2') {
           bildpress_footer_style_2();
        }     
        elseif( $bildpress_default_footer_style == 'footer-style-3' ) {
        bildpress_footer_style_3();
        }       
        elseif( $bildpress_default_footer_style == 'footer-style-4' ) {
        bildpress_footer_style_4();
        }       
        else {
            bildpress_footer_style_1();
        }

    }
}

/**
* footer  style_defaut
*/
function bildpress_footer_style_1() {

    $footer_bg_img = get_theme_mod('bildpress_footer_bg');
    $bildpress_footer_logo = get_theme_mod('bildpress_footer_logo');
    $bildpress_copyright_center = $bildpress_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $bildpress_footer_bg_url_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg') : '';
    $bildpress_footer_bg_color_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bildpress_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bildpress_footer_bg_url_from_page['url']) ? $bildpress_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($bildpress_footer_bg_color_from_page) ? $bildpress_footer_bg_color_from_page : $footer_bg_color;   

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-'. $num ) ){
            $footer_columns++;
        }
    } 

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-md-6 col-lg-3';
        $footer_class[2] = 'col-md-6 col-lg-3';
        $footer_class[3] = 'col-md-6 col-lg-3';
        $footer_class[4] = 'col-md-6 col-lg-3';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }  

?>

    <footer class="footer1 footer-style-01">
        <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') ): ?>
        <div class="footer1__padding1" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
            <div class="container">
                <div class="row">
                        <?php
                        if ( $footer_columns < 4 ) {     
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-1');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-3');
                            print '</div>'; 

                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-4');
                            print '</div>';       
                        }
                        else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-'. $num );
                                print '</div>';
                            }  
                        }

                        ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer1__copyright">
            <div class="container">
                <div class="row align-items-center">
                    <?php if(!empty($bildpress_footer_logo)) : ?>
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <div class="footer1__copyright--thumb">
                            <a href="<?php print esc_url(home_url('/')); ?>">
                                <img src="<?php print esc_url($bildpress_footer_logo); ?>" alt="Logo Image">
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="<?php print esc_attr($bildpress_copyright_center); ?>">
                        <div class="footer1__copyright--text">
                            <p class="m-0"><?php print bildpress_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php 
}

/**
* footer  style 2
*/
function bildpress_footer_style_2() {
    $footer_bg_img = get_theme_mod('bildpress_footer_bg');
    $bildpress_footer_logo_black = get_theme_mod('bildpress_footer_logo_black');
    $bildpress_copyright_center = $bildpress_footer_logo_black ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $bildpress_footer_bg_url_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg') : '';
    $bildpress_footer_bg_color_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bildpress_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bildpress_footer_bg_url_from_page['url']) ? $bildpress_footer_bg_url_from_page['url'] : $footer_bg_img;  
    // bg color
    $bg_color = !empty($bildpress_footer_bg_color_from_page) ? $bildpress_footer_bg_color_from_page : $footer_bg_color;  

    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-2-'. $num ) ){
            $footer_columns++;
        }
    }



    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-md-6 col-lg-3';
        $footer_class[2] = 'col-md-6 col-lg-3';
        $footer_class[3] = 'col-md-6 col-lg-3';
        $footer_class[4] = 'col-md-6 col-lg-3';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }    

?>


    <footer class="footer1 footer-style-2" data-background="<?php print esc_url($bg_img); ?>">
        <?php if ( is_active_sidebar('footer-2-1') OR is_active_sidebar('footer-2-2') OR is_active_sidebar('footer-2-3') OR is_active_sidebar('footer-2-4') ): ?>
        <div class="footer1__padding1" data-bg-color="<?php print esc_attr($bg_color); ?>">
            <div class="container">
                <div class="row footer-border">
                        <?php
                        if ( $footer_columns < 4 ) {     
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-1');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-2');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-3');
                            print '</div>'; 

                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-4');
                            print '</div>';       
                        }
                        else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-2-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-2-'. $num );
                                print '</div>';
                            }  
                        }

                        ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer1__copyright">
            <div class="container">
                <div class="row align-items-center">
                    <?php if(!empty($bildpress_footer_logo_black)) : ?>
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <div class="footer1__copyright--thumb">
                            <a href="<?php print esc_url(home_url('/')); ?>">
                                <img src="<?php print esc_url($bildpress_footer_logo_black); ?>" alt="Logo Image">
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="<?php print esc_attr($bildpress_copyright_center); ?>">
                        <div class="footer1__copyright--text">
                            <p class="m-0"><?php print bildpress_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php 
}


/**
* footer  3
*/
function bildpress_footer_style_3() {

    $footer_bg_img = get_theme_mod('bildpress_footer_bg');
    $bildpress_footer_bg_url_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg') : '';
    $bildpress_footer_bg_color_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bildpress_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bildpress_footer_bg_url_from_page['url']) ? $bildpress_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($bildpress_footer_bg_color_from_page) ? $bildpress_footer_bg_color_from_page : $footer_bg_color;    

    $footer_columns = 0;

    $footer_widgets = get_theme_mod('footer_widget_number', 3);

    for( $num=1; $num <= $footer_widgets+1; $num++ ) {
        if ( is_active_sidebar( 'footer-3-'. $num ) ){
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-12';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-sm-6 col-6';
        $footer_class[3] = 'col-xl-4 col-lg-6';       
        case '4':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-12';
        $footer_class[2] = 'col-xl-2 col-lg-6 col-sm-6 col-6';
        $footer_class[3] = 'col-xl-2 col-lg-6 col-sm-6 col-6';
        $footer_class[4] = 'col-xl-4 col-lg-6';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }    

?>

    <!-- footer area start -->
    <footer class="site-footer bg_img pt-100" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <a href="index.html" class="site-logo mb-50">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt="Logo">
                    </a>
                </div>
                <div class="col-xl-12">
                    <div class="footer-top mt-50 mb-80">
                        <div class="footer__info">
                            <div class="footer__info--item d-flex align-items-center">
                                <div class="icon mr-20">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/footer-info-icon-1.png" alt="Logo">
                                </div>
                                <div class="content">
                                    <h4 class="title">Phone Number</h4>
                                    <a href="tel:98787676576577">+987 876 765 76 577</a>
                                </div>
                            </div>
                            <div class="footer__info--item d-flex align-items-center">
                                <div class="icon mr-20">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/footer-info-icon-2.png" alt="Logo">
                                </div>
                                <div class="content">
                                    <h4 class="title">Email Address</h4>
                                    <a href="mailto:info@webmail.com">info@webmail.com</a>
                                </div>
                            </div>
                            <div class="footer__info--item d-flex align-items-center">
                                <div class="icon mr-20">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/footer-info-icon-3.png" alt="Logo">
                                </div>
                                <div class="content">
                                    <h4 class="title">Office Address</h4>
                                    <span>14/A, Miranda City, NYC</span>
                                </div>
                            </div>
                        </div>
                        <button id="scroll-top" class="site-btn transparent"><i class="fal fa-long-arrow-up"></i> <span>Back To Top</span> <i class="fal fa-long-arrow-up"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php

                    if ( $footer_columns < 4 ) {
                        print '<div class="col-xl-4 col-lg-6 col-md-12">';
                        dynamic_sidebar( 'footer-3-1');
                        print '</div>';
                    
                        print '<div class="col-xl-2 col-lg-6 col-sm-6 col-6">';
                        dynamic_sidebar( 'footer-3-2');
                        print '</div>';
                    
                        print '<div class="col-xl-2 col-lg-6 col-sm-6 col-6 mt-30">';
                        dynamic_sidebar( 'footer-3-3');
                        print '</div>';

                        print '<div class="col-xl-4 col-lg-6">';
                        dynamic_sidebar( 'footer-3-4');
                        print '</div>';

                    }
                    else{
                        for( $num=1; $num <= $footer_columns; $num++ ) {
                            if ( !is_active_sidebar( 'footer-3-'. $num ) ) continue;
                            print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                            dynamic_sidebar( 'footer-3-'. $num );
                            print '</div>';
                        } 
                    }
                ?>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="copyright-text mt-60">
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <p><?php print bildpress_copyright_text(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

<?php 
}


/**
* footer  4
*/
function bildpress_footer_style_4() {

    $footer_bg_img = get_theme_mod('bildpress_footer_bg');
    $bildpress_footer_bg_url_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg') : '';
    $bildpress_footer_bg_color_from_page = function_exists('get_field') ? get_field('bildpress_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('bildpress_footer_bg_color');
    
    // bg image
    $bg_img = !empty($bildpress_footer_bg_url_from_page['url']) ? $bildpress_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($bildpress_footer_bg_color_from_page) ? $bildpress_footer_bg_color_from_page : $footer_bg_color;    

    $footer_columns = 0;

    $footer_widgets = get_theme_mod('footer_widget_number', 3);

    for( $num=1; $num <= $footer_widgets+1; $num++ ) {
        if ( is_active_sidebar( 'footer-3-'. $num ) ){
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-12';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-sm-6 col-6';
        $footer_class[3] = 'col-xl-4 col-lg-6';       
        case '4':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-12';
        $footer_class[2] = 'col-xl-2 col-lg-6 col-sm-6 col-6';
        $footer_class[3] = 'col-xl-2 col-lg-6 col-sm-6 col-6';
        $footer_class[4] = 'col-xl-4 col-lg-6';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }    

?>

    <!-- footer area start -->
    <footer class="footer-section-4" data-background="<?php print esc_url($bg_img); ?>">
        <?php if ( is_active_sidebar('footer-4-1') OR is_active_sidebar('footer-4-2') OR is_active_sidebar('footer-4-3') OR is_active_sidebar('footer-4-4') ): ?>
        <div class="footer-section-4-top pt-100 pb-55" data-bg-color="<?php print esc_attr($bg_color); ?> ">
            <div class="container">
                <div class="row wow fadeInUp2">
                    <?php

                        if ( $footer_columns < 4 ) {
                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">';
                            dynamic_sidebar( 'footer-4-1');
                            print '</div>';
                        
                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 pl-70">';
                            dynamic_sidebar( 'footer-4-2');
                            print '</div>';
                        
                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 pl-20">';
                            dynamic_sidebar( 'footer-4-3');
                            print '</div>';

                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">';
                            dynamic_sidebar( 'footer-4-4');
                            print '</div>';
                        }
                        else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-3-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-3-'. $num );
                                print '</div>';
                            } 
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="footer4__copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <div class="footer4__copyright--text">
                            <p class="m-0"><?php print bildpress_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
    <!-- footer area end -->

<?php 
}



function bildpress_copyright_text(){
    if( rtl_enable() ){
        print get_theme_mod('bildpress_copyright_rtl', esc_html__('Copyright ©2022 ThemePure. All Rights Reserved','bildpress'));
    }
    else{
       print get_theme_mod('bildpress_copyright', esc_html__('Copyright ©2022 ThemePure. All Rights Reserved','bildpress'));
    }
    
}

function bildpress_design_info(){
    print get_theme_mod('bildpress_company_info', ('Copyright ©2022 ThemePure. All Rights Reserved'));
}


/** 
 * [bildpress_breadcrumb_func description]
 * @return [type] [description]
 */
function bildpress_breadcrumb_func() { 

    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title','Blog ');
        $breadcrumb_class = 'home_front_page';
        
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title','Blog ');
        $breadcrumb_show = 0;

    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts' ) );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_blog_title_details_rtl','Blog'); 
        else
            $title = get_the_title(); 
        
    }
    elseif ( is_single() && 'product' == get_post_type() ) { 
        $title = get_theme_mod('breadcrumb_product_details','Shop');
    }   
    elseif ( is_single() && 'bdevs-services' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_department_details_rtl','Services');
        else
            $title = get_the_title();
    }    
    elseif ( is_single() && 'bdevs-doctor' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_doctor_details_rtl','Doctor Details');
        else
            $title = get_theme_mod('breadcrumb_doctor_details','Doctor Details');

    }    
    elseif ( is_single() && 'bdevs-cases' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_case_study_details_rtl','Gallery');
        else
            $title = get_the_title();

    }
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'bildpress' ) . get_search_query();
    }
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'bildpress' );
    }
    elseif ( function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop','Shop ');
    }
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    }
    else {
        $title = get_the_title();
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb') : '';

    
    if( empty($is_breadcrumb) && $breadcrumb_show == 1 ) { 

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image') : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image') : '';
        $back_title = function_exists('get_field') ? get_field('breadcrumb_back_title') : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');


        if( $hide_bg_img ){
            $bg_img = '';
        }
        else {
          $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;  
        } ?>

        <div class="page_title bg-gray pt-170 pb-170 bg_img breadcrumb-spacings <?php print esc_attr($breadcrumb_class); ?>" data-overlay="dark" data-opacity="5" data-background="<?php print esc_attr($bg_img);?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page_title__content">
                            <h1 class="breadcrumb-title"><?php echo wp_kses_post( $title );?></h1>
                            <div class="page_title__bread-crumb">
                                <?php bildpress_breadcrumb_callback();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php 
    }
}
add_action('bildpress_before_main_content', 'bildpress_breadcrumb_func');


function bildpress_breadcrumb_callback() {
    $args = array(
        'show_browse'   => false,
        'post_taxonomy' => array( 'product' =>'product_cat' )
    );
    $breadcrumb = new Breadcrumb_Class( $args );
    
    return $breadcrumb->trail();
}


// bildpress_search_form
function bildpress_search_form() { ?>
    <!-- Modal Search -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fal fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get" action="<?php print esc_url( home_url( '/' ) );?>">
                    <div class="search-field-holder">
                        <input type="search" name="s" class="main-search-input" value="<?php print esc_attr( get_search_query() ) ?>" placeholder="<?php print esc_attr( 'Enter Your Keyword', 'bildpress' );?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
}

add_action('bildpress_before_main_content', 'bildpress_search_form');

/**
*
* pagination
*/
if( !function_exists('bildpress_pagination') ) {

    function _bildpress_pagi_callback($pagination) {
        return $pagination;
    }

    //page navegation
    function bildpress_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        
        if( $pages=='' ){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            
            if(!$pages)
                $pages = 1;
        }

        $pagination = array(
            'base' => add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        $pagi = '';
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
                        foreach ($paginations as $key => $pg) {
                            $pagi.= '<li>'.$pg.'</li>';
                        }
            $pagi .= '</ul>';
        }

        print _bildpress_pagi_callback($pagi);
    }
}




// rtl_enable
function rtl_enable(){
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable =get_theme_mod( 'rtl_switch',false);
    if ( $my_current_lang  != 'en' && $rtl_enable ) {
        return true;
    }
    else {
        return false;
    }
}

// header top bg color
function bildpress_breadcrumb_bg_color(){
    $color_code = get_theme_mod( 'bildpress_breadcrumb_bg_color','#222');
    wp_enqueue_style( 'bildpress-custom', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: ".$color_code."}";

        wp_add_inline_style('bildpress-breadcrumb-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bildpress_breadcrumb_bg_color');

// breadcrumb-spacing top
function bildpress_breadcrumb_spacing(){
    $padding_px = get_theme_mod( 'bildpress_breadcrumb_spacing','160px');
    wp_enqueue_style( 'bildpress-custom', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: ".$padding_px."}";

        wp_add_inline_style('bildpress-breadcrumb-top-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bildpress_breadcrumb_spacing');

// breadcrumb-spacing bottom
function bildpress_breadcrumb_bottom_spacing(){
    $padding_px = get_theme_mod( 'bildpress_breadcrumb_bottom_spacing','160px');
    wp_enqueue_style( 'bildpress-custom', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: ".$padding_px."}";

        wp_add_inline_style('bildpress-breadcrumb-bottom-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bildpress_breadcrumb_bottom_spacing');


// scrollup
function bildpress_scrollup_switch(){
    $scrollup_switch = get_theme_mod( 'bildpress_scrollup_switch', false);
    wp_enqueue_style( 'bildpress-custom', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    if($scrollup_switch){
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('bildpress-scrollup-switch',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bildpress_scrollup_switch');


// theme color
function bildpress_custom_color(){
    $color_code = get_theme_mod( 'bildpress_color_option','#ff5e14');
    wp_enqueue_style( 'bildpress-custom', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".header__side-nav1 a:hover,.slider1 .owl-nav button.owl-prev:hover, .slider1 .owl-carousel .owl-nav button.owl-next:hover,.slider1__content p::before,.site__btn1,.about1__item--wrapper::before,.key_features1__thumb-3::before,.testimonial1__thumb i,.news1__thumb a:hover,.logo-middle::before,.header-middle-style .header__side-nav1 a:hover,.key_features1__thumb-2.key_features1__thumb-4 a:hover,.testimonial2__dots-style .owl-dots .owl-dot.active span, .testimonial2__dots-style .owl-dots .owl-dot:hover span,.header.home3 .header__side-nav ul li a.nav_btn2,.testimonial3__sponsor,.projects3__active button.active,.projects3__active button:hover,.projects3__item::before,.team1 .owl-carousel .owl-nav button.owl-prev:hover, .team1 .owl-carousel .owl-nav button.owl-next:hover,.team1__social a:hover,.accordion_style_01 .card-header a[aria-expanded='true'] i,.accordion_style_01 .card-header h5 a:hover i,.process__item::before,.progress-skill .progress-bar,.sv-icon,.site__btn3:hover,.service_details__widget h4::before,.ser-fea-list ul li:hover i,.sidebar-search-form button,.sidebar-tad li a:hover, .tagcloud a:hover,.basic-pagination-2 ul li a:hover, .basic-pagination-2 ul li.active a,.basic-pagination-2 ul li span:hover, .basic-pagination ul li span.current,.blog-post-tag a:hover,.open-mobile-menu a,.mean-container .mean-nav ul li a.mean-expand:hover, .mean-container .mean-nav ul li a.mean-clicked,.sidebar__menu--social a::before, .site__btn3.pricing__btn:hover, .projects2__button-bar::before, .product-action a:hover, .bakix-details-tab ul li a.active::before, .service-content-inner span, .single-contact-info:hover .contact-info-icon a, .contact-form input.site__btn1, .logo-architect::before, .bild-cart span, .t-share-btn, .site__btn4.no-bg:hover .site__btn4-icon::before, .site__btn4.no-bg.cl-o .site__btn4-icon::before, .blog-date, .our-motive::before, .our-motive::after, .p-video-wrapper::before, .site__btn4, .social_links a:hover, .about-author-signature::after, .site__btn4.site__btn4-border.b-download .site__btn4-icon::before, .site__btn4.site__btn4-border:hover, .company-area-tag, .testimonial-active .owl-next:hover::after, .testimonial-active .owl-prev:hover::after, .site__btn4.site__btn4-border.site__btn4-white:hover, .gallery-content { background: ".$color_code."}";

        $custom_css .= ".header .main-menu1 > nav > ul > li:hover > a,.header .main-menu1 > nav > ul > li ul li:hover > a,.header__top1__right--social ul li a:hover,.header__top1__right--flag > ul > li:hover > a,.header__top1__right--flag > ul > li ul li a:hover,.about1__experience--content h2,.title_style1 h5,.about1__thumb i,.features1__thumb i,.projects1__content--text .projects1__content--title h5,a:hover,.projects1__content--text .projects1__content--data span i,.testimonial1__content h5,.news1__data span a:hover,.footer-widget ul li a:hover,.recent-posts-footer .widget-posts-title:hover,.recent-posts-footer .widget-posts-meta i,.news1__data span i,.about2__tab-thumb i,.about2__left-content-icon i,.projects2__content--title h5,.projects2__content--data span i,.projects2__content--data span a:hover,.main-menu ul li .sub-menu li:hover > a,.testimonial3__data span,.service1__thumb i,.team1__content p,.accordion_style_01 .card-header a[aria-expanded='true'],.accordion_style_01 .card-header h5 a:hover,.accordion_style_01 .card-header h5 a:hover,.contact1__thumb i,.page_title__bread-crumb ul li > span,.about4__experience--content h2,.service1.other_page1 .title_style1 h5,.progress-skill .progress-bar span,a,.pricing__data h5,.pricing__data h3,.more-service-list ul li a:hover .more-service-title,.service_details__sidebar3 ul li a i,.service_details__sidebar3 ul li a:hover,.ser-fea-list ul li i,.header.home3 .main-menu > nav > ul > li > a:hover,.header.home3.header-default .main-menu > nav > ul > li:hover > a,.contact_page1__item i,.pricing__item_color .pricing__data h3 span,.post-meta span i,.post-meta a:hover,.widget-posts-title a:hover,.widget li a:hover,.post-text blockquote footer,.header.home1 .header__menu-wrapper.menu_sticky .main-menu1 > nav > ul > li.active > a,.header.home1 .header__menu-wrapper.menu_sticky .main-menu1 > nav > ul > li:hover > a,.mean-container .mean-nav ul li a:hover,.contact-infos ul li i, .projects2__active button.active, .pro-title a:hover, .rating a, .woocommerce-info::before, .latest-comments .comment-reply-link:hover, .contact-info-icon a, .header-arc-top-info li i, .arc-single-service-icon i, .team-social-icon li a:hover, .team-title.member-name a:hover, .member-designation, .arc-project-category, .site__btn4.no-bg.cl-o, .site__btn4.no-bg:hover .site__btn4-icon i, .site__btn4.no-bg.cl-o .site__btn4-icon i, .video-btn, .test-a-img-quote, .site__btn4.no-bg.site__btn4-blog, .site__btn4.no-bg.site__btn4-blog .site__btn4-icon i, .arc-single-feature-icon i,.arc-section-subtitle, .footer-4-widget .social_links li a i, .main-menu2 > nav > ul > li ul li:hover > a, .m-tab-list.s_status_list li:hover i, .site__btn4.site__btn4-border.b-download, .site__btn4.site__btn4-border.b-download i, .company-growth-year span, .service-icon, .test-a-rating li i, .testimonial-active .owl-next:hover i, .testimonial-active .owl-prev:hover i, .overview2-list-number span { color: ".$color_code."}";

        $custom_css .= ".header .main-menu1 > nav > ul > li ul,.header__side-nav1 a:hover,.header__top1__right--flag > ul > li ul,.about1__item:hover::before,.news1__thumb a:hover,.header-middle-style .header__side-nav1 a:hover,.about2__left-content,.key_features1__thumb-2.key_features1__thumb-4 a:hover,.main-menu ul li .sub-menu,.about4__experience--content,.pricing__middle,.site__btn3:hover,.widget-title,.basic-pagination-2 ul li a:hover, .basic-pagination-2 ul li.active a,.basic-pagination-2 ul li span:hover, .basic-pagination ul li span.current,.comment-form textarea:focus,.comment-form input:focus, .site__btn3.pricing__btn:hover, .about2 .tab-style-01 .nav-tabs .nav-link.active, .about1__experience, .nice-select.open, .woocommerce-info, .blog-post-tag a:hover, .case-info, .contact-form input:focus, .site__btn4, .social_links a:hover, .main-menu2 > nav > ul > li ul, .about-img::before, .site__btn4.site__btn4-border.b-download, .testimonial-active .owl-dot.active span, .site__btn4.site__btn4-border.site__btn4-white:hover, .site__btn4.site__btn4-border:hover { border-color: ".$color_code."}";
        wp_add_inline_style('bildpress-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bildpress_custom_color');

// Header BG color
function bildpress_header_bg_color(){
    $color_code = get_theme_mod( 'bildpress_header_bg_color','#00235A');
    wp_enqueue_style( 'bildpress-custom', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= "header .dark-bg, .arc-header-top, .header-arc-top-info::after, #loading { background: ".$color_code."}";

        $custom_css .= ".ddf{ color: ".$color_code."}";

        $custom_css .= ".dsd { border-color: ".$color_code."}";
        wp_add_inline_style('bildpress-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bildpress_header_bg_color');

// Secondary Color
function bildpress_secondary_color(){
    $color_code = get_theme_mod( 'bildpress_secondary_color','#00235A');
    wp_enqueue_style( 'bildpress-custom', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".site__btn1:hover, .site__btn2:hover, .site-btn:hover, .pricing__item_color.pricing__middle .site__btn3:hover, .contact-form input.site__btn1:hover, .p-video-area-bg, .arc-features-area { background: ".$color_code."}";

        $custom_css .= ".title_style1 h2, .contact-info-text h5, .projects1__content--title h2, .projects1__content--title p, h1.slider-architect-title, div.slider-architect-content p, .arc-section-title, .experience-text p, .arc-single-service-title, .team-social-icon li a, .member-name, .p-video-duration li span, .test-a-name, .test-a-text.arc-test-text, .arc-test-nd .test-a-designation, p, .blog-title-o, .blog-content.arc-blog-content p, .main-menu2.menu-architect > nav > ul > li > a, .main-menu2 > nav > ul > li ul li a, .section-title-o, .m-tab-list.s_status_list li, .m-tab-list.s_status_list li i, .company-growth-year p, .service-title, .overview2-list-text h4, .overview-certification-title, .blog-sidebar-link-title, .clients-area-title { color: ".$color_code."}";

        $custom_css .= ".pricing__item_color.pricing__middle .site__btn3:hover { border-color: ".$color_code."}";
        wp_add_inline_style('bildpress-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bildpress_secondary_color');

// bildpress Google font
function bildpress_custom_font() {
    $bildpress_heading_font = get_theme_mod( 'bildpress_heading_font',"'Exo', sans-serif");
    $bildpress_heading_font_rtl = get_theme_mod( 'bildpress_heading_font_rtl',"'Exo', sans-serif");
    $bildpress_body_font = get_theme_mod( 'bildpress_body_font',"'Roboto', sans-serif");
    $bildpress_body_font_rtl = get_theme_mod( 'bildpress_body_font_rtl',"'Roboto', sans-serif");

    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable =get_theme_mod( 'rtl_switch',false);
    
    wp_enqueue_style( 'bildpress-heading-font', BILDPRESS_THEME_CSS_DIR . 'bildpress-custom.css', array());
    $custom_css = '';
    if ( $my_current_lang  != 'en' && $rtl_enable ) {
        $custom_css .= "h1,h2,h3,h4,h5,h6{ font-family: " . $bildpress_heading_font_rtl . "}";
        $custom_css .= "body{ font-family: " . $bildpress_body_font_rtl . "}";
    }
    else {
        $custom_css .= "h1,h2,h3,h4,h5,h6{ font-family: " . $bildpress_heading_font . "}";
        $custom_css .= "body{ font-family: " . $bildpress_body_font . "}";
    } 
    wp_add_inline_style('bildpress-heading-font',$custom_css);
}
add_action('wp_enqueue_scripts', 'bildpress_custom_font');




function bildpress_kses_intermediate( $string = '' ) {
    return wp_kses( $string, bildpress_get_allowed_html_tags( 'intermediate' ) );
}


function bildpress_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
        'a' => [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => []
        ]
    ];

    return $allowed_html;
}