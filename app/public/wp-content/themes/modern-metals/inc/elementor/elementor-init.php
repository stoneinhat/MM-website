<?php
/**
 * Elementor Custom Widgets Initialization
 * 
 * This file handles the registration and initialization of all custom Elementor widgets
 * for the Modern Metals theme.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Only proceed if Elementor is active
if (!defined('ELEMENTOR_VERSION')) {
    error_log('Modern Metals: Elementor not defined when init file loaded');
    return;
}

error_log('Modern Metals: elementor-init.php loaded successfully');

/**
 * Include Widget Base Class
 */
$base_widget_path = __DIR__ . '/widgets/base-widget.php';
if (file_exists($base_widget_path)) {
    require_once $base_widget_path;
    error_log('Modern Metals: Base widget class loaded');
} else {
    error_log('Modern Metals: Base widget class not found at: ' . $base_widget_path);
    return;
}

/**
 * Include All Widget Files
 */
$widget_files = [
    'hero-widget.php',
    'introduction-widget.php',
    'gallery-widget.php',
    'accordion-widget.php',
    'team-widget.php',
    'testimonials-widget.php',
    'contact-widget.php'
];

foreach ($widget_files as $file) {
    $file_path = __DIR__ . '/widgets/' . $file;
    if (file_exists($file_path)) {
        require_once $file_path;
        error_log('Modern Metals: Loaded widget file: ' . $file);
    } else {
        error_log('Modern Metals: Widget file not found: ' . $file_path);
    }
}

/**
 * Register All Widgets
 */
function modern_metals_register_elementor_widgets($widgets_manager) {
    error_log('Modern Metals: Starting widget registration');
    
    // List of widget classes to register
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
            // Check if class exists before trying to instantiate
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
    
    error_log('Modern Metals: Widget registration process completed');
}

// Hook into Elementor to register our widgets
add_action('elementor/widgets/register', 'modern_metals_register_elementor_widgets');

/**
 * Enqueue Editor Scripts
 */
function modern_metals_elementor_editor_scripts() {
    wp_enqueue_script(
        'modern-metals-elementor-editor',
        get_template_directory_uri() . '/inc/elementor/assets/editor.js',
        ['jquery', 'elementor-editor'],
        '1.0.0',
        true
    );
}
add_action('elementor/editor/before_enqueue_scripts', 'modern_metals_elementor_editor_scripts');

/**
 * Enqueue Frontend Scripts
 */
function modern_metals_elementor_frontend_scripts() {
    wp_enqueue_script(
        'modern-metals-elementor-frontend',
        get_template_directory_uri() . '/inc/elementor/assets/frontend.js',
        ['jquery'],
        '1.0.0',
        true
    );
}
add_action('elementor/frontend/after_register_scripts', 'modern_metals_elementor_frontend_scripts');

/**
 * Enqueue Frontend Styles
 */
function modern_metals_elementor_frontend_styles() {
    wp_enqueue_style(
        'modern-metals-elementor-frontend',
        get_template_directory_uri() . '/inc/elementor/assets/frontend.css',
        [],
        '1.0.0'
    );
}
add_action('elementor/frontend/after_enqueue_styles', 'modern_metals_elementor_frontend_styles');

error_log('Modern Metals: All hooks registered in elementor-init.php'); 