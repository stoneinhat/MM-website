<?php
/**
 * Portfolio Hero Widget for Elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Portfolio_Hero_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'inner_hero';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'Inner Hero', 'hello-elementor-child' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}

	/**
	 * Get custom help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories() {
		return [ 'modern-metals-theme' ];
	}

	/**
	 * Get widget keywords.
	 */
	public function get_keywords() {
		return [ 'portfolio', 'hero', 'banner', 'header', 'modern', 'metals' ];
	}

	/**
	 * Register widget controls.
	 */
	protected function register_controls() {

		// Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label' => esc_html__( 'Title', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PORTFOLIO', 'hello-elementor-child' ),
				'placeholder' => esc_html__( 'Type your title here', 'hello-elementor-child' ),
			]
		);

		$this->add_control(
			'hero_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Discover our work', 'hello-elementor-child' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'hello-elementor-child' ),
			]
		);

		$this->add_control(
			'contact_button_text',
			[
				'label' => esc_html__( 'Contact Button Text', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CONTACT US', 'hello-elementor-child' ),
				'placeholder' => esc_html__( 'CONTACT US', 'hello-elementor-child' ),
			]
		);

		$this->add_control(
			'contact_button_url',
			[
				'label' => esc_html__( 'Contact Button URL', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'hello-elementor-child' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$this->add_control(
			'show_scroll_indicator',
			[
				'label' => esc_html__( 'Show Scroll Indicator', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hello-elementor-child' ),
				'label_off' => esc_html__( 'Hide', 'hello-elementor-child' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		// Background Section
		$this->start_controls_section(
			'background_section',
			[
				'label' => esc_html__( 'Background', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'background_image',
			[
				'label' => esc_html__( 'Background Image', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_stylesheet_directory_uri() . '/assets/home/DJI_0596 1.jpg',
				],
			]
		);

		$this->add_control(
			'overlay_opacity',
			[
				'label' => esc_html__( 'Overlay Opacity', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-overlay' => 'opacity: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .hero-overlay' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Content
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__( 'Content Style', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .hero-title',
			]
		);

		$this->add_control(
			'title_text_shadow',
			[
				'label' => esc_html__( 'Title Text Shadow', 'hello-elementor-child' ),
				'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
				'selector' => '{{WRAPPER}} .hero-title',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Subtitle Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .hero-subtitle',
			]
		);

		$this->add_control(
			'subtitle_text_shadow',
			[
				'label' => esc_html__( 'Subtitle Text Shadow', 'hello-elementor-child' ),
				'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
				'selector' => '{{WRAPPER}} .hero-subtitle',
			]
		);

		$this->add_control(
			'content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hello-elementor-child' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hello-elementor-child' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hello-elementor-child' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .hero-content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Button
		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Button Style', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Text Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .hero-contact-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Button Background Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'transparent',
				'selectors' => [
					'{{WRAPPER}} .hero-contact-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label' => esc_html__( 'Button Border Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .hero-contact-btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .hero-contact-btn',
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__( 'Button Padding', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '30',
					'bottom' => '15',
					'left' => '30',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .hero-contact-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Button Border Radius', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .hero-contact-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Scroll Indicator
		$this->start_controls_section(
			'scroll_indicator_style',
			[
				'label' => esc_html__( 'Scroll Indicator Style', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_scroll_indicator' => 'yes',
				],
			]
		);

		$this->add_control(
			'scroll_indicator_color',
			[
				'label' => esc_html__( 'Scroll Indicator Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .scroll-indicator i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'scroll_indicator_size',
			[
				'label' => esc_html__( 'Scroll Indicator Size', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .scroll-indicator i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$contact_target = $settings['contact_button_url']['is_external'] ? ' target="_blank"' : '';
		$contact_nofollow = $settings['contact_button_url']['nofollow'] ? ' rel="nofollow"' : '';
		$background_image_url = $settings['background_image']['url'] ?: get_stylesheet_directory_uri() . '/assets/home/DJI_0596 1.jpg';

		$widget_id = $this->get_id();
		?>
		<!-- Hero Section -->
		<section id="portfolio-hero-<?php echo $widget_id; ?>" class="hero-inner" style="background-image: url('<?php echo esc_url( $background_image_url ); ?>'); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 400px; display: flex; align-items: center; justify-content: center; position: relative;">
			<div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></div>
			<div class="hero-content" style="position: relative; z-index: 2; text-align: center;">
				<h1 class="hero-title"><?php echo esc_html( $settings['hero_title'] ); ?></h1>
				<?php if ( ! empty( $settings['hero_subtitle'] ) ) : ?>
					<p class="hero-subtitle"><?php echo esc_html( $settings['hero_subtitle'] ); ?></p>
				<?php endif; ?>
				<a href="<?php echo esc_url( $settings['contact_button_url']['url'] ); ?>" class="hero-contact-btn"<?php echo $contact_target . $contact_nofollow; ?>><?php echo esc_html( $settings['contact_button_text'] ); ?></a>
			</div>
			<?php if ( 'yes' === $settings['show_scroll_indicator'] ) : ?>
				<div class="scroll-indicator" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 2;">
					<i class="fas fa-chevron-down"></i>
				</div>
			<?php endif; ?>
		</section>
		<?php
	}

	/**
	 * Render widget output in the editor.
	 */
	protected function content_template() {
		?>
		<#
		var contactTarget = settings.contact_button_url.is_external ? ' target="_blank"' : '';
		var contactNofollow = settings.contact_button_url.nofollow ? ' rel="nofollow"' : '';
		var backgroundImageUrl = settings.background_image.url || '<?php echo get_stylesheet_directory_uri(); ?>/assets/home/DJI_0596 1.jpg';
		#>
		<!-- Hero Section -->
		<section class="hero-inner" style="background-image: url('{{{ backgroundImageUrl }}}'); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 400px; display: flex; align-items: center; justify-content: center; position: relative;">
			<div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></div>
			<div class="hero-content" style="position: relative; z-index: 2; text-align: center;">
				<h1 class="hero-title">{{{ settings.hero_title }}}</h1>
				<# if ( settings.hero_subtitle ) { #>
					<p class="hero-subtitle">{{{ settings.hero_subtitle }}}</p>
				<# } #>
				<a href="{{{ settings.contact_button_url.url }}}" class="hero-contact-btn"{{{ contactTarget }}}{{{ contactNofollow }}}>{{{ settings.contact_button_text }}}</a>
			</div>
			<# if ( 'yes' === settings.show_scroll_indicator ) { #>
				<div class="scroll-indicator" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 2;">
					<i class="fas fa-chevron-down"></i>
				</div>
			<# } #>
		</section>
		<?php
	}
} 