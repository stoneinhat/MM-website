<?php
/**
 * Modern Metals Theme Customizer
 */

function modern_metals_customize_register($wp_customize) {
    
    // ===== HEADER SECTION =====
    $wp_customize->add_section('modern_metals_header', array(
        'title' => 'Header Settings',
        'priority' => 30,
        'description' => 'Customize your header, logo, navigation and contact information.',
    ));
    
    // Logo Upload
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label' => 'Header Logo',
        'section' => 'modern_metals_header',
        'description' => 'Upload your logo (recommended: 200x50px)',
    )));
    
    // Phone Number
    $wp_customize->add_setting('header_phone', array(
        'default' => '+1234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('header_phone', array(
        'label' => 'Phone Number',
        'section' => 'modern_metals_header',
        'type' => 'text',
        'description' => 'Phone number for the call button',
    ));
    
    // Social Media Links
    $social_platforms = array(
        'instagram' => 'Instagram URL',
        'facebook' => 'Facebook URL', 
        'twitter' => 'Twitter/X URL',
        'youtube' => 'YouTube URL',
        'linkedin' => 'LinkedIn URL',
    );
    
    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting("header_social_{$platform}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control("header_social_{$platform}", array(
            'label' => $label,
            'section' => 'modern_metals_header',
            'type' => 'url',
        ));
    }
    
    // Header Colors
    $wp_customize->add_setting('header_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
        'label' => 'Header Text Color',
        'section' => 'modern_metals_header',
    )));
    
    $wp_customize->add_setting('header_bg_color', array(
        'default' => 'transparent',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label' => 'Header Background Color (when scrolled)',
        'section' => 'modern_metals_header',
    )));
    
    // ===== HERO SECTION =====
    $wp_customize->add_section('modern_metals_hero', array(
        'title' => 'Hero Section',
        'priority' => 35,
        'description' => 'Customize your homepage hero banner.',
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('hero_background', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label' => 'Hero Background Image',
        'section' => 'modern_metals_hero',
        'description' => 'Large hero background image',
    )));
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'MODERN METALS UTAH',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Hero Title',
        'section' => 'modern_metals_hero',
        'type' => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Aesthetic metal features for your home and landscape',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'modern_metals_hero',
        'type' => 'textarea',
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'CONTACT US',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button_text', array(
        'label' => 'Hero Button Text',
        'section' => 'modern_metals_hero',
        'type' => 'text',
    ));
    
    // ===== FOOTER SECTION =====
    $wp_customize->add_section('modern_metals_footer', array(
        'title' => 'Footer Settings',
        'priority' => 40,
        'description' => 'Customize footer content and contact information.',
    ));
    
    // Footer Logo
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => 'Footer Logo',
        'section' => 'modern_metals_footer',
        'description' => 'Footer logo (can be different from header)',
    )));
    
    // Contact Information
    $wp_customize->add_setting('footer_phone', array(
        'default' => '801-900-5191',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_phone', array(
        'label' => 'Footer Phone Number',
        'section' => 'modern_metals_footer',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('footer_email', array(
        'default' => 'ModernMetalsUtah@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('footer_email', array(
        'label' => 'Footer Email',
        'section' => 'modern_metals_footer',
        'type' => 'email',
    ));
    
    // Footer Copyright
    $wp_customize->add_setting('footer_copyright', array(
        'default' => 'Modern Metals. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_copyright', array(
        'label' => 'Copyright Text',
        'section' => 'modern_metals_footer',
        'type' => 'text',
    ));
    
    // ===== CONTACT MODAL =====
    $wp_customize->add_section('modern_metals_contact', array(
        'title' => 'Contact Modal',
        'priority' => 45,
        'description' => 'Customize the contact modal popup.',
    ));
    
    // Modal Title
    $wp_customize->add_setting('contact_modal_title', array(
        'default' => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_modal_title', array(
        'label' => 'Modal Title',
        'section' => 'modern_metals_contact',
        'type' => 'text',
    ));
    
    // Contact Form Email Recipient
    $wp_customize->add_setting('contact_form_email', array(
        'default' => 'ModernMetalsUtah@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_form_email', array(
        'label' => 'Form Submission Email',
        'section' => 'modern_metals_contact',
        'type' => 'email',
        'description' => 'Where contact form submissions are sent',
    ));
    
    // Contact Modal Form Labels
    $wp_customize->add_setting('contact_modal_first_name_label', array(
        'default' => 'First Name',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_modal_first_name_label', array(
        'label' => 'First Name Label',
        'section' => 'modern_metals_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_modal_last_name_label', array(
        'default' => 'Last Name',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_modal_last_name_label', array(
        'label' => 'Last Name Label',
        'section' => 'modern_metals_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_modal_phone_label', array(
        'default' => 'Phone Number',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_modal_phone_label', array(
        'label' => 'Phone Label',
        'section' => 'modern_metals_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_modal_project_label', array(
        'default' => 'Details About Project',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_modal_project_label', array(
        'label' => 'Project Details Label',
        'section' => 'modern_metals_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_modal_placeholder', array(
        'default' => 'Tell us about your project...',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_modal_placeholder', array(
        'label' => 'Project Details Placeholder',
        'section' => 'modern_metals_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_modal_submit_text', array(
        'default' => 'Send Message',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_modal_submit_text', array(
        'label' => 'Submit Button Text',
        'section' => 'modern_metals_contact',
        'type' => 'text',
    ));
    
    // ===== COMPANY INFO =====
    $wp_customize->add_section('modern_metals_company', array(
        'title' => 'Company Information',
        'priority' => 50,
        'description' => 'General company information used throughout the site.',
    ));
    
    // Company Tagline
    $wp_customize->add_setting('company_tagline', array(
        'default' => 'Metal-Scape artists excited about craftsmanship, sustainable landscapes, and durable materials.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('company_tagline', array(
        'label' => 'Company Tagline',
        'section' => 'modern_metals_company',
        'type' => 'textarea',
        'description' => 'Main company description for intro section',
    ));
    
    // ===== TESTIMONIALS SECTION =====
    $wp_customize->add_section('modern_metals_testimonials', array(
        'title' => 'Testimonials',
        'priority' => 52,
        'description' => 'Customize customer testimonials that appear throughout the site.',
    ));
    
    // Add 5 testimonials
    for ($i = 1; $i <= 5; $i++) {
        // Testimonial Quote
        $wp_customize->add_setting("testimonial_{$i}_quote", array(
            'default' => $i == 1 ? '"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."' : '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        
        $wp_customize->add_control("testimonial_{$i}_quote", array(
            'label' => "Testimonial {$i} - Quote",
            'section' => 'modern_metals_testimonials',
            'type' => 'textarea',
            'description' => 'Customer testimonial quote text',
        ));
        
        // Testimonial Attribution
        $wp_customize->add_setting("testimonial_{$i}_attribution", array(
            'default' => $i == 1 ? 'MARCUS AURELIUS / GREEN PROJECTS' : '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control("testimonial_{$i}_attribution", array(
            'label' => "Testimonial {$i} - Attribution",
            'section' => 'modern_metals_testimonials',
            'type' => 'text',
            'description' => 'Customer name and company',
        ));
    }

    // ===== COLORS & STYLING =====
    $wp_customize->add_section('modern_metals_colors', array(
        'title' => 'Colors & Styling',
        'priority' => 55,
        'description' => 'Customize site colors and styling.',
    ));
    
    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => 'Primary Color',
        'section' => 'modern_metals_colors',
        'description' => 'Main brand color used throughout the site',
    )));
    
    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default' => '#B8860B',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => 'Accent Color',
        'section' => 'modern_metals_colors',
        'description' => 'Accent color for buttons and highlights',
    )));
}
add_action('customize_register', 'modern_metals_customize_register');

/**
 * Generate custom CSS based on customizer options
 */
function modern_metals_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#333333');
    $accent_color = get_theme_mod('accent_color', '#B8860B');
    $header_text_color = get_theme_mod('header_text_color', '#ffffff');
    $header_bg_color = get_theme_mod('header_bg_color', 'rgba(255,255,255,0.95)');
    
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
            --header-text-color: <?php echo esc_attr($header_text_color); ?>;
            --header-bg-color: <?php echo esc_attr($header_bg_color); ?>;
        }
        
        .header {
            color: var(--header-text-color);
        }
        
        .header.scrolled {
            background: var(--header-bg-color);
        }
        
        .hero-contact-btn,
        .btn-contact,
        .contact-button,
        .sidebar-contact-btn {
            background-color: var(--accent-color);
        }
        
        .hero-contact-btn:hover,
        .btn-contact:hover,
        .contact-button:hover,
        .sidebar-contact-btn:hover {
            background-color: var(--primary-color);
        }
        
        .nav-menu a::after {
            background-color: var(--accent-color);
        }
        
        .service-button.selected {
            background-color: var(--accent-color);
        }
    </style>
    <?php
}
add_action('wp_head', 'modern_metals_customizer_css');
?> 