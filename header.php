<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header / Navigation (Transparent Overlay) -->
<header class="header">
    <div class="header-container">
        <div class="header-left">
            <div class="logo">
                <a href="<?php echo home_url(); ?>">
                    <?php 
                    $header_logo = get_theme_mod('header_logo');
                    if ($header_logo) : ?>
                        <img src="<?php echo esc_url($header_logo); ?>" alt="<?php bloginfo('name'); ?>">
                    <?php elseif (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/shared/logos/main-logo.png" alt="<?php bloginfo('name'); ?>">
                    <?php endif; ?>
                </a>
            </div>
            <div class="header-separator"></div>
            <nav class="nav-menu">
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => 'modern_metals_default_menu'
                )); 
                ?>
            </nav>
        </div>
        <div class="header-right">
            <div class="call-button">
                <a href="tel:<?php echo esc_attr(get_theme_mod('header_phone', '+1234567890')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/components/header/call now image.png" alt="Click To Call">
                </a>
            </div>
            <div class="social-icons">
                <?php 
                // Social Media Links from Customizer
                $social_platforms = array(
                    'instagram' => array('icon' => 'insta logo.png', 'label' => 'Instagram'),
                    'facebook' => array('icon' => 'insta logo.png', 'label' => 'Facebook'), // Placeholder - you can add Facebook icon
                    'twitter' => array('icon' => 'x-logo 1.png', 'label' => 'X (Twitter)'),
                    'youtube' => array('icon' => 'youtube-logo 1.png', 'label' => 'YouTube'),
                    'linkedin' => array('icon' => 'Frame 6465.png', 'label' => 'LinkedIn'), // Using Frame 6465 as placeholder
                );
                
                foreach ($social_platforms as $platform => $data) {
                    $url = get_theme_mod("header_social_{$platform}");
                    if ($url) : ?>
                        <a href="<?php echo esc_url($url); ?>" class="social-icon" target="_blank" rel="noopener">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/components/header/<?php echo esc_attr($data['icon']); ?>" alt="<?php echo esc_attr($data['label']); ?>">
                        </a>
                    <?php endif;
                }
                
                // Fallback to default icons if no social links are set
                if (!get_theme_mod('header_social_instagram') && !get_theme_mod('header_social_facebook') && 
                    !get_theme_mod('header_social_twitter') && !get_theme_mod('header_social_youtube') && 
                    !get_theme_mod('header_social_linkedin')) : ?>
                    <!-- Default social icons -->
                                    <a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/components/header/insta logo.png" alt="Instagram"></a>
                <a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/components/header/x-logo 1.png" alt="X (Twitter)"></a>
                <a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/components/header/google-logo 1.png" alt="Google"></a>
                <a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/components/header/Frame 6465.png" alt="Frame 6465"></a>
                <a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/components/header/youtube-logo 1.png" alt="YouTube"></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header> 