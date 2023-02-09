<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
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

class Featured_List extends BDevs_El_Widget {

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
        return 'featured_list';
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
        return __( 'Featured List', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
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
        return 'eicon-preview-medium';
    }

    public function get_keywords() {
        return [ 'featured', 'list', 'icon' ];
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();        

        // back title
        $this->start_controls_section(
            '_section_back_title',
            [
                'label' => __( 'Back Title', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_1'
                ],
            ]
        );
        $this->add_control(
            'back_title',
            [
                'label' => __( 'Back Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Back', 'bdevselement' ),
                'placeholder' => __( 'Type Info back title', 'bdevselement' ),
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
                'condition' => [
                    'design_style' => ['style_1']
                ],
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
                'condition' => [
                    'design_style' => ['style_1']
                ],
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


        // Company Groth 
        $this->start_controls_section(
            '_section_company_groth',
            [
                'label' => __( 'Company Groth', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_4']
                ],
            ]
        );

        $this->add_control(
            'groth_preiod',
            [
                'label' => __( 'Groth Period', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( '30+', 'bdevselement' ),
                'placeholder' => __( 'Type Groth Period Here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'groth_description',
            [
                'label' => __( 'Groth Description', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Groth Description', 'bdevselement' ),
                'placeholder' => __( 'Type groth description', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $this->end_controls_section();

        // Featured List
        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Featured List', 'bdevselement' ),
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_group_control(
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
            $repeater->add_control(
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
            $repeater->add_control(
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

        $repeater->add_control(
            'fea_list_background_color',
            [
                'label' => __( 'Featured List Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#00235a',
                'frontend_available' => true,
                'condition' => [
                    'field_condition' => ['style_4'],
                ], 
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}}:before ' => 'background: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        ); 

        $repeater->add_control(
            'icon_bg',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Icon BG', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_1'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 


        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'bdevselement' ),
                'placeholder' => __( 'Type Icon Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Icon Description', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'fea_inner_list',
            [
                'label' => __( 'Featured Inner List', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Featured Inner List Here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_4'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'fea_number',
            [
                'label' => __( 'Featured Nember', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '20', 'bdevselement' ),
                'placeholder' => __( 'Type Featured Nember', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_3'],
                ], 
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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
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
                ]
            ]
        );

        $this->add_responsive_control(
            'align_slide',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Featured List
        $this->start_controls_section(
            '_section_company_fea_list',
            [
                'label' => __( 'Company Featured List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'fea_list_title',
            [
                'label' => __( 'Featured List Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Featured List Title', 'bdevselement' ),
                'placeholder' => __( 'Type Featured List Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides_list',
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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();


        // Image
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_4']
                ],
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __( 'Background Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'bg_thumbnail',
                'default' => 'large',
                'separator' => 'none',
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
                    'design_style' => ['style_1','style_4']
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

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'section_heading', 'class', 'section-title shape' );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'title bdevs-el-title' );

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes( 'button_text', 'none' );
            $this->add_render_attribute( 'button_text', 'class', 'bdevs-btn-text' );
            $this->add_render_attribute( 'button', 'class', 'bdevs-btn site__btn1 bdevs-el-btn' );
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }


        $this->add_inline_editing_attributes( 'description', 'none' );
        $this->add_render_attribute( 'description', 'class', 'content-desc' );

        $title = bdevs_element_kses_basic( $settings['title' ] );

        ?>

        <?php if ( $settings['design_style'] === 'style_2' ):
            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'our-motive mb-30 p-relative bdevs-el-title' );
        ?>

            <section class="arc-features-area">
                <div class="container">
                    <div class="row align-items-center wow fadeInUp2">
                        <div class="col-xl-3">
                            <?php if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    bdevs_element_kses_basic( $settings['title' ] )
                                    );
                            endif; ?>
                        </div>
                        <div class="col-xl-9">
                            <ul class="arc-features-list">
                                <?php foreach ( $settings['slides'] as $slide ):
                                    if ( !empty($slide['image']['id']) ) {
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                        if ( ! $image ) {
                                            $image = $slide['image']['url'];
                                        }
                                    }
                                ?>
                                <li class="arc-single-feature mb-30">

                                    <div class="arc-single-feature-icon">
                                    <?php if( !empty($slide['selected_icon']) ): ?>
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>
                                    </div>

                                    <div class="arc-single-feature-text">
                                        <?php if( $slide['title'] ) : ?>
                                            <h4><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h4>
                                        <?php endif; ?>

                                        <?php if( $slide['description'] ) : ?>
                                            <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                        <?php endif; ?>
                                    </div>

                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ( $settings['design_style'] === 'style_3' ): 
            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'section-title-o mb-50 bdevs-el-title' );

        ?>

        <div class="overview2-content ml-30 mb-30 bdevs-el-content">
            <?php if ( $settings['title' ] ) :
                printf( '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape( $settings['title_tag'] ),
                    $this->get_render_attribute_string( 'title' ),
                    bdevs_element_kses_basic( $settings['title' ] )
                    );
            endif; ?>

            <ul class="overview2-list">
                <?php foreach ( $settings['slides'] as $slide ) : ?>
                <li>
                    <?php if( $slide['fea_number'] ) : ?>
                    <div class="overview2-list-number">
                        <span><?php echo bdevs_element_kses_basic( $slide['fea_number'] ); ?>+</span>
                    </div>
                    <?php endif; ?>

                    <div class="overview2-list-text">
                        <?php if( $slide['title'] ) : ?>
                            <h4><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h4>
                        <?php endif; ?>

                        <?php if( $slide['description'] ) : ?>
                            <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>


        <?php elseif ( $settings['design_style'] === 'style_4' ): 
            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'section-title-o mb-40 bdevs-el-title' );

            // button
            if (!empty($settings['button_link'])) {
                $this->add_inline_editing_attributes( 'button_text', 'none' );
                $this->add_render_attribute( 'button', 'class', 'site__btn4 site__btn4-border b-download bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['bg_thumbnail_size'] );
                if ( ! $bg_image ) {
                    $bg_image = $settings['bg_image']['url'];
                }

        ?>

        <section class="overview-area overview-area-bg pt-100 pb-85 p-relative">
            <?php if ( !empty($bg_image) ) : ?>
            <div class="overview-area-img2 d-none d-lg-block">
                <img src="<?php print esc_url($bg_image); ?>" alt="img">
            </div>
            <?php endif; ?>

            <div class="company-growth-year">
                <?php if ( $settings['groth_preiod'] ) : ?>
                    <span><?php echo bdevs_element_kses_intermediate( $settings['groth_preiod'] ); ?></span>
                <?php endif; ?>

                <?php if ( $settings['groth_description'] ) : ?>
                    <p><?php echo bdevs_element_kses_intermediate( $settings['groth_description'] ); ?></p>
                <?php endif; ?>
            </div>


            <div class="container">
                <div class="row align-items-center wow fadeInUp2">
                    <div class="col-lg-5">
                        <div class="overview-content mb-30">
                            <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                            ); ?>
    
                            <ul class="m-tab-list s_status_list">
                                <?php foreach ( $settings['slides_list'] as $slide ) : ?>
                                    <?php if ( $slide['fea_list_title'] ) : ?>
                                        <li><i class="fal fa-check-circle"></i><?php echo bdevs_element_kses_basic( $slide['fea_list_title'] ); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul> 
                            
                            <div class="overview-btn mt-40">
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
                                                    <span class="site__btn4-icon b-download">
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
                    <div class="col-lg-7">
                        <div class="tab-content overview-tab-content mb-30">
                            <div class="row">
                                <?php foreach ( $settings['slides'] as $slide ) : ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 s-xs-mb-30">
                                    <div class="mission-tab p-relative elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>" data-background="<?php print get_template_directory_uri() ?>/assets/img/home-oil/bg/mission-bg.jpg">
                                        <div class="m-tab-icon">
                                            <?php if( !empty($slide['selected_icon']) ): ?>
                                                <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                            <?php endif; ?>
                                        </div>
                                        <?php if ( $slide['title'] ) : ?>
                                        <h4 class="m-tab-title"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h4>
                                        <?php endif; ?>
                                        <?php if ( $slide['description'] ) : ?>
                                        <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                        <?php endif; ?>

                                        <?php if ( $slide['fea_inner_list'] ) : ?>
                                            <ul class="m-tab-list">
                                                <?php echo wp_kses_post( $slide['fea_inner_list'] ); ?>
                                            </ul>
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

        <?php else: ?>

        <section class="features1">
            <div class="features1__wrapper position-relative">
                <?php if ( $settings['sub_title'] ) : ?>
                <h2 class="text-border-title1 features1-style"><?php echo bdevs_element_kses_intermediate( $settings['back_title'] ); ?></h2>
                <?php endif; ?>
                <div class="content_box_120">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7">
                                <div class="title_style1 bdevs-el-subtitle">
                                    <?php if ( $settings['sub_title'] ) : ?>
                                        <h5 class="sub-title bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                                    <?php endif; ?>

                                    <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        $title
                                    ); ?>
                                </div>
                                <div class="features1__content mt-45">
                                    <?php foreach ( $settings['slides'] as $slide ) :

                                        $icon_bg = wp_get_attachment_image_url( $slide['icon_bg']['id'], $settings['thumbnail_size'] );
                                        if ( ! $icon_bg ) {
                                            $icon_bg = $slide['icon_bg']['url'];
                                        }
                                    ?>
                                    <div class="features1__item mb-40">
                                        <div class="features1__thumb">
                                            <?php if ( !empty($icon_bg) ) : ?>
                                            <img src="<?php print $icon_bg; ?>" alt="png-bg">
                                            <?php endif; ?>
                                            
                                            <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                            $this->get_render_attribute_string( 'image' );
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                            ?>
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                            </figure>
                                            <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                            <figure>
                                                <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                            </figure>
                                            <?php endif; ?> 

                                        </div>
                                        <div class="features1__item--text">
                                            <?php if( !empty($slide['title']) ): ?>
                                            <h4 class="title "><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h4>
                                            <?php endif; ?>

                                            <?php if( !empty($slide['description']) ): ?>
                                            <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="fea-btn">
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
        </section>

        <?php endif; ?>
        
        <?php
    }

}
