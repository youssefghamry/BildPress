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

defined( 'ABSPATH' ) || die();

class Member_Slider extends BDevs_El_Widget {

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
        return 'member_slider';
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
        return __( 'Member Slider', 'bdevselement' );
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
        return 'eicon-lock-user';
    }

    public function get_keywords() {
        return [ 'slider', 'memeber', 'gallery', 'carousel' ];
    }


    protected function register_content_controls() {

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'heading_switch',
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
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs Info Box Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
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
            'area_title_tag',
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
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'area_align',
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


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Members List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_slider'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __( 'Information', 'bdevselement' ),
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
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'default' => __( 'BDevs Member Title', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Job Title', 'bdevselement' ),
                'default' => __( 'BDevs Officer', 'bdevselement' ),
                'placeholder' => __( 'Type designation here', 'bdevselement' ),
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
                'show_label' => true,
                'label' => __( 'Short Bio', 'bdevselement' ),
                'placeholder' => __( 'Write Something about cool member', 'bdevselement' ),
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
                'show_label' => false,
                'placeholder' => __( 'Type link here', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __( 'Links', 'bdevselement' ),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __( 'Show Options?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Website Address', 'bdevselement' ),
                'placeholder' => __( 'Add your profile link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Email', 'bdevselement' ),
                'placeholder' => __( 'Add your email link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );           

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Phone', 'bdevselement' ),
                'placeholder' => __( 'Add your phone link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your facebook link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your twitter link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your instagram link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );       

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your linkedin link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'bdevselement' ),
                'placeholder' => __( 'Add your youtube link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Google Plus', 'bdevselement' ),
                'placeholder' => __( 'Add your Google Plus link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Flickr', 'bdevselement' ),
                'placeholder' => __( 'Add your flickr link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Vimeo', 'bdevselement' ),
                'placeholder' => __( 'Add your vimeo link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Behance', 'bdevselement' ),
                'placeholder' => __( 'Add your hehance link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Dribbble', 'bdevselement' ),
                'placeholder' => __( 'Add your dribbble link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Pinterest', 'bdevselement' ),
                'placeholder' => __( 'Add your pinterest link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Github', 'bdevselement' ),
                'placeholder' => __( 'Add your github link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
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
                    '{{WRAPPER}} .single-carousel-item' => 'text-align: {{VALUE}};'
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
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'slider_active',
            [
                'label' => __( 'Slider active on/off', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'default' =>true,
                'condition' => [
                    'design_style' => ['style_1']
                ],
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
            '_section_style_item',
            [
                'label' => __( 'Slider Item', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-slick-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Slide Content', 'bdevselement' ),
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
                    '{{WRAPPER}} .bdevs-slick-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-slick-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

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
                    '{{WRAPPER}} .bdevs-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-slick-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

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
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-slick-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

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
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
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
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-dots li button:hover:before' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-dots .slick-active button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'team-title' );
        $this->add_render_attribute( 'name', 'class', 'name' );


        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'bdevs-card-text' );

         $title = bdevs_element_kses_basic( $settings['title' ] );

        if ( empty( $settings['slides'] ) ) {
            return;
        }
        ?>

    <?php if ( $settings['design_style'] === 'style_1' ): 

        // bg_image
        if (!empty($settings['bg_shape_image']['id'])) {
            $bg_shape_image = wp_get_attachment_image_url( $settings['bg_shape_image']['id'], $settings['shape_size'] );
            if ( ! $bg_shape_image ) {
                $bg_shape_image = $settings['bg_shape_image']['url'];
            }  
        }  

        $slider_active = !empty($settings['slider_active']) ? 'team1__carousel owl-carousel' : '';
    ?>

    <section class="team1">
        <?php if ( !empty( $bg_shape_image ) ) : ?>    
        <div class="team1__img-box">
            <img class="img_100" src="<?php echo esc_url($bg_shape_image); ?>" alt="About Image">
        </div>
        <?php endif; ?>
        <div class="content_box_120_90 p-0">
            <div class="container">
                <?php if (  !empty($settings['heading_switch']) ) : ?>
                <div class="row mb-45">
                    <div class="col-lg-8">
                        <div class="title_style1 mb-20">
                            <?php if ( $settings['sub_title'] ) : ?>
                                <h5 class="sub-title"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                            <?php endif; ?>

                            <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['area_title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                            ); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="<?php echo esc_attr($slider_active); ?>">
                            <?php foreach ( $settings['slides'] as $slide ) :
                                $title = bdevs_element_kses_basic( $slide['title' ] );
                                $slide_url = esc_url($slide['slide_url']);
                                
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                    if ( ! $image ) {
                                        $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                                    }  
                                }          
                            ?>
                            <div class="team1__item mb-30">
                                <?php if( !empty( $image ) ) : ?>
                                <div class="team1__thumb">
                                    <a href="<?php echo esc_url($slide_url); ?>"><img src="<?php print esc_url($image); ?>" alt="img"></a>
                                </div>
                                <?php endif; ?>
                                <!-- socials -->
                                <?php if( !empty($slide['show_social'] ) ) : ?>
                                <div class="team1__social text-center">
                                    <?php if( !empty($slide['web_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['web_title'] ); ?>" target="_blank"><i class="far fa-globe"></i></a>
                                    <?php endif; ?>  

                                    <?php if( !empty($slide['email_title'] ) ) : ?>
                                    <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>" target="_blank"><i class="fal fa-envelope"></i></a>
                                    <?php endif; ?>  

                                    <?php if( !empty($slide['phone_title'] ) ) : ?>
                                    <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>" target="_blank"><i class="fas fa-phone"></i></a>
                                    <?php endif; ?>  

                                    <?php if( !empty($slide['facebook_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['twitter_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['instagram_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['youtube_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['flickr_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>" target="_blank"><i class="fab fa-flickr"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>" target="_blank"><i class="fab fa-vimeo-v"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['behance_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['behance_title'] ); ?>" target="_blank"><i class="fab fa-behance"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['dribble_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>" target="_blank"><i class="fab fa-dribbble"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['gitub_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>" target="_blank"><i class="fab fa-github"></i></a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <div class="team1__content text-center">
                                    <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        $title,
                                        $slide_url
                                    ); ?>
                                    <?php if( !empty( $slide['designation'] ) ) : ?>
                                    <p class="m-0"><?php echo bdevs_element_kses_basic( $slide['designation'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- style 2 -->
    <?php elseif ( $settings['design_style'] === 'style_2' ): ?>
    <section class="team1">
        <div class="container">
            <div class="row">
                <?php foreach ( $settings['slides'] as $slide ) :
                    $title = bdevs_element_kses_basic( $slide['title' ] );
                    $slide_url = esc_url($slide['slide_url']);
                    
                    if (!empty($slide['image']['id'])) {
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                        }  
                    }          
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="team1__item mb-50">
                        <?php if( !empty( $image ) ) : ?>
                        <div class="team1__thumb">
                            <a href="<?php echo esc_url($slide_url); ?>"><img src="<?php print esc_url($image); ?>" alt="img"></a>
                        </div>
                        <?php endif; ?>
                        <!-- socials -->
                        <?php if( !empty($slide['show_social'] ) ) : ?>
                        <div class="team1__social text-center">
                            <?php if( !empty($slide['web_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['web_title'] ); ?>" target="_blank"><i class="far fa-globe"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['email_title'] ) ) : ?>
                            <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>" target="_blank"><i class="fal fa-envelope"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['phone_title'] ) ) : ?>
                            <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>" target="_blank"><i class="fas fa-phone"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['facebook_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['twitter_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['instagram_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['youtube_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['flickr_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>" target="_blank"><i class="fab fa-flickr"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>" target="_blank"><i class="fab fa-vimeo-v"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['behance_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['behance_title'] ); ?>" target="_blank"><i class="fab fa-behance"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['dribble_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>" target="_blank"><i class="fab fa-dribbble"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['gitub_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>" target="_blank"><i class="fab fa-github"></i></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="team1__content text-center">
                            <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title,
                                $slide_url
                            ); ?>
                            <?php if( !empty( $slide['designation'] ) ) : ?>
                            <p class="m-0"><?php echo bdevs_element_kses_basic( $slide['designation'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- style 3 -->
    <?php elseif ( $settings['design_style'] === 'style_3' ):
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'member-name' );

    ?>

    <section class="arc-team-area">
        <div class="container">
            <div class="row wow fadeInUp2">
                <?php foreach ( $settings['slides'] as $slide ) :
                    $title = bdevs_element_kses_basic( $slide['title' ] );
                    $slide_url = esc_url($slide['slide_url']);

                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }            

                ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team-member mb-30">
                        <?php if( !empty($image) ) : ?>
                        <div class="member-img">
                            <img src="<?php print esc_url($image); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <div class="member-desription text-center p-relative">

                            <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title,
                                $slide_url
                            ); ?>

                            <?php if( !empty($slide['designation'] ) ) : ?>
                                <span class="member-designation"><?php echo bdevs_element_kses_basic( $slide['designation'] ); ?></span>
                            <?php endif; ?>

                            <?php if( !empty($slide['show_social'] ) ) : ?>
                            <div class="team-social">

                                <ul class="team-social-icon">
                                    <?php if( !empty($slide['web_title'] ) ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url( $slide['web_title'] ); ?>">
                                            <i class="far fa-globe"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['email_title'] ) ) : ?>
                                    <li>    
                                        <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>">
                                            <i class="fal fa-envelope"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>  

                                    <?php if( !empty($slide['phone_title'] ) ) : ?>
                                    <li>    
                                        <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>  

                                    <?php if( !empty($slide['facebook_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['twitter_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['instagram_title'] ) ) : ?>
                                    <li>     
                                        <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['youtube_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['flickr_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>">
                                            <i class="fab fa-flickr"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>">
                                            <i class="fab fa-vimeo-v"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['behance_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['behance_title'] ); ?>">
                                            <i class="fab fa-behance"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['dribble_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                                    <li>    
                                        <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['gitub_title'] ) ) : ?>
                                    <li>   
                                        <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>

                                <div class="t-share-btn"><i class="fas fa-share-alt"></i></div>
                            </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php endif; ?>    

        <?php
    }
}
