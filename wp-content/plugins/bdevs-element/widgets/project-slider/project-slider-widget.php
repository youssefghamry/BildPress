<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;

defined( 'ABSPATH' ) || die();

class Project_Slider extends BDevs_El_Widget {

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
        return 'project_slider';
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
        return __( 'Project Slider', 'bdevselement' );
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
        return 'eicon-gallery-grid';
    }

    public function get_keywords() {
        return [ 'slider', 'image', 'gallery', 'project' ];
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

        $this->end_controls_section();   

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_5']
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs Info Box Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs info box description goes here', 'bdevselement' ),
                'placeholder' => __( 'Type info box description', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );       
        
        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevselement' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();  

        // Project List
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Project List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
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

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'field_condition' => ['style_1','style_2']
                    ],
                 
                ]
            );
        } 
        else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'condition' => [
                        'field_condition' => ['style_1','style_2']
                    ],
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ]
                ]
            );
        }

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
            'sub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type subtitle here', 'bdevselement' ),
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
                'default' => __( 'Item List', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );  

        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __( 'Description', 'bdevselement' ),
                'default' => __( 'Item Description', 'bdevselement' ),
                'placeholder' => __( 'Type description here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );           

        $repeater->add_control(
            'user',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'User', 'bdevselement' ),
                'default' => __( 'User', 'bdevselement' ),
                'placeholder' => __( 'Type user here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1','style_2']
                ]
            ]
        );         

        $repeater->add_control(
            'time',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Time', 'bdevselement' ),
                'default' => __( 'Item Time', 'bdevselement' ),
                'placeholder' => __( 'Type Time here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1','style_2']
                ]
            ]
        );               

        $repeater->add_control(
            'slider_number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Slider Number', 'bdevselement' ),
                'default' => __( '01', 'bdevselement' ),
                'placeholder' => __( 'Type Slider Nember Here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_5']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );  

        $repeater->add_control(
            'slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'URL', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Type url here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1','style_4']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        //button 
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_4'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Button Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_4'],
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

        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_5']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Button Text', 'bdevselement' ),
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'http://elementor.bdevs.net/', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
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
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
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
                'default' => 'after',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
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
            'animation_speed',
            [
                'label' => __( 'Animation Speed', 'bdevselement' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __( 'Slide speed in milliseconds', 'bdevselement' ),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed', 'bdevselement' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __( 'Autoplay speed in milliseconds', 'bdevselement' ),
                'condition' => [
                    'autoplay' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Infinite Loop?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __( 'Vertical Mode?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __( 'Navigation', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'bdevselement' ),
                    'arrow' => __( 'Arrow', 'bdevselement' ),
                    'dots' => __( 'Dots', 'bdevselement' ),
                    'both' => __( 'Arrow & Dots', 'bdevselement' ),
                ],
                'default' => 'arrow',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls() {
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
                    '{{WRAPPER}} .bdevs-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
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
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // $title = bdevs_element_kses_basic( $settings['title' ] );

        if ( empty( $settings['slides'] ) ) {
            return;
        }


        ?>

        <?php if ( $settings['design_style'] === 'style_1' ): ?>
        <section class="projects1">
            <div class="projects1__wrapper position-relative">
                <div class="content_box_pot_120 p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="projects1__carousel owl-carousel">
                                    <?php foreach ( $settings['slides'] as $slide ) : 
                                        // image
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                        if ( ! $image ) {
                                            $image = $slide['image']['url'];
                                        }
                                    ?>                                    
                                    <div class="projects1__item">
                                        <?php if ( !empty($image) ) : ?>
                                        <div class="projects1__thumb">
                                            <a class="popup-image" href="<?php print esc_url($image); ?>"><img src="<?php print esc_url($image); ?>" alt="Project Image"></a>
                                        </div>
                                        <?php endif; ?>
                                        <div class="projects1__content bdevs-el-content">
                                            <?php if ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?> 
                                            <div class="projects1__content--icon">
                                                <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                            </div>
                                            <?php endif; ?>
                                            <div class="projects1__content--text">
                                                <div class="projects1__content--title">
                                                    <?php if ( $slide['sub_title'] ) : ?>    
                                                    <h5 class="bdevs-el-subtitle"><a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['sub_title'] ); ?></a></h5>
                                                    <?php endif; ?>

                                                    <?php if ( $slide['title'] ) : ?>
                                                    <h2 class="bdevs-el-title"><a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h2>
                                                    <?php endif; ?>

                                                </div>
                                                <?php if ( $slide['description'] ) : ?>
                                                <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                                <?php endif; ?>
                                                <div class="projects1__content--data">
                                                    <?php if ( $slide['user'] ) : ?>
                                                    <span>
                                                        <i class="far fa-user"></i> 
                                                        <a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['user'] ); ?></a>
                                                    </span>
                                                    <?php endif; ?>

                                                    <?php if ( $slide['time'] ) : ?>
                                                    <span>
                                                        <i class="far fa-clock"></i> 
                                                        <a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['time'] ); ?></a>
                                                    </span>
                                                    <?php endif; ?>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ) : ?>
        <section class="projects1 other_page2">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $slide ) : 
                        // image
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }
                    ?>   
                    <div class="col-lg-6">
                        <div class="projects1__item mb-50">
                            <?php if ( !empty($image) ) : ?>
                            <div class="projects1__thumb">
                                <a class="popup-image" href="<?php print esc_url($image); ?>"><img src="<?php print esc_url($image); ?>" alt="Project Image"></a>
                            </div>
                            <?php endif; ?>
                            <div class="projects1__content bdevs-el-content">
                                <?php if ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?> 
                                <div class="projects1__content--icon">
                                    <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                </div>
                                <?php endif; ?>
                                <div class="projects1__content--text">
                                    <div class="projects1__content--title">
                                        <?php if ( $slide['sub_title'] ) : ?>    
                                        <h5 class="bdevs-el-subtitle"><a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['sub_title'] ); ?></a></h5>
                                        <?php endif; ?>

                                        <?php if ( $slide['title'] ) : ?>
                                        <h2 class="bdevs-el-title"><a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h2>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( $slide['description'] ) : ?>
                                        <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                    <?php endif; ?>
                                    <div class="projects1__content--data">
                                        <?php if ( $slide['user'] ) : ?>
                                        <span>
                                            <i class="far fa-user"></i> 
                                            <a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['user'] ); ?></a>
                                        </span>
                                        <?php endif; ?>

                                        <?php if ( $slide['time'] ) : ?>
                                        <span>
                                            <i class="far fa-clock"></i> 
                                            <a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['time'] ); ?></a>
                                        </span>
                                        <?php endif; ?>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>    
                </div>
            </div>
        </section>
       
        <?php elseif ( $settings['design_style'] === 'style_3' ) : ?>
        <section class="portfolio-area ">
            <div class="containers">
               <div class="portfolio-full-slide owl-carousel">
                    <?php foreach ( $settings['slides'] as $slide ) : 
                        // image
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }
                        $title = bdevs_element_kses_basic( $slide['title' ] );
                    ?> 
                    <div class="port-full-item">
                        <div class="tportfolio">

                            <div class="tportfolio__img">
                                <?php if ( !empty($image) ) : ?>
                                <a class="popup-image" href="<?php print esc_url($image); ?>" data-fancybox="gallery">
                                    <img src="<?php print esc_url($image); ?>" alt="Project Image">
                                </a>
                                <?php endif; ?>

                                <div class="portfolio-plus">
                                   <a class="popup-image" href="<?php print esc_url($image); ?>">
                                      <i class="fal fa-plus"></i>
                                  </a>
                                </div>

                                <div class="tportfolio__text tportfolio__text-2 bdevs-el-content">
                                    <?php if ( $slide['title'] ) : ?>
                                        <h3 class="tportfolio-title bdevs-el-title">
                                            <a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if ( $slide['sub_title'] ) : ?> 
                                        <h4 class="bdevs-el-subtitle"><?php echo bdevs_element_kses_basic( $slide['sub_title'] ); ?></a></h4>
                                    <?php endif; ?>                                        
                                    <?php if ( $slide['description'] ) : ?> 
                                        <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
               </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_4' ) :

        $this->add_render_attribute( 'button', 'class', 'site__btn4 no-bg cl-o bdevs-el-btn' );

        ?>

        <section class="arc-projects-area">
            <div class="project-slide-wrapper wow fadeInUp2">
                <div class="project-slider owl-carousel">
                    <?php foreach ( $settings['slides'] as $slide ) : 
                        // image
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }
                        $title = bdevs_element_kses_basic( $slide['title' ] );
                    ?> 
                    <div class="arc-single-project p-relative">
                        <?php if ( !empty($image) ) : ?>
                        <div class="arc-project-img p-relative">
                            <img src="<?php print esc_url($image); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="arc-project-content bdevs-el-content">
                            <?php if ( $slide['sub_title'] ) : ?> 
                                <span class="arc-project-category bdevs-el-subtitle"><?php echo bdevs_element_kses_basic( $slide['sub_title'] ); ?></span>
                            <?php endif; ?>

                            <?php if ( $slide['title'] ) : ?>
                                <h4 class="arc-project-title bdevs-el-title">
                                    <a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                </h4>
                            <?php endif; ?>

                            <?php if ( $slide['button_text'] ) : ?>
                            <div class="arc-project-btn">
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
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <?php elseif ( $settings['design_style'] === 'style_5' ) :

            $title = bdevs_element_kses_basic( $settings['title' ] );

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'section-title-o mb-30 bdevs-el-title' );

            $this->add_render_attribute( 'button', 'class', 'site__btn4 site__btn4-border site__btn4-white' );

        ?>

        <section class="gallery-area p-relative wow fadeInUp2">
            <div class="explore-gallery bdevs-el-content">
                <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                        tag_escape( $settings['title_tag'] ),
                        $this->get_render_attribute_string( 'title' ),
                        bdevs_element_kses_basic( $settings['title' ] )
                    );
                ?>
                <?php if ( $settings['description'] ) : ?>
                    <p class="mb-45 s_gallery_desc"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                <?php endif; ?> 

                <div class="gallery-btn">
                    <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                $this->get_render_attribute_string( 'button' ),
                                esc_html( $settings['button_text'] ),
                                esc_url($settings['button_link']['url'])
                                );
                        elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                        <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                            if ( $settings['button_icon_position'] === 'before' ) :

                                $button_text = sprintf( '%2$s', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                <?php
                            else :
                                
                                $button_text = sprintf( '%2$s', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                ?>
                                <a href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php $this->print_render_attribute_string( 'button' ); ?>>
                                    <?php echo $button_text; ?> 
                                    <span class="site__btn4-icon">
                                    <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                    <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                    </span>
                                        
                                </a>
                            <?php
                        endif;
                    endif; ?>
                </div>
            </div>
            <div class="gallery-slider gallery-active owl-carousel">
                <?php foreach ( $settings['slides'] as $slide ) : 
                    // image
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $title = bdevs_element_kses_basic( $slide['title' ] );
                ?> 
                <div class="single-gallery p-relative">
                    <a href="<?php print esc_url($image); ?>" class="gallery-img popup-image">
                        <img src="<?php print esc_url($image); ?>" alt="">
                    </a>
                    <div class="gallery-content bdevs-el-content"> 
                        <?php if ( $slide['slider_number'] ) : ?> 
                        <div class="gallery-number">
                            <span><?php echo bdevs_element_kses_basic( $slide['slider_number'] ); ?></span>
                        </div>
                        <?php endif; ?>

                        <div class="gallery-text">
                            <?php if ( $slide['title'] ) : ?>
                                <h5 class="bdevs-el-btitle"><a href="<?php echo esc_url( $slide['slide_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h5>
                            <?php endif; ?>

                            <?php if ( $slide['sub_title'] ) : ?> 
                                <span class="bdevs-el-subtitle"><?php echo bdevs_element_kses_basic( $slide['sub_title'] ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <?php endif; ?>

        <?php
    }
}
