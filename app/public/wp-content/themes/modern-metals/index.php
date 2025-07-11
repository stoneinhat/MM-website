<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        
        <?php if (defined('ELEMENTOR_VERSION') && Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor()) : ?>
            <!-- Elementor Content -->
            <div class="elementor-content">
                <?php the_content(); ?>
            </div>
        <?php else : ?>
            <!-- Default Template Content -->
            <div class="container" style="padding: 80px 20px; text-align: center;">
                <h1>WordPress Theme is Active! 🎉</h1>
                <p>Your Modern Metals theme is now loaded. This is the fallback template.</p>
                <p>Go to <strong>Appearance → Themes</strong> to see your theme, or create pages to see your content.</p>
                
                <?php if (is_home() || is_front_page()) : ?>
                    <p><a href="<?php echo admin_url('post-new.php?post_type=page'); ?>" class="btn btn-contact">Create Your First Page</a></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
    <?php endwhile; ?>
<?php else : ?>
    <div class="container" style="padding: 80px 20px; text-align: center;">
        <h1>No Content Found</h1>
        <p>It looks like nothing was found at this location.</p>
    </div>
<?php endif; ?>

<?php 
// Include testimonials on all pages (like a global section)
get_template_part('template-parts/testimonials'); 
?>

<?php 
// Include contact modal on all pages (like a global section)
get_template_part('template-parts/contact-modal'); 
?>

<?php get_footer(); ?> 