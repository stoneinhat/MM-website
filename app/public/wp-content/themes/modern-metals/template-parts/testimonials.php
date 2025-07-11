<?php
/**
 * Template part for displaying testimonials section
 * Used in front-page.php and other templates
 */
?>

<!-- Testimonials Section -->
<section class="testimonials">
    <div class="testimonials-container">
        <div class="testimonials-content">
            <div class="testimonial-item active">
                <p class="testimonial-quote"><?php echo esc_html(get_theme_mod('testimonial_1_quote', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."')); ?></p>
                <p class="testimonial-attribution"><?php echo esc_html(get_theme_mod('testimonial_1_attribution', 'MARCUS AURELIUS / GREEN PROJECTS')); ?></p>
            </div>
            <div class="testimonial-item">
                <p class="testimonial-quote"><?php echo esc_html(get_theme_mod('testimonial_2_quote', '"Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Mauris viverra veniam sit amet vehicula."')); ?></p>
                <p class="testimonial-attribution"><?php echo esc_html(get_theme_mod('testimonial_2_attribution', 'JULIA CAESAR / GREEN PROJECTS')); ?></p>
            </div>
            <div class="testimonial-item">
                <p class="testimonial-quote"><?php echo esc_html(get_theme_mod('testimonial_3_quote', '"Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede."')); ?></p>
                <p class="testimonial-attribution"><?php echo esc_html(get_theme_mod('testimonial_3_attribution', 'CLAUDIUS MAXIMUS / GREEN PROJECTS')); ?></p>
            </div>
            <div class="testimonial-item">
                <p class="testimonial-quote"><?php echo esc_html(get_theme_mod('testimonial_4_quote', '"Curabitur ullamcorper ultricies nisi. Nam eget dui etiam rhoncus maecenas tempus tellus eget condimentum rhoncus."')); ?></p>
                <p class="testimonial-attribution"><?php echo esc_html(get_theme_mod('testimonial_4_attribution', 'OCTAVIUS PRIME / GREEN PROJECTS')); ?></p>
            </div>
            <div class="testimonial-item">
                <p class="testimonial-quote"><?php echo esc_html(get_theme_mod('testimonial_5_quote', '"Donec quam felis ultricies nec pellentesque eu pretium quis sem. Nulla consequat massa quis enim donec pede justo."')); ?></p>
                <p class="testimonial-attribution"><?php echo esc_html(get_theme_mod('testimonial_5_attribution', 'BRUTUS MINOR / GREEN PROJECTS')); ?></p>
            </div>
        </div>
        <div class="testimonial-indicators">
            <div class="indicator active" data-index="0"></div>
            <div class="indicator" data-index="1"></div>
            <div class="indicator" data-index="2"></div>
            <div class="indicator" data-index="3"></div>
            <div class="indicator" data-index="4"></div>
        </div>
    </div>
</section> 