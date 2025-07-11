<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_script(
		'hello-elementor-child-main',
		get_stylesheet_directory_uri() . '/js/main.js',
		[ 'jquery' ],
		HELLO_ELEMENTOR_CHILD_VERSION,
		true
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

/**
 * Register Custom Elementor Widgets
 */
function register_custom_elementor_widgets( $widgets_manager ) {

	require_once( get_stylesheet_directory() . '/widgets/hero-section-widget.php' );
	// require_once( get_stylesheet_directory() . '/widgets/portfolio-hero-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/inner-hero-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/introduction-section-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/introduction-image-left.php' );
	require_once( get_stylesheet_directory() . '/widgets/portfolio-section-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/gallery-showcase-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/services-accordion-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/team-section-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/team-showcase-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/testimonials-section-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/contact-cta-section-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/footer-section-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/team-member-profile-widget.php' );
	require_once( get_stylesheet_directory() . '/widgets/fire-features-text-widget.php' );

	$widgets_manager->register( new \Hero_Section_Widget() );
	$widgets_manager->register( new \Portfolio_Hero_Widget() );
	$widgets_manager->register( new \Introduction_Section_Widget() );
	$widgets_manager->register( new \Elementor_Introduction_Image_Left_Widget() );
	$widgets_manager->register( new \Portfolio_Section_Widget() );
	$widgets_manager->register( new \Gallery_Showcase_Widget() );
	$widgets_manager->register( new \Services_Accordion_Widget() );
	$widgets_manager->register( new \Team_Section_Widget() );
	$widgets_manager->register( new \Team_Showcase_Widget() );
	$widgets_manager->register( new \Testimonials_Section_Widget() );
	$widgets_manager->register( new \Contact_CTA_Section_Widget() );
	$widgets_manager->register( new \Footer_Section_Widget() );
	$widgets_manager->register( new \Team_Member_Profile_Widget() );
	$widgets_manager->register( new \Fire_Features_Text_Widget() );

}
add_action( 'elementor/widgets/register', 'register_custom_elementor_widgets' );

/**
 * Add new Elementor Categories
 */
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'modern-metals-theme',
		[
			'title' => esc_html__( 'Modern Metals Theme', 'hello-elementor-child' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

/**
 * Enqueue FontAwesome for the scroll indicator
 */
function enqueue_fontawesome() {
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_fontawesome' );


