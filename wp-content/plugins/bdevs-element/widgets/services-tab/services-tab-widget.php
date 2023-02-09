<?php
namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Services_Tab extends BDevs_El_Widget {

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
        return 'services-tab';
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
        return __( 'Services List', 'bdevselement' );
    }

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/contact-7-form/';
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
        return 'eicon-favorite';
    }

    public function get_keywords() {
        return [ 'services', 'tab' ];
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
                    'style_6' => __( 'Style 6', 'bdevselement' ),
                    'style_7' => __( 'Style 7', 'bdevselement' ),
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
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->end_controls_section();

        // Slides
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_bg_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'BG Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
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
                    'style_6' => __( 'Style 6', 'bdevselement' ),
                    'style_7' => __( 'Style 7', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'overlay_enable',
            [
                'label' => __( 'Overlay Enable Switch', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'default' =>false,
                'condition' => [
                    'field_condition' => ['style_1','style_2'],
                ], 
            ]
        );        

        $repeater->add_control(
            'pattern_enable',
            [
                'label' => __( 'Black Color Enable Switch', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'default' =>false,
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
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
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3','style_4','style_5'],
                ], 
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
                    'type' => 'image',
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
                        'type' => 'icon',
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
                        'type' => 'icon',
                    ]
                ]
            );
        }  

        $repeater->add_control(
            'bg_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'BG Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_5','style_7'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );         

        $repeater->add_control(
            'tab_sub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Tab Sub Title', 'bdevselement' ),
                'default' => __( 'Tab Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type sub title here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );          

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Tab Title', 'bdevselement' ),
                'default' => __( 'Tab Title', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );     

        $repeater->add_control(
            'tab_content_info',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Tab Content', 'bdevselement' ),
                'default' => __( 'Content Here', 'bdevselement' ),
                'placeholder' => __( 'Type subtitle here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        



        // Button
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_5','style_6','style_7'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'button_url',
            [
                'label' => __( 'Button URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
                'placeholder' => __( 'button url', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // REPEATER
        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(tab_title || "Carousel Item"); #>',
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

    }

    // register_style_controls
    
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
    }

    protected function render() {

        $settings = $this->get_settings_for_display(); 
        $this->add_render_attribute( 'title_2', 'class', 'section-title' );

        if ( empty( $settings['slides'] ) ) {
            return;
        }

        ?>


        <?php if ( $settings['design_style'] === 'style_1' ) : 
            // section_bg_image
            if (!empty($settings['section_bg_image']['id'])) {
                $section_bg_image = wp_get_attachment_image_url( $settings['section_bg_image']['id'], 'full' );
                if ( ! $section_bg_image ) {
                    $section_bg_image = $settings['section_bg_image']['url'];
                } 
             } 
        ?>
        <section class="key_features1">
            <div class="container-fluid pl-0 pr-0">
                <div class="row no-gutters">
                    <div class="col-xl-6">
                        <div class="key_features1__thumb-1" data-background="<?php print esc_url($section_bg_image); ?>"></div>
                    </div>

                    <?php foreach ( $settings['slides'] as $id => $slide ) :

                        if (!empty($slide['bg_image']['id'])) {
                            $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], 'full' );
                            if ( ! $bg_image ) {
                                $bg_image = !empty($slide['bg_image']['url']) ? $slide['bg_image']['url'] : '' ;
                            }  
                        }  

                        // active class 
                        $overlay_enable = !empty($slide['overlay_enable']) ? 'key_features1__thumb-3' : '';   
                    ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="key_features1__thumb-2 <?php print esc_attr($overlay_enable); ?>" data-background="<?php print esc_url($bg_image); ?>">
                            <div class="key_features1__item bdevs-el-content">
                                <div class="key_features1__item--thumb">
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
                                <div class="key_features1__item--content">
                                    <?php if ( !empty($slide['tab_title']) ) : ?>
                                    <h4 class="bdevs-el-title"><?php echo bdevs_element_kses_basic( $slide['tab_title'] ); ?></h4>
                                    <?php endif; ?>
                                    <?php if ( !empty($slide['tab_content_info']) ) : ?>
                                    <p><?php echo bdevs_element_kses_basic( $slide['tab_content_info'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !empty($slide['button_url']) ) : ?>
                                <a href="<?php echo esc_url( $slide['button_url'] ); ?>" title="Read More"><?php echo bdevs_element_kses_basic( $slide['button_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ) : 
            // section_bg_image
            if (!empty($settings['section_bg_image']['id'])) {
                $section_bg_image = wp_get_attachment_image_url( $settings['section_bg_image']['id'], 'full' );
                if ( ! $section_bg_image ) {
                    $section_bg_image = $settings['section_bg_image']['url'];
                } 
             } 
        ?>

        <section class="key_features1">
            <div class="container-fluid pl-0 pr-0">
                <div class="row no-gutters">
                    <?php foreach ( $settings['slides'] as $id => $slide ) :

                        if (!empty($slide['bg_image']['id'])) {
                            $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], 'full' );
                            if ( ! $bg_image ) {
                                $bg_image = !empty($slide['bg_image']['url']) ? $slide['bg_image']['url'] : '' ;
                            }  
                        }  

                        // active class 
                        $overlay_enable = !empty($slide['overlay_enable']) ? 'key_features1__thumb-3' : '';   
                        $pattern_enable = !empty($slide['pattern_enable']) ? 'key_features1__thumb-4' : '';   
                    ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="key_features1__thumb-2 <?php print esc_attr($pattern_enable); ?> <?php print esc_attr($overlay_enable); ?>" data-background="<?php print esc_url($bg_image); ?>">
                            <div class="key_features1__item bdevs-el-content">
                                <div class="key_features1__item--thumb">
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
                                <div class="key_features1__item--content">
                                    <?php if ( !empty($slide['tab_title']) ) : ?>
                                    <h4 class="bdevs-el-title"><?php echo bdevs_element_kses_basic( $slide['tab_title'] ); ?></h4>
                                    <?php endif; ?>
                                    <?php if ( !empty($slide['tab_content_info']) ) : ?>
                                    <p><?php echo bdevs_element_kses_basic( $slide['tab_content_info'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !empty($slide['button_url']) ) : ?>
                                <a href="<?php echo esc_url( $slide['button_url'] ); ?>" title="Read More"><?php echo bdevs_element_kses_basic( $slide['button_text'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-xl-6">
                        <div class="key_features1__thumb-1" data-background="<?php print esc_url($section_bg_image); ?>"></div>
                    </div>
                </div>
            </div>
        </section>  
        
        <?php elseif ( $settings['design_style'] === 'style_3' ) : 
            $slider_active = !empty($settings['slider_active']) ? 'service-active' : ''; 
        ?>
        <section class="service1">
            <div class="content_box_120_90 p-0">
                <div class="container">
                    <div class="row">
                        <?php foreach ( $settings['slides'] as $id => $slide ) :
                            if (!empty($slide['tab_image']['id'])) {
                                $tab_image = wp_get_attachment_image_url( !empty($slide['tab_image']['id']), !empty($slide['tab_image_size']) );
                                if ( ! $tab_image ) {
                                    $tab_image_url = $slide['tab_image']['url'];
                                }
                            }
                            
                            // active class
                            $active_tab = ($id == 0) ? 'active show' : '';      
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service1__item text-center mb-30 bdevs-el-content">
                                <?php if ( !empty($slide['tab_number']) ) : ?>
                                <span<?php echo bdevs_element_kses_basic( $slide['tab_number'] ); ?> </span>  
                                <?php endif; ?> 
                                <div class="service1__thumb">
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
                                <div class="service1__content">
                                    <?php if ( !empty($slide['tab_title']) ) : ?>
                                    <h3 class="bdevs-el-title"><a href="<?php echo esc_url($slide['button_url']); ?>"><?php echo bdevs_element_kses_basic( $slide['tab_title'] ); ?></a></h3>
                                    <?php endif; ?>

                                    <?php if ( !empty($slide['tab_content_info']) ) : ?>
                                    <p><?php echo bdevs_element_kses_basic( $slide['tab_content_info'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>        

        <?php elseif ( $settings['design_style'] === 'style_4' ) : 
            $slider_active = !empty($settings['slider_active']) ? 'service-active' : ''; 
        ?>

        <section class="service1 other_page1">
            <div class="projects1__wrapper position-relative">
                <div class="content_box_120_90 p-0">
                    <div class="container">
                        <div class="row">
                            <?php foreach ( $settings['slides'] as $id => $slide ) :
                                if (!empty($slide['tab_image']['id'])) {
                                    $tab_image = wp_get_attachment_image_url( !empty($slide['tab_image']['id']), !empty($slide['tab_image_size']) );
                                    if ( ! $tab_image ) {
                                        $tab_image_url = $slide['tab_image']['url'];
                                    }
                                }
                                
                                // active class
                                $active_tab = ($id == 0) ? 'active show' : '';      
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="process__item mb-30 bdevs-el-content">
                                    <div class="process__thumb">
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
                                    <div class="process__content">
                                        <?php if ( !empty($slide['tab_title']) ) : ?>
                                        <h3 class="bdevs-el-title"><a href="<?php echo esc_url($slide['button_url']); ?>"><?php echo bdevs_element_kses_basic( $slide['tab_title'] ); ?></a></h3>
                                        <?php endif; ?>

                                        <?php if ( !empty($slide['tab_content_info']) ) : ?>
                                        <p><?php echo bdevs_element_kses_basic( $slide['tab_content_info'] ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>        

        <?php elseif ( $settings['design_style'] === 'style_5' ) : 
            $slider_active = !empty($settings['slider_active']) ? 'service-active' : ''; 
        ?>

        <section class="service1 other_page1">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $id => $slide ) :
                        if (!empty($slide['bg_image']['id'])) {
                            $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], 'full' );
                            if ( ! $bg_image ) {
                                $bg_image = !empty($slide['bg_image']['url']) ? $slide['bg_image']['url'] : '' ;
                            }  
                        }  
                        
                        // active class
                        $active_tab = ($id == 0) ? 'active show' : '';      
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services__item bdevs-el-content mb-40">
                            <div class="services__thumb mb-30">
                                <?php if ( !empty($bg_image) ) : ?>
                                <img src="<?php echo esc_url($bg_image); ?>" alt="Service Image">
                                <?php endif; ?>    
                                <div class="sv-icon">
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
                            </div>
                            <div class="services__content">
                                <?php if ( !empty($slide['tab_title']) ) : ?>
                                <h3 class="bdevs-el-title"><a href="<?php echo esc_url($slide['button_url']); ?>"><?php echo bdevs_element_kses_basic( $slide['tab_title'] ); ?></a></h3>
                                <?php endif; ?>

                                <?php if ( !empty($slide['tab_content_info']) ) : ?>
                                <p><?php echo bdevs_element_kses_basic( $slide['tab_content_info'] ); ?></p>
                                <?php endif; ?>

                                <?php if ( !empty($slide['button_url']) ) : ?>
                                <div class="sv-link">
                                    <a class="sv-link-text" href="<?php echo esc_url($slide['button_url']); ?>">
                                        <?php echo esc_html($slide['button_text']); ?> <i class="far fa-long-arrow-right"></i>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>        

        <?php elseif ( $settings['design_style'] === 'style_6' ) : 
            $slider_active = !empty($settings['slider_active']) ? 'service-active' : ''; 
        ?>


        <section class="arc-service-area">
            <div class="container">

                <div class="row wow fadeInUp2">
                    <?php foreach ( $settings['slides'] as $id => $slide ) :
                        if (!empty($slide['bg_image']['id'])) {
                            $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], 'full' );
                            if ( ! $bg_image ) {
                                $bg_image = !empty($slide['bg_image']['url']) ? $slide['bg_image']['url'] : '' ;
                            }  
                        }     
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="arc-single-service mb-30 bdevs-el-content">
                            <div class="arc-single-service-icon">
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
                            <?php if ( !empty($slide['tab_title']) ) : ?>
                                <h4 class="arc-single-service-title bdevs-el-title"><?php echo bdevs_element_kses_basic( $slide['tab_title'] ); ?></h4>
                            <?php endif; ?>

                            <?php if ( !empty($slide['tab_content_info']) ) : ?>
                                <p><?php echo bdevs_element_kses_basic( $slide['tab_content_info'] ); ?></p>
                            <?php endif; ?>
                            <div class="service-btn">
                                <a class="site__btn4 no-bg site__btn4-blog" href="<?php echo esc_url( $slide['button_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['button_text'] ); ?>
                                    <span class="site__btn4-icon">
                                        <i class="fal fa-long-arrow-right"></i>
                                         <span></span>
                                        <i class="fal fa-long-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <?php elseif ( $settings['design_style'] === 'style_7' ) : 
            $slider_active = !empty($settings['slider_active']) ? 'service-active' : ''; 
        ?>

        <section class="service-area">
            <div class="container">
                <div class="row wow fadeInUp2">
                    <?php foreach ( $settings['slides'] as $id => $slide ) :
                        if (!empty($slide['bg_image']['id'])) {
                            $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], 'full' );
                            if ( ! $bg_image ) {
                                $bg_image = !empty($slide['bg_image']['url']) ? $slide['bg_image']['url'] : '' ;
                            }  
                        }  
                        // active class
                        $active_tab = ($id == 0) ? 'active show' : '';      
                    ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-service bdevs-el-content mb-30">
                            <?php if ( !empty($bg_image) ) : ?>
                            <div class="service-img">
                                <a href="<?php echo esc_url($slide['button_url']); ?>"><img src="<?php echo esc_url($bg_image); ?>" alt=""></a>
                            </div>
                            <?php endif; ?>
                            <div class="service-content p-relative">
                                <div class="service-icon">
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

                                <?php if ( !empty($slide['tab_title']) ) : ?>
                                <h4 class="service-title bdevs-el-title"><a href="<?php echo esc_url($slide['button_url']); ?>"><?php echo bdevs_element_kses_basic( $slide['tab_title'] ); ?></a></h4>
                                <?php endif; ?>

                                <?php if ( !empty($slide['tab_content_info']) ) : ?>
                                <p><?php echo bdevs_element_kses_basic( $slide['tab_content_info'] ); ?></p>
                                <?php endif; ?>

                                <div class="service-btn">
                                    <a class="site__btn4 no-bg" href="<?php echo esc_url( $slide['button_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['button_text'] ); ?>
                                        <span class="site__btn4-icon">
                                            <i class="fal fa-long-arrow-right"></i>
                                            <i class="fal fa-long-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
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