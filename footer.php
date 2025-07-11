    <!-- Footer -->
    <footer class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-logo-section">
                        <a href="<?php echo home_url(); ?>">
                            <?php 
                            $footer_logo = get_theme_mod('footer_logo');
                            if ($footer_logo) : ?>
                                <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php bloginfo('name'); ?>">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/shared/logos/footer-logo.png" alt="<?php bloginfo('name'); ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="footer-columns">
                        <div class="footer-spacer"></div>
                        <div class="footer-section">
                            <h4>SOCIAL</h4>
                            <ul>
                                <?php if (get_theme_mod('header_social_instagram')) : ?>
                                    <li><a href="<?php echo esc_url(get_theme_mod('header_social_instagram')); ?>" target="_blank" rel="noopener">Instagram</a></li>
                                <?php endif; ?>
                                <?php if (get_theme_mod('header_social_facebook')) : ?>
                                    <li><a href="<?php echo esc_url(get_theme_mod('header_social_facebook')); ?>" target="_blank" rel="noopener">Facebook</a></li>
                                <?php endif; ?>
                                <?php if (get_theme_mod('header_social_linkedin')) : ?>
                                    <li><a href="<?php echo esc_url(get_theme_mod('header_social_linkedin')); ?>" target="_blank" rel="noopener">LinkedIn</a></li>
                                <?php endif; ?>
                                
                                <?php 
                                // Fallback social links if none are customized
                                if (!get_theme_mod('header_social_instagram') && !get_theme_mod('header_social_facebook') && !get_theme_mod('header_social_linkedin')) : ?>
                                    <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
                                    <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
                                    <li><a href="https://linkedin.com" target="_blank">LinkedIn</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="footer-section">
                            <h4>INFO</h4>
                            <ul>
                                <li><a href="#services">Schedule</a></li>
                                <li><a href="<?php echo home_url('/portfolio'); ?>">Portfolio</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#contact">Shop</a></li>
                                <li><a href="#about">About Us</a></li>
                            </ul>
                        </div>
                        <div class="footer-section">
                            <h4>CONTACT</h4>
                            <ul>
                                <li><a href="tel:<?php echo esc_attr(get_theme_mod('footer_phone', '801-900-5191')); ?>"><?php echo esc_html(get_theme_mod('footer_phone', '801-900-5191')); ?></a></li>
                                <li><a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email', 'ModernMetalsUtah@gmail.com')); ?>"><?php echo esc_html(get_theme_mod('footer_email', 'ModernMetalsUtah@gmail.com')); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod('footer_copyright', 'Modern Metals. All rights reserved.')); ?></p>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html> 