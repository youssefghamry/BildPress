<?php
/**
 * functions mentod
 *
 * @package Bdevs_Addons
 */
defined( 'ABSPATH' ) || die();


function bdevs_element_dashboard_url( $suffix = '#home' ) {
    return add_query_arg( [ 'page' => 'bdevs-addons' . $suffix ], admin_url( 'admin.php' ) );
}

function bdevs_element_get_b64_icon() {

    return '';
}

/**
 * List of bdevs icons
 *
 * @return array
 */
function bdevs_element_get_bdevs_element_icons() {
    return [
        'fal fa-check' => 'pro check',
        'hm hm-degree' => 'degree',
        'hm hm-accordion-horizontal' => 'accordion-horizontal',
        'hm hm-accordion-vertical' => 'accordion-vertical',
    ];
}

function bdevs_element_render_icon( $settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = [] ) {
    
    // Check if its already migrated
    $migrated = isset( $settings['__fa4_migrated'][ $new_icon_id ] );
    // Check if its a new widget without previously selected icon using the old Icon control
    $is_new = empty( $settings[ $old_icon_id ] );

    $attributes['aria-hidden'] = 'true';

    \Elementor\Icons_Manager::render_icon( $settings[ $new_icon_id ], $attributes );

}

function bdevs_element_get_current_user_display_name() {
    $user = wp_get_current_user();
    $name = 'user';
    if ( $user->exists() && $user->display_name ) {
        $name = $user->display_name;
    }
    return $name;
}

function bdevs_element_has_pro() {
    return '';
}

/**
 * Get elementor instance
 *
 * @return \Elementor\Plugin
 */
function bdevs_element_elementor() {
    return \Elementor\Plugin::instance();
}

function bdevs_element_is_bdevs_element_mode_enabled() {
    return apply_filters( 'bdevs_element_is_bdevs_element_mode_enabled', true );
}

function bdevs_element_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
    return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

function bdevs_element_get_allowed_html_desc( $level = 'basic' ) {
    if ( ! in_array( $level, [ 'basic', 'intermediate' ] ) ) {
        $level = 'basic';
    }

    $tags_str = '<' . implode( '>,<', array_keys( bdevs_element_get_allowed_html_tags( $level ) ) ) . '>';
    return sprintf( __( 'This input field has support for the following HTML tags: %1$s', 'bdevselement' ), '<code>' . esc_html( $tags_str ) . '</code>' );
}

function bdevs_element_get_allowed_html_tags( $level = 'basic' ) {
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
    ];

    if ( $level === 'intermediate' ) {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'data' => [],
            'rel'   => []
        ];

    }

    return $allowed_html;
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function bdevs_element_kses_intermediate( $string = '' ) {
    return wp_kses( $string, bdevs_element_get_allowed_html_tags( 'intermediate' ) );
}



/** Form activated **/

function bdevs_element_is_cf7_activated() {
    return class_exists( 'WPCF7' );
}

function bdevs_element_kses_basic( $string = '' ) {
    return wp_kses( $string, bdevs_element_get_allowed_html_tags( 'basic' ) );
}

function bdevs_element_is_script_debug_enabled() {
    return ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
}

function bdevs_element_get_dashboard_link( $suffix = '#home' ) {
    return add_query_arg( [ 'page' => 'bdevs-addons' . $suffix ], admin_url( 'admin.php' ) );
}

/**
 * Check if WPForms is activated
 *
 * @return bool
 */
function bdevs_element_is_wpforms_activated() {
    return class_exists( '\WPForms\WPForms' ) ;
}

/**
 * Check if Ninja Form is activated
 *
 * @return bool
 */
function bdevs_element_is_ninjaforms_activated() {
    return class_exists( 'Ninja_Forms' );
}

/**
 * Check if Caldera Form is activated
 *
 * @return bool
 */
function bdevs_element_is_calderaforms_activated() {
    return class_exists( 'Caldera_Forms' );
}

/**
 * Check if We Form is activated
 *
 * @return bool
 */
function bdevs_element_is_weforms_activated() {
    return class_exists( 'WeForms' );
}

/**
 * Check if Gravity Forms is activated
 *
 * @return bool
 */
function bdevs_element_is_gravityforms_activated() {
    return class_exists( 'GFForms' );
}

