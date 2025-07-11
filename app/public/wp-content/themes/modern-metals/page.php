<?php get_header(); ?>

<div class="elementor-page-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <?php if (!defined('ELEMENTOR_VERSION') || !class_exists('Elementor\Plugin') || !Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor()) : ?>
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
                
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="container" style="padding: 100px 20px;">
            <h1>Page Not Found</h1>
            <p>Sorry, the page you are looking for doesn't exist.</p>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?> 