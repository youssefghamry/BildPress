<?php
namespace BdevsElement\Widget;

Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class About extends BDevs_El_Widget {

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
        return 'about';
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
        return __( 'About', 'bdevselement' );
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
        return 'eicon-single-post';
    }

    public function get_keywords() {
        return [ 'info', 'blurb', 'box', 'about', 'content' ];
    }

    /**
     * Register content related controls
     */
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
                    'style_6' => __( 'Style 6', 'bdevselement' ),
                    'style_7' => __( 'Style 7', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();        

        // Experience
        $this->start_controls_section(
            '_section_experience',
            [
                'label' => __( 'Experience', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2','style_6']
                ],
            ]
        );
        $this->add_control(
            'exp_text',
            [
                'label' => __( 'Experience Text', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Text here', 'bdevselement' ),
                'placeholder' => __( 'Type exp text', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'exp_number',
            [
                'label' => __( 'Experience Number', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( '25', 'bdevselement' ),
                'placeholder' => __( 'Type number text', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
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
                    'design_style' => ['style_2','style_3','style_4','style_5','style_6','style_7']
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
            'back_title',
            [
                'label' => __( 'Back Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'About', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Back Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_6']
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
            'sort_description',
            [
                'label' => __( 'Sort Description', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs info box sort description goes here', 'bdevselement' ),
                'placeholder' => __( 'Type info box sort description', 'bdevselement' ),
                'rows' => 5,
                'condition' => [
                    'design_style' => 'style_1'
                ],
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
                'default' => 'h2',
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


        // Author Info 
        $this->start_controls_section(
            '_section_author_info',
            [
                'label' => __( 'Author Info', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_7']
                ],
            ]
        );

        $this->add_control(
            'author_name',
            [
                'label' => __( 'Author Name', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Author Name', 'bdevselement' ),
                'placeholder' => __( 'Type Author Name Here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'author_designation',
            [
                'label' => __( 'Author Designation', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Author designation goes here', 'bdevselement' ),
                'placeholder' => __( 'Type author designation', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $this->add_control(
            'author_image',
            [
                'label' => __( 'Author Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'author_signature',
            [
                'label' => __( 'Author Signature', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'about_author_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'URL', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Set url here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();   


        // img
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2','style_3','style_5','style_6','style_7']
                ],
            ]
        );        

        $this->add_control(
            'bg_image',
            [
                'label' => __( 'BG Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );            

        $this->add_control(
            'bg_image_2',
            [
                'label' => __( 'Image 2', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => 'style_2'
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
                'default' => 'large',
                'condition' => [
                    'design_style' => 'style_2'
                ],
                'separator' => 'none',
            ]
        );        

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail2',
                'default' => 'large',
                'condition' => [
                    'design_style' => 'style_2'
                ],
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();  


        // About Image Slider
        $this->start_controls_section(
            '_section_about_image_slider',
            [
                'label' => __( 'About Image Slider', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                 'condition' => [
                    'design_style' => ['style_7']
                ],
            ]
        );

        $repeater = new Repeater();


        $repeater->add_control(
            'about_slider_image',
            [
                'label' => __( 'About Slider Image', 'bdevselement' ),
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
            'about_slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'URL', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Set url here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $this->add_control(
            'aslides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print("Carousel Item"); #>',
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
                ]
            ]
        );

        $this->end_controls_section();



        // Feathures List
        $this->start_controls_section(
            '_section_feathures_list',
            [
                'label' => __( 'Feathures List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                 'condition' => [
                    'design_style' => ['style_1']
                ],
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
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );              

        $repeater->add_control(
            'slide_num',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Number', 'bdevselement' ),
                'default' => __( '01', 'bdevselement' ),
                'placeholder' => __( 'Type sub number here', 'bdevselement' ),
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
                'placeholder' => __( 'Set url here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
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
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_skill_list',
            [
                'label' => __( 'Skill List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                 'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $repeater = new Repeater();

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
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Number', 'bdevselement' ),
                'default' => __( '70', 'bdevselement' ),
                'placeholder' => __( 'Type sub number here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'skills',
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
                ]
            ]
        );

        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            '_section_3_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_4'
                ],
            ]
        );

        $this->add_control(
            'button_3_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
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
            'button_3_url',
            [
                'label' => __( 'Button URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_5','style_6']
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
    }

    /**
     * Register styles related controls
     */
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

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section-title bdevs-el-title' );

        $this->add_inline_editing_attributes( 'name', 'basic' );
        $this->add_render_attribute( 'name', 'class', 'name' );

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes( 'button_text', 'none' );
            $this->add_render_attribute( 'button_text', 'class', 'bdevs-btn-text' );
            $this->add_render_attribute( 'button', 'class', 'bdevs-btn bt-btn' );
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }

        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'bdevs-infobox-text' );

        $title = bdevs_element_kses_basic( $settings['title' ] );

        ?>

        <?php if ( $settings['design_style'] === 'style_1' ): 
            // bg_image
            if (!empty($settings['bg_image']['id'])) {
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
                if ( ! $bg_image ) {
                    $bg_image = $settings['bg_image']['url'];
                }
            }                  
        ?>

        <section class="about1">
            <div class="about1__wrapper position-relative">
                <div class="content_box_120 p-0">
                    <div class="container">
                        <div class="row no-gutters about1__item--wrapper mt-0">
                            <?php foreach ( $settings['slides'] as $slide ) :
                                $title = bdevs_element_kses_basic( $slide['title' ] );
                                
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                    if ( ! $image ) {
                                        $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                                    }  
                                }          
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="about1__item bdevs-el-content">
                                    <div class="about1__thumb">
                                        <?php if ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?> 
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                        <?php endif; ?>
                                        <span class="bdevs-el-subtitle"><?php echo bdevs_element_kses_basic( $slide['slide_num'] ); ?></span>
                                    </div>
                                    <div class="about1__content">
                                        <h3 class="bdevs-el-title"><a href="<?php echo esc_url( $slide['slide_url'] ); ?>">
                                            <?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php elseif ( $settings['design_style'] === 'style_2' ): 
            // bg_image
            if (!empty($settings['bg_image']['id'])) {
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
                if ( ! $bg_image ) {
                    $bg_image = $settings['bg_image']['url'];
                }  
            }            
            // bg_image 2
            if (!empty($settings['bg_image_2']['id'])) {
                $bg_image_2 = wp_get_attachment_image_url( $settings['bg_image_2']['id'], $settings['thumbnail2_size'] );
                if ( ! $bg_image_2 ) {
                    $bg_image_2 = $settings['bg_image_2']['url'];
                }  
            }               
    
        ?>

        <section class="about4">
            <div class="content_box_120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about4__thumb-area">
                                <?php if ( !empty($bg_image) ) : ?>
                                <div class="about4__thumb1">
                                    <img src="<?php print esc_url($bg_image); ?>" alt="Image">
                                </div>
                                <?php endif; ?>
                                <?php if ( !empty($bg_image_2) ) : ?>
                                <div class="about4__thumb2">
                                    <img src="<?php print esc_url($bg_image_2); ?>" alt="Image">
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="about4__content bdevs-el-content">
                                <div class="title_style1">
                                <?php if ( $settings['sub_title'] ) : ?>
                                    <h5 class="sub-title bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                                <?php endif; ?>

                                <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                                </div>

                                <?php if ( $settings['description'] ) : ?>
                                <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                                <?php endif; ?>

                                <?php if ( $settings['exp_number'] ) : ?>    
                                <div class="about4__experience mt-40">
                                    <div class="about4__experience--content">
                                        <h2><?php echo bdevs_element_kses_intermediate( $settings['exp_number'] ); ?><span>+</span></h2>
                                        <i class="far fa-paper-plane"></i>
                                        <div class="about4_experience_text">
                                            <?php echo wp_kses_post( $settings['exp_text'] ); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_3' ): 
            // bg_image
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            }        

        ?>
        <section class="about5">
            <div class="content_box_120 p-0">
                <div class="container">
                    <div class="row">
                        <?php if( !empty( $bg_image ) ) : ?>
                        <div class="col-md-6">
                            <div class="about5__thumb">
                                <img src="<?php print esc_url($bg_image); ?>" alt="About">
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="about5__wrapper bdevs-el-content">
                                <div class="title_style1 mb-20">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <h5 class="sub-title bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                                <?php endif; ?>
                                <?php if ( $settings['title' ] ) : ?>
                                    <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape( $settings['title_tag'] ),
                                            $this->get_render_attribute_string( 'title' ),
                                            bdevs_element_kses_basic( $settings['title' ] )
                                        );
                                    ?>
                                <?php endif; ?>
                                </div>
                                <?php if ( $settings['description'] ) : ?>
                                <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                                <?php endif; ?>

                                <div id="progress-elements">
                                    <?php foreach ( $settings['skills'] as $slide ) :
                                        $title = bdevs_element_kses_basic( $slide['title' ] );
                                        
                                        if (!empty($slide['image']['id'])) {
                                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                            if ( ! $image ) {
                                                $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                                            }  
                                        }          
                                    ?>
                                    <div class="progress-skill">
                                        <?php if( !empty($slide['title']) ) : ?>
                                        <h4><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h4>
                                        <?php endif; ?>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%"
                                                aria-valuenow="<?php echo bdevs_element_kses_basic( $slide['number'] ); ?>" aria-valuemin="0" aria-valuemax="100">
                                                <span><?php echo bdevs_element_kses_basic( $slide['number'] ); ?>%</span>
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

        <?php elseif ( $settings['design_style'] === 'style_4' ) : ?>

        <section class="appoinment-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="appoinment-box white">
                            <div class="appoinment-content bdevs-el-content">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <span class="small-text bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                                <?php endif; ?>
                                <?php if ( $settings['title' ] ) : ?>
                                    <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape( $settings['title_tag'] ),
                                            $this->get_render_attribute_string( 'title' ),
                                            bdevs_element_kses_basic( $settings['title' ] )
                                        );
                                    ?>
                                <?php endif; ?>
                                <?php if ( $settings['description'] ) : ?>
                                    <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                                <?php endif; ?>

                                <ul class="professinals-list pt-30">
                                    <?php foreach ( $settings['slides'] as $slide ) :
                                        $title = bdevs_element_kses_basic( $slide['title' ] );
                                        
                                        if (!empty($slide['image']['id'])) {
                                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                            if ( ! $image ) {
                                                $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                                            }  
                                        }          
                                    ?>
                                    <li>
                                        <?php if ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?> 
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                        <?php endif; ?>
                                        <?php if( !empty($slide['title']) ) : ?>
                                        <?php echo bdevs_element_kses_basic( $slide['title'] ); ?>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>

                            <?php if ( $settings['button_3_url'] ) : ?>
                            <a href="<?php echo esc_url( $settings['button_3_url'] ); ?>" class="bt-btn w-100 rounded-0 mt-40 bdevs-el-btn"><?php echo bdevs_element_kses_intermediate( $settings['button_3_text'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php elseif ( $settings['design_style'] === 'style_5' ): 
            // bg_image
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            }        

        ?>
        <div class="features2__item2">
            <div class="features2__thumb2" data-background="<?php echo esc_url($bg_image); ?>"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="features2__item2__wrapper bdevs-el-content">
                            <div class="title_style1 mb-25">
                                <?php if ( $settings['sub_title'] ) : ?>
                                    <h5 class="sub-title bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                                <?php endif; ?>

                                <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                            </div>
                            <div class="features2__content">
                                <?php if ( $settings['description'] ) : ?>
                                <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                                <?php endif; ?>    


                                <div class="mt-40">
                                    <!-- button one  -->
                                    <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                        $this->add_render_attribute( 'button', 'class', 'site__btn1' );
                                        printf( '<a %1$s>%2$s</a>',
                                            $this->get_render_attribute_string( 'button' ),
                                            esc_html( $settings['button_text'] )
                                            );
                                    elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                    <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                        if ( $settings['button_icon_position'] === 'before' ) :
                                            $this->add_render_attribute( 'button', 'class', 'site__btn1 site-btn-border bdevs-btn--icon-before' );
                                            $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                            ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                            <?php
                                        else :
                                            $this->add_render_attribute( 'button', 'class', 'site__btn1 bdevs-btn--icon-after' );
                                            $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                            ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
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

        <?php elseif ( $settings['design_style'] === 'style_6' ): 

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'arc-section-title mb-30 bdevs-el-title' );

            // button
            if (!empty($settings['button_link'])) {
                $this->add_inline_editing_attributes( 'button_text', 'none' );
                $this->add_render_attribute( 'button', 'class', 'site__btn4 bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            // bg_image
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            }

        ?>

        <section class="arc-about-area pt-120 pb-90">
            <div class="container">
                <div class="row wow fadeInUp2">

                    <div class="col-lg-6">
                        <div class="arc-about-img-wrapper mb-30">
                            <?php if( !empty( $bg_image ) ) : ?>
                            <div class="arc-about-img">
                                <img src="<?php print esc_url($bg_image); ?>" alt="About Thumb">
                            </div>
                            <?php endif; ?>

                            <div class="arc-experience d-none d-md-block">
                                <?php if ( $settings['exp_number'] ) : ?>
                                    <span class="experience-year"><?php echo bdevs_element_kses_intermediate( $settings['exp_number'] ); ?></span>
                                <?php endif; ?>
                                <?php if ( $settings['exp_text'] ) : ?>
                                <div class="experience-text">
                                    <span>+</span>
                                    <p><?php echo wp_kses_post( $settings['exp_text'] ); ?></p>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="arc-about-content mb-30 bdevs-el-content">
                            <div class="arc-title-wrapper p-relative">
                                <?php if ( $settings['back_title'] ) : ?>
                                <span class="arc-title-back-text"><?php echo bdevs_element_kses_intermediate( $settings['back_title'] ); ?></span>
                                 <?php endif; ?>

                                <?php if ( $settings['sub_title'] ) : ?>
                                <span class="arc-section-subtitle mb-20 bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                                <?php endif; ?>

                                <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                            </div>

                            <?php if ( $settings['description'] ) : ?>
                                <p class="mb-45 "><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                            <?php endif; ?> 

                            <div class="arc-about-btn">

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
                    </div>

                </div>
            </div>
        </section>



        <?php elseif ( $settings['design_style'] === 'style_7' ): 


            $title = bdevs_element_kses_basic( $settings['title' ] );

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'section-title-o mb-30 bdevs-el-title' );

            // bg_image
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            }

            $author_image = wp_get_attachment_image_url( $settings['author_image']['id'], $settings['thumbnail_size'] );
            if ( ! $author_image ) {
                $author_image = $settings['author_image']['url'];
            }            

            $author_signature = wp_get_attachment_image_url( $settings['author_signature']['id'], $settings['thumbnail_size'] );
            if ( ! $author_signature ) {
                $author_signature = $settings['author_signature']['url'];
            }

        ?>

        <section class="about-area">
            <div class="container">
                <div class="row align-items-center wow fadeInUp2">
                    <div class="col-lg-6">
                        <div class="about-img p-relative mr-30 mb-30">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="about-img-slider about-active owl-carousel mb-20">
                                        <?php foreach ( $settings['aslides'] as $slide ) :
                                            if (!empty($slide['about_slider_image']['id'])) {
                                                $about_slider_image = wp_get_attachment_image_url( $slide['about_slider_image']['id'], $settings['thumbnail_size'] );
                                                if ( ! $about_slider_image ) {
                                                    $about_slider_image = !empty($slide['about_slider_image']['url']) ? $slide['about_slider_image']['url'] : '' ;
                                                }  
                                            }          
                                        ?>
                                        <div class="about-slide-img">
                                            <a href="<?php echo esc_url( $slide['about_slide_url'] ); ?>"><img src="<?php print esc_url($about_slider_image); ?>" alt=""></a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                                <?php if( !empty( $bg_image ) ) : ?>
                                <div class="col-lg-12">
                                    <div class="about-single-img mb-20">
                                        <img src="<?php print esc_url($bg_image); ?>" alt="">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content mb-30 bdevs-el-content">
                            <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    bdevs_element_kses_basic( $settings['title' ] )
                                );
                            ?>
                            <?php if ( $settings['description'] ) : ?>
                                <p class="mb-45"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                            <?php endif; ?> 

                            <div class="about-author">
                                <?php if( !empty( $author_image ) ) : ?>
                                <div class="about-author-img mr-20">
                                    <img src="<?php print esc_url($author_image); ?>" alt="">
                                </div>
                                <?php endif; ?>

                                <div class="about-author-nd p-relative pt-10">
                                    <?php if ( $settings['author_name'] ) : ?>
                                    <h5 class="about-author-name">
                                        <a href="<?php echo esc_url( $settings['about_author_url'] ); ?>"><?php echo bdevs_element_kses_intermediate( $settings['author_name'] ); ?></a>
                                    </h5>
                                    <?php endif; ?>

                                    <?php if ( $settings['author_designation'] ) : ?>
                                    <span class="about-author-designation"><?php echo bdevs_element_kses_intermediate( $settings['author_designation'] ); ?></span>
                                    <?php endif; ?>

                                    <?php if( !empty( $author_signature ) ) : ?>
                                    <div class="about-author-signature p-relative mt-35">
                                        <img src="<?php print esc_url($author_signature); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php endif; ?>

        <?php
    }
}
