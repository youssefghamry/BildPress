<?php
/**
 * bildpress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bildpress
 */

if ( ! function_exists( 'bildpress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bildpress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bildpress, use a find and replace
		 * to change 'bildpress' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bildpress', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'bildpress' ),
			'onepage-menu' => esc_html__( 'Onepage Menu', 'bildpress' ),
			'main-left-menu' => esc_html__( 'Left Menu', 'bildpress' ),
			'onepage-left-menu' => esc_html__( 'Onepage Left Menu', 'bildpress' ),
			'main-right-menu' => esc_html__( 'Right Menu', 'bildpress' ),
			'onepage-right-menu' => esc_html__( 'Onepage Right Menu', 'bildpress' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'bildpress' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bildpress_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Enable custom header
		add_theme_support('custom-header');
		

		// enable woocommerce
		add_theme_support('woocommerce');


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );

		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		remove_theme_support( 'widgets-block-editor' );


		add_image_size( 'bildpress-case-details', 1170, 600, array('center','center') );
		add_image_size( 'bildpress-post-thumb', 500, 350, array('center','center') );
		add_image_size( 'bildpress-case-thumb', 700, 544, array('center','center') );
	}
endif;
add_action( 'after_setup_theme', 'bildpress_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bildpress_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bildpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'bildpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bildpress_widgets_init() {

	$footer_style_2_switch = get_theme_mod('footer_style_2_switch', true );
	$footer_style_3_switch = get_theme_mod('footer_style_3_switch', true );
	$footer_style_4_switch = get_theme_mod('footer_style_4_switch', true );

	/**
	* blog sidebar
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'bildpress' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-box"><h3 class="widget-title mb-30">',
		'after_title'   => '</h3></div>',
	) );

	$footer_widgets = get_theme_mod('footer_widget_number', 4);


	for( $num=1; $num <= $footer_widgets; $num++ ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer '. $num, 'bildpress'),
			'id'            => 'footer-'. $num,
			'description'   => esc_html__( 'Footer '. $num, 'bildpress' ),
			'before_widget' => '<div id="%1$s" class="footer-widget mb-50 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title mb-30">',
			'after_title'   => '</h4>',
		) );			
	}


	// footer 2
	if ( $footer_style_2_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {

			register_sidebar( array(
				'name'          => esc_html__( 'Footer Style 2: '. $num, 'bildpress'),
				'id'            => 'footer-2-'. $num,
				'description'   => esc_html__( 'Footer Style 2: '. $num, 'bildpress' ),
				'before_widget' => '<div id="%1$s" class="footer-widget mb-50 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="footer-title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}

	// footer 3
	if ( $footer_style_3_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__(  'Footer Style 3: '. $num, 'bildpress'),
				'id'            => 'footer-3-'. $num,
				'description'   => esc_html__( 'Footer Style 3: '. $num, 'bildpress' ),
				'before_widget' => '<div id="%1$s" class="footer-widget mb-50 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="footer-title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}	

	// footer 4
	if ( $footer_style_4_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__(  'Footer Style 4: '. $num, 'bildpress'),
				'id'            => 'footer-4-'. $num,
				'description'   => esc_html__( 'Footer Style 4: '. $num, 'bildpress' ),
				'before_widget' => '<div id="%1$s" class="footer-4-widget mb-40 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="footer-widget-title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}	


	/**
	* Service Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Service Sidebar', 'bildpress' ),
			'id' 			=> 'services-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'bildpress' ),
			'before_widget' => '<div class="service_details__sidebar1 mb-50 %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<div class="service_details__widget mb-30"><h4>',
			'after_title' 	=> '</h4></div>',
		)
	);	

	/**
	* Portfolio Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Portfolio Sidebar', 'bildpress' ),
			'id' 			=> 'portfolio-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Portfolio Details Sidebar.', 'bildpress' ),
			'before_title' 	=> '<div class="widget-title-box mb-30"><h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);	

	/**
	* Offer Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Offer Sidebar', 'bildpress' ),
			'id' 			=> 'offer-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Offer Details Sidebar.', 'bildpress' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);

	/**
	* FAQ Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'FAQ Sidebar', 'bildpress' ),
			'id' 			=> 'faq-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on FAQ Details Sidebar.', 'bildpress' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);


}
add_action( 'widgets_init', 'bildpress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

define('BILDPRESS_THEME_DIR', get_template_directory());
define('BILDPRESS_THEME_URI', get_template_directory_uri());
define('BILDPRESS_THEME_CSS_DIR', BILDPRESS_THEME_URI . '/assets/css/');
define('BILDPRESS_THEME_JS_DIR', BILDPRESS_THEME_URI . '/assets/js/');
define('BILDPRESS_THEME_INC', BILDPRESS_THEME_DIR . '/inc/');

/** 
 * bildpress_scripts description
 * @return [type] [description]
 */
function bildpress_scripts() {
	/**
	* all css files
	*/
	wp_enqueue_style( 'bildpress-fonts', bildpress_fonts_url(), array(), '1.0.0' );
	if( is_rtl() ){
		wp_enqueue_style( 'bootstrap-rtl', BILDPRESS_THEME_CSS_DIR.'bootstrap.min-rtl.css', array() );
	}else{
		wp_enqueue_style( 'bootstrap', BILDPRESS_THEME_CSS_DIR.'bootstrap.min.css', array() );
	}
	wp_enqueue_style( 'animate', BILDPRESS_THEME_CSS_DIR.'animate.css', array() );
	wp_enqueue_style( 'bildpress-default', BILDPRESS_THEME_CSS_DIR.'default.css', array() );
	wp_enqueue_style( 'jquery-fancybox', BILDPRESS_THEME_CSS_DIR.'jquery.fancybox.css', array() );
	wp_enqueue_style( 'jquery-ui', BILDPRESS_THEME_CSS_DIR.'jquery-ui.css', array() );
	wp_enqueue_style( 'fontawesome-pro', BILDPRESS_THEME_CSS_DIR.'fontawesome.pro.min.css', array() );
	wp_enqueue_style( 'flaticon', BILDPRESS_THEME_CSS_DIR.'flaticon.css', array() );
	wp_enqueue_style( 'themify-icons', BILDPRESS_THEME_CSS_DIR.'themify-icons.css', array() );
	wp_enqueue_style( 'nice-select', BILDPRESS_THEME_CSS_DIR.'nice-select.css', array() );
	wp_enqueue_style( 'owl-carousel', BILDPRESS_THEME_CSS_DIR.'owl.carousel.min.css', array() );
	wp_enqueue_style( 'owl-theme-default', BILDPRESS_THEME_CSS_DIR.'owl.theme.default.css', array() );
	wp_enqueue_style( 'slick', BILDPRESS_THEME_CSS_DIR.'slick.css', array() );
	wp_enqueue_style( 'meanmenu', BILDPRESS_THEME_CSS_DIR.'meanmenu.css', array() );
	wp_enqueue_style( 'magnific-popup', BILDPRESS_THEME_CSS_DIR.'magnific-popup.css', array() );
	wp_enqueue_style( 'bildpress-shop', BILDPRESS_THEME_CSS_DIR.'shop.css', array() );
	wp_enqueue_style( 'bildpress-core', BILDPRESS_THEME_CSS_DIR.'bildpress-core.css', array() );
	wp_enqueue_style( 'bildpress-unit', BILDPRESS_THEME_CSS_DIR.'bildpress-unit.css', array() );
	wp_enqueue_style( 'bildpress-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bildpress-responsive', BILDPRESS_THEME_CSS_DIR.'responsive.css', array() );

	// all js
	wp_enqueue_script( 'popper', BILDPRESS_THEME_JS_DIR.'popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', BILDPRESS_THEME_JS_DIR.'bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'circle-progress', BILDPRESS_THEME_JS_DIR.'circle-progress.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'isotope-pkgd', BILDPRESS_THEME_JS_DIR.'isotope.pkgd.min.js', array('imagesloaded'), false, true );
	wp_enqueue_script( 'jquery-counterup', BILDPRESS_THEME_JS_DIR.'jquery.counterup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'one-page-nav', BILDPRESS_THEME_JS_DIR.'one-page-nav-min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-easing', BILDPRESS_THEME_JS_DIR.'jquery.easing.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-fancybox', BILDPRESS_THEME_JS_DIR.'jquery.fancybox.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-nice-select', BILDPRESS_THEME_JS_DIR.'jquery.nice-select.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-waypoints', BILDPRESS_THEME_JS_DIR.'jquery.waypoints.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'back-to-top', BILDPRESS_THEME_JS_DIR.'back-to-top.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'magnific-popup', BILDPRESS_THEME_JS_DIR.'magnific-popup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'owl-carousel', BILDPRESS_THEME_JS_DIR.'owl.carousel.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'bildpress-plugins', BILDPRESS_THEME_JS_DIR.'plugins.js', array('jquery'), false, true );
	wp_enqueue_script( 'slick', BILDPRESS_THEME_JS_DIR.'slick.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'meanmenu', BILDPRESS_THEME_JS_DIR.'jquery.meanmenu.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-appear', BILDPRESS_THEME_JS_DIR.'jquery.appear.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-knob', BILDPRESS_THEME_JS_DIR.'jquery.knob.js', array('jquery'), false, true );
	wp_enqueue_script( 'wow', BILDPRESS_THEME_JS_DIR.'wow.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'bildpress-main', BILDPRESS_THEME_JS_DIR.'main.js', array('jquery'), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'bildpress_scripts' );

/*
Register Fonts
*/
function bildpress_fonts_url() {
	$bildpress_fonts_url = get_theme_mod( 'bildpress_fonts_url',"Exo:300,400,400i,500,500i,600,700|Roboto:300,400,500,700,900");
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if(  'off' !== _x( 'on', 'Google font: on or off', 'bildpress' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $bildpress_fonts_url ), "//fonts.googleapis.com/css" );
    }
    return $font_url;

}


// wp_body_open
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
            do_action( 'wp_body_open' );
    }
}



/**
 * Implement the Custom Header feature.
 */
require BILDPRESS_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BILDPRESS_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require BILDPRESS_THEME_INC . 'template-helper.php';


if ( !defined('BILDPRESS_WOOCOMMERCE_ACTIVED') ) {
	define( 'BILDPRESS_WOOCOMMERCE_ACTIVED', in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
}

define( 'BILDPRESS_WISHLIST_ACTIVED', in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

if(BILDPRESS_WOOCOMMERCE_ACTIVED) {
	require_once BILDPRESS_THEME_INC . 'bildpress-woocommerce.php';
}



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require BILDPRESS_THEME_INC . 'jetpack.php';
}

/**
* include bildpress functions file
*/
require_once BILDPRESS_THEME_INC . 'class-breadcrumb.php';
require_once BILDPRESS_THEME_INC . 'class-navwalker.php';
require_once BILDPRESS_THEME_INC . 'class-customizer.php';
require_once BILDPRESS_THEME_INC . 'customizer_data.php';
require_once BILDPRESS_THEME_INC . 'class-tgm-plugin-activation.php';
require_once BILDPRESS_THEME_INC . 'add_plugin.php';



/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bildpress_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bildpress_pingback_header' );


/**
*
* comment section
*
*/
add_filter('comment_form_default_fields', 'bildpress_comment_form_default_fields_func');

function bildpress_comment_form_default_fields_func($default){
	$default['author'] = '<div class="row">
    <div class="col-xl-6">
    	<div class="contacts-name">
    		<label>'.esc_html__('Your name *','bildpress').'</label>
        	<input type="text" name="author">
        </div>
    </div>';
	$default['email'] = '<div class="col-xl-6">
		<div class="contacts-email ">
		<label>'.esc_html__('Your email *','bildpress').'</label>
        <input type="text" name="email">
    	</div>
    </div>';
	$default['url'] = '';

	$default['clients_commnet'] = '<div class="col-xl-12">
	<div class="contacts-message">
	<label>'.esc_html__('Comments *','bildpress').'</label>
     <textarea id="comment" name="comment" cols="30" rows="10"></textarea>
    </div>';
	return $default;
}

add_filter('comment_form_defaults', 'bildpress_comment_form_defaults_func');

function bildpress_comment_form_defaults_func($info){
	if( !is_user_logged_in() ){
		$info['comment_field'] = '';
		$info['submit_field'] = '%1$s %2$s</div></div>';
	}else {
		$info['comment_field'] = '<div class="comments-textarea contacts-message contact-icon">
											<label>'.esc_html__('Comments *','bildpress').'</label>
                                                <textarea id="comment" name="comment" cols="30" rows="10"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
	}


	$info['submit_button'] = '<button class="site__btn1 cm-btn" type="submit"><i class="fal fa-comments"></i> '.esc_html__('Post Comment','bildpress').' </button>';

	$info['title_reply_before'] = '<div class="post-comments-title">
                                        <h2>';
	$info['title_reply_after'] = '</h2></div>';
	$info['comment_notes_before'] = '';

	return $info;
}

if( !function_exists('bildpress_comment') ) {
	function bildpress_comment($comment, $args, $depth) {
		$GLOBAL['comment'] = $comment;
		extract($args, EXTR_SKIP);
		$args['reply_text'] = '<i class="fas fa-reply-all"></i> Reply';
		$replayClass = 'comment-depth-' . esc_attr($depth);
		?>
			<li id="comment-<?php comment_ID(); ?>">
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar($comment, 102, null, null, array('class'=> array())); ?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link(); ?></h5>
							<span><?php comment_time( get_option('date_format') ); ?></span>
						</div>
						<?php comment_text(); ?>
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>
					</div>
				</div>
		<?php
	}
}



/**
* shortcode supports for removing extra p, spance etc
*
*/
add_filter( 'the_content', 'bildpress_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function bildpress_shortcode_extra_content_remove( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}


// bildpress_search_filter_form
if( !function_exists('bildpress_search_filter_form')) {
  function bildpress_search_filter_form( $form ) {
    
    $form = sprintf( 
    	'<div class="sidebar-form"><form class="sidebar-search-form" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="fas fa-search"></i>  </button>
		</form></div>',
		esc_url( home_url('/') ),
		esc_attr( get_search_query() ),
		esc_html__('Search','bildpress')
	);

    return $form;
  }
  add_filter( 'get_search_form','bildpress_search_filter_form');
}

add_action('admin_enqueue_scripts', 'bildpress_admin_custom_scripts');

function bildpress_admin_custom_scripts() {
	wp_enqueue_media();
	wp_register_script('bildpress-admin-custom', get_template_directory_uri().'/inc/js/admin_custom.js', array('jquery'), '', true);
	wp_enqueue_script('bildpress-admin-custom');
}
