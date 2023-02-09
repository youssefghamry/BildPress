<?php
namespace BdevsElement;

use \Elementor\Core\Files\CSS\Post as Post_CSS;

defined('ABSPATH') || die();

class BDevs_El_Assets {

	/**
	 * Bind hook and run internal methods here
	 */
	public static function init() {
		// Frontend scripts
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'frontend_register' ] );
		//add_action( 'wp_enqueue_scripts', [ __CLASS__, 'frontend_enqueue' ], 99 );
		add_action( 'elementor/css-file/post/enqueue', [ __CLASS__, 'frontend_enqueue_exceptions' ] );

		// Edit and preview enqueue
		add_action( 'elementor/preview/enqueue_styles', [ __CLASS__, 'enqueue_preview_style' ] );

		// Enqueue editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ __CLASS__, 'enqueue_editor_scripts' ] );

		// Placeholder image replacement
		add_filter( 'elementor/utils/get_placeholder_image_src', [ __CLASS__, 'set_placeholder_image' ] );

		// Paragraph toolbar registration
		add_filter( 'elementor/editor/localize_settings', [ __CLASS__, 'add_inline_editing_intermediate_toolbar' ] );
	}

	/**
	 * Register inline editing paragraph toolbar
	 *
	 * @param array $config
	 * @return array
	 */
	public static function add_inline_editing_intermediate_toolbar( $config ) {

		if ( ! isset( $config['inlineEditing'] ) ) {
			return $config;
		}

		$tools = [
			'bold',
			'underline',
			'italic',
			'createlink',
		];

		if ( isset( $config['inlineEditing']['toolbar'] ) ) {

			$config['inlineEditing']['toolbar']['intermediate'] = $tools;
		} 
		else {
			$config['inlineEditing'] = [
				'toolbar' => [
					'intermediate' => $tools,
				],
			];
		}

		return $config;
	}

	public static function set_placeholder_image() {

		return BDEVSEL_ASSETS . 'img/placeholder.png';
	}

	public static function frontend_register() {
		
		$suffix = bdevs_element_is_script_debug_enabled() ? '.' : '.min.';

		wp_enqueue_style(
			'bdevselement-main',
			BDEVSEL_ASSETS . 'css/bdevs-element.css',
			null,
			BDEVSEL_VERSION
		);

		//Localize scripts
		wp_localize_script('bdevs-element', 'bdevsLocalize', [
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('bdevs_element_nonce'),
		]);

		wp_register_script(
			'bdevs-element',
			BDEVSEL_ASSETS . 'js/bdevs-element.js',
			['jquery'],
			BDEVSEL_VERSION,
			true
		);
	}

	/**
	 * Handle exception cases where regular enqueue won't work
	 *
	 * @param Post_CSS $file
	 */
	public static function frontend_enqueue_exceptions( Post_CSS $file ) {

	}

	public static function frontend_enqueue() {

		if ( ! is_singular() ) {
			return;
		}

	}

	public static function enqueue_editor_scripts() {

		wp_enqueue_style(
			'bdevselement-editor',
			BDEVSEL_ASSETS . 'admin/css/editor.min.css',
			null,
			BDEVSEL_VERSION
		);

		wp_enqueue_script(
			'bdevselement-editor',
			BDEVSEL_ASSETS . 'admin/js/editor.min.js',
			null,
			BDEVSEL_VERSION
		);

		$localize_data = [
			'editorPanelHomeLinkURL'      => bdevs_element_get_dashboard_link(),
			'editorPanelWidgetsLinkURL'   => bdevs_element_get_dashboard_link('#widgets'),
			'i18n' => [
				'editorPanelHomeLinkTitle'    => esc_html__( 'bdevsAddons - Home', 'bdevs-element' ),
				'editorPanelWidgetsLinkTitle' => esc_html__( 'bdevsAddons - Widgets', 'bdevs-element' ),
				'promotionDialogHeader' => esc_html__( '%s Widget', 'bdevs-element' ),
				'promotionDialogMessage' => esc_html__( 'Use %s widget with other exclusive pro widgets and 100% unique features to extend your toolbox and build sites faster and better.', 'bdevs-element' ),
			],
			'proWidgets' => [],
			'hasPro' => bdevs_element_has_pro(),
			'select2Secret' => wp_create_nonce( 'bdevs_element_Select2_Secret' ),
		];

		if ( ! bdevs_element_has_pro() && bdevs_element_is_elementor_version( '>=', '2.9.0' ) ) {
			$localize_data['proWidgets'] = '';
		}

		wp_localize_script(
			'bdevselement-editor',
			'BdevsElementEditor',
			$localize_data
		);
	}

	public static function enqueue_preview_style() {}
}