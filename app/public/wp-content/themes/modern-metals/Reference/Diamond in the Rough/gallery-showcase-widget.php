<?php
/**
 * Gallery Showcase Widget for Elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Gallery_Showcase_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'gallery_showcase';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'Gallery Showcase', 'hello-elementor-child' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
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
		return [ 'gallery', 'showcase', 'slider', 'images', 'portfolio' ];
	}

	/**
	 * Register widget controls.
	 */
	protected function register_controls() {

		// Gallery Images Section
		$this->start_controls_section(
			'gallery_images_section',
			[
				'label' => esc_html__( 'Gallery Images', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gallery_images',
			[
				'label' => esc_html__( 'Gallery Images', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'image',
						'label' => esc_html__( 'Image', 'hello-elementor-child' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'alt_text',
						'label' => esc_html__( 'Alt Text', 'hello-elementor-child' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Gallery image', 'hello-elementor-child' ),
						'placeholder' => esc_html__( 'Image description', 'hello-elementor-child' ),
					],
				],
				'default' => [
					[
						'image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/gallery/project1.png' ],
						'alt_text' => esc_html__( 'Modern metal landscaping project', 'hello-elementor-child' ),
					],
					[
						'image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/gallery/project2.png' ],
						'alt_text' => esc_html__( 'Custom metal planter design', 'hello-elementor-child' ),
					],
					[
						'image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/gallery/project3.png' ],
						'alt_text' => esc_html__( 'Metal landscape installation', 'hello-elementor-child' ),
					],
					[
						'image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/gallery/project4.jpg' ],
						'alt_text' => esc_html__( 'Metal fire feature design', 'hello-elementor-child' ),
					],
					[
						'image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/gallery/project5.png' ],
						'alt_text' => esc_html__( 'Custom metal work project', 'hello-elementor-child' ),
					],
					[
						'image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/gallery/project6.jpg' ],
						'alt_text' => esc_html__( 'Metal landscape architecture', 'hello-elementor-child' ),
					],
				],
				'title_field' => '{{{ alt_text }}}',
			]
		);

		$this->end_controls_section();

		// Sidebar Content Section
		$this->start_controls_section(
			'sidebar_content_section',
			[
				'label' => esc_html__( 'Sidebar Content', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sidebar_title',
			[
				'label' => esc_html__( 'Sidebar Title', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'OUR WORK', 'hello-elementor-child' ),
				'placeholder' => esc_html__( 'OUR WORK', 'hello-elementor-child' ),
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

		// Layout Section
		$this->start_controls_section(
			'layout_section',
			[
				'label' => esc_html__( 'Layout Options', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_width',
			[
				'label' => esc_html__( 'Layout Width', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'contained',
				'options' => [
					'contained' => esc_html__( 'Contained (Default)', 'hello-elementor-child' ),
					'full-width' => esc_html__( 'Full Width (Edge to Edge)', 'hello-elementor-child' ),
					'wide' => esc_html__( 'Wide (Minimal Padding)', 'hello-elementor-child' ),
				],
			]
		);

		$this->add_control(
			'layout_description',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => '<small><strong>Contained:</strong> Standard container with max-width<br><strong>Full Width:</strong> Extends to viewport edges<br><strong>Wide:</strong> No max-width but keeps padding</small>',
				'content_classes' => 'elementor-control-field-description',
			]
		);

		$this->end_controls_section();

		// Style Section - Gallery
		$this->start_controls_section(
			'gallery_style',
			[
				'label' => esc_html__( 'Gallery', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'gallery_height',
			[
				'label' => esc_html__( 'Gallery Height', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 800,
					],
					'vh' => [
						'min' => 30,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 558,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery-container' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Image Border Radius', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gallery-slide img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Navigation
		$this->start_controls_section(
			'navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'nav_button_color',
			[
				'label' => esc_html__( 'Button Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .gallery-btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'nav_arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .gallery-arrow::before, {{WRAPPER}} .gallery-arrow::after' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'nav_button_size',
			[
				'label' => esc_html__( 'Button Size', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 80,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery-btn' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Sidebar
		$this->start_controls_section(
			'sidebar_style',
			[
				'label' => esc_html__( 'Sidebar', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sidebar_background',
			[
				'label' => esc_html__( 'Background Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .gallery-sidebar' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sidebar_title_color',
			[
				'label' => esc_html__( 'Title Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .sidebar-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sidebar_title_typography',
				'selector' => '{{WRAPPER}} .sidebar-title',
			]
		);

		$this->add_control(
			'sidebar_dot_color',
			[
				'label' => esc_html__( 'Dot Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .sidebar-dot' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sidebar_button_color',
			[
				'label' => esc_html__( 'Button Text Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .sidebar-contact-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sidebar_button_background',
			[
				'label' => esc_html__( 'Button Background', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .sidebar-contact-btn' => 'background-color: {{VALUE}}',
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
		
		// Determine layout classes
		$layout_classes = '';
		switch ( $settings['layout_width'] ) {
			case 'full-width':
				$layout_classes = 'full-width-section';
				break;
			case 'wide':
				$layout_classes = 'no-max-width minimal-padding';
				break;
			default:
				$layout_classes = '';
				break;
		}
		?>

		<section class="gallery-showcase <?php echo esc_attr( $layout_classes ); ?>">
			<div class="gallery-container">
				<div class="gallery-track">
					<?php foreach ( $settings['gallery_images'] as $index => $item ) : ?>
						<?php 
						$image_url = $item['image']['url'] ?: get_stylesheet_directory_uri() . '/assets/home/gallery/project' . ($index + 1) . '.png';
						?>
						<div class="gallery-slide">
							<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $item['alt_text'] ); ?>" />
						</div>
					<?php endforeach; ?>
				</div>
				<div class="gallery-nav">
					<button class="gallery-btn prev-btn">
						<span class="gallery-arrow left-arrow"></span>
					</button>
					<button class="gallery-btn next-btn">
						<span class="gallery-arrow right-arrow"></span>
					</button>
				</div>
			</div>
			<div class="gallery-sidebar">
				<div class="sidebar-content">
					<div class="sidebar-title-container">
						<div class="sidebar-dot"></div>
						<h3 class="sidebar-title"><?php echo esc_html( $settings['sidebar_title'] ); ?></h3>
					</div>
					<button class="sidebar-contact-btn" data-action="contact-modal"><?php echo esc_html( $settings['contact_button_text'] ); ?></button>
				</div>
			</div>
		</section>
		<?php
	}

	/**
	 * Render widget output in the editor.
	 */
	protected function content_template() {
		?>
		<#
		var galleryImages = settings.gallery_images || [];
		
		// Determine layout classes
		var layoutClasses = '';
		switch ( settings.layout_width ) {
			case 'full-width':
				layoutClasses = 'full-width-section';
				break;
			case 'wide':
				layoutClasses = 'no-max-width minimal-padding';
				break;
			default:
				layoutClasses = '';
				break;
		}
		#>
		<section class="gallery-showcase {{{ layoutClasses }}}">
			<div class="gallery-container">
				<div class="gallery-track">
					<# _.each( galleryImages, function( item, index ) { 
						var imageUrl = item.image.url || '<?php echo get_stylesheet_directory_uri(); ?>/assets/home/gallery/project' + (index + 1) + '.png';
					#>
						<div class="gallery-slide">
							<img src="{{{ imageUrl }}}" alt="{{{ item.alt_text }}}" />
						</div>
					<# }); #>
				</div>
				<div class="gallery-nav">
					<button class="gallery-btn prev-btn">
						<span class="gallery-arrow left-arrow"></span>
					</button>
					<button class="gallery-btn next-btn">
						<span class="gallery-arrow right-arrow"></span>
					</button>
				</div>
			</div>
			<div class="gallery-sidebar">
				<div class="sidebar-content">
					<div class="sidebar-title-container">
						<div class="sidebar-dot"></div>
						<h3 class="sidebar-title">{{{ settings.sidebar_title }}}</h3>
					</div>
					<button class="sidebar-contact-btn" data-action="contact-modal">{{{ settings.contact_button_text }}}</button>
				</div>
			</div>
		</section>
		<?php
	}
} 