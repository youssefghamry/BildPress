<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class OCDI_Demo_Importer {

    public function __construct() {
        add_filter( 'pt-ocdi/import_files', [$this, 'import_files_config'] );
        add_filter( 'pt-ocdi/after_import', [$this, 'ocdi_after_import_setup'] );
        add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
        add_action( 'init', [$this, 'bdevs_toolkit_rewrite_flush'] );
    }

    public function import_files_config() {

        $home_prevs = [
			'bildpress_home_1' => array(
				'title' => __( 'Home 1', 'bdevs-toolkit' ),
				'page'  => __( 'home', 'bdevs-toolkit' ),
				'screenshot' => plugins_url( 'assets/preview/home1.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://bdevs.net/wp/bildpress/',
			),
			'bildpress_home_2' => array(
				'title' => __( 'Home 2', 'bdevs-toolkit' ),
				'page'  => __( 'construction', 'bdevs-toolkit' ),
				'screenshot' => plugins_url( 'assets/preview/home2.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://bdevs.net/wp/bildpress/construction/',
			),
			'bildpress_home_3' => array(
				'title' => __( 'Home 3', 'bdevs-toolkit' ),
				'page'  => __( 'projects-home', 'bdevs-toolkit' ),
				'screenshot' => plugins_url( 'assets/preview/home3.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://bdevs.net/wp/bildpress/projects-home/',
			),
            'bildpress_home_4' => array(
                'title' => __( 'Home 4', 'bdevs-toolkit' ),
                'page'  => __( 'investors', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home4.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/bildpress/investors/',
            ),
            'bildpress_home_5' => array(
                'title' => __( 'Home 5', 'bdevs-toolkit' ),
                'page'  => __( 'architecture', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home5.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/bildpress/architecture/',
            ),
            'bildpress_home_5' => array(
                'title' => __( 'Home 6', 'bdevs-toolkit' ),
                'page'  => __( 'home-oil', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home6.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/bildpress/home-oil/',
            ),
			'bildpress_home_1_onepage' => array(
				'title' => __( 'Home 1 One Page', 'bdevs-toolkit' ),
				'page'  => __( 'home-1-one-page', 'bdevs-toolkit' ),
				'screenshot' => plugins_url( 'assets/preview/home1.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://bdevs.net/wp/bildpress/home-1-one-page/',
			),
			'bildpress_home_2_onepage' => array(
				'title' => __( 'Home 2 One Page', 'bdevs-toolkit' ),
				'page'  => __( 'home-2-one-page', 'bdevs-toolkit' ),
				'screenshot' => plugins_url( 'assets/preview/home2.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://bdevs.net/wp/bildpress/home-2-one-page/',
			),
			'bildpress_home_3_onepage' => array(
				'title' => __( 'Home 3 One Page', 'bdevs-toolkit' ),
				'page'  => __( 'home-3-one-page', 'bdevs-toolkit' ),
				'screenshot' => plugins_url( 'assets/preview/home3.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://bdevs.net/wp/bildpress/home-3-one-page/',
			),
        ];

        $config = [];

        $import_path = trailingslashit( get_template_directory() ) . 'sample-data/';

        foreach ( $home_prevs as $key => $prev ) {

            $contents_demo = $import_path . 'contents-demo.xml';
            $widget_settings = $import_path . 'widget-settings.json';
            $customizer_data = $import_path . 'customizer-data.dat';

            $config[] = [
                'import_file_id'               => $key,
                'import_page_name'             => $prev['page'],
                'import_file_name'             => $prev['title'],
                'local_import_file'            => $contents_demo,
                'local_import_widget_file'     => $widget_settings,
                'local_import_customizer_file' => $customizer_data,
                'import_preview_image_url'     => $prev['screenshot'],
                'preview_url'                  => $prev['preview_link'],
                'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'bdevs-element' ),
            ];
        }

        return $config;
    }

    public function ocdi_after_import_setup( $selected_file ) {

        $this->assign_menu_to_location();
        $this->assign_frontpage_id( $selected_file );
        $this->update_permalinks();
        update_option( 'basa_ocdi_importer_flash', true );
    }

    private function assign_menu_to_location() {

        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', [
            'main-menu' => $main_menu->term_id,
        ] );
    }

    private function assign_frontpage_id( $selected_import ) {

        $front_page = get_page_by_title( $selected_import['import_page_name'] );
        $blog_page = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page->ID );
        update_option( 'page_for_posts', $blog_page->ID );
    }

    private function update_permalinks() {
        update_option( 'permalink_structure', '/%postname%/' );
    }

    public function bdevs_toolkit_rewrite_flush() {

        if ( get_option( 'basa_ocdi_importer_flash' ) == true ) {
            flush_rewrite_rules();
            delete_option( 'basa_ocdi_importer_flash' );
        }
    }
}

new OCDI_Demo_Importer;