/**
 * Get a list of all CF7 forms
 *
 * @return array
 */
function bdevs_element_get_cf7_forms() {
    $forms = [];
    if ( bdevs_element_is_cf7_activated() ) {
        $_forms = get_posts( [
            'post_type'      => 'wpcf7_contact_form',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ] );

        if ( ! empty( $_forms ) ) {
            $forms = wp_list_pluck( $_forms, 'post_title', 'ID' );
        }
    }
    return $forms;
}

/**
 * Get a list of all WPForms
 *
 * @return array
 */
function bdevs_element_get_wpforms() {
    $forms = [];
    if ( bdevs_element_is_wpforms_activated() ) {
        $_forms = get_posts( [
            'post_type' => 'wpforms',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ] );

        if ( ! empty( $_forms ) ) {
            $forms = wp_list_pluck( $_forms, 'post_title', 'ID' );
        }
    }
    return $forms;
}

/**
 * Get a list of all Ninja Form
 *
 * @return array
 */
function bdevs_element_get_ninjaform() {
    $forms = [];
    if ( bdevs_element_is_ninjaforms_activated() ) {
        $_forms = \Ninja_Forms()->form()->get_forms();

        if ( ! empty( $_forms ) && ! is_wp_error( $_forms ) ) {
            foreach ( $_forms as $form ) {
                $forms[ $form->get_id( )] = $form->get_setting('title');
            }
        }
    }
    return $forms;
}

/**
 * Get a list of all Caldera Form
 *
 * @return array
 */
function bdevs_element_get_caldera_form() {
    $forms = [];
    if ( bdevs_element_is_calderaforms_activated() ) {
        $_forms = \Caldera_Forms_Forms::get_forms(true, true);

        if ( ! empty( $_forms ) && ! is_wp_error( $_forms ) ) {
            foreach ( $_forms as $form ) {
                $forms[ $form['ID'] ] = $form['name'];
            }
        }
    }
    return $forms;
}

/**
 * Get a list of all WeForm
 *
 * @return array
 */
function bdevs_element_get_we_forms() {
    $forms = [];
    if ( bdevs_element_is_weforms_activated() ) {
        $_forms = get_posts( [
            'post_type' => 'wpuf_contact_form',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ] );

        if ( ! empty( $_forms ) ) {
            $forms = wp_list_pluck( $_forms, 'post_title', 'ID' );
        }
    }
    return $forms;
}

/**
 * Get a list of all GravityForms
 *
 * @return array
 */
function bdevs_element_get_gravity_forms() {
    $forms = [];
    if ( bdevs_element_is_gravityforms_activated() ) {
        $gravity_forms = \RGFormsModel::get_forms( null, 'title' );

        if ( ! empty( $gravity_forms ) && ! is_wp_error( $gravity_forms ) ) {
            foreach ( $gravity_forms as $gravity_form ) {
                $forms[ $gravity_form->id ] = $gravity_form->title;
            }
        }
    }
    return $forms;
}


/**
 * Get All Post Types
 * @param array $args
 * @param array $diff_key
 * @return array|string[]|WP_Post_Type[]
 */
function bdevs_element_get_post_types ( $args = array(), $diff_key = array() ) {
    $default = [
        'public' => true,
        'show_in_nav_menus' => true
    ];
    $args = array_merge( $default, $args );
    $post_types = get_post_types( $args , 'objects' );
    $post_types = wp_list_pluck( $post_types, 'label', 'name' );

    if( !empty( $diff_key ) ){
        $post_types = array_diff_key( $post_types, $diff_key );
    }
    return $post_types;
}


/**
 * Get All Taxonomies
 * @param array $args
 * @param string $output
 * @param bool $list
 * @param array $diff_key
 * @return array|string[]|WP_Taxonomy[]
 */
function bdevs_element_get_taxonomies ( $args = array(), $output = 'object', $list = true, $diff_key = array() ) {

    $taxonomies = get_taxonomies( $args , $output );
    if( 'object' === $output && $list ){
        $taxonomies = wp_list_pluck( $taxonomies, 'label', 'name' );
    }

    if( !empty( $diff_key ) ){
        $taxonomies = array_diff_key( $taxonomies, $diff_key );
    }

    return $taxonomies;
}

/**
 * Post Tab Ajax call
 */
