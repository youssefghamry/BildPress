<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Css_Filter;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Logo_Grid extends BDevs_El_Widget {

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
        return 'logo_grid';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Logo Grid', 'bdevselement');
    }

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/logo-grid/';
	}

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-logo-grid';
    }

    public function get_keywords() {
        return ['logo', 'grid', 'brand', 'client'];
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            '_section_logo',
            [
                'label' => __( 'Logo Grid', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Logo', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => __('Website Url', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'show_external' => false,
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => __('Brand Name', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Brand Name', 'bdevselement'),
            ]
        );

        $this->add_control(
            'logo_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __( 'Grid Layout', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'box' => __( 'Box', 'bdevselement' ),
                    'border' => __( 'Border', 'bdevselement' ),
                    'tictactoe' => __( 'Tic Tac Toe', 'bdevselement' ),
                ],
                'default' => 'box',
                'prefix_class' => 'bdevs-logo-grid--',
                'style_transfer' => true,
            ]
        );

        $this->add_responsive_control(
            'columns',
            [
                'label' => __( 'Columns', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    2 => __( '2 Columns', 'bdevselement' ),
                    3 => __( '3 Columns', 'bdevselement' ),
                    4 => __( '4 Columns', 'bdevselement' ),
                    5 => __( '5 Columns', 'bdevselement' ),
                    6 => __( '6 Columns', 'bdevselement' ),
                ],
                'desktop_default' => 4,
                'tablet_default' => 2,
                'mobile_default' => 2,
                'prefix_class' => 'bdevs-logo-grid--col-%s',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_grid',
            [
                'label' => __( 'Grid', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-figure' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => __( 'Height', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 500,
                        'min' => 100,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-item' => 'height: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'grid_border_type',
            [
                'label' => __( 'Border Type', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'bdevselement' ),
                    'solid' => __( 'Solid', 'bdevselement' ),
                    'double' => __( 'Double', 'bdevselement' ),
                    'dotted' => __( 'Dotted', 'bdevselement' ),
                    'dashed' => __( 'Dashed', 'bdevselement' ),
                    'groove' => __( 'Groove', 'bdevselement' ),
                ],
                'default' => 'solid',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-item' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'grid_border_width',
            [
                'label' => __( 'Border Width', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border .bdevs-logo-grid-item' => 'border-right-width: {{grid_border_width.SIZE}}{{UNIT}}; border-bottom-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border .bdevs-logo-grid-item' => 'border-right-width: {{grid_border_width_tablet.SIZE}}{{UNIT}}; border-bottom-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border .bdevs-logo-grid-item' => 'border-right-width: {{grid_border_width_mobile.SIZE}}{{UNIT}}; border-bottom-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',

                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-2 .bdevs-logo-grid-item:nth-child(2n+1)' => 'border-left-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-3 .bdevs-logo-grid-item:nth-child(3n+1)' => 'border-left-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-4 .bdevs-logo-grid-item:nth-child(4n+1)' => 'border-left-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-5 .bdevs-logo-grid-item:nth-child(5n+1)' => 'border-left-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-6 .bdevs-logo-grid-item:nth-child(6n+1)' => 'border-left-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-2 .bdevs-logo-grid-item:nth-child(-n+2)' => 'border-top-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-3 .bdevs-logo-grid-item:nth-child(-n+3)' => 'border-top-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-4 .bdevs-logo-grid-item:nth-child(-n+4)' => 'border-top-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-5 .bdevs-logo-grid-item:nth-child(-n+5)' => 'border-top-width: {{grid_border_width.SIZE}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-6 .bdevs-logo-grid-item:nth-child(-n+6)' => 'border-top-width: {{grid_border_width.SIZE}}{{UNIT}};',

                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet2 .bdevs-logo-grid-item:nth-child(2n+1)' => 'border-left-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet3 .bdevs-logo-grid-item:nth-child(3n+1)' => 'border-left-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet4 .bdevs-logo-grid-item:nth-child(4n+1)' => 'border-left-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet5 .bdevs-logo-grid-item:nth-child(5n+1)' => 'border-left-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet6 .bdevs-logo-grid-item:nth-child(6n+1)' => 'border-left-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet2 .bdevs-logo-grid-item:nth-child(-n+2)' => 'border-top-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet3 .bdevs-logo-grid-item:nth-child(-n+3)' => 'border-top-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet4 .bdevs-logo-grid-item:nth-child(-n+4)' => 'border-top-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet5 .bdevs-logo-grid-item:nth-child(-n+5)' => 'border-top-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet6 .bdevs-logo-grid-item:nth-child(-n+6)' => 'border-top-width: {{grid_border_width_tablet.SIZE}}{{UNIT}};',

                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile2 .bdevs-logo-grid-item:nth-child(2n+1)' => 'border-left-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile3 .bdevs-logo-grid-item:nth-child(3n+1)' => 'border-left-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile4 .bdevs-logo-grid-item:nth-child(4n+1)' => 'border-left-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile5 .bdevs-logo-grid-item:nth-child(5n+1)' => 'border-left-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile6 .bdevs-logo-grid-item:nth-child(6n+1)' => 'border-left-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile2 .bdevs-logo-grid-item:nth-child(-n+2)' => 'border-top-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile3 .bdevs-logo-grid-item:nth-child(-n+3)' => 'border-top-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile4 .bdevs-logo-grid-item:nth-child(-n+4)' => 'border-top-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile5 .bdevs-logo-grid-item:nth-child(-n+5)' => 'border-top-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile6 .bdevs-logo-grid-item:nth-child(-n+6)' => 'border-top-width: {{grid_border_width_mobile.SIZE}}{{UNIT}};',

                    '{{WRAPPER}}.bdevs-logo-grid--tictactoe .bdevs-logo-grid-item' => 'border-top-width: {{SIZE}}{{UNIT}}; border-right-width: {{SIZE}}{{UNIT}};',

                    '{{WRAPPER}}.bdevs-logo-grid--box .bdevs-logo-grid-item' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'grid_border_type!' => 'none',
                ]
            ]
        );

        $this->add_control(
            'grid_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-item' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'grid_border_type!' => 'none',
                ]
            ]
        );

        $this->add_control(
            'grid_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-figure' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'grid_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}}.bdevs-logo-grid--border .bdevs-logo-grid-wrapper, {{WRAPPER}}.bdevs-logo-grid--box .bdevs-logo-grid-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}}.bdevs-logo-grid--border .bdevs-logo-grid-item:first-child' => 'border-top-left-radius: {{TOP}}{{UNIT}};',
                    '{{WRAPPER}}.bdevs-logo-grid--border .bdevs-logo-grid-item:last-child' => 'border-bottom-right-radius: {{BOTTOM}}{{UNIT}};',

                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-2 .bdevs-logo-grid-item:nth-child(2)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-2 .bdevs-logo-grid-item:nth-last-child(2)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-3 .bdevs-logo-grid-item:nth-child(3)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-3 .bdevs-logo-grid-item:nth-last-child(3)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-4 .bdevs-logo-grid-item:nth-child(4)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-4 .bdevs-logo-grid-item:nth-last-child(4)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-5 .bdevs-logo-grid-item:nth-child(5)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-5 .bdevs-logo-grid-item:nth-last-child(5)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-6 .bdevs-logo-grid-item:nth-child(6)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col-6 .bdevs-logo-grid-item:nth-last-child(6)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',

                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet2 .bdevs-logo-grid-item:nth-child(2)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet2 .bdevs-logo-grid-item:nth-last-child(2)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet3 .bdevs-logo-grid-item:nth-child(3)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet3 .bdevs-logo-grid-item:nth-last-child(3)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet4 .bdevs-logo-grid-item:nth-child(4)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet4 .bdevs-logo-grid-item:nth-last-child(4)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet5 .bdevs-logo-grid-item:nth-child(5)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet5 .bdevs-logo-grid-item:nth-last-child(5)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet6 .bdevs-logo-grid-item:nth-child(6)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--tablet6 .bdevs-logo-grid-item:nth-last-child(6)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',

                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile2 .bdevs-logo-grid-item:nth-child(2)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile2 .bdevs-logo-grid-item:nth-last-child(2)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile3 .bdevs-logo-grid-item:nth-child(3)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile3 .bdevs-logo-grid-item:nth-last-child(3)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile4 .bdevs-logo-grid-item:nth-child(4)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile4 .bdevs-logo-grid-item:nth-last-child(4)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile5 .bdevs-logo-grid-item:nth-child(5)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile5 .bdevs-logo-grid-item:nth-last-child(5)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile6 .bdevs-logo-grid-item:nth-child(6)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--border.bdevs-logo-grid--col--mobile6 .bdevs-logo-grid-item:nth-last-child(6)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',

                    // Tictactoe
                    '{{WRAPPER}}.bdevs-logo-grid--tictactoe .bdevs-logo-grid-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}}.bdevs-logo-grid--tictactoe .bdevs-logo-grid-item:first-child' => 'border-top-left-radius: {{TOP}}{{UNIT}};',
                    '{{WRAPPER}}.bdevs-logo-grid--tictactoe .bdevs-logo-grid-item:last-child' => 'border-bottom-right-radius: {{BOTTOM}}{{UNIT}};',

                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-2 .bdevs-logo-grid-item:nth-child(2)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-2 .bdevs-logo-grid-item:nth-last-child(2)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-3 .bdevs-logo-grid-item:nth-child(3)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-3 .bdevs-logo-grid-item:nth-last-child(3)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-4 .bdevs-logo-grid-item:nth-child(4)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-4 .bdevs-logo-grid-item:nth-last-child(4)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-5 .bdevs-logo-grid-item:nth-child(5)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-5 .bdevs-logo-grid-item:nth-last-child(5)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-6 .bdevs-logo-grid-item:nth-child(6)' => 'border-top-right-radius: {{grid_border_radius.RIGHT}}{{UNIT}};',
                    '(desktop+){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col-6 .bdevs-logo-grid-item:nth-last-child(6)' => 'border-bottom-left-radius: {{grid_border_radius.LEFT}}{{UNIT}};',

                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet2 .bdevs-logo-grid-item:nth-child(2)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet2 .bdevs-logo-grid-item:nth-last-child(2)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet3 .bdevs-logo-grid-item:nth-child(3)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet3 .bdevs-logo-grid-item:nth-last-child(3)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet4 .bdevs-logo-grid-item:nth-child(4)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet4 .bdevs-logo-grid-item:nth-last-child(4)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet5 .bdevs-logo-grid-item:nth-child(5)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet5 .bdevs-logo-grid-item:nth-last-child(5)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet6 .bdevs-logo-grid-item:nth-child(6)' => 'border-top-right-radius: {{grid_border_radius_tablet.RIGHT}}{{UNIT}};',
                    '(tablet){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--tablet6 .bdevs-logo-grid-item:nth-last-child(6)' => 'border-bottom-left-radius: {{grid_border_radius_tablet.LEFT}}{{UNIT}};',

                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile2 .bdevs-logo-grid-item:nth-child(2)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile2 .bdevs-logo-grid-item:nth-last-child(2)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile3 .bdevs-logo-grid-item:nth-child(3)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile3 .bdevs-logo-grid-item:nth-last-child(3)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile4 .bdevs-logo-grid-item:nth-child(4)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile4 .bdevs-logo-grid-item:nth-last-child(4)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile5 .bdevs-logo-grid-item:nth-child(5)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile5 .bdevs-logo-grid-item:nth-last-child(5)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile6 .bdevs-logo-grid-item:nth-child(6)' => 'border-top-right-radius: {{grid_border_radius_mobile.RIGHT}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.bdevs-logo-grid--tictactoe.bdevs-logo-grid--col--mobile6 .bdevs-logo-grid-item:nth-last-child(6)' => 'border-bottom-left-radius: {{grid_border_radius_mobile.LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'grid_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}}.bdevs-logo-grid--tictactoe .bdevs-logo-grid-wrapper, {{WRAPPER}}.bdevs-logo-grid--border .bdevs-logo-grid-wrapper, {{WRAPPER}}.bdevs-logo-grid--box .bdevs-logo-grid-item'
            ]
        );


        $this->start_controls_tabs(
            '_tabs_image_effects',
            [
                'separator' => 'before'
            ]
        );

        $this->start_controls_tab(
            '_tab_image_effects_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'image_opacity',
            [
                'label' => __( 'Opacity', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-figure img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters',
                'selector' => '{{WRAPPER}} .bdevs-logo-grid-figure img',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab( 'hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'image_opacity_hover',
            [
                'label' => __( 'Opacity', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-figure:hover img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters_hover',
                'selector' => '{{WRAPPER}} .bdevs-logo-grid-figure:hover img',
            ]
        );

        $this->add_control(
            'image_bg_hover_transition',
            [
                'label' => __( 'Transition Duration', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-logo-grid-figure:hover img' => 'transition-duration: {{SIZE}}s;',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __( 'Hover Animation', 'bdevselement' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
                'label_block' => true,
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( empty($settings['logo_list'] ) ) {
            return;
        }
        ?>

        <div class="bdevs-logo-grid-wrapper">
            <?php
            foreach ( $settings['logo_list'] as $index => $item ) :
                $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                $repeater_key = 'grid_item' . $index;
                $tag = 'div';
                $this->add_render_attribute( $repeater_key, 'class', 'bdevs-logo-grid-item' );

                if ( $item['link']['url'] ) {
                    $tag = 'a';
					$this->add_render_attribute( $repeater_key, 'class', 'bdevs-logo-grid-link' );

                    $this->add_render_attribute( $repeater_key, 'target', '_blank' );
                    $this->add_render_attribute( $repeater_key, 'rel', 'noopener' );
                    $this->add_render_attribute( $repeater_key, 'href', $item['link']['url'] );
                }
                ?>
                <<?php echo $tag; ?> <?php $this->print_render_attribute_string( $repeater_key ); ?>>
                    <figure class="bdevs-logo-grid-figure">
                    <?php if ( $image ) :
                            echo wp_get_attachment_image(
                                $item['image']['id'],
                                $settings['thumbnail_size'],
                                false,
                                [
                                    'class' => 'bdevs-logo-grid-img elementor-animation-' . esc_attr( $settings['hover_animation'] )
                                ]
                            );
                        else :
                            printf( '<img class="bdevs-logo-grid-img elementor-animation-%s" src="%s" alt="%s">',
                                esc_attr( $settings['hover_animation'] ),
                                Utils::get_placeholder_image_src(),
                                esc_attr( $item['name'] )
                                );
                        endif; ?>
                    </figure>
                </<?php echo $tag; ?>>
            <?php endforeach; ?>
        </div>

        <?php
    }
}
