<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Icons_Manager;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class Fun_Factor extends BDevs_El_Widget {

	/**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'fun_factor';
    }

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __('Fun Factor', 'bdevselement');
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-sidebar';
	}

	public function get_keywords() {
		return ['fun', 'factor', 'animation', 'info', 'box', 'number', 'animated'];
	}

	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_contents',
			[
				'label' => __('Contents', 'bdevselement'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'media_type',
			[
				'label'          => __('Media Type', 'bdevselement'),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'icon'  => [
						'title' => __('Icon', 'bdevselement'),
						'icon'  => 'fa fa-smile-o',
					],
					'image' => [
						'title' => __('Image', 'bdevselement'),
						'icon'  => 'fa fa-image',
					],
				],
				'default'        => 'icon',
				'toggle'         => false,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => __('Image', 'bdevselement'),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'media_type' => 'image'
				],
				'dynamic'   => [
					'active' => true,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'medium_large',
				'separator' => 'none',
				'exclude'   => [
					'full',
					'custom',
					'large',
					'shop_catalog',
					'shop_single',
					'shop_thumbnail'
				],
				'condition' => [
					'media_type' => 'image'
				]
			]
		);

		$this->add_control(
			'icons',
			[
				'label'      => __('Icons', 'bdevselement'),
				'type'       => Controls_Manager::ICONS,
				'show_label' => true,
				'default'    => [
					'value'   => 'far fa-grin-wink',
					'library' => 'solid',
				],
				'condition'  => [
					'media_type' => 'icon',
				],

			]
		);

		$this->add_control(
			'image_icon_position',
			[
				'label'          => __('Position', 'bdevselement'),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'left'  => [
						'title' => __('Left', 'bdevselement'),
						'icon'  => 'eicon-h-align-left',
					],
					'top'   => [
						'title' => __('Top', 'bdevselement'),
						'icon'  => 'eicon-v-align-top',
					],
					'right' => [
						'title' => __('Right', 'bdevselement'),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'toggle'         => false,
				'default'        => 'top',
				'prefix_class'   => 'bdevs-ff-icon--',
				'style_transfer' => true,
			]
		);

		/*
		 * number section
		 */

		$this->add_control(
			'fun_factor_number',
			[
				'label'     => __('Number', 'bdevselement'),
				'type'      => Controls_Manager::TEXT,
				'default'   => '507',
				'dynamic'   => [
					'active' => true,
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'fun_factor_title',
			[
				'label'   => __('Title', 'bdevselement'),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __('bdevs Clients', 'bdevselement'),
			]
		);

		$this->add_control(
			'animate_number',
			[
				'label'        => __('Animate', 'bdevselement'),
				'description'  => __('Only number is animatable'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __('Yes', 'bdevselement'),
				'label_off'    => __('No', 'bdevselement'),
				'return_value' => 'yes',
				'separator'    => 'before',
				'default'      => 'yes'
			]
		);

		$this->add_control(
			'animate_duration',
			[
				'label'     => __('Duration', 'bdevselement'),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 100,
				'max'       => 10000,
				'step'      => 10,
				'default'   => 500,
				'condition' => [
					'animate_number!' => ''
				],
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();

		// options section in contents tab

		$this->start_controls_section(
			'_section_options',
			[
				'label' => __('Options', 'bdevselement'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __('Title HTML Tag', 'bdevselement'),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'title' => __('H1', 'bdevselement'),
						'icon'  => 'eicon-editor-h1'
					],
					'h2' => [
						'title' => __('H2', 'bdevselement'),
						'icon'  => 'eicon-editor-h2'
					],
					'h3' => [
						'title' => __('H3', 'bdevselement'),
						'icon'  => 'eicon-editor-h3'
					],
					'h4' => [
						'title' => __('H4', 'bdevselement'),
						'icon'  => 'eicon-editor-h4'
					],
					'h5' => [
						'title' => __('H5', 'bdevselement'),
						'icon'  => 'eicon-editor-h5'
					],
					'h6' => [
						'title' => __('H6', 'bdevselement'),
						'icon'  => 'eicon-editor-h6'
					]
				],
				'default' => 'h2',
				'toggle'  => false,
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label'       => __('Text Alignment', 'bdevselement'),
				'type'        => Controls_Manager::CHOOSE,
				'options'     => [
					'left'   => [
						'title' => __('Left', 'bdevselement'),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'bdevselement'),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __('Right', 'bdevselement'),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'toggle'      => true,
				'selectors'   => [
					'{{WRAPPER}} .bdevs-ff-container, {{WRAPPER}} .bdevs-fun-factor-image-section' => 'text-align: {{VALUE}};',
				],
				'default'     => 'center',
				'render_type' => 'template',
			]
		);

		$this->add_control(
			'divider_show_hide',
			[
				'label'        => __('Show Divider', 'bdevselement'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __('Show', 'bdevselement'),
				'label_off'    => __('Hide', 'bdevselement'),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'_section_style_icon_image',
			[
				'label' => __('Icon / Image', 'bdevselement'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label'      => __('Width', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => 150,
						'max' => 1024,
					],
					'%'  => [
						'min' => 30,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-image-section img'                                      => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bdevs-fun-factor-image-section, {{WRAPPER}} .bdevs-fun-factor-icon-section' => 'flex: 0 0 {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'media_type' => 'image',
				]
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label'      => __('Height', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => 150,
						'max' => 1024,
					],
					'%'  => [
						'min' => 30,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-image-section img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'media_type' => 'image',
				]
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label'           => __('Size (em)', 'bdevselement'),
				'type'            => Controls_Manager::SLIDER,
				'size_units'      => ['em'],
				'range'           => [
					'em' => [
						'min'  => 1,
						'max'  => 10,
						'step' => 1,
					],
				],
				'devices'         => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'unit' => 'em',
					'size' => 3,
				],
				'tablet_default'  => [
					'unit' => 'em',
					'size' => 2,
				],
				'mobile_default'  => [
					'unit' => 'em',
					'size' => 2,
				],
				'selectors'       => [
					'{{WRAPPER}} .bdevs-fun-factor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'media_type' => 'icon',
				],
				'render_type'     => 'template',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __('Icon Color', 'bdevselement'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-icon' => 'color: {{VALUE}};',
				],
				'condition' => [
					'media_type' => 'icon',
				],
			]
		);

		$this->add_responsive_control(
			'media_padding',
			[
				'label'      => __('Padding', 'bdevselement'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-image-section img, {{WRAPPER}} .bdevs-fun-factor-icon-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'media_border',
				'selector'  => '{{WRAPPER}} .bdevs-fun-factor-image-section img, {{WRAPPER}} .bdevs-fun-factor-icon-section',
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'media_border_radius',
			[
				'label'      => __('Border Radius', 'bdevselement'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-image-section img, {{WRAPPER}} .bdevs-fun-factor-icon-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'media_box_shadow',
				'selector' => '{{WRAPPER}} .bdevs-fun-factor-image-section img, {{WRAPPER}} .bdevs-fun-factor-icon-section',
			]
		);

		$this->add_responsive_control(
			'icon_image_bottom_spacing',
			[
				'label'     => __('Bottom Spacing', 'bdevselement'),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-icon-section, {{WRAPPER}} .bdevs-fun-factor-image-section' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label'     => __('Background Color', 'bdevselement'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-icon-section, {{WRAPPER}} .bdevs-fun-factor-image-section' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'media_type' => 'icon'
				]
			]
		);

		$this->add_control(
			'offset_toggle',
			[
				'label'        => __('Offset', 'bdevselement'),
				'type'         => Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => __('No', 'bdevselement'),
				'label_on'     => __('Yes', 'bdevselement'),
				'return_value' => 'yes',
			]
		);

		$this->start_popover();

		$this->add_responsive_control(
			'media_offset_x',
			[
				'label'      => __('Offset Left', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition'  => [
					'offset_toggle' => 'yes'
				],
				'range'      => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
			]
		);

		$this->add_responsive_control(
			'media_offset_y',
			[
				'label'      => __('Offset Top', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition'  => [
					'offset_toggle' => 'yes'
				],
				'range'      => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],

				'selectors' => [
					// Left image position styles
					'(desktop){{WRAPPER}}.bdevs-ff-icon--left .bdevs-fun-factor-content'                               => 'margin-left: {{media_offset_x.SIZE || 0}}{{UNIT}}; max-width: calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + (-1 * {{media_offset_x.SIZE || 0}}{{UNIT}}));',
					'(tablet){{WRAPPER}}.bdevs-ff-icon--left .bdevs-fun-factor-content'                                => 'margin-left: {{media_offset_x_tablet.SIZE || 0}}{{UNIT}}; max-width: calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + (-1 * {{media_offset_x_tablet.SIZE || 0}}{{UNIT}}));',
					'(mobile){{WRAPPER}}.bdevs-ff-icon--left .bdevs-fun-factor-content'                                => 'margin-left: {{media_offset_x_mobile.SIZE || 0}}{{UNIT}}; max-width: calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + (-1 * {{media_offset_x_mobile.SIZE || 0}}{{UNIT}}));',
					// Image right position styles
					'(desktop){{WRAPPER}}.bdevs-ff-icon--right .bdevs-fun-factor-content'                              => 'margin-right: calc(-1 * {{media_offset_x.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + {{media_offset_x.SIZE || 0}}{{UNIT}});',
					'(tablet){{WRAPPER}}.bdevs-ff-icon--right .bdevs-fun-factor-content'                               => 'margin-right: calc(-1 * {{media_offset_x_tablet.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + {{media_offset_x_tablet.SIZE || 0}}{{UNIT}});',
					'(mobile){{WRAPPER}}.bdevs-ff-icon--right .bdevs-fun-factor-content'                               => 'margin-right: calc(-1 * {{media_offset_x_mobile.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + {{media_offset_x_mobile.SIZE || 0}}{{UNIT}});',
					// Image translate styles
					'(desktop){{WRAPPER}} .bdevs-fun-factor-icon-section, {{WRAPPER}} .bdevs-fun-factor-image-section' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}});',
					'(tablet){{WRAPPER}} .bdevs-fun-factor-icon-section, {WRAPPER}} .bdevs-fun-factor-image-section'   => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}});',
					'(mobile){{WRAPPER}} .bdevs-fun-factor-icon-section, {{WRAPPER}} .bdevs-fun-factor-image-section'  => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}});',
					// Fun Factor body styles
					'{{WRAPPER}}.bdevs-ff-icon--top .bdevs-fun-factor-content'                                         => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_popover();

		$this->end_controls_section();

		/*
		 * Number section styling
		 */

		$this->start_controls_section(
			'_section_style_number_title',
			[
				'label' => __('Number & Title', 'bdevselement'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'     => __('Padding', 'bdevselement'),
				'type'      => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'fun_factor_number_heading',
			[
				'label' => __('Number', 'bdevselement'),
				'type'  => Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'fun_factor_number_bottom_spacing',
			[
				'label'      => __('Bottom Spacing', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-content-number' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'fun_factor_number_color',
			[
				'label'     => __('Color', 'bdevselement'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-content-number' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'number_typography',
				'label'    => __('Typography', 'bdevselement'),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bdevs-fun-factor-content-number',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'fun_factor_number_shadow',
				'label'    => __('Text Shadow', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevs-fun-factor-content-number',
			]
		);

		/*
		 * Title section
		 */

		$this->add_control(
			'content_title_heading_style',
			[
				'label'     => __('Title', 'bdevselement'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'fun_factor_content_bottom_spacing',
			[
				'label'      => __('Bottom Spacing', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-content-text' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'fun_factor_content_color',
			[
				'label'     => __('Color', 'bdevselement'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-content-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => __('Typography', 'bdevselement'),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bdevs-fun-factor-content-text',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'fun_factor_content_shadow',
				'label'    => __('Text Shadow', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevs-fun-factor-content-text',
			]
		);

		$this->end_controls_section();

		/*
		 * Divider style section
		 */
		$this->start_controls_section(
			'_section_divider',
			[
				'label'     => __('Divider', 'bdevselement'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'divider_show_hide' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'divider_width',
			[
				'label'      => __('Width', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range'      => [
					'%' => [
						'min' => 10,
						'max' => 100
					],
				],
				'default'    => [
					'unit' => '%'
				],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-divider' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'divider_height',
			[
				'label'      => __('Height', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'default'    => [
					'px' => 1
				],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-divider' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'divider_border_radius',
			[
				'label'     => __('Border Radius', 'bdevselement'),
				'type'      => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-divider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'     => __('Color', 'bdevselement'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-fun-factor-divider' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'divider_bottom_spacing',
			[
				'label'      => __('Bottom Spacing', 'bdevselement'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .bdevs-fun-factor-divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('fun_factor_number', 'class', 'bdevs-fun-factor-content-number');
		$number           = $settings['fun_factor_number'];
		$fun_factor_title = $settings['fun_factor_title'];

		if ($settings['animate_number']) {
			$data = [
				'toValue'  => intval($settings['fun_factor_number']),
				'duration' => intval($settings['animate_duration']),
			];
			$this->add_render_attribute('fun_factor_number', 'data-animation', wp_json_encode($data));
			$number = 0;
		}
		?>

		<div class="bdevs-ff-container">
            <?php if (!empty($settings['icons']['value'])) : ?>
                <div class="bdevs-fun-factor-icon-section">
                    <?php Icons_Manager::render_icon( $settings['icons'], ['aria-hidden' => 'true', 'class' => 'bdevs-fun-factor-icon'] ); ?>
                </div>
            <?php elseif ( $settings['image']['url'] || $settings['image']['id'] ) : ?>
                <div class="bdevs-fun-factor-image-section">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                </div>
            <?php endif; ?>

            <div class="bdevs-fun-factor-content">
                <p <?php $this->print_render_attribute_string( 'fun_factor_number' ); ?> ><?php echo esc_html( $number ); ?></p>
                <?php if ( 'yes' === $settings['divider_show_hide'] ) : ?>
                    <span class="bdevs-fun-factor-divider bdevs-fun-factor-divider-align-<?php echo esc_attr( $settings['text_align'] ); ?>"></span>
                <?php endif; ?>
                <?php printf( '<%1$s class="bdevs-fun-factor-content-text">%2$s</%1$s>',
                    tag_escape( $settings['title_tag'] ),
                    esc_html( $fun_factor_title )
                ); ?>
            </div>
        </div>
		<?php
	}
}
