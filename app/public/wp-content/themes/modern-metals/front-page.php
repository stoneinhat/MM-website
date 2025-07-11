<?php get_header(); ?>

<?php
// Check if this page is built with Elementor
$is_elementor_page = false;
if (defined('ELEMENTOR_VERSION') && class_exists('Elementor\Plugin') && have_posts()) {
    the_post();
    $page_id = get_the_ID();
    if ($page_id && Elementor\Plugin::$instance->documents->get($page_id)) {
        $is_elementor_page = Elementor\Plugin::$instance->documents->get($page_id)->is_built_with_elementor();
    }
    rewind_posts();
}
?>

<?php if ($is_elementor_page) : ?>
    <!-- Elementor Content -->
    <div class="elementor-homepage-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php else : ?>
    <!-- Static Homepage Content -->
    
    <!-- Hero Section -->
    <?php 
    $hero_bg = get_theme_mod('hero_background');
    $hero_bg_url = $hero_bg ? $hero_bg : get_template_directory_uri() . '/assets/shared/backgrounds/home-hero-background.jpg';
    ?>
    <section id="home" class="hero" style="background-image: url('<?php echo esc_url($hero_bg_url); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_title', 'MODERN METALS UTAH')); ?></h1>
            <p class="hero-subtitle"><?php echo esc_html(get_theme_mod('hero_subtitle', 'Aesthetic metal features for your home and landscape')); ?></p>
            <button class="hero-contact-btn" onclick="openContactModal()"><?php echo esc_html(get_theme_mod('hero_button_text', 'CONTACT US')); ?></button>
        </div>
    </section>

    <!-- Introduction Section: "Metal-Scape Studio" -->
    <section class="introduction">
        <div class="container">
            <!-- Top Section: Header + Image -->
            <div class="intro-top">
                <div class="intro-text">
                                    <div class="studio-tag">
                    <span>• METAL SCAPE STUDIO</span>
                </div>
                <h2><?php echo esc_html(get_theme_mod('company_tagline', 'Metal-Scape artists excited about craftsmanship, sustainable landscapes, and durable materials.')); ?></h2>
                    <a href="#" class="read-more">read more</a>
                </div>
                <div class="intro-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/home/section2/h1-img-01.jpg.jpg" alt="Metal craftsmanship welding" />
                </div>
            </div>
            
            <!-- Bottom Section: Steps + Services -->
            <div class="intro-bottom">
                <div class="process-steps">
                    <div class="step-item fade-in-step" data-step="1">Step 1: Consultation/Quote</div>
                    <div class="step-item fade-in-step" data-step="2">Step 2: Design / Build</div>
                    <div class="step-item fade-in-step" data-step="3">Step 3: Installation</div>
                </div>
                
                <div class="service-columns">
                    <div class="service-column">
                        <h3>Commercial / Contractor</h3>
                        <p id="commercial-text">Simply email your plans or job details to receive a quote and ask about our contractor discount.</p>
                    </div>
                    <div class="service-column">
                        <h3>Residential</h3>
                        <p id="residential-text">Starting your landscape from scratch? We can help from design to install.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Gallery / Project Showcase (Horizontal Scroll) -->
    <section class="gallery-showcase">
        <div class="gallery-container">
            <div class="gallery-track">
                <div class="gallery-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/home/gallery/project1.png" alt="Modern metal landscaping project" />
                </div>
                <div class="gallery-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/home/gallery/project2.png" alt="Custom metal planter design" />
                </div>
                <div class="gallery-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/home/gallery/project3.png" alt="Metal landscape installation" />
                </div>
                <div class="gallery-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/home/gallery/project4.jpg" alt="Metal fire feature design" />
                </div>
                <div class="gallery-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/home/gallery/project5.png" alt="Custom metal work project" />
                </div>
                <div class="gallery-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/home/gallery/project6.jpg" alt="Metal landscape architecture" />
                </div>
            </div>
            <div class="gallery-nav">
                <button class="gallery-btn prev-btn">
                    <span class="gallery-arrow left-arrow"></span>
                </button>
                <button class="gallery-btn next-btn">
                    <span class="gallery-arrow right-arrow"></span>
                </button>
            </div>
        </div>
        <div class="gallery-sidebar">
            <div class="sidebar-content">
                <div class="sidebar-title-container">
                    <div class="sidebar-dot"></div>
                    <h3 class="sidebar-title">OUR WORK</h3>
                </div>
                <button class="sidebar-contact-btn" onclick="openContactModal()">CONTACT US</button>
            </div>
        </div>
    </section>

    <!-- Services Section - Horizontal Accordion -->
    <section class="services-accordion">
        <div class="accordion-container">
            <div class="accordion-item active" data-category="metal-scapes">
                <div class="accordion-item__background">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/components/services/DS975 1.png" alt="Metal Scapes Background" class="accordion-bg-image">
                    <div class="accordion-overlay"></div>
                </div>
                <div class="accordion-item__collapsed">
                    <div class="accordion-tab">
                        <span class="accordion-tab__title">METAL SCAPES</span>
                    </div>
                </div>
                <div class="accordion-item__expanded">
                    <div class="accordion-expanded__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/components/services/DS975 1.png" alt="Metal Scapes Project">
                    </div>
                    <div class="accordion-expanded__details">
                        <h2 class="accordion-category-title">METAL SCAPES</h2>
                        <h3>WORKS DETAILS</h3>
                        <p class="description">Moby thrift - Interior clothing racks and floating plant curtain</p>
                        <p class="date">December 2020</p>
                        <button class="contact-button" onclick="openContactModal()">CONTACT US</button>
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-category="fire-features">
                <div class="accordion-item__background">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/components/services/DSC075 1.png" alt="Fire Features Background" class="accordion-bg-image">
                    <div class="accordion-overlay"></div>
                </div>
                <div class="accordion-item__collapsed">
                    <div class="accordion-tab">
                        <span class="accordion-tab__title">FIRE FEATURES</span>
                    </div>
                </div>
                <div class="accordion-item__expanded">
                    <div class="accordion-expanded__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/components/services/DSC075 1.png" alt="Fire Features Project">
                    </div>
                    <div class="accordion-expanded__details">
                        <h2 class="accordion-category-title">FIRE FEATURES</h2>
                        <h3>WORKS DETAILS</h3>
                        <p class="description">Custom fire tables and outdoor heating solutions</p>
                        <p class="date">November 2020</p>
                        <button class="contact-button" onclick="openContactModal()">CONTACT US</button>
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-category="other-works">
                <div class="accordion-item__background">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/components/services/DSC07975 1.png" alt="Other Works Background" class="accordion-bg-image">
                    <div class="accordion-overlay"></div>
                </div>
                <div class="accordion-item__collapsed">
                    <div class="accordion-tab">
                        <span class="accordion-tab__title">OTHER WORKS</span>
                    </div>
                </div>
                <div class="accordion-item__expanded">
                    <div class="accordion-expanded__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/components/services/DSC07975 1.png" alt="Other Works Project">
                    </div>
                    <div class="accordion-expanded__details">
                        <h2 class="accordion-category-title">OTHER WORKS</h2>
                        <h3>WORKS DETAILS</h3>
                        <p class="description">Custom metalwork and specialized fabrication projects</p>
                        <p class="date">October 2020</p>
                        <button class="contact-button" onclick="openContactModal()">CONTACT US</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <div class="team-grid">
                <!-- Gabriel -->
                <div class="team-item photo-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/shared/team/Gabe.png" alt="Gabriel Gutierrez">
                </div>
                <div class="team-item text-item">
                    <h4>Gabriel Gutierrez</h4>
                    <p>STEEL SCAPE ARTIST</p>
                </div>
                
                <!-- Dillon -->
                <div class="team-item photo-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/shared/team/Dillon.png" alt="Dillon Jensen">
                </div>
                <div class="team-item text-item">
                    <h4>Dillon Jensen</h4>
                    <p>FOUNDER & DESIGNER</p>
                </div>
                
                <!-- Meet The Team Button -->
                <div class="team-item meet-team-item">
                    <a href="<?php echo home_url('/meet-the-team'); ?>" class="meet-team-btn">Meet The Team</a>
                </div>
                
                <!-- Monika -->
                <div class="team-item photo-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/shared/team/Monika.png" alt="Monika Robinson">
                </div>
                <div class="team-item text-item">
                    <h4>Monika Robinson</h4>
                    <p>DESIGN MANAGER</p>
                </div>
                
                <!-- Guillermo -->
                <div class="team-item photo-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/shared/team/Guillermo.png" alt="Guillermo Medici">
                </div>
                <div class="team-item text-item">
                    <h4>Guillermo Medici</h4>
                    <p>STEEL SCAPE ARTIST</p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/testimonials'); ?>
    <?php get_template_part('template-parts/contact-modal'); ?>

    <!-- Call to Action / Contact Form Section -->
    <section id="contact" class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-left">
                    <h2>LETS GET STARTED</h2>
                    
                    <!-- Service Selection Area -->
                    <div class="service-selection">
                        <h3>Select Service(s)</h3>
                        <div class="service-options">
                            <button class="service-button" data-service="metal-scapes" onclick="toggleServiceSelection(this)">
                                METAL SCAPES
                            </button>
                            <button class="service-button" data-service="fire-features" onclick="toggleServiceSelection(this)">
                                FIRE FEATURES
                            </button>
                            <button class="service-button" data-service="other-works" onclick="toggleServiceSelection(this)">
                                OTHER WORKS
                            </button>
                            <button class="service-button" data-service="consultation" onclick="toggleServiceSelection(this)">
                                CONSULTATION
                            </button>
                        </div>
                    </div>
                </div>
                <div class="cta-form">
                    <form id="ctaContactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ctaFirstName">FIRST NAME</label>
                                <input type="text" id="ctaFirstName" required>
                            </div>
                            <div class="form-group">
                                <label for="ctaLastName">LAST NAME</label>
                                <input type="text" id="ctaLastName" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ctaEmail">EMAIL</label>
                            <input type="email" id="ctaEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="ctaMessage">TELL US ABOUT YOUR PROJECT</label>
                            <textarea id="ctaMessage" rows="5" required></textarea>
                        </div>
                    </form>
                    
                    <div class="form-buttons">
                        <button class="btn btn-contact-form" onclick="submitContactForm()">CONTACT US</button>
                        <button class="btn btn-back-to-top" onclick="scrollToTop()">BACK TO THE TOP</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_footer(); ?> 