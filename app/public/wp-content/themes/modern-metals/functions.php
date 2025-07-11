<?php
function modern_metals_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('title-tag');
    
    // Add Elementor support
    add_theme_support('elementor');
    
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

/**
 * Elementor Support Functions
 */

// Remove default Elementor global styles if needed
function modern_metals_remove_elementor_global_styles() {
    wp_dequeue_style('elementor-global');
    wp_deregister_style('elementor-global');
}
// Uncomment the line below if you want to disable Elementor's global styles
// add_action('wp_enqueue_scripts', 'modern_metals_remove_elementor_global_styles', 20);

// Add custom CSS for Elementor pages
function modern_metals_elementor_custom_css() {
    if (defined('ELEMENTOR_VERSION')) {
        ?>
        <style>
        /* Ensure Elementor content displays properly */
        .elementor-page-content {
            overflow-x: hidden;
        }
        
        .elementor-homepage-content {
            overflow-x: hidden;
        }
        
        /* Remove default WordPress content margins on Elementor pages */
        .elementor-page .page-content,
        .elementor-default .page-content {
            margin: 0;
            padding: 0;
        }
        
        /* Fix Elementor section spacing */
        .elementor-section:first-child {
            position: relative;
            margin-top: 0 !important;
        }
        
        /* Ensure hero sections start from top */
        .hero,
        .elementor-section.hero-section {
            position: relative;
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
        </style>
        <?php
    }
}
add_action('wp_head', 'modern_metals_elementor_custom_css');

// Register Elementor widget location for future custom widgets
function modern_metals_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
}
add_action('elementor/theme/register_locations', 'modern_metals_register_elementor_locations');

/**
 * Initialize Modern Metals Elementor Widgets
 */
function modern_metals_init_elementor_widgets() {
    // Only run if Elementor is loaded
    if (!did_action('elementor/loaded')) {
        return;
    }
    
    // Debug: Check if this function is being called
    error_log('Modern Metals: Initializing Elementor widgets');
    
    // Include the Elementor initialization file
    $elementor_init_path = get_template_directory() . '/inc/elementor/elementor-init.php';
    error_log('Modern Metals: Looking for file at: ' . $elementor_init_path);
    
    if (file_exists($elementor_init_path)) {
        error_log('Modern Metals: Including Elementor init file');
        require_once $elementor_init_path;
    } else {
        error_log('Modern Metals: Elementor init file not found at: ' . $elementor_init_path);
    }
}
add_action('elementor/loaded', 'modern_metals_init_elementor_widgets');

/**
 * Register Modern Metals Elementor Widgets - FIXED TIMING
 */
function modern_metals_register_all_widgets($widgets_manager) {
    error_log('Modern Metals: Widget registration hook fired');
    
    // Make sure we have Elementor
    if (!defined('ELEMENTOR_VERSION')) {
        error_log('Modern Metals: Elementor not available during widget registration');
        return;
    }
    
    // Include base widget if not already included
    $base_widget_path = get_template_directory() . '/inc/elementor/widgets/base-widget.php';
    if (!class_exists('Modern_Metals_Base_Widget')) {
        if (file_exists($base_widget_path)) {
            require_once $base_widget_path;
            error_log('Modern Metals: Base widget included');
        } else {
            error_log('Modern Metals: Base widget not found');
            return;
        }
    }
    
    // Include all widget files
    $widget_files = [
        'hero-widget.php',
        'introduction-widget.php',
        'gallery-widget.php',
        'accordion-widget.php',
        'team-widget.php',
        'testimonials-widget.php',
        'contact-widget.php'
    ];
    
    $widgets_dir = get_template_directory() . '/inc/elementor/widgets/';
    foreach ($widget_files as $file) {
        $file_path = $widgets_dir . $file;
        if (file_exists($file_path)) {
            require_once $file_path;
            error_log('Modern Metals: Included ' . $file);
        } else {
            error_log('Modern Metals: Widget file not found: ' . $file_path);
        }
    }
    
    // Register widgets directly
    $widget_classes = [
        'Modern_Metals_Hero_Widget',
        'Modern_Metals_Introduction_Widget', 
        'Modern_Metals_Gallery_Widget',
        'Modern_Metals_Accordion_Widget',
        'Modern_Metals_Team_Widget',
        'Modern_Metals_Testimonials_Widget',
        'Modern_Metals_Contact_Widget'
    ];
    
    foreach ($widget_classes as $widget_class) {
        try {
            if (class_exists($widget_class)) {
                $widget_instance = new $widget_class();
                $widgets_manager->register_widget_type($widget_instance);
                error_log('Modern Metals: Successfully registered ' . $widget_class);
            } else {
                error_log('Modern Metals: Class not found: ' . $widget_class);
            }
        } catch (Exception $e) {
            error_log('Modern Metals: Error registering ' . $widget_class . ': ' . $e->getMessage());
        }
    }
    
    error_log('Modern Metals: Direct widget registration completed');
}
add_action('elementor/widgets/register', 'modern_metals_register_all_widgets');

/**
 * Register Modern Metals Widget Category
 */
function modern_metals_add_elementor_widget_categories($elements_manager) {
    error_log('Modern Metals: Adding widget category');
    $elements_manager->add_category(
        'modern-metals',
        [
            'title' => esc_html__('Modern Metals', 'modern-metals'),
            'icon' => 'fa fa-industry',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'modern_metals_add_elementor_widget_categories');

/**
 * Update body class detection for Elementor pages with hero widgets
 */
function modern_metals_elementor_body_class($classes) {
    if (defined('ELEMENTOR_VERSION') && is_page()) {
        global $post;
        
        // Check if page has Modern Metals hero widget
        $elementor_data = get_post_meta($post->ID, '_elementor_data', true);
        if (!empty($elementor_data) && strpos($elementor_data, 'modern-metals-hero') !== false) {
            $classes[] = 'has-hero-section';
        }
    }
    
    return $classes;
}
add_filter('body_class', 'modern_metals_elementor_body_class', 20);
?> 