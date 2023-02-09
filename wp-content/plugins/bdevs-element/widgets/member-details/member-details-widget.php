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

class Member_Details extends BDevs_El_Widget {

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
        return 'member-details';
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
        return __( 'Member Details', 'bdevselement' );
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
        return [ 'slider', 'memeber', 'map', 'details' ];
    }


    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Desccription', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'desccription',
            [
                'label' => __( 'Desccription', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'stitle_tag',
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
                'default' => 'h1',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title2',
            [
                'label' => __( 'Title & Desccription 2', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => __( 'Title 2', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sub_title2',
            [
                'label' => __( 'Sub Title 2', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'desccription2',
            [
                'label' => __( 'Desccription 2', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'stitle_tag2',
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
                'default' => 'h1',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_title3',
            [
                'label' => __( 'Title & Desccription 3', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title3',
            [
                'label' => __( 'Title 3', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sub_title3',
            [
                'label' => __( 'Sub Title 3', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'desccription3',
            [
                'label' => __( 'Desccription 3', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'stitle_tag3',
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
                'default' => 'h1',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            '_qualifications',
            [
                'label' => __( 'Qualifications', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'qualifications_title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'qualifications_content',
            [
                'label' => __( 'Content', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();        


        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => bdevs_element_is_cf7_activated() ? __( 'Contact Form 7', 'bdevselement' ) : __( 'Missing Notice', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'team_contact_title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        if ( ! bdevs_element_is_cf7_activated() ) {
            $this->add_control(
                '_cf7_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __( 'Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'bdevselement' ),
                        '<a href="'.esc_url( admin_url( 'plugin-install.php?s=Contact+Form+7&tab=search&type=term' ) )
                        .'" target="_blank" rel="noopener">Contact Form 7</a>',
                        bdevs_element_get_current_user_display_name()
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->add_control(
                '_cf7_install',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<a href="'.esc_url( admin_url( 'plugin-install.php?s=Contact+Form+7&tab=search&type=term' ) ).'" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'form_id',
            [
                'label' => __( 'Select Your Form', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => ['' => __( '', 'bdevselement' ) ] + \bdevs_element_get_cf7_forms(),
            ]
        );

        $this->add_control(
            'html_class',
            [
                'label' => __( 'HTML Class', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __( 'Add CSS custom class to the form.', 'bdevselement' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_map',
            [
                'label' => __( 'Map', 'elementor' ),
            ]
        );

        $default_address = __( 'London Eye, London, United Kingdom', 'elementor' );
        $this->add_control(
            'address',
            [
                'label' => __( 'Address', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => $default_address,
                'default' => $default_address,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'zoom',
            [
                'label' => __( 'Zoom Level', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
            ]
        );



        $this->add_responsive_control(
            'height',
            [
                'label' => __( 'Height', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 300,
                ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 1440,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} iframe' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'prevent_scroll',
            [
                'label' => __( 'Prevent Scroll', 'elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'selectors' => [
                    '{{WRAPPER}} iframe' => 'pointer-events: none;',
                ],
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => __( 'View', 'elementor' ),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        $this->end_controls_section();


        // single member
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Members Single', 'bdevselement' ),
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

        // section title
        $this->add_inline_editing_attributes( 'stitle', 'basic' );
        $this->add_render_attribute( 'stitle', 'class', 'section-title' );     

        // section title2
        $this->add_inline_editing_attributes( 'stitle2', 'basic' );
        $this->add_render_attribute( 'stitle2', 'class', 'section-title' );       

        // section title2
        $this->add_inline_editing_attributes( 'stitle3', 'basic' );
        $this->add_render_attribute( 'stitle3', 'class', 'section-title' );


        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'bdevs-card-text' );

        $stitle = bdevs_element_kses_basic( $settings['title' ] );
        $stitle2 = bdevs_element_kses_basic( $settings['title2' ] );
        $stitle3 = bdevs_element_kses_basic( $settings['title3' ] );

        if ( empty( $settings['slides'] ) ) {
            return;
        }
        ?>

    <?php if ( $settings['design_style'] === 'style_1' ): 
        $slider_active = !empty($settings['slider_active']) ? 'team-active' : '';
    ?>

        <div class="doctor-details-area pt-115 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <article class="doctor-details-box">
                            <div class="section-title pos-rel mb-25">
                                <div class="section-text pos-rel">
                                    <?php if ( $settings['sub_title'] ) : ?>
                                        <h5 class="sub-title green-color"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                                    <?php endif; ?>

                                    <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['stitle_tag'] ),
                                        $this->get_render_attribute_string( 'stitle' ),
                                        $stitle
                                    ); ?>
                                </div>
                            </div>
                            <?php if ( $settings['desccription'] ) : ?>
                            <div class="service-details-text mb-40">
                                <p><?php echo bdevs_element_kses_intermediate( $settings['desccription'] ); ?></p>
                            </div>
                            <?php endif; ?>
                            <div class="section-title pos-rel mb-25">
                                <div class="section-text pos-rel">
                                    <?php if ( $settings['sub_title2'] ) : ?>
                                        <h5 class="sub-title"><?php echo bdevs_element_kses_intermediate( $settings['sub_title2'] ); ?></h5>
                                    <?php endif; ?>

                                    <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['stitle_tag2'] ),
                                        $this->get_render_attribute_string( 'stitle2' ),
                                        $stitle2
                                    ); ?>
                                </div>
                            </div>
                            <?php if ( $settings['desccription2'] ) : ?>
                            <div class="service-details-text mb-35">
                                <p><?php echo bdevs_element_kses_intermediate( $settings['desccription2'] ); ?></p>
                            </div>
                            <?php endif; ?>

                            <div class="service-details-feature fix mb-30">

                                <div class="ser-fea-box f-left">
                                    <div class="ser-fea-icon f-left">
                                        <i class="flaticon-business-and-finance"></i>
                                    </div>
                                    <div class="ser-fea-list fix">
                                        <h3>Business care</h3>
                                        <ul>
                                            <li><i class="fas fa-check"></i>Cillum dolore eu fugiat nulla.</li>
                                            <li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet.</li>
                                            <li><i class="fas fa-check"></i>Consectetur adipisicing elit,</li>
                                            <li><i class="fas fa-check"></i>Sed do eiusmod tempor inci.</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="ser-fea-box f-left mr-0">
                                    <div class="ser-fea-icon f-left">
                                        <i class="flaticon-business-and-finance-6"></i>
                                    </div>
                                    <div class="ser-fea-list fix">
                                        <h3>Consulting support</h3>
                                        <ul>
                                            <li><i class="fas fa-check"></i>Didunt ut labore et dolore magna.</li>
                                            <li><i class="fas fa-check"></i>Aliqua. Ut enim ad minim veniam.</li>
                                            <li><i class="fas fa-check"></i>Quis nostrud exercitation ullamco.</li>
                                            <li><i class="fas fa-check"></i>Laboris nisi ut aliquip ex ea.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="section-title pos-rel mb-25">
                                <div class="section-text pos-rel">
                                    <?php if ( $settings['sub_title3'] ) : ?>
                                        <h5 class="sub-title"><?php echo bdevs_element_kses_intermediate( $settings['sub_title3'] ); ?></h5>
                                    <?php endif; ?>

                                    <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['stitle_tag3'] ),
                                        $this->get_render_attribute_string( 'stitle3' ),
                                        $stitle3
                                    ); ?>
                                </div>
                            </div>
                            <?php if ( $settings['desccription3'] ) : ?>
                            <div class="service-details-text mb-30">
                                <p><?php echo bdevs_element_kses_intermediate( $settings['desccription3'] ); ?></p>
                            </div>
                            <?php endif; ?>

                            <div class="team-map mb-30">
                                <?php 
                                    printf(
                                        '<iframe src="https://maps.google.com/maps?q=%s&amp;t=m&amp;z=%d&amp;output=embed&amp;iwloc=near"></iframe>',
                                        urlencode( $settings['address'] ),
                                        absint( $settings['zoom']['size'] )
                                    );
                                ?>
                            </div>
                        </article>
                    </div>
                    <div class="col-xl-5 col-lg-4">
                        <div class="service-widget mb-50">
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
                            <div class="team-wrapper team-box-2 team-box-3 text-center mb-30">
                                <?php if( !empty($image) ) : ?>
                                    <div class="team-thumb">
                                        <img src="<?php print esc_url($image); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <?php if( !empty( $title ) ) : ?>
                                <div class="team-member-info mt-35 mb-35">
                                    <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        $title,
                                        $slide_url
                                    ); ?>
                                    <?php if( !empty( $slide['designation'] ) ) : ?>
                                    <h6 class="f-500 text-up-case letter-spacing pink-color designation"><?php echo bdevs_element_kses_basic( $slide['designation'] ); ?></h6>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                                <?php if( !empty($slide['show_social'] ) ) : ?>
                                <div class="team-social-widget">
                                    <ul>
                                        <?php if( !empty($slide['web_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['web_title'] ); ?>"><i class="far fa-globe"></i></a></li>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['email_title'] ) ) : ?>
                                        <li><a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>"><i class="fal fa-envelope"></i></a></li>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['phone_title'] ) ) : ?>
                                        <li><a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>"><i class="fas fa-phone"></i></a></li>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['facebook_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['facebook_title'] ); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['twitter_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['twitter_title'] ); ?>"><i class="fab fa-twitter"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['instagram_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['instagram_title'] ); ?>"><i class="fab fa-instagram"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['youtube_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['youtube_title'] ); ?>"><i class="fab fa-youtube"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>"><i class="fab fa-google-plus-g"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['flickr_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['flickr_title'] ); ?>"><i class="fab fa-flickr"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>"><i class="fab fa-vimeo-v"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['behance_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['behance_title'] ); ?>"><i class="fab fa-behance"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['dribble_title'] ) ) : ?>
                                       <li> <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>"><i class="fab fa-dribbble"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>"><i class="fab fa-pinterest-p"></i></a></li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['gitub_title'] ) ) : ?>
                                        <li><a href="<?php echo esc_url( $slide['gitub_title'] ); ?>"><i class="fab fa-github"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if ( $settings['qualifications_content'] ) : ?>
                        <div class="service-widget mb-50">
                            <?php if ( $settings['qualifications_title'] ) : ?>
                            <div class="widget-title-box mb-30">
                                <h3 class="widget-title"><?php echo bdevs_element_kses_intermediate( $settings['qualifications_title'] ); ?></h3>
                            </div>
                            <?php endif; ?>

                            <div class="more-service-list">
                                <?php echo wp_kses_post( $settings['qualifications_content'] ); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="service-widget mb-80">
                            <?php if ( $settings['team_contact_title'] ) : ?>
                            <div class="widget-title-box mb-30">
                                <h3 class="widget-title"><?php echo bdevs_element_kses_intermediate( $settings['team_contact_title'] ); ?></h3>
                            </div>
                            <?php endif; ?>
                            <div class="service-contact-form">
                            <?php if ( ! empty( $settings['form_id'] ) ) {
                                    echo bdevs_element_do_shortcode( 'contact-form-7', [
                                        'id' => $settings['form_id'],
                                        'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param( $settings['html_class'] ),
                                    ] );
                                }
                             ?> 
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>    

        <?php
    }
}
