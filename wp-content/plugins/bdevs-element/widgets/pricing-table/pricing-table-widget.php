<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Utils;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;

defined( 'ABSPATH' ) || die();

class Pricing_Table extends BDevs_El_Widget {

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
        return 'pricing_table';
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
        return __( 'Pricing Table', 'bdevselement' );
    }

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/pricing-table/';
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
        return 'eicon-table-of-contents';
    }

    public function get_keywords() {
        return [ 'pricing', 'price', 'table', 'package', 'product', 'plan' ];
    }

	protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' )
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();    

        $this->start_controls_section(
            '_section_media',
            [
                'label' => __( 'Icon / Image', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevselement' ),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } 
        else {
            $this->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $this->add_control(
            'bg_image',
            [
                'label' => __( 'BG Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'show_bg_image',
            [
                'label' => __( 'Hide Overlay', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'bdevselement' ),
                'label_off' => __( 'Hide', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'no',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'_section_header',
			[
				'label' => __( 'Header', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Basic', 'bdevselement' ),
                'dynamic' => [
                    'active' => true
                ]
            ]
        ); 

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );        

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'description', 'bdevselement' ),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_pricing',
            [
                'label' => __( 'Pricing', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __( 'Currency', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    '' => __( 'None', 'bdevselement' ),
                    'baht' => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'bdevselement' ),
                    'bdt' => '&#2547; ' . _x( 'BD Taka', 'Currency Symbol', 'bdevselement' ),
                    'dollar' => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'bdevselement' ),
                    'euro' => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'bdevselement' ),
                    'franc' => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'bdevselement' ),
                    'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'bdevselement' ),
                    'krona' => 'kr ' . _x( 'Krona', 'Currency Symbol', 'bdevselement' ),
                    'lira' => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'bdevselement' ),
                    'peseta' => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'bdevselement' ),
                    'peso' => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'bdevselement' ),
                    'pound' => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'bdevselement' ),
                    'real' => 'R$ ' . _x( 'Real', 'Currency Symbol', 'bdevselement' ),
                    'ruble' => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'bdevselement' ),
                    'rupee' => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'bdevselement' ),
                    'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', 'bdevselement' ),
                    'shekel' => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'bdevselement' ),
                    'won' => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'bdevselement' ),
                    'yen' => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'bdevselement' ),
                    'custom' => __( 'Custom', 'bdevselement' ),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_custom',
            [
                'label' => __( 'Custom Symbol', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency' => 'custom',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => '9.99',
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'period',
            [
                'label' => __( 'Period', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Per Month', 'bdevselement' ),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features',
            [
                'label' => __( 'Features', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'features_title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Features', 'bdevselement' ),
                'separator' => 'after',
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'features_switch',
            [
                'label' => __( 'Show', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'bdevselement' ),
                'label_off' => __( 'Hide', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Exciting Feature', 'bdevselement' ),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => false,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-check',
                    'include' => [
                        'fa fa-check',
                        'fa fa-close',
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'fa-solid',
                    ],
                    'recommended' => [
                        'fa-regular' => [
                            'check-square',
                            'window-close',
                        ],
                        'fa-solid' => [
                            'check',
                        ]
                    ]
                ]
            );
        }

        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'text' => __( 'Standard Feature', 'bdevselement' ),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => __( 'Another Great Feature', 'bdevselement' ),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => __( 'Obsolete Feature', 'bdevselement' ),
                        'icon' => 'fa fa-close',
                    ],
                    [
                        'text' => __( 'Exciting Feature', 'bdevselement' ),
                        'icon' => 'fa fa-check',
                    ],
                ],
                'title_field' => '<# print(bdevs_element_get_feature_label(text)); #>',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_footer',
            [
                'label' => __( 'Footer', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Subscribe', 'bdevselement' ),
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_badge',
            [
                'label' => __( 'Badge', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'show_badge',
            [
                'label' => __( 'Show', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'bdevselement' ),
                'label_off' => __( 'Hide', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );        

        $this->add_control(
            'badge_position',
            [
                'label' => __( 'Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'left',
                'style_transfer' => true,
                'condition' => [
                    'show_badge' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => __( 'Badge Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Recommended', 'bdevselement' ),
                'placeholder' => __( 'Type badge text', 'bdevselement' ),
                'condition' => [
                    'show_badge' => 'yes'
                ],
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_general',
            [
                'label' => __( 'General', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-title,'
                    . '{{WRAPPER}} .bdevselement-pricing-table-currency,'
                    . '{{WRAPPER}} .bdevselement-pricing-table-period,'
                    . '{{WRAPPER}} .bdevselement-pricing-table-features-title,'
                    . '{{WRAPPER}} .bdevselement-pricing-table-features-list li,'
                    . '{{WRAPPER}} .bdevselement-pricing-table-price-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_header',
            [
                'label' => __( 'Header', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_pricing',
            [
                'label' => __( 'Pricing', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_heading_price',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Price', 'bdevselement' ),
            ]
        );

        $this->add_responsive_control(
            'price_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-price-tag' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-price-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-price-text',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_control(
            '_heading_currency',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Currency', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'currency_spacing',
            [
                'label' => __( 'Side Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-currency' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'currency_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-currency' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'currency_typography',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-currency',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_control(
            '_heading_period',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Period', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'period_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'period_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-period' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'period_typography',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-period',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_features',
            [
                'label' => __( 'Features', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'features_container_spacing',
            [
                'label' => __( 'Container Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-body' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_features_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'features_title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-features-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-features-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-features-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_features_list',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'List', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'features_list_spacing',
            [
                'label' => __( 'Spacing Between', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-features-list > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_list_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-features-list > li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_list_typography',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-features-list > li',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_footer',
            [
                'label' => __( 'Footer', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_heading_button',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Button', 'bdevselement' ),
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-btn',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-btn:hover, {{WRAPPER}} .bdevselement-pricing-table-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-btn:hover, {{WRAPPER}} .bdevselement-pricing-table-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-btn:hover, {{WRAPPER}} .bdevselement-pricing-table-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => __( 'Badge', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'badge_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'badge_border',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-badge',
            ]
        );

        $this->add_responsive_control(
            'badge_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-pricing-table-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow',
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-badge',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => __( 'Typography', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .bdevselement-pricing-table-badge',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }

    private static function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'badge_text', 'class',
            [
                'bdevselement-pricing-table-badge',
                'bdevselement-pricing-table-badge--' . $settings['badge_position']
            ]
        );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'bdevselement-pricing-table-title title' );
        $this->add_render_attribute( 'sub_title', 'class', 'bdevselement-pricing-table-title psub_title' );

        $this->add_inline_editing_attributes( 'price', 'basic' );
        $this->add_render_attribute( 'price', 'class', 'bdevselement-pricing-table-price-text price' );

        $this->add_inline_editing_attributes( 'period', 'basic' );
        $this->add_render_attribute( 'period', 'class', 'bdevselement-pricing-table-period duration' );

        $this->add_inline_editing_attributes( 'features_title', 'basic' );
        $this->add_render_attribute( 'features_title', 'class', 'bdevselement-pricing-table-features-title' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', 'site__btn3' );   
        $this->add_link_attributes( 'button_text', $settings['button_link'] );       

        $this->add_inline_editing_attributes( 'button_text2', 'none' );
        $this->add_render_attribute( 'button_text2', 'class', 'site__btn3 pricing__btn' );        
        $this->add_link_attributes( 'button_text2', $settings['button_link'] );

        if ( $settings['currency'] === 'custom' ) {
            $currency = $settings['currency_custom'];
        } else {
            $currency = self::get_currency_symbol( $settings['currency'] );
        }

        ?>

        <?php if ( $settings['design_style'] === 'style_1' ): 
            // bg_image
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
            if ( ! $bg_image ) {
                $bg_image = !empty($slide['bg_image']['url']) ? $slide['bg_image']['url'] : '';
            }

            $price_active_class = !empty($settings['show_bg_image']) ? 'pricing__middle' : 'no-overlay';
            $price_overlay_active = !empty($settings['show_bg_image']) ? "data-overlay='94'" : "data-overlay='0'";              
        ?>

        <div class="pricing__item text-center <?php echo esc_attr( $price_active_class ); ?>" data-background="<?php echo esc_url( $bg_image ); ?>">
            <div class="pricing__data mb-35">
                <?php if ( $settings['sub_title'] ) : ?>
                    <h5 <?php $this->print_render_attribute_string( 'sub_title' ); ?>>
                        <?php echo bdevs_element_kses_basic( $settings['sub_title'] ); ?>
                    </h5>
                <?php endif; ?>

                <?php if ( $settings['title'] ) : ?>
                    <h4 <?php $this->print_render_attribute_string( 'title' ); ?>>
                        <?php echo bdevs_element_kses_basic( $settings['title'] ); ?>
                    </h4>
                <?php endif; ?>

                <?php if ( $settings['description'] ) : ?>
                <p><?php echo bdevs_element_kses_basic( $settings['description'] ); ?></p>
                <?php endif; ?>
            </div>
            <div class="pricing__thumb">
                <?php if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
                $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                ?>
                <figure class="bdevs-infobox-figure bdevs-infobox-figure--image">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                </figure>
                <?php elseif ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
                    <figure class="bdevs-infobox-figure bdevs-infobox-figure--icon">
                        <?php bdevs_element_render_icon( $settings, 'icon', 'selected_icon' ); ?>
                    </figure>
                <?php endif; ?>
            </div>

            <div class="pricing-list mb-40">
                <?php if ( $settings['features_title'] ) : ?>
                    <h3 <?php $this->print_render_attribute_string( 'features_title' ); ?>>
                        <b><u><?php echo bdevs_element_kses_basic( $settings['features_title'] ); ?></u></b>
                    </h3>
                <?php endif; ?>

                <?php if (  !empty($settings['features_switch']) ) : ?>
                    <ul class="pricing-item">
                        <?php foreach ( $settings['features_list'] as $index => $feature ) :
                            $name_key = $this->get_repeater_setting_key( 'text', 'features_list', $index );
                            $this->add_inline_editing_attributes( $name_key, 'intermediate' );
                            $this->add_render_attribute( $name_key, 'class', 'bdevselement-pricing-table-feature-text' );
                            ?>
                            <li class="<?php echo esc_attr( 'elementor-repeater-item-' . $feature['_id'] ); ?>">
                                <span <?php $this->print_render_attribute_string( $name_key ); ?>><?php echo bdevs_element_kses_intermediate( $feature['text'] ); ?></span>
                                <?php if ( ! empty( $feature['icon'] ) || ! empty( $feature['selected_icon']['value'] ) ) :
                                    bdevs_element_render_icon( $feature, 'icon', 'selected_icon' );
                                endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="pricing__content">
                <div class="pricing__data">
                    <h3 <?php $this->print_render_attribute_string( 'price' ); ?>>
                        <span class="bdevs-pricing-table-currency"><?php echo esc_html( $currency ); ?></span><?php echo bdevs_element_kses_basic( $settings['price'] ); ?>
                    </h3>
                    <?php if ( $settings['period'] ) : ?>
                        <h6 <?php $this->print_render_attribute_string( 'period' ); ?>>
                            <?php echo bdevs_element_kses_basic( $settings['period'] ); ?>
                        </h6>
                    <?php endif; ?>
                </div>
                <?php if ( $settings['button_text'] ) : ?>
                    <div class="pricing-button">
                        <a <?php $this->print_render_attribute_string( 'button_text' ); ?>>
                            <?php echo esc_html( $settings['button_text'] ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php elseif ( $settings['design_style'] === 'style_2' ): 
            // bg_image
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
            if ( ! $bg_image ) {
                $bg_image = !empty($slide['bg_image']['url']) ? $slide['bg_image']['url'] : '';
            }
            
            $price_active_class = !empty($settings['show_bg_image']) ? 'pricing__middle' : 'no-overlay';              
        ?>

        <div class="pricing__item text-center pricing__item_color <?php echo esc_attr( $price_active_class ); ?>" data-background="<?php echo esc_url( $bg_image ); ?>">
            <div class="pricing__data mb-35">
                <?php if ( $settings['sub_title'] ) : ?>
                    <h5 <?php $this->print_render_attribute_string( 'sub_title' ); ?>>
                        <?php echo bdevs_element_kses_basic( $settings['sub_title'] ); ?>
                    </h5>
                <?php endif; ?>

                <?php if ( $settings['title'] ) : ?>
                    <h4 <?php $this->print_render_attribute_string( 'title' ); ?>>
                        <?php echo bdevs_element_kses_basic( $settings['title'] ); ?>
                    </h4>
                <?php endif; ?>

                <?php if ( $settings['description'] ) : ?>
                <p><?php echo bdevs_element_kses_basic( $settings['description'] ); ?></p>
                <?php endif; ?>
            </div>
            <div class="pricing__thumb">
                <?php if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
                $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                ?>
                <figure class="bdevs-infobox-figure bdevs-infobox-figure--image">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                </figure>
                <?php elseif ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
                    <figure class="bdevs-infobox-figure bdevs-infobox-figure--icon">
                        <?php bdevs_element_render_icon( $settings, 'icon', 'selected_icon' ); ?>
                    </figure>
                <?php endif; ?>
            </div>

            <div class="pricing-list mb-40">
                <?php if ( $settings['features_title'] ) : ?>
                    <h3 <?php $this->print_render_attribute_string( 'features_title' ); ?>>
                        <b><u><?php echo bdevs_element_kses_basic( $settings['features_title'] ); ?></u></b>
                    </h3>
                <?php endif; ?>

                <?php if (  !empty($settings['features_switch']) ) : ?>
                    <ul class="pricing-item">
                        <?php foreach ( $settings['features_list'] as $index => $feature ) :
                            $name_key = $this->get_repeater_setting_key( 'text', 'features_list', $index );
                            $this->add_inline_editing_attributes( $name_key, 'intermediate' );
                            $this->add_render_attribute( $name_key, 'class', 'bdevselement-pricing-table-feature-text' );
                            ?>
                            <li class="<?php echo esc_attr( 'elementor-repeater-item-' . $feature['_id'] ); ?>">
                                <span <?php $this->print_render_attribute_string( $name_key ); ?>><?php echo bdevs_element_kses_intermediate( $feature['text'] ); ?></span>
                                <?php if ( ! empty( $feature['icon'] ) || ! empty( $feature['selected_icon']['value'] ) ) :
                                    bdevs_element_render_icon( $feature, 'icon', 'selected_icon' );
                                endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="pricing__content">  
                <div class="pricing__data">
                    <h3 <?php $this->print_render_attribute_string( 'price' ); ?>>
                        <span class="bdevs-pricing-table-currency"><?php echo esc_html( $currency ); ?></span><?php echo bdevs_element_kses_basic( $settings['price'] ); ?>
                    </h3>
                    <?php if ( $settings['period'] ) : ?>
                        <h6 <?php $this->print_render_attribute_string( 'period' ); ?>>
                            <?php echo bdevs_element_kses_basic( $settings['period'] ); ?>
                        </h6>
                    <?php endif; ?>
                </div>
                <?php if ( $settings['button_text'] ) : ?>
                    <div class="pricing-button">
                        <a <?php $this->print_render_attribute_string( 'button_text2' ); ?>>
                            <?php echo esc_html( $settings['button_text'] ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <?php endif; ?>

        <?php
    }
}