function bdevs_element_post_tab () {

    $security = check_ajax_referer( 'bdevs_addons_nonce', 'security' );

    if ( true == $security ) :
        $settings = $_POST['post_tab_query'];
        $post_type = $settings['post_type'];
        $taxonomy = $settings['taxonomy'];
        $item_limit = $settings['item_limit'];
        $excerpt = $settings['excerpt'];
        $term_id = $_POST['term_id'];

        $args = [
            'post_status' => 'publish',
            'post_type' => $post_type,
            'posts_per_page' => $item_limit,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $term_id,
                ),
            ),
        ];
        $posts = get_posts( $args );
        if ( count( $posts ) !== 0 ):
            ?>
            <div class="bdevs-post-tab-item-wrapper active" data-term="<?php echo esc_attr( $term_id ); ?>">
                <?php foreach ( $posts as $post ): ?>
                    <div class="bdevs-post-tab-item">
                        <div class="bdevs-post-tab-item-inner">
                            <?php if ( has_post_thumbnail( $post->ID ) ): ?>
                                <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"
                                   class="bdevs-post-tab-thumb">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
                                </a>
                            <?php endif; ?>
                            <h2 class="bdevs-post-tab-title">
                                <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"> <?php echo esc_html( $post->post_title ); ?></a>
                            </h2>
                            <div class="bdevs-post-tab-meta">
                                <span class="bdevs-post-tab-meta-author">
                                    <i class="fa fa-user-o"></i>
                                    <a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></a>
                                </span>
                                <?php
                                $archive_year = get_the_time( 'Y', $post->ID );
                                $archive_month = get_the_time( 'm', $post->ID );
                                $archive_day = get_the_time( 'd', $post->ID );
                                ?>
                                <span class="bdevs-post-tab-meta-date">
                                    <i class="fa fa-calendar-o"></i>
                                    <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date( "M d, Y", $post->ID ); ?></a>
                                </span>
                            </div>
                            <?php if( 'yes' === $excerpt && !empty($post->post_excerpt) ): ?>
                                <div class="bdevs-post-tab-excerpt">
                                    <p><?php echo esc_html($post->post_excerpt);?></p>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php

        endif;
    endif;
    wp_die();

}
//add_action( 'wp_ajax_bdevs_element_post_tab_action', 'bdevs_element_post_tab' );
//add_action( 'wp_ajax_nopriv_bdevs_element_post_tab_action', 'bdevs_element_post_tab' );


// BDT Position
function element_pack_position() {
    
    $position_options = [
        ''              => esc_html__('Default', 'bdevselement'),
        'top-left'      => esc_html__('Top Left', 'bdevselement') ,
        'top-center'    => esc_html__('Top Center', 'bdevselement') ,
        'top-right'     => esc_html__('Top Right', 'bdevselement') ,
        'center'        => esc_html__('Center', 'bdevselement') ,
        'center-left'   => esc_html__('Center Left', 'bdevselement') ,
        'center-right'  => esc_html__('Center Right', 'bdevselement') ,
        'bottom-left'   => esc_html__('Bottom Left', 'bdevselement') ,
        'bottom-center' => esc_html__('Bottom Center', 'bdevselement') ,
        'bottom-right'  => esc_html__('Bottom Right', 'bdevselement') ,
    ];

    return $position_options;
}

/**
* Call a shortcode function by tag name.
*
* @since 1.0.0
*
* @param string $tag The shortcode whose function to call.
* @param array $atts The attributes to pass to the shortcode function. Optional.
* @param array $content The shortcode's content. Default is null (none).
*
* @return string|bool False on failure, the result of the shortcode on success.
*/
function bdevs_element_do_shortcode( $tag, array $atts = array(), $content = null ) {
global $shortcode_tags;
    if ( ! isset( $shortcode_tags[ $tag ] ) ) {
    return false;
}
    return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/**
* Sanitize html class string
*
* @param $class
* @return string
*/
function bdevs_element_sanitize_html_class_param( $class ) {
$classes = ! empty( $class ) ? explode( ' ', $class ) : [];
$sanitized = [];
if ( ! empty( $classes ) ) {
$sanitized = array_map( function( $cls ) {
return sanitize_html_class( $cls );
}, $classes );
}
return implode( ' ', $sanitized );
}