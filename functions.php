<?php
function modern_metals_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('title-tag');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Navigation',
    ));
}
add_action('after_setup_theme', 'modern_metals_setup');

function modern_metals_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('modern-metals-style', get_stylesheet_uri());
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts-modern-metals', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;500;600;700&family=DM+Sans:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('google-fonts-neucha', 'https://fonts.googleapis.com/css2?family=Neucha:wght@400&display=swap');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // Enqueue JavaScript
    wp_enqueue_script('modern-metals-script', get_template_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'modern_metals_scripts');

// Custom default menu fallback
function modern_metals_default_menu() {
    echo '<ul>';
    echo '<li class="dropdown"><a href="' . home_url('/portfolio') . '">portfolio</a></li>';
    echo '<li class="dropdown">';
    echo '<a href="#services">services</a>';
    echo '<div class="dropdown-content">';
    echo '<a href="' . home_url('/steel-works') . '">STEEL SCAPES</a>';
    echo '<a href="#fire-tables">FIRE TABLES</a>';
    echo '<a href="#other-works">OTHER WORKS</a>';
    echo '</div>';
    echo '</li>';
    echo '<li class="dropdown">';
    echo '<a href="#about">about us</a>';
    echo '<div class="dropdown-content">';
    echo '<a href="' . home_url('/meet-the-team') . '">MEET THE TEAM</a>';
    echo '</div>';
    echo '</li>';
    echo '<li><a href="#contact">contact us</a></li>';
    echo '</ul>';
}

// Include customizer options
require get_template_directory() . '/inc/customizer.php';

// Add body class for hero section detection
function modern_metals_body_class($classes) {
    // Add has-hero-section class to pages that should have transparent headers
    if (is_front_page() || is_home()) {
        $classes[] = 'has-hero-section';
    }
    
    // Check if current page has Elementor hero widget (we'll implement this later)
    if (defined('ELEMENTOR_VERSION') && is_page()) {
        global $post;
        $elementor_data = get_post_meta($post->ID, '_elementor_data', true);
        if (!empty($elementor_data) && strpos($elementor_data, 'modern-metals-hero') !== false) {
            $classes[] = 'has-hero-section';
        }
    }
    
    return $classes;
}
add_filter('body_class', 'modern_metals_body_class');

/**
 * Global Testimonials Functions
 * These functions make testimonials available throughout the site
 */

// Function to display testimonials (can be called anywhere)
function modern_metals_display_testimonials() {
    get_template_part('template-parts/testimonials');
}

// Shortcode for testimonials (can be used in Elementor, posts, pages)
function modern_metals_testimonials_shortcode($atts) {
    ob_start();
    get_template_part('template-parts/testimonials');
    return ob_get_clean();
}
add_shortcode('testimonials', 'modern_metals_testimonials_shortcode');

/**
 * Global Contact Modal Functions
 * These functions make contact modal available throughout the site
 */

// Function to display contact modal (can be called anywhere)
function modern_metals_display_contact_modal() {
    get_template_part('template-parts/contact-modal');
}

// Shortcode for contact modal (can be used in Elementor, posts, pages)
function modern_metals_contact_modal_shortcode($atts) {
    ob_start();
    get_template_part('template-parts/contact-modal');
    return ob_get_clean();
}
add_shortcode('contact_modal', 'modern_metals_contact_modal_shortcode');
?> 