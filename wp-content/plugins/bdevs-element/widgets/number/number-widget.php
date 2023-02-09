<?php
namespace BdevsElement\Widget;

Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use BdevsElement\Controls\Group_Control_Foreground_class;

defined( 'ABSPATH' ) || die();

class Number extends BDevs_El_Widget {

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
        return 'number';
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
		return __( 'Number', 'bdevselement' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/number/';
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
		return 'eicon-anchor';
	}

	public function get_keywords() {
		return [ 'number', 'animate', 'text' ];
	}

	/**
	 * Register content related controls
	 */
	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_number',
			[
				'label' => __( 'Number', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'number_text',
			[
				'label' => __( 'Text', 'bdevselement' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'default' => 7,
                'dynamic' => [
                    'active' => true,
                ]
			]
		);

        $this->add_control(
            'animate_number',
            [
                'label' => __( 'Animate', 'bdevselement' ),
                'description' => __( 'Only number is animatable' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'animate_duration',
            [
                'label' => __( 'Duration', 'bdevselement' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 10000,
                'step' => 10,
                'default' => 500,
                'condition' => [
                    'animate_number!' => ''
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
			'number_background_style',
			[
				'label' => __( 'General', 'bdevselement' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'number_width_height',
			[
				'label' => __( 'Size', 'bdevselement' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdevs-number-body' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'number_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-number-body ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'number_border',
                'label' => __( 'Border', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .bdevs-number-body',
            ]
        );

        $this->add_control(
            'number_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-number-body' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'number_box_shadow',
				'label' => __( 'Box Shadow', 'bdevselement' ),
				'selector' => '{{WRAPPER}} .bdevs-number-body',
			]
		);

		$this->add_responsive_control(
			'number_align',
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
					'{{WRAPPER}} .bdevs-number-body'  => '{{VALUE}};'
				],
                'selectors_dictionary' => [
                    'left' => 'float: left',
                    'center' => 'margin: 0 auto',
                    'right' => 'float:right'
                ],
			]
		);

        $this->add_control(
            '_heading_bg',
            [
                'label' => __( 'Background', 'bdevselement' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'number_background_color',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .bdevs-number-body',
            ]
        );

        $this->add_control(
                '_heading_bg_overlay',
                [
                    'label' => __( 'Background Overaly', 'bdevselement' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'number_background_overlay_color',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .bdevs-number-overlay',
            ]
        );

        $this->add_control(
            'number_background_overlay_blend_mode',
            [
                'label' => __( 'Blend Mood', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => bdevs_element_get_css_blend_modes(),
                'selectors' => [
                    '{{WRAPPER}} .bdevs-number-overlay' => 'mix-blend-mode: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'number_background_overlay_blend_mode_opacity',
            [
                'label' => __( 'Opacity', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => .1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-number-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            '_section_style_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_text_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-number-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_text_typography',
                'label' => __( 'Typography', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .bdevs-number-text',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'number_text_shadow',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .bdevs-number-text',
            ]
        );

        $this->add_control(
            'number_text_rotate',
            [
                'label' => __( 'Text Rotate', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-number-text' => '-webkit-transform: rotate({{SIZE}}deg);-ms-transform: rotate({{SIZE}}deg);transform: rotate({{SIZE}}deg);'
                ],
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'number_text', 'class', 'bdevs-number-text' );
		$number = $settings['number_text'];

		if ( $settings['animate_number'] ) {
		    $data = [
		        'toValue' => intval( $settings['number_text'] ),
                'duration' => intval( $settings['animate_duration'] ),
            ];
		    $this->add_render_attribute( 'number_text', 'data-animation', wp_json_encode( $data ) );
            $number = 0;
        }
        ?>

		<div class="bdevs-number-body">
			<div class="bdevs-number-overlay"></div>
			<span <?php $this->print_render_attribute_string( 'number_text' ); ?>><?php echo esc_html( $number ); ?></span>
		</div>

		<?php
	}
}
