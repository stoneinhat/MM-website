<?php get_header(); ?>

<div class="elementor-page-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <?php if (!defined('ELEMENTOR_VERSION') || !Elementor\Plugin::$instance->documents->get($post->ID)->is_built_with_elementor()) : ?>
                    <!-- Show title for non-Elementor pages -->
                    <div class="container" style="padding: 100px 20px 40px;">
                        <header class="page-header">
                            <h1 class="page-title"><?php the_title(); ?></h1>
                        </header>
                    </div>
                <?php endif; ?>
                
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
                
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php 
// Include testimonials on all pages (like a global section)
get_template_part('template-parts/testimonials'); 
?>

<?php 
// Include contact modal on all pages (like a global section)
get_template_part('template-parts/contact-modal'); 
?>

<?php get_footer(); ?> 