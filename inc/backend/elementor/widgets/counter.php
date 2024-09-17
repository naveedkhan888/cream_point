<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Counter
 */
class CreamPoint_Counter extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icounter';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'XP Counter 1', 'creampoint' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-counter';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_creampoint' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Counter', 'creampoint' ),
			]
		);
		$this->add_control(
			'pos_num',
			[
				'label' => __( 'Number Position', 'creampoint' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'creampoint' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => __( 'Top', 'creampoint' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => __( 'Right', 'creampoint' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'number-',
				'toggle' => false,
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'creampoint' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'creampoint' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'creampoint' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'creampoint' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .xp-counter' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'pos_num' => 'top',
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title:', 'creampoint' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Current Clients', 'creampoint' ),
			]
		);

		$this->add_control(
			'number',
			[
				'label' => 'Number:',
				'type' => Controls_Manager::TEXT,
				'default' => __( '180', 'creampoint' ),
			]
		);

		$this->add_control(
			'after_number',
			[
				'label' => __( 'After Number:', 'creampoint' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'creampoint' ),
			]
		);		

		$this->add_control(
			'time',
			[
				'label' => __( 'Duration', 'creampoint' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1000,
						'max'  => 10000,
						'step' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 2000,
				],
			]
		);

		$this->end_controls_section();

		//Style

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Style', 'creampoint' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Icon
		$this->add_control(
			'heading_number',
			[
				'label' => __( 'Number', 'creampoint' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-counter span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .xp-counter span',
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'creampoint' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_space',
			[
				'label' => __( 'Spacing', 'creampoint' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.number-top h6' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.number-left h6' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.number-right h6' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'creampoint' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-counter h6' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .xp-counter h6',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
    	<div class='xp-counter icounter' data-counter='<?php echo esc_attr( $settings['number'] ); ?>'>
        	<div class="c-number">
        		<span class="num" data-to="<?php echo esc_attr( $settings['number'] ); ?>" data-time= "<?php echo esc_attr( $settings['time']['size'] ); ?>"></span><?php if( $settings['after_number'] ) { echo '<span>' .$settings['after_number']. '</span>'; } ?>
        	</div>
        	<?php if( $settings['title'] ) { ?><h6><?php echo wp_kses_post( $settings['title'] ); ?></h6><?php } ?>     				        
	    </div>
	    <?php
	}

	public function get_keywords() {
		return [ 'funfact', 'number' ];
	}
}
// After the CreamPoint_Counter class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new CreamPoint_Counter() );