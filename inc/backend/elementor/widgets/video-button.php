<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Video Button
 */
class CreamPoint_VideoPopup extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ivideopopup';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'XP Video Button', 'creampoint' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-youtube';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_creampoint' ];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Button', 'creampoint' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'creampoint' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start'    => [
						'title' => __( 'Left', 'creampoint' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'creampoint' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'creampoint' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .xp-video-button' => 'justify-content: {{VALUE}};',
				],
				'default' => '',
			]
		);

		$this->add_control(
			'vlink',
			[
				'label' => __( 'Video Link', 'creampoint' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'creampoint' ),
			]
		);

		$this->add_control(
			'caption',
			[
				'label' => __( 'Caption', 'creampoint' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'animate',
			[
				'label' => __( 'Animation', 'creampoint' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'creampoint' ),
				'label_off' => __( 'No', 'creampoint' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Button', 'creampoint' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Button
		$this->add_responsive_control(
			'btn_width',
			[
				'label' => __( 'Size', 'creampoint' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .btn-play' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_size',
			[
				'label' => __( 'Icon Size', 'creampoint' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .btn-play i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_icon_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'creampoint' ),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_border_color',
			[
				'label' => __( 'Border Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .btn-play span' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_circle',
			[
				'label' => __( 'Animation Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'animate'  => 'yes'
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'creampoint' ),
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label' => __( 'Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .btn-play:hover span' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn__hover_border_color',
			[
				'label' => __( 'Border Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_bg',
			[
				'label' => __( 'Background Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_circle',
			[
				'label' => __( 'Animation Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-play:hover span' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'animate'  => 'yes'
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();	

		$this->end_controls_section();

		$this->start_controls_section(
			'caption_section',
			[
				'label' => __( 'Caption', 'creampoint' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'caption!'  => ''
				]
			]
		);

		$this->add_control(
			'caption_color',
			[
				'label' => __( 'Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-video-button > span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'caption_typography',
				'selector' => '{{WRAPPER}} .xp-video-button > span',
			]
		);
		$this->add_responsive_control(
			'caption_space',
			[
				'label' => __( 'Spacing', 'creampoint' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .xp-video-button > span' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'button', 'class', 'btn-play' );

		?>
		
		<div class="xp-video-button flex-middle">
	        <a <?php echo wp_kses_post($this->get_render_attribute_string( 'button' )); ?> href="<?php echo esc_url( $settings['vlink'] ); ?>">
				<i class="xp-webicon-play"></i>
				<?php if( $settings['animate'] ) { echo '<span class="circle-1"></span>'; } ?>
	        </a>
	        <?php if( $settings['caption'] ) echo '<span class="font-second">' .$settings['caption']. '</span>'; ?>
	    </div>
	    
	    <?php
	}

}
// After the CreamPoint_VideoPopup class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new CreamPoint_VideoPopup() );