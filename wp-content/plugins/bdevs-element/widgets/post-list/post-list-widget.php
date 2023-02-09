<?php
namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Core\Schemes;
use \Elementor\Group_Control_Background;
use \BdevsElement\BDevs_El_Select2;

defined( 'ABSPATH' ) || die();

class Post_List extends BDevs_El_Widget {

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
        return 'post_list';
    }

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title () {
		return __( 'Post List', 'bdevselement' );
	}

	public function get_custom_help_url () {
		return 'http://elementor.bdevs.net/widgets/post-list/';
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon () {
		return 'eicon-parallax';
	}

	public function get_keywords () {
		return [ 'posts', 'post', 'post-list', 'list', 'news' ];
	}

	/**
	 * Get a list of All Post Types
	 *
	 * @return array
	 */
	public function get_post_types () {
		$post_types = bdevs_element_get_post_types( [],[ 'elementor_library', 'attachment' ] );
		return $post_types;
	}

	protected function register_content_controls () {
		$this->start_controls_section(
			'_section_post_list',
			[
				'label' => __( 'List', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_type',
			[
				'label' => __( 'Source', 'bdevselement' ),
				'type' => Controls_Manager::SELECT,
				'options' => $this->get_post_types(),
				'default' => key( $this->get_post_types() ),
			]
		);

		$this->add_control(
			'show_post_by',
			[
				'label' => __( 'Show post by:', 'bdevselement' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'recent',
				'options' => [
					'recent' => __( 'Recent Post', 'bdevselement' ),
					'selected' => __( 'Selected Post', 'bdevselement' ),
				],

			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Item Limit', 'bdevselement' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
				'dynamic' => [ 'active' => true ],
				'condition' => [
					'show_post_by' => [ 'recent' ],
				]
			]
		);

		$this->add_control(
			'list_btn_text',
			[
				'label' => __( 'BTN Text', 'bdevselement' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Read More', 'bdevselement' ),
				'placeholder' => __( 'Link Text', 'bdevselement' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		  $this->add_control(
            'bild_post_content',
            [
                'label' => __('Content', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
					'design_style' => ['style_2']
				],
            ]
        );

        $this->add_control(
            'bild_post_content_limit',
            [
                'label' => __('Content Limit', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '14',
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'tp_post_content' => 'yes'
                ],
                'condition' => [
					'design_style' => ['style_2']
				],
            ]
        );


		$repeater = [];

		foreach ( $this->get_post_types() as $key => $value ) {

			$repeater[$key] = new Repeater();

			$repeater[$key]->add_control(
				'title',
				[
					'label' => __( 'Title', 'bdevselement' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => __( 'Customize Title', 'bdevselement' ),
					'dynamic' => [
						'active' => true,
					],
				]
			);			

			$repeater[$key]->add_control(
				'post_short_text',
				[
					'label' => __( 'Short Content', 'bdevselement' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => __( 'Short Content', 'bdevselement' ),
					'rows' => 3,
					'dynamic' => [
						'active' => true,
					],
				]
			);						

			$repeater[$key]->add_control(
				'list_count_number',
				[
					'label' => __( 'Count Number', 'bdevselement' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => __( '01', 'bdevselement' ),
					'placeholder' => __( 'Count Number', 'bdevselement' ),
					'dynamic' => [
						'active' => true,
					],
				]
			);

			$repeater[$key]->add_control(
				'service_author_name',
				[
					'label' => __( 'Author Name', 'bdevselement' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => __( 'Jon Williamson', 'bdevselement' ),
					'placeholder' => __( 'Author Name', 'bdevselement' ),
					'dynamic' => [
						'active' => true,
					],
				]
			);
			

			$repeater[$key]->add_control(
				'post_id',
				[
					'label' => __( 'Select ', 'bdevselement' ) . $value,
					'label_block' => true,
					'type' => BDevs_El_Select2::TYPE,
					'multiple' => false,
					'placeholder' => 'Search ' . $value,
					'data_options' => [
						'post_type' => $key,
						'action' => 'bdevs_element_post_list_query'
					],
				]
			);

			$this->add_control(
				'selected_list_' . $key,
				[
					'label' => '',
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater[$key]->get_controls(),
					'title_field' => '{{ title }}',
					'condition' => [
						'show_post_by' => 'selected',
						'post_type' => $key
					],
				]
			);
		}

		$this->end_controls_section();

		//Settings
		$this->start_controls_section(
			'_section_settings',
			[
				'label' => __( 'Settings', 'bdevselement' ),
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );


		$this->add_control(
			'feature_image',
			[
				'label' => __( 'Featured Image', 'bdevselement' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bdevselement' ),
				'label_off' => __( 'Hide', 'bdevselement' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'post_image',
				'default' => 'thumbnail',
				'exclude' => [
					'custom'
				],
				'condition' => [
					'feature_image' => 'yes'
				]
			]
		);

		$this->add_control(
			'list_icon',
			[
				'label' => __( 'List Icon', 'bdevselement' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bdevselement' ),
				'label_off' => __( 'Hide', 'bdevselement' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'feature_image!' => 'yes'
				]
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'bdevselement' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'far fa-check-circle',
					'library' => 'reguler'
				],
				'condition' => [
					'list_icon' => 'yes',
					'feature_image!' => 'yes'
				]
			]
		);

		$this->add_control(
			'meta',
			[
				'label' => __( 'Show Meta', 'bdevselement' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bdevselement' ),
				'label_off' => __( 'Hide', 'bdevselement' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'author_meta',
			[
				'label' => __( 'Author', 'bdevselement' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bdevselement' ),
				'label_off' => __( 'Hide', 'bdevselement' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'meta' => 'yes',
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'author_icon',
			[
				'label' => __( 'Author Icon', 'bdevselement' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-user',
					'library' => 'reguler',
				],
				'condition' => [
					'meta' => 'yes',
					'author_meta' => 'yes',
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'date_meta',
			[
				'label' => __( 'Date', 'bdevselement' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bdevselement' ),
				'label_off' => __( 'Hide', 'bdevselement' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'meta' => 'yes',
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'date_icon',
			[
				'label' => __( 'Date Icon', 'bdevselement' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-calendar-check',
					'library' => 'reguler',
				],
				'condition' => [
					'meta' => 'yes',
					'date_meta' => 'yes',
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'category_meta',
			[
				'label' => __( 'Category', 'bdevselement' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bdevselement' ),
				'label_off' => __( 'Hide', 'bdevselement' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'meta' => 'yes',
					'post_type' => 'post',
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'category_icon',
			[
				'label' => __( 'Category Icon', 'bdevselement' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-folder-open',
					'library' => 'reguler',
				],
				'condition' => [
					'meta' => 'yes',
					'category_meta' => 'yes',
					'post_type' => 'post',
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'meta_position',
			[
				'label' => __( 'Meta Position', 'bdevselement' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bottom',
				'options' => [
					'top' => __( 'Top', 'bdevselement' ),
					'bottom' => __( 'Bottom', 'bdevselement' ),
				],
				'condition' => [
					'meta' => 'yes',
					'design_style' => ['style_1','style_2','style_3']
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title HTML Tag', 'bdevselement' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'title' => __( 'H1', 'bdevselement' ),
						'icon' => 'eicon-editor-h1'
					],
					'h2' => [
						'title' => __( 'H2', 'bdevselement' ),
						'icon' => 'eicon-editor-h2'
					],
					'h3' => [
						'title' => __( 'H3', 'bdevselement' ),
						'icon' => 'eicon-editor-h3'
					],
					'h4' => [
						'title' => __( 'H4', 'bdevselement' ),
						'icon' => 'eicon-editor-h4'
					],
					'h5' => [
						'title' => __( 'H5', 'bdevselement' ),
						'icon' => 'eicon-editor-h5'
					],
					'h6' => [
						'title' => __( 'H6', 'bdevselement' ),
						'icon' => 'eicon-editor-h6'
					]
				],
				'default' => 'h3',
				'toggle' => false,
			]
		);

		$this->add_control(
			'item_align',
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
				'selectors_dictionary' => [
					'left' => 'justify-content: flex-start',
					'center' => 'justify-content: center',
					'right' => 'justify-content: flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a' => '{{VALUE}};'
				],
				'condition' => [
					'view' => 'list',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_controls () {

		$this->start_controls_section(
			'_section_post_list_style',
			[
				'label' => __( 'List', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'list_item_common',
			[
				'label' => __( 'Common', 'bdevselement' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'list_item_margin',
			[
				'label' => __( 'Margin', 'bdevselement' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'list_item_padding',
			[
				'label' => __( 'Padding', 'bdevselement' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'list_item_background',
				'label' => __( 'Background', 'bdevselement' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'list_item_box_shadow',
				'label' => __( 'Box Shadow', 'bdevselement' ),
				'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'list_item_border',
				'label' => __( 'Border', 'bdevselement' ),
				'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
			]
		);

		$this->add_responsive_control(
			'list_item_border_radius',
			[
				'label' => __( 'Border Radius', 'bdevselement' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'advance_style',
			[
				'label' => __( 'Advance Style', 'bdevselement' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'bdevselement' ),
				'label_off' => __( 'Off', 'bdevselement' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'list_item_first',
			[
				'label' => __( 'First Item', 'bdevselement' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'advance_style' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'list_item_first_child_margin',
			[
				'label' => __( 'Margin', 'bdevselement' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:first-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'advance_style' => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'list_item_first_child_border',
				'label' => __( 'Border', 'bdevselement' ),
				'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:first-child',
				'condition' => [
					'advance_style' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'list_item_last',
			[
				'label' => __( 'Last Item', 'bdevselement' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'advance_style' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'list_item_last_child_margin',
			[
				'label' => __( 'Margin', 'bdevselement' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'advance_style' => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'list_item_last_child_border',
				'label' => __( 'Border', 'bdevselement' ),
				'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:last-child',
				'condition' => [
					'advance_style' => 'yes',
				]
			]
		);

		$this->end_controls_section();
		//Title Style
		$this->start_controls_section(
			'_section_post_list_title_style',
			[
				'label' => __( 'Title', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'bdevselement' ),
				'scheme' => Schemes\Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bdevselement-post-list-title',
			]
		);

		$this->start_controls_tabs( 'title_tabs' );
		$this->start_controls_tab(
			'title_normal_tab',
			[
				'label' => __( 'Normal', 'bdevselement' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'bdevselement' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_hover_tab',
			[
				'label' => __( 'Hover', 'bdevselement' ),
			]
		);

		$this->add_control(
			'title_hvr_color',
			[
				'label' => __( 'Color', 'bdevselement' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a:hover .bdevselement-post-list-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		//List Icon Style
		$this->start_controls_section(
			'_section_list_icon_feature_iamge_style',
			[
				'label' => __( 'Icon & Feature Image', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'feature_image',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'list_icon',
							'operator' => '==',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'bdevselement' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} span.bdevselement-post-list-icon' => 'color: {{VALUE}};',
				],
				'condition' => [
					'feature_image!' => 'yes',
					'list_icon' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Font Size', 'bdevselement' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} span.bdevselement-post-list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'feature_image!' => 'yes',
					'list_icon' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'icon_line_height',
			[
				'label' => __( 'Line Height', 'bdevselement' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} span.bdevselement-post-list-icon' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'feature_image!' => 'yes',
					'list_icon' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => __( 'Image Width', 'bdevselement' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-item a img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'feature_image' => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_boder',
				'label' => __( 'Border', 'bdevselement' ),
				'selector' => '{{WRAPPER}} .bdevselement-post-list-item a img',
				'condition' => [
					'feature_image' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'image_boder_radius',
			[
				'label' => __( 'Border Radius', 'bdevselement' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-item a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'feature_image' => 'yes',
				]
			]
		);

		$this->add_responsive_control(
			'icon_margin_right',
			[
				'label' => __( 'Margin Right', 'bdevselement' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} span.bdevselement-post-list-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bdevselement-post-list-item a img' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//List Meta Style
		$this->start_controls_section(
			'_section_list_meta_style',
			[
				'label' => __( 'Meta', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'meta' => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => __( 'Typography', 'bdevselement' ),
				'scheme' => Schemes\Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bdevselement-post-list-meta-wrap span',
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'bdevselement' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-meta-wrap span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'meta_space',
			[
				'label' => __( 'Space Between', 'bdevselement' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-meta-wrap span' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bdevselement-post-list-meta-wrap span:last-child' => 'margin-right: 0;',
				],
			]
		);

		$this->add_responsive_control(
			'meta_box_margin',
			[
				'label' => __( 'Margin', 'bdevselement' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-meta-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'meta_icon_heading',
			[
				'label' => __( 'Meta Icon', 'bdevselement' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'meta_icon_color',
			[
				'label' => __( 'Color', 'bdevselement' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-meta-wrap span i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'meta_icon_space',
			[
				'label' => __( 'Space Between', 'bdevselement' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-list-meta-wrap span i' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render () {

		$settings = $this->get_settings_for_display();
		if ( ! $settings['post_type'] ) return;
		$args = [
			'post_status' => 'publish',
			'post_type' => $settings['post_type'],
		];
		if ( 'recent' === $settings['show_post_by'] ) {
			$args['posts_per_page'] = $settings['posts_per_page'];
		}

		$selected_post_type = 'selected_list_'. $settings['post_type'];

		$customize_title = [];
		$ids = [];
		if ( 'selected' === $settings['show_post_by'] ) {
			$args['posts_per_page'] = -1;
			$lists = $settings['selected_list_' . $settings['post_type']];
			if ( ! empty( $lists ) ) {
				foreach ( $lists as $index => $value ) {
					$post_id = !empty($value['post_id']) ? $value['post_id'] : 0;
					$ids[] = $post_id;
					if ( $value['title'] ) $customize_title[$post_id] = $value['title'];
				}
			}
			$args['post__in'] = (array) $ids;
			$args['orderby'] = 'post__in';
		}

		if ( 'selected' === $settings['show_post_by'] && empty( $ids ) ) {
			$posts = [];
		} else {
			$posts = get_posts( $args );
		}

		$this->add_render_attribute( 'wrapper', 'class', [ 'bdevselement-post-list-wrapper' ] );
		$this->add_render_attribute( 'wrapper-inner', 'class', [ 'bdevselement-post-list p-0' ] );
		
		$this->add_render_attribute( 'item', 'class', [ 'bdevselement-post-list-item' ] );

		if ( !empty( $settings['design_style'] ) AND $settings['design_style'] == 'style_2' ):
		if ( count( $posts ) !== 0 ) : ?>


		<div class="bildpress-blog-list-1">
			<div class="container">
			  <div class="row">
			  	<?php foreach ( $posts as $inx => $post ): ?>
			<div class="col-lg-4 col-md-6">
				 <div class="single-blog mb-30">
            	<?php if ( 'yes' === $settings['feature_image'] ): ?>
                <div class="blog-img">
                    <?php echo get_the_post_thumbnail( $post->ID, $settings['post_image_size'] ); ?>
                </div>
                <?php endif; ?>

                <div class="blog-content arc-blog-content p-relative">
                	<?php if ( 'yes' === $settings['date_meta'] ): ?>
                    <div class="blog-date">
                    	<span class="date"><?php echo get_the_date( "d", $post->ID ); ?></span>
                        <span><?php echo get_the_date( "M Y", $post->ID ); ?></span>
                    </div>
                    <?php endif; ?>

                    <ul class="blog-meta-list">
                        <li>
                        	<?php if ( 'yes' === $settings['author_meta'] ): ?>
                            <span class="blog-meta-text">
                            	<a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">	
								<?php if ( $settings['author_icon'] ):
									Icons_Manager::render_icon( $settings['author_icon'], [ 'aria-hidden' => 'true' ] );
								endif;
								echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?>
								</a> 
							</span>
                            <?php endif; ?>
                        </li>
                    </ul>

            	    <?php $title = $post->post_title;
						if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_title ) ) {
							$title = $customize_title[$post->ID];
						}

						printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
							tag_escape( $settings['title_tag'] ),
							'class="blog-title-o"',
							esc_html( $title ),
							esc_url( get_the_permalink( $post->ID ) )
						);
					?>
        	        <?php if (!empty($settings['bild_post_content'])):
                        $bild_post_content_limit = (!empty($settings['bild_post_content_limit'])) ? $settings['bild_post_content_limit'] : '';
                      ?>
                        <p><?php print wp_trim_words( get_the_content(), $bild_post_content_limit, '' );  ?></p>

                    <?php else: ?>

                    	<?php if (!empty($settings['bild_post_content'])):
                        $bild_post_content_limit = (!empty($settings['bild_post_content_limit'])) ? $settings['bild_post_content_limit'] : '';
                         ?>
                    	<p><?php print wp_trim_words( get_the_content(), $bild_post_content_limit, '' );  ?></p>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if ( !empty($settings['list_btn_text']) ): ?>
                    <div class="blog-btn">
                        <a class="site__btn4 no-bg site__btn4-blog" href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php print $settings['list_btn_text'] ; ?>
                            <span class="site__btn4-icon">
                                <i class="fal fa-long-arrow-right"></i>
                                <i class="fal fa-long-arrow-right"></i>
                            </span>
                        </a>
                    </div>

                    <?php endif; ?>
                </div>
              </div>
			 </div>
			<?php endforeach; ?>
			 </div>
		 </div>
		</div>	

		<?php
		else:
			printf( '%1$s %2$s %3$s',
				__( 'No ', 'bdevselement' ),
				esc_html( $settings['post_type'] ),
				__( 'Found', 'bdevselement' )
			);
		endif;
		?>

		<?php elseif ( !empty( $settings['design_style'] ) AND $settings['design_style'] == 'style_3' ):
		if ( count( $posts ) !== 0 ) :?>

			<ul class="blog-sidebar-list">
				<?php foreach ( $posts as $inx => $post ): ?>
                <li class="blog-sidebar-link">
                	<?php if ( 'yes' === $settings['feature_image'] ): ?>
                    <div class="blog-sidebar-link-img" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, $settings['post_image_size'] ); ?>);">
                        
                    </div>
                    <?php endif; ?>

                    <div class="blog-sidebar-link-text">
	                    <?php $title = $post->post_title;
							if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_title ) ) {
								$title = $customize_title[$post->ID];
							}

							printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
								tag_escape( $settings['title_tag'] ),
								'class="blog-sidebar-link-title"',
								esc_html( $title ),
								esc_url( get_the_permalink( $post->ID ) )
							);
						?>

						<?php if ( 'yes' === $settings['date_meta'] ): ?>
                        <div class="blog-sidebar-link-date">
                            <span class="bs-icon">
                    			<?php if ( $settings['date_icon'] ):
									Icons_Manager::render_icon( $settings['date_icon'], [ 'aria-hidden' => 'true' ] );
								endif;
								?>
                            </span>
                            <span><?php echo get_the_date( "d M Y", $post->ID ); ?></span>
                            
                        </div>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>

		<?php
		else:
			printf( '%1$s %2$s %3$s',
				__( 'No ', 'bdevselement' ),
				esc_html( $settings['post_type'] ),
				__( 'Found', 'bdevselement' )
			);
		endif;
		?>

		<?php else: 
		if ( count( $posts ) !== 0 ) : ?>
			<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
				<ul <?php $this->print_render_attribute_string( 'wrapper-inner' ); ?> >
					<?php foreach ( $posts as $inx => $post ): 
						$categories = get_the_category( $post->ID );
					?>
					<li <?php $this->print_render_attribute_string( 'item' ); ?>>

					   	<div class="news1__item">
					   		<?php if ( 'yes' === $settings['feature_image'] ): ?>
	                        <div class="news1__thumb">
	                            <?php echo get_the_post_thumbnail( $post->ID, $settings['post_image_size'] ); ?>
	                            <a href="<?php print esc_url( get_category_link( $categories[0]->term_id )); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
	                        </div>
	                    	<?php elseif ( 'yes' === $settings['list_icon'] && $settings['icon'] ) :
								echo '<span class="bdevselement-post-list-icon">';
								Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
								echo '</span>';
							endif; ?>
	                        <div class="news1__content">
	                            <?php if ( 'top' == $settings['meta_position'] ) : ?>
	                            <div class="news1__data news1__data-top">
	                                <?php if ( 'yes' === $settings['meta'] ): ?>
									<?php if ( 'yes' === $settings['author_meta'] ): ?>
										<span class="bdevselement-post-list-author">
										<a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">	
										<?php if ( $settings['author_icon'] ):
											Icons_Manager::render_icon( $settings['author_icon'], [ 'aria-hidden' => 'true' ] );
										endif;
										echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?>
										</a>
										</span>
									<?php endif; ?>

									<?php if ( 'yes' === $settings['date_meta'] ): ?>
										<span>
											<a href="<?php echo esc_url( get_day_link( false, false, false ) ); ?>">
											<?php if ( $settings['date_icon'] ):
												Icons_Manager::render_icon( $settings['date_icon'], [ 'aria-hidden' => 'true' ] );
											endif;
											echo get_the_date( "M d, Y", $post->ID );
											
											?>
											</a>
										</span>
									<?php endif; ?>

									<?php if ( 'post' === $settings['post_type'] && 'yes' === $settings['category_meta'] ):
										$categories = get_the_category( $post->ID );
										?>
										<span>

										<a href="<?php print esc_url( get_category_link( $categories[0]->term_id )); ?>">	
										<?php if ( $settings['category_icon'] ):
											Icons_Manager::render_icon( $settings['category_icon'], [ 'aria-hidden' => 'true' ] );
										endif;
										echo esc_html( $categories[0]->name ); ?>
										</a>
										</span>
									<?php endif; ?>
								<?php endif; ?>
	                            </div>
	                            <?php endif; ?>

	                            <?php $title = $post->post_title;
								if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_title ) ) {
									$title = $customize_title[$post->ID];
								}

								
								printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
									tag_escape( $settings['title_tag'] ),
									'class="title"',
									esc_html( $title ),
									esc_url( get_the_permalink( $post->ID ) )
								);

								?>

	                            <?php if ( !empty($settings[$selected_post_type][$inx]['post_short_text']) ): ?>
	                            <div class="blog-info-text">
	                                <p><?php print $settings[$selected_post_type][$inx]['post_short_text'] ; ?></p>
	                            </div>
	                            <?php endif; ?>

								<?php if ( 'top' !== $settings['meta_position'] ) : ?>
	                            <div class="news1__data">
	                                <?php if ( 'yes' === $settings['meta'] ): ?>
									<?php if ( 'yes' === $settings['author_meta'] ): ?>
										<span class="bdevselement-post-list-author">
										<a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">	
										<?php if ( $settings['author_icon'] ):
											Icons_Manager::render_icon( $settings['author_icon'], [ 'aria-hidden' => 'true' ] );
										endif; 
											echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?>
										</a>
										</span>
									<?php endif; ?>

									<?php if ( 'yes' === $settings['date_meta'] ): ?>
										<span>
											<a href="<?php echo esc_url( get_day_link( false, false, false ) ); ?>">
											<?php if ( $settings['date_icon'] ):
												Icons_Manager::render_icon( $settings['date_icon'], [ 'aria-hidden' => 'true' ] );
											endif;
												echo get_the_date( "M d, Y", $post->ID );
											?>
											</a>
										</span>
									<?php endif; ?>

									<?php if ( 'post' === $settings['post_type'] && 'yes' === $settings['category_meta'] ):
										$categories = get_the_category( $post->ID );
										?>
										<span>

										<a href="<?php print esc_url( get_category_link( $categories[0]->term_id )); ?>">	
										<?php if ( $settings['category_icon'] ):
											Icons_Manager::render_icon( $settings['category_icon'], [ 'aria-hidden' => 'true' ] );
										endif;
										echo esc_html( $categories[0]->name ); ?>
										</a>
										</span>
									<?php endif; ?>
								<?php endif; ?>
	                            </div>
	                            <?php endif; ?>

	                        </div>
	                    </div>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php
		else:
			printf( '%1$s %2$s %3$s',
				__( 'No ', 'bdevselement' ),
				esc_html( $settings['post_type'] ),
				__( 'Found', 'bdevselement' )
			);
		endif;
		?>
		<?php endif;
	}
}
