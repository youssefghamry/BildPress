<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Slider extends BDevs_El_Widget {

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
        return 'slider';
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
        return __( 'Slider', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/slider/';
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
        return 'eicon-slider-full-screen';
    }

    public function get_keywords() {
        return [ 'slider', 'image', 'gallery', 'carousel' ];
    }

    protected function register_content_controls() {


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'bdevselement' ),
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
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                    'style_4' => __( 'Style 4', 'bdevselement' ),
                    'style_5' => __( 'Style 5', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'shape_switch',
            [
                'label' => __('Shape Show/Hide', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'condition' => [
                    'design_style' => ['style_1','style_2','style_3'],
                ],
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                    'style_4' => __( 'Style 4', 'bdevselement' ),
                    'style_5' => __( 'Style 5', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );         

        $repeater->add_control(
            'dot_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Dot Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_4'],
                ],
            ]
        );         

        $repeater->add_control(
            'circle_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Circle Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_4'],
                ],
            ]
        );        

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Sub Title', 'bdevselement' ),
                'default' => __( 'Subtitle', 'bdevselement' ),
                'placeholder' => __( 'Type subtitle here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1','style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                    

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'default' => __( 'Title Here', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __( 'Description', 'bdevselement' ),
                'default' => __( 'Here content', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        //button 
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3','style_4','style_5'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3','style_4','style_5'],
                ],  
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'button_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $repeater->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button_icon_position',
            [
                'label' => __( 'Icon Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // button 2
        $repeater->add_control(
            'button2_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button 2 Text',
                'placeholder' => __( 'Type button 2 text here', 'bdevselement' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button2_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'button2_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ],
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button2_icon!' => ''];
        } else {
            $repeater->add_control(
                'button2_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ],
                    'label_block' => true,
                ]
            );
            $condition_2 = ['button2_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button2_icon_position',
            [
                'label' => __( 'Icon Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition_2,
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button2_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition_2,
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        //end button

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

       $this->add_control(
            'ts_slider_autoplay',
            [
                'label' => esc_html__( 'Autoplay', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'bdevselement' ),
                'label_off' => esc_html__( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );

        $this->add_control(
            'ts_slider_speed',
            [
               'label' => esc_html__( 'Slider Speed', 'bdevselement' ),
               'type' => Controls_Manager::NUMBER,
               'placeholder' => esc_html__( 'Enter Slider Speed', 'bdevselement' ),
               'default' => '5000',
               // 'default' => 5000,
               'condition' => ["ts_slider_autoplay" => ['yes']],
            ]
          );

        $this->add_control(
        'ts_slider_nav_show',
            [
            'label' => esc_html__( 'Nav show', 'bdevselement' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'bdevselement' ),
            'label_off' => esc_html__( 'No', 'bdevselement' ),
            'return_value' => 'yes',
            'default' => 'yes'
            ]
        );
        $this->add_control(
         'ts_slider_dot_nav_show',
             [
             'label' => esc_html__( 'Dot nav', 'bdevselement' ),
             'type' => Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'bdevselement' ),
             'label_off' => esc_html__( 'No', 'bdevselement' ),
             'return_value' => 'yes',
             'default' => 'yes'
             ]
         );


        $this->end_controls_section();


    }


    // style tab
    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_overlay',
            [
                'label' => __( 'BG Color', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'slide_overlay_bg',
            [
                'label' => __( 'Slider Overlay BG Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sl-overlay::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'slide_shape_bg',
            [
                'label' => __( 'Slider Shape BG Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-circle-shape, {{WRAPPER}} .slider-circle-shape-sm' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title / Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        // Subtitle    
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );


        $this->end_controls_section();

        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-btn',
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
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        /** button 2 **/
        $this->start_controls_section(
            '_section_style_button2',
            [
                'label' => __( 'Button 2', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button2_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn-sec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .bdevs-btn-sec',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .bdevs-btn-sec',
            ]
        );

        $this->add_control(
            'button2_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn-sec' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button2_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-btn-sec',
            ]
        );

        $this->add_control(
            'hr2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button2' );

        $this->start_controls_tab(
            '_tab_button2_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button2_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn-sec' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn-sec' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button2_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button2_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn-sec:hover, {{WRAPPER}} .bdevs-btn-sec:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn-sec:hover, {{WRAPPER}} .bdevs-btn-sec:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // Navigation - Arrow
        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __( 'Position', 'bdevselement' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'bdevselement' ),
                'label_on' => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __( 'Vertical', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-prev, {{WRAPPER}} .owl-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __( 'Horizontal', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .owl-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .owl-prev, {{WRAPPER}} .owl-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-prev, {{WRAPPER}} .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .owl-prev, {{WRAPPER}} .owl-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-prev, {{WRAPPER}} .owl-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-prev:hover, {{WRAPPER}} .owl-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-prev:hover, {{WRAPPER}} .owl-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-prev:hover, {{WRAPPER}} .owl-prev:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __( 'Navigation - Dots', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_10'],
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __( 'Vertical Position', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __( 'Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs( '_tabs_dots' );
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __( 'Active', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        // ================
        $show_navigation   =   $settings["ts_slider_nav_show"]=="yes"?true:false;
        $auto_nav_slide    =   $settings['ts_slider_autoplay'];
        $dot_nav_show      =   $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =   $settings['ts_slider_speed'] ? $settings['ts_slider_speed'] : '5000';

        $slide_controls    = [
            'show_nav'=>$show_navigation, 
            'dot_nav_show'=>$dot_nav_show, 
            'auto_nav_slide'=>$auto_nav_slide, 
            'ts_slider_speed'=>$ts_slider_speed, 
        ];
   
        $slide_controls = \json_encode($slide_controls); 
        // ================


        if ( empty( $settings['slides'] ) ) {
            return;
        }

        ?>


        <?php if ( $settings['design_style'] === 'style_1' ): 
        // button
        $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn' );
        $this->add_render_attribute( 'button', 'data-animation', 'fadeInUp2' );
        $this->add_render_attribute( 'button', 'data-delay', '1.2s' );
        $this->add_render_attribute( 'button', 'data-duration', '.8s' );

        // button 2
        $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn-sec' );
        $this->add_render_attribute( 'button2', 'data-animation', 'fadeInUp2' );
        $this->add_render_attribute( 'button2', 'data-delay', '1.5s' );
        $this->add_render_attribute( 'button2', 'data-duration', '.8s' );
        ?>

        <section class="slider1">
            <div class="slider1__wrapper">
                <div class="slider1__active owl-carousel owl-theme" data-controls="<?php echo esc_attr($slide_controls); ?>">
                    <?php foreach ( $settings['slides'] as $slide ) :
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }
                    ?>
                    <div class="slider1__item slider1__height slider1__img-01 d-flex align-items-center justify-content-center">
                        <div class="slider-bg-img" data-background="<?php print esc_url($image); ?>"></div>
                        <?php if ( !empty($settings['shape_switch']) ): ?>
                            <div class="slider-circle-shape"></div>
                            <div class="slider-circle-shape-sm"></div>
                        <?php endif; ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="slider1__content slider-z-index bdevs-el-content">
                                        <?php if ( $slide['subtitle'] ) : ?>
                                        <div class="mmb-5 fix">
                                            <h3 data-animation="fadeInUp2" data-delay=".2s" data-duration="1.2s"
                                                class="bdevs-el-subtitle animated fadeInUp2"><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></h3>
                                        </div>
                                        <?php endif; ?>

                                        <?php if ( $slide['title'] ) : ?>
                                        <div class="mb-30 fix">
                                            <h2 data-animation="fadeInUp2" data-delay=".5s" data-duration="1.2s"
                                                class="animated fadeInUp2 bdevs-el-title">
                                                <?php echo bdevs_element_kses_basic( $slide['title'] ); ?>
                                            </h2>
                                        </div>
                                        <?php endif; ?>

                                        <?php if ( $slide['desc'] ) : ?>
                                        <div class="fix mb-20">
                                            <p data-animation="fadeInUp2" data-delay=".7s" data-duration="1.2s"
                                                class="animated fadeInUp2">
                                                <?php echo bdevs_element_kses_basic( $slide['desc'] ); ?>
                                            </p>
                                        </div>
                                        <?php endif; ?>

                                        <div class="fix pb-35">
                                            <!-- button one  -->
                                            <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s href="%3$s">%2$s</a>',
                                                    $this->get_render_attribute_string( 'button' ),
                                                    esc_html( $slide['button_text'] ),
                                                    esc_url($slide['button_link']['url'])
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ) :
                                                    $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn--icon-before' );
                                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                                    <?php
                                                else :
                                                    $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn--icon-after' );
                                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
                                                <?php
                                                endif;
                                            endif; ?> 

                                            <!-- button two  -->
                                            <?php if ( $slide['button2_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s href="%3$s">%2$s</a>',
                                                    $this->get_render_attribute_string( 'button2' ),
                                                    esc_html( $slide['button2_text'] ),
                                                    esc_url($slide['button2_link']['url'])
                                                    );
                                            elseif ( empty( $slide['button2_text'] ) && ( ! ( empty( $slide['button2_selected_icon'] ) || empty( $slide['button2_selected_icon']['value'] ) ) || ! empty( $slide['button2_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevselement_render_icon( $slide, 'button2_icon', 'button2_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button2_text'] && ( ! ( empty( $slide['button2_selected_icon'] ) || empty( $slide['button2_selected_icon']['value'] ) ) || ! empty( $slide['button2_icon'] ) ) ) :
                                                if ( $slide['button2_icon_position'] === 'before' ) :
                                                    $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn--icon-before' );
                                                    $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $slide['button2_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php bdevselement_render_icon( $slide, 'button_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button2_text; ?></a>
                                                    <?php
                                                else :
                                                    $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn--icon-after' );
                                                    $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $slide['button2_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php echo $button2_text; ?> <?php bdevselement_render_icon( $slide, 'button2_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
                                                <?php
                                                endif;
                                            endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ) : 
        // button
        $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn' );
        $this->add_render_attribute( 'button', 'data-animation', 'fadeInUp2' );
        $this->add_render_attribute( 'button', 'data-delay', '1.2s' );
        $this->add_render_attribute( 'button', 'data-duration', '.8s' );

        // button 2
        $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn-sec' );
        $this->add_render_attribute( 'button2', 'data-animation', 'fadeInUp2' );
        $this->add_render_attribute( 'button2', 'data-delay', '1.5s' );
        $this->add_render_attribute( 'button2', 'data-duration', '.8s' );
        ?>
        <section class="slider1 home2">
            <div class="slider1__wrapper">
                <div class="slider1__active owl-carousel owl-theme" data-controls="<?php echo esc_attr($slide_controls); ?>">
                    <?php 
                    foreach ( $settings['slides'] as $slide ) :

                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }                

                    ?>
                    <div class="slider1__item slider1__height slider1__img-03 d-flex align-items-center justify-content-center sl-overlay">
                        <div class="slider-bg-img" data-background="<?php print esc_url($image); ?>"></div>
                        <?php if ( !empty($settings['shape_switch']) ): ?>
                            <div class="slider-circle-shape slider-circle-shape-2"></div>
                            <div class="slider-circle-shape-sm slider-circle-shape-sm-2"></div>
                        <?php endif; ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="slider1__content slider-z-index bdevs-el-content">
                                        <?php if ( $slide['subtitle'] ) : ?>
                                        <div class="mmb-5 fix">
                                            <h3 data-animation="fadeInUp2" data-delay=".2s" data-duration="1.2s"
                                                class="bdevs-el-subtitle animated fadeInUp2"><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></h3>
                                        </div>
                                        <?php endif; ?>

                                        <?php if ( $slide['title'] ) : ?>
                                        <div class="mb-30 fix">
                                            <h2 data-animation="fadeInUp2" data-delay=".5s" data-duration="1.2s"
                                                class="animated fadeInUp2 bdevs-el-title">
                                                 <?php echo bdevs_element_kses_basic( $slide['title'] ); ?>
                                            </h2>
                                        </div>
                                        <?php endif; ?>

                                        <?php if ( $slide['desc'] ) : ?>
                                        <div class="fix mb-20">
                                            <p data-animation="fadeInUp2" data-delay=".7s" data-duration="1.2s"
                                                class="animated fadeInUp2">
                                                <?php echo bdevs_element_kses_basic( $slide['desc'] ); ?>
                                            </p>
                                        </div>
                                        <?php endif; ?>

                                        <div class="fix pb-35">
                                        <!-- button one  -->
                                        <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string( 'button' ),
                                                esc_html( $slide['button_text'] ),
                                                esc_url($slide['button_link']['url'])
                                                );
                                        elseif ( empty( $slide['button_text'] ) && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                        <?php elseif ( $slide['button_text'] && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) :
                                            if ( $slide['button_icon_position'] === 'before' ) :
                                                $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn--icon-before' );
                                                $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                                <?php
                                            else :
                                                $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn--icon-after' );
                                                $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
                                            <?php
                                            endif;
                                        endif; ?> 

                                        <!-- button two  -->
                                        <?php if ( $slide['button2_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string( 'button2' ),
                                                esc_html( $slide['button2_text'] ),
                                                esc_url($slide['button2_link']['url'])
                                                );
                                        elseif ( empty( $slide['button2_text'] ) && ( ! ( empty( $slide['button2_selected_icon'] ) || empty( $slide['button2_selected_icon']['value'] ) ) || ! empty( $slide['button2_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevselement_render_icon( $slide, 'button2_icon', 'button2_selected_icon' ); ?></a>
                                        <?php elseif ( $slide['button2_text'] && ( ! ( empty( $slide['button2_selected_icon'] ) || empty( $slide['button2_selected_icon']['value'] ) ) || ! empty( $slide['button2_icon'] ) ) ) :
                                            if ( $slide['button2_icon_position'] === 'before' ) :
                                                $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn--icon-before' );
                                                $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $slide['button2_text'] ) );
                                                ?>
                                                <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php bdevselement_render_icon( $slide, 'button_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button2_text; ?></a>
                                                <?php
                                            else :
                                                $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn--icon-after' );
                                                $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $slide['button2_text'] ) );
                                                ?>
                                                <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php echo $button2_text; ?> <?php bdevselement_render_icon( $slide, 'button2_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
                                            <?php
                                            endif;
                                        endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_3' ) : 
        // button
        $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn' );
        $this->add_render_attribute( 'button', 'data-animation', 'fadeInUp2' );
        $this->add_render_attribute( 'button', 'data-delay', '1.2s' );
        $this->add_render_attribute( 'button', 'data-duration', '.8s' );

        // button 2
        $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn-sec' );
        $this->add_render_attribute( 'button2', 'data-animation', 'fadeInUp2' );
        $this->add_render_attribute( 'button2', 'data-delay', '1.5s' );
        $this->add_render_attribute( 'button2', 'data-duration', '.8s' );
        ?>

        <div class="slider1">   
            <section class=" slider-active  owl-carousel owl-theme" data-controls="<?php echo esc_attr($slide_controls); ?>">    
                <?php foreach ( $settings['slides'] as $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                ?>    
                <div class="hero1 sl-overlay">
                    <div class="slider-bg-img" data-background="<?php print esc_url($image); ?>"></div>
                    <?php if ( !empty($settings['shape_switch']) ): ?>
                        <div class="slider-circle-shape slider-circle-shape-2"></div>
                        <div class="slider-circle-shape-sm slider-circle-shape-sm-2"></div>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2">
                                <div class="hero1__wrapper text-center hero1__height d-flex justify-content-center align-items-center">
                                    <div class="hero1__content bdevs-el-content slider-z-index">
                                        <?php if ( $slide['subtitle'] ) : ?>
                                        <h3 data-animation="fadeInUp2" data-delay=".2s" data-duration="1.2s" class="bdevs-el-subtitle animated fadeInUp2">  <?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></h3>
                                        <?php endif; ?>

                                        <?php if ( $slide['title'] ) : ?>
                                        <h2 data-animation="fadeInUp2" data-delay=".5s" data-duration="1.2s" class="bdevs-el-title animated fadeInUp2">
                                                <?php echo bdevs_element_kses_basic( $slide['title'] ); ?>
                                        </h2>
                                        <?php endif; ?>

                                        <?php if ( $slide['desc'] ) : ?>
                                        <p data-animation="fadeInUp2" data-delay=".7s" data-duration="1.2s" class="animated fadeInUp2">
                                            <?php echo bdevs_element_kses_basic( $slide['desc'] ); ?>
                                        </p>
                                        <?php endif; ?>
                                        <div class="fix mt-35">
                                            <!-- button one  -->
                                            <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s href="%3$s">%2$s</a>',
                                                    $this->get_render_attribute_string( 'button' ),
                                                    esc_html( $slide['button_text'] ),
                                                    esc_url($slide['button_link']['url'])
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ) :
                                                    $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn--icon-before' );
                                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                                    <?php
                                                else :
                                                    $this->add_render_attribute( 'button', 'class', 'site__btn1 animated fadeInUp2 mr-10 bdevs-btn--icon-after' );
                                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
                                                <?php
                                                endif;
                                            endif; ?> 

                                            <!-- button two  -->
                                            <?php if ( $slide['button2_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s href="%3$s">%2$s</a>',
                                                    $this->get_render_attribute_string( 'button2' ),
                                                    esc_html( $slide['button2_text'] ),
                                                    esc_url($slide['button2_link']['url'])
                                                    );
                                            elseif ( empty( $slide['button2_text'] ) && ( ! ( empty( $slide['button2_selected_icon'] ) || empty( $slide['button2_selected_icon']['value'] ) ) || ! empty( $slide['button2_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevselement_render_icon( $slide, 'button2_icon', 'button2_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button2_text'] && ( ! ( empty( $slide['button2_selected_icon'] ) || empty( $slide['button2_selected_icon']['value'] ) ) || ! empty( $slide['button2_icon'] ) ) ) :
                                                if ( $slide['button2_icon_position'] === 'before' ) :
                                                    $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn--icon-before' );
                                                    $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $slide['button2_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php bdevselement_render_icon( $slide, 'button_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button2_text; ?></a>
                                                    <?php
                                                else :
                                                    $this->add_render_attribute( 'button2', 'class', 'site__btn2 animated fadeInUp2 d-none d-sm-inline-block bdevs-btn--icon-after' );
                                                    $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $slide['button2_text'] ) );
                                                    ?>
                                                    <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php echo $button2_text; ?> <?php bdevselement_render_icon( $slide, 'button2_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
                                                <?php
                                                endif;
                                            endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
        </div>         


        <?php elseif ( $settings['design_style'] === 'style_4' ) :

        $this->add_render_attribute( 'button', 'class', 'site__btn4 bdevs-btn' );
        $this->add_render_attribute( 'button', 'data-animation', 'fadeInUp2' );
        $this->add_render_attribute( 'button', 'data-delay', '.7s' );

        ?>

        <div class="slider-architect slider-active owl-carousel">
            <?php foreach ( $settings['slides'] as $slide ) :
                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $slide['image']['url'];
                }                
                $dot_image = wp_get_attachment_image_url( $slide['dot_image']['id'], $settings['thumbnail_size'] );
                if ( ! $dot_image ) {
                    $dot_image = $slide['dot_image']['url'];
                }                
                $circle_image = wp_get_attachment_image_url( $slide['circle_image']['id'], $settings['thumbnail_size'] );
                if ( ! $circle_image ) {
                    $circle_image = $slide['circle_image']['url'];
                }
            ?> 
            <div class="slider2__height d-flex align-items-center justify-content-center">
                <div class="slider-bg-img" data-background="<?php print esc_url($image); ?>">
                    
                </div>

                <?php if ( !empty($dot_image) ) : ?>
                <div class="slider-dot">
                    <img src="<?php print esc_url($dot_image); ?>" alt="Dot Image">
                </div>
                <?php endif; ?>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-9">
                            <div class="slider-architect-content pt-80 p-relative">
                                <?php if ( !empty($circle_image) ) : ?>
                                <div class="sl-arc-circle">
                                    <img src="<?php print esc_url($circle_image); ?>" alt="Circle Image">
                                </div>
                                <?php endif; ?>

                                <?php if ( $slide['title'] ) : ?>
                                    <h1 class="slider-architect-title mb-30" data-animation="fadeInUp2" data-delay=".3s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                <?php endif; ?>

                                <?php if ( $slide['desc'] ) : ?>
                                <p class="pr-170 mb-45" data-animation="fadeInUp2" data-delay=".5s"><?php echo bdevs_element_kses_basic( $slide['desc'] ); ?></p>
                                <?php endif; ?>

                                <?php if ( $slide['button_text'] ) : ?>
                                <div class="slider-oil-btn" data-animation="fadeInUp2" data-delay=".7s">
                                    <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string( 'button' ),
                                                esc_html( $slide['button_text'] ),
                                                esc_url($slide['button_link']['url'])
                                                );
                                        elseif ( empty( $slide['button_text'] ) && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                        <?php elseif ( $slide['button_text'] && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) :
                                            if ( $slide['button_icon_position'] === 'before' ) :

                                                $button_text = sprintf( '%2$s', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                                <?php
                                            else :
                                                
                                                $button_text = sprintf( '%2$s', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                ?>
                                                <a href="<?php echo esc_url($slide['button_link']['url']); ?>" <?php $this->print_render_attribute_string( 'button' ); ?>>
                                                    <?php echo $button_text; ?> 
                                                    <span class="site__btn4-icon">
                                                    <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                                    <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                                    </span>
                                                        
                                                </a>
                                            <?php
                                            endif;
                                    endif; ?> 
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>


        <?php elseif ( $settings['design_style'] === 'style_5' ) :

        $this->add_render_attribute( 'button', 'class', 'site__btn4 bdevs-btn' );

        ?>

        <div class="slider-active2 owl-carousel">
            <?php foreach ( $settings['slides'] as $slide ) :
                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $slide['image']['url'];
                }
            ?>
            <div class="slider2__height d-flex align-items-center justify-content-center">
                <div class="slider-bg-img" data-background="<?php print esc_url($image); ?>"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 col-md-9">
                            <div class="slider-oil-content pt-80 p-relative">
                                <?php if ( $slide['title'] ) : ?>
                                    <h1 class="slider-oil-title mb-35" data-animation="fadeInUp2" data-delay=".3s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                <?php endif; ?>

                                <?php if ( $slide['desc'] ) : ?>
                                    <p class="pr-100 mb-50" data-animation="fadeInUp2" data-delay=".5s"><?php echo bdevs_element_kses_basic( $slide['desc'] ); ?></p>
                                <?php endif; ?>

                                <?php if ( $slide['button_text'] ) : ?>
                                <div class="slider-oil-btn" data-animation="fadeInUp2" data-delay=".7s">
                                    <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string( 'button' ),
                                                esc_html( $slide['button_text'] ),
                                                esc_url($slide['button_link']['url'])
                                                );
                                        elseif ( empty( $slide['button_text'] ) && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                        <?php elseif ( $slide['button_text'] && ( ! ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || ! empty( $slide['button_icon'] ) ) ) :
                                            if ( $slide['button_icon_position'] === 'before' ) :

                                                $button_text = sprintf( '%2$s', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                                <?php
                                            else :
                                                
                                                $button_text = sprintf( '%2$s', $this->get_render_attribute_string( 'button_text' ), esc_html( $slide['button_text'] ) );
                                                ?>
                                                <a href="<?php echo esc_url($slide['button_link']['url']); ?>" <?php $this->print_render_attribute_string( 'button' ); ?>>
                                                    <?php echo $button_text; ?> 
                                                    <span class="site__btn4-icon">
                                                    <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                                    <?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                                    </span>
                                                        
                                                </a>
                                            <?php
                                        endif;
                                    endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php endif; ?>

        <?php
    }
}
