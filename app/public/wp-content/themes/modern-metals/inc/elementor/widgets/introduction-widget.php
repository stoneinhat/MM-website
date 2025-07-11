<?php
/**
 * Modern Metals Introduction Widget
 * 
 * A customizable introduction section widget for Elementor with interactive steps
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Introduction Widget Class
 */
class Modern_Metals_Introduction_Widget extends Modern_Metals_Base_Widget {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'modern-metals-introduction';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return esc_html__('MM Introduction Section', 'modern-metals');
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-text-area';
    }

    /**
     * Register widget controls.
     */
    protected function register_controls() {

        // Content Section - Studio Tag & Heading
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'studio_tag',
            [
                'label' => esc_html__('Studio Tag', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('METAL SCAPE STUDIO', 'modern-metals'),
                'placeholder' => esc_html__('METAL SCAPE STUDIO', 'modern-metals'),
            ]
        );

        $this->add_control(
            'show_studio_tag_dot',
            [
                'label' => esc_html__('Show Dot Before Studio Tag', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'modern-metals'),
                'label_off' => esc_html__('No', 'modern-metals'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'studio_tag_font_size',
            [
                'label' => esc_html__('Studio Tag Font Size', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 30,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0.5,
                        'max' => 3,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0.5,
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .studio-tag span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'main_heading',
            [
                'label' => esc_html__('Main Heading', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Metal-Scape artists excited about craftsmanship, sustainable landscapes, and durable materials.', 'modern-metals'),
                'placeholder' => esc_html__('Enter your main heading', 'modern-metals'),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'read_more_text',
            [
                'label' => esc_html__('Read More Text', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('read more', 'modern-metals'),
                'placeholder' => esc_html__('read more', 'modern-metals'),
            ]
        );

        $this->add_control(
            'read_more_url',
            [
                'label' => esc_html__('Read More URL', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'modern-metals'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->end_controls_section();

        // Image Section
        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__('Featured Image', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'featured_image',
            [
                'label' => esc_html__('Featured Image', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__('Image Border Radius', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_size_adjustment',
            [
                'label' => esc_html__('Image Size Adjustment', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -120,
                        'max' => 120,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-image img' => 'width: calc(100% + {{SIZE}}{{UNIT}}); height: auto; max-width: none;',
                ],
                'description' => esc_html__('Increase or decrease the actual image size by up to 120px in either direction', 'modern-metals'),
            ]
        );

        $this->add_control(
            'image_horizontal_position',
            [
                'label' => esc_html__('Image Horizontal Position', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-image' => 'transform: translateX({{SIZE}}{{UNIT}});',
                ],
                'description' => esc_html__('Move the image left or right by up to 100px in either direction', 'modern-metals'),
            ]
        );

        $this->end_controls_section();

        // Top Half Background Section
        $this->start_controls_section(
            'top_background_section',
            [
                'label' => esc_html__('Top Half Background', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_top_background_image',
            [
                'label' => esc_html__('Enable Top Background Image', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'modern-metals'),
                'label_off' => esc_html__('No', 'modern-metals'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'top_background_image',
            [
                'label' => esc_html__('Top Background Image', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/home/section2/unnamed.png',
                ],
                'condition' => [
                    'enable_top_background_image' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'top_background_opacity',
            [
                'label' => esc_html__('Top Background Opacity', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-top::before' => 'opacity: calc({{SIZE}} / 100);',
                ],
                'condition' => [
                    'enable_top_background_image' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'top_background_size',
            [
                'label' => esc_html__('Top Background Size', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => esc_html__('Cover', 'modern-metals'),
                    'contain' => esc_html__('Contain', 'modern-metals'),
                    'auto' => esc_html__('Auto', 'modern-metals'),
                    '100% 100%' => esc_html__('Stretch', 'modern-metals'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-top::before' => 'background-size: {{VALUE}};',
                ],
                'condition' => [
                    'enable_top_background_image' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Process Steps Section
        $this->start_controls_section(
            'process_steps_section',
            [
                'label' => esc_html__('Interactive Process Steps', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_bottom_animation',
            [
                'label' => esc_html__('Enable Bottom Half Animation', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'modern-metals'),
                'label_off' => esc_html__('No', 'modern-metals'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => esc_html__('Animation Speed (seconds)', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['s'],
                'range' => [
                    's' => [
                        'min' => 0.1,
                        'max' => 3.0,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 0.8,
                ],
                'condition' => [
                    'enable_bottom_animation' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'process_steps',
            [
                'label' => esc_html__('Process Steps', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'step_text',
                        'label' => esc_html__('Step Text', 'modern-metals'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Process Step', 'modern-metals'),
                        'placeholder' => esc_html__('Enter step text', 'modern-metals'),
                    ],
                    [
                        'name' => 'service_1_content',
                        'label' => esc_html__('Service Column 1 Content', 'modern-metals'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Content for service column 1 when this step is active', 'modern-metals'),
                        'placeholder' => esc_html__('Enter content for first service column', 'modern-metals'),
                        'rows' => 3,
                    ],
                    [
                        'name' => 'service_2_content',
                        'label' => esc_html__('Service Column 2 Content', 'modern-metals'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Content for service column 2 when this step is active', 'modern-metals'),
                        'placeholder' => esc_html__('Enter content for second service column', 'modern-metals'),
                        'rows' => 3,
                    ],
                ],
                'default' => [
                    [
                        'step_text' => esc_html__('Step 1: Consultation/Quote', 'modern-metals'),
                        'service_1_content' => esc_html__('Simply email your plans or job details to receive a quote and ask about our contractor discount.', 'modern-metals'),
                        'service_2_content' => esc_html__('Starting your landscape from scratch? We can help from design to install.', 'modern-metals'),
                    ],
                    [
                        'step_text' => esc_html__('Step 2: Design / Build', 'modern-metals'),
                        'service_1_content' => esc_html__('Our team creates detailed designs and begins the fabrication process using premium materials.', 'modern-metals'),
                        'service_2_content' => esc_html__('Custom design consultation to ensure your vision becomes reality with precise execution.', 'modern-metals'),
                    ],
                    [
                        'step_text' => esc_html__('Step 3: Installation', 'modern-metals'),
                        'service_1_content' => esc_html__('Professional installation by our experienced team ensures quality and longevity.', 'modern-metals'),
                        'service_2_content' => esc_html__('Complete installation service including site preparation and final finishing touches.', 'modern-metals'),
                    ],
                ],
                'title_field' => '{{{ step_text }}}',
            ]
        );

        $this->end_controls_section();

        // Services Section
        $this->start_controls_section(
            'services_section',
            [
                'label' => esc_html__('Service Columns', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'service_column_1_title',
            [
                'label' => esc_html__('Service Column 1 Title', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Commercial / Contractor', 'modern-metals'),
                'placeholder' => esc_html__('Service title', 'modern-metals'),
            ]
        );

        $this->add_control(
            'service_column_2_title',
            [
                'label' => esc_html__('Service Column 2 Title', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Residential', 'modern-metals'),
                'placeholder' => esc_html__('Service title', 'modern-metals'),
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'layout_section',
            [
                'label' => esc_html__('Layout', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_full_width_control();

        $this->end_controls_section();

        // Style Section - General
        $this->start_controls_section(
            'general_style',
            [
                'label' => esc_html__('General Style', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_background_color',
            [
                'label' => esc_html__('Section Background Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .introduction' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '2',
                    'right' => '0',
                    'bottom' => '2',
                    'left' => '0',
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .introduction' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_min_height',
            [
                'label' => esc_html__('Minimum Height', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 400,
                        'max' => 1200,
                        'step' => 10,
                    ],
                    'vh' => [
                        'min' => 30,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 865,
                ],
                'selectors' => [
                    '{{WRAPPER}} .introduction' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Typography
        $this->start_controls_section(
            'typography_style',
            [
                'label' => esc_html__('Typography', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'studio_tag_color',
            [
                'label' => esc_html__('Studio Tag Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .studio-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'studio_tag_typography',
                'selector' => '{{WRAPPER}} .studio-tag span',
            ]
        );

        $this->add_control(
            'main_heading_color',
            [
                'label' => esc_html__('Main Heading Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .intro-text h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'main_heading_typography',
                'selector' => '{{WRAPPER}} .intro-text h2',
            ]
        );

        $this->add_control(
            'read_more_color',
            [
                'label' => esc_html__('Read More Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .read-more' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'read_more_typography',
                'selector' => '{{WRAPPER}} .read-more',
            ]
        );

        $this->end_controls_section();

        // Style Section - Process Steps
        $this->start_controls_section(
            'process_steps_style',
            [
                'label' => esc_html__('Process Steps Style', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'step_background_color',
            [
                'label' => esc_html__('Step Background Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#465665',
                'selectors' => [
                    '{{WRAPPER}} .step-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'step_text_color',
            [
                'label' => esc_html__('Step Text Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .step-item' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'step_typography',
                'selector' => '{{WRAPPER}} .step-item',
            ]
        );

        $this->add_responsive_control(
            'step_padding',
            [
                'label' => esc_html__('Step Padding', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'default' => [
                    'top' => '0.2',
                    'right' => '0.5',
                    'bottom' => '0.2',
                    'left' => '0.5',
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .step-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'step_margin',
            [
                'label' => esc_html__('Step Bottom Margin', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 2,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 0.2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .step-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Services
        $this->start_controls_section(
            'services_style',
            [
                'label' => esc_html__('Services Style', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_title_color',
            [
                'label' => esc_html__('Service Title Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .service-column h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_title_typography',
                'selector' => '{{WRAPPER}} .service-column h3',
            ]
        );

        $this->add_control(
            'service_content_color',
            [
                'label' => esc_html__('Service Content Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .service-column p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_content_typography',
                'selector' => '{{WRAPPER}} .service-column p',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render_widget($settings) {
        // Get full width class and additional classes
        $full_width_class = $this->get_full_width_class($settings);
        $container_classes = ['introduction-widget-container'];
        if ($full_width_class) {
            $container_classes[] = $full_width_class;
        }

        $target = $settings['read_more_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['read_more_url']['nofollow'] ? ' rel="nofollow"' : '';
        $widget_id = $this->get_id();
        $animation_speed = $settings['animation_speed']['size'] ?? 0.8;
        ?>
        <div class="<?php echo esc_attr(implode(' ', $container_classes)); ?>" data-widget-id="<?php echo esc_attr($widget_id); ?>">
            <section class="introduction">
                <div class="container">
                    <!-- Top Section: Studio Tag + Main Heading + Image -->
                    <div class="intro-top">
                        <div class="intro-text">
                            <div class="studio-tag">
                                <span><?php 
                                if ($settings['show_studio_tag_dot'] === 'yes') {
                                    echo '• ';
                                }
                                echo esc_html($settings['studio_tag']); 
                                ?></span>
                            </div>
                            <h2><?php echo esc_html($settings['main_heading']); ?></h2>
                            <?php if (!empty($settings['read_more_text']) && !empty($settings['read_more_url']['url'])) : ?>
                                <a href="<?php echo esc_url($settings['read_more_url']['url']); ?>" class="read-more"<?php echo $target . $nofollow; ?>><?php echo esc_html($settings['read_more_text']); ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="intro-image">
                            <?php if (!empty($settings['featured_image']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['featured_image']['url']); ?>" alt="<?php echo esc_attr($settings['featured_image']['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Bottom Section: Process Steps + Services -->
                    <div class="intro-bottom">
                        <div class="process-steps">
                            <?php foreach ($settings['process_steps'] as $index => $step) : ?>
                                <div class="step-item fade-in-step" data-step="<?php echo esc_attr($index + 1); ?>"><?php echo esc_html($step['step_text']); ?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="service-columns">
                            <div class="service-column">
                                <h3><?php echo esc_html($settings['service_column_1_title']); ?></h3>
                                <p id="commercial-text"><?php echo esc_html($settings['process_steps'][0]['service_1_content'] ?? ''); ?></p>
                            </div>
                            <div class="service-column">
                                <h3><?php echo esc_html($settings['service_column_2_title']); ?></h3>
                                <p id="residential-text"><?php echo esc_html($settings['process_steps'][0]['service_2_content'] ?? ''); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <style>
            /* Ensure intro-top has proper positioning for background */
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top {
                position: relative;
                overflow: hidden;
            }
            
            /* Allow image to grow beyond container when size is increased */
            .elementor-element-<?php echo $this->get_id(); ?> .intro-image {
                overflow: visible;
            }
            
            <?php if ($settings['enable_top_background_image'] === 'yes' && !empty($settings['top_background_image']['url'])) : ?>
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                background-image: url('<?php echo esc_url($settings['top_background_image']['url']); ?>');
                background-position: center;
                background-repeat: no-repeat;
                z-index: 0;
                pointer-events: none;
            }
            
            /* Ensure content is above background */
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top .intro-text,
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top .intro-image {
                position: relative;
                z-index: 1;
            }
            <?php endif; ?>
            
            <?php if ($settings['enable_bottom_animation'] === 'yes') : ?>
            /* Custom animation speed */
            .elementor-element-<?php echo $this->get_id(); ?> .step-item,
            .elementor-element-<?php echo $this->get_id(); ?> .service-column p {
                transition: all <?php echo esc_attr($animation_speed); ?>s ease;
            }
            <?php endif; ?>
        </style>

        <?php if ($settings['enable_bottom_animation'] === 'yes') : ?>
        <script>
        (function() {
            // Step content data for this widget instance
            const stepData_<?php echo esc_js($widget_id); ?> = <?php echo wp_json_encode(array_map(function($step) {
                return [
                    'service_1_content' => $step['service_1_content'] ?? '',
                    'service_2_content' => $step['service_2_content'] ?? ''
                ];
            }, $settings['process_steps'])); ?>;
            
            // Custom StepAnimation for this widget
            class StepAnimation_<?php echo esc_js($widget_id); ?> {
                constructor() {
                    this.container = document.querySelector('[data-widget-id="<?php echo esc_js($widget_id); ?>"]');
                    if (!this.container) return;
                    
                    this.steps = this.container.querySelectorAll('.fade-in-step');
                    this.commercialText = this.container.querySelector('#commercial-text');
                    this.residentialText = this.container.querySelector('#residential-text');
                    this.currentStep = 1;
                    this.isIntersecting = false;
                    this.stepData = stepData_<?php echo esc_js($widget_id); ?>;
                    this.animationSpeed = <?php echo esc_js($animation_speed * 1000); ?>; // Convert to milliseconds
                }
                
                init() {
                    this.setupIntersectionObserver();
                    this.setupStepHoverListeners();
                    this.updateText(1); // Initialize with first step
                }
                
                setupIntersectionObserver() {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting && !this.isIntersecting) {
                                this.isIntersecting = true;
                                this.animateSteps();
                            }
                        });
                    }, { threshold: 0.3 });
                    
                    if (this.container) {
                        observer.observe(this.container);
                    }
                }
                
                animateSteps() {
                    this.steps.forEach((step, index) => {
                        setTimeout(() => {
                            step.classList.add('fade-in');
                            step.style.opacity = '1';
                            step.style.transform = 'translateY(0)';
                        }, index * 200);
                    });
                    
                    // Animate service text
                    setTimeout(() => {
                        if (this.commercialText) this.commercialText.classList.add('fade-in');
                        if (this.residentialText) this.residentialText.classList.add('fade-in');
                    }, this.steps.length * 200);
                }
                
                setupStepHoverListeners() {
                    this.steps.forEach((step, index) => {
                        step.addEventListener('mouseenter', () => this.handleStepHover(index + 1));
                        step.addEventListener('mouseleave', () => this.handleStepLeave());
                        step.addEventListener('click', () => this.handleStepClick(index + 1));
                    });
                }
                
                handleStepHover(stepNumber) {
                    this.steps.forEach((step, index) => {
                        if (index + 1 === stepNumber) {
                            step.classList.add('step-hovered');
                            step.classList.remove('step-dimmed');
                        } else {
                            step.classList.add('step-dimmed');
                            step.classList.remove('step-hovered');
                        }
                    });
                }
                
                handleStepLeave() {
                    this.steps.forEach(step => {
                        step.classList.remove('step-hovered', 'step-dimmed');
                        if (step.dataset.step == this.currentStep) {
                            step.classList.add('step-active');
                        }
                    });
                }
                
                handleStepClick(stepNumber) {
                    this.currentStep = stepNumber;
                    this.updateText(stepNumber);
                    
                    this.steps.forEach((step, index) => {
                        if (index + 1 === stepNumber) {
                            step.classList.add('step-active');
                        } else {
                            step.classList.remove('step-active');
                        }
                        step.classList.remove('step-hovered', 'step-dimmed');
                    });
                }
                
                updateText(stepNumber) {
                    const stepIndex = stepNumber - 1;
                    if (this.stepData[stepIndex]) {
                        if (this.commercialText) {
                            this.commercialText.style.opacity = '0';
                            setTimeout(() => {
                                this.commercialText.textContent = this.stepData[stepIndex].service_1_content;
                                this.commercialText.style.opacity = '1';
                            }, this.animationSpeed / 2);
                        }
                        
                        if (this.residentialText) {
                            this.residentialText.style.opacity = '0';
                            setTimeout(() => {
                                this.residentialText.textContent = this.stepData[stepIndex].service_2_content;
                                this.residentialText.style.opacity = '1';
                            }, this.animationSpeed / 2);
                        }
                    }
                }
            }
            
            // Initialize when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', () => {
                    new StepAnimation_<?php echo esc_js($widget_id); ?>().init();
                });
            } else {
                new StepAnimation_<?php echo esc_js($widget_id); ?>().init();
            }
        })();
        </script>
        <?php else : ?>
        <script>
        (function() {
            // Simple step functionality without animations
            const stepData_<?php echo esc_js($widget_id); ?> = <?php echo wp_json_encode(array_map(function($step) {
                return [
                    'service_1_content' => $step['service_1_content'] ?? '',
                    'service_2_content' => $step['service_2_content'] ?? ''
                ];
            }, $settings['process_steps'])); ?>;
            
            class SimpleStepHandler_<?php echo esc_js($widget_id); ?> {
                constructor() {
                    this.container = document.querySelector('[data-widget-id="<?php echo esc_js($widget_id); ?>"]');
                    if (!this.container) return;
                    
                    this.steps = this.container.querySelectorAll('.step-item');
                    this.commercialText = this.container.querySelector('#commercial-text');
                    this.residentialText = this.container.querySelector('#residential-text');
                    this.stepData = stepData_<?php echo esc_js($widget_id); ?>;
                    this.currentStep = 1;
                }
                
                init() {
                    this.setupStepListeners();
                    this.updateText(1); // Initialize with first step
                }
                
                setupStepListeners() {
                    this.steps.forEach((step, index) => {
                        step.addEventListener('mouseenter', () => this.handleStepHover(index + 1));
                        step.addEventListener('mouseleave', () => this.handleStepLeave());
                        step.addEventListener('click', () => this.handleStepClick(index + 1));
                    });
                }
                
                handleStepHover(stepNumber) {
                    this.steps.forEach((step, index) => {
                        if (index + 1 === stepNumber) {
                            step.classList.add('step-hovered');
                            step.classList.remove('step-dimmed');
                        } else {
                            step.classList.add('step-dimmed');
                            step.classList.remove('step-hovered');
                        }
                    });
                }
                
                handleStepLeave() {
                    this.steps.forEach(step => {
                        step.classList.remove('step-hovered', 'step-dimmed');
                        if (step.dataset.step == this.currentStep) {
                            step.classList.add('step-active');
                        }
                    });
                }
                
                handleStepClick(stepNumber) {
                    this.currentStep = stepNumber;
                    this.updateText(stepNumber);
                    
                    this.steps.forEach((step, index) => {
                        if (index + 1 === stepNumber) {
                            step.classList.add('step-active');
                        } else {
                            step.classList.remove('step-active');
                        }
                        step.classList.remove('step-hovered', 'step-dimmed');
                    });
                }
                
                updateText(stepNumber) {
                    const stepIndex = stepNumber - 1;
                    if (this.stepData[stepIndex]) {
                        if (this.commercialText) {
                            this.commercialText.textContent = this.stepData[stepIndex].service_1_content;
                        }
                        if (this.residentialText) {
                            this.residentialText.textContent = this.stepData[stepIndex].service_2_content;
                        }
                    }
                }
            }
            
            // Initialize when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', () => {
                    new SimpleStepHandler_<?php echo esc_js($widget_id); ?>().init();
                });
            } else {
                new SimpleStepHandler_<?php echo esc_js($widget_id); ?>().init();
            }
        })();
        </script>
        <?php endif; ?>
        <?php
    }

    /**
     * Render widget output in the editor (live preview).
     */
    protected function content_template() {
        ?>
        <#
        var containerClasses = ['introduction-widget-container'];
        if (settings.full_width === 'yes') {
            containerClasses.push('full-width-section');
        }
        
        var target = settings.read_more_url.is_external ? ' target="_blank"' : '';
        var nofollow = settings.read_more_url.nofollow ? ' rel="nofollow"' : '';
        var animationSpeed = settings.animation_speed.size || 0.8;
        #>
        <div class="{{ containerClasses.join(' ') }}">
            <section class="introduction">
                <div class="container">
                    <!-- Top Section: Studio Tag + Main Heading + Image -->
                    <div class="intro-top">
                        <div class="intro-text">
                            <div class="studio-tag">
                                <span><# if ( settings.show_studio_tag_dot === 'yes' ) { #>• <# } #>{{{ settings.studio_tag }}}</span>
                            </div>
                            <h2>{{{ settings.main_heading }}}</h2>
                            <# if ( settings.read_more_text && settings.read_more_url.url ) { #>
                                <a href="{{{ settings.read_more_url.url }}}" class="read-more"{{{ target }}}{{{ nofollow }}}>{{{ settings.read_more_text }}}</a>
                            <# } #>
                        </div>
                        <div class="intro-image">
                            <# if ( settings.featured_image.url ) { #>
                                <img src="{{{ settings.featured_image.url }}}" alt="" />
                            <# } #>
                        </div>
                    </div>

                    <!-- Bottom Section: Process Steps + Services -->
                    <div class="intro-bottom">
                        <div class="process-steps">
                            <# _.each( settings.process_steps, function( step, index ) { #>
                                <div class="step-item fade-in-step fade-in" data-step="{{ index + 1 }}">{{{ step.step_text }}}</div>
                            <# }); #>
                        </div>
                        <div class="service-columns">
                            <div class="service-column">
                                <h3>{{{ settings.service_column_1_title }}}</h3>
                                <p id="commercial-text" class="fade-in">
                                    <# if ( settings.process_steps[0] ) { #>
                                        {{{ settings.process_steps[0].service_1_content }}}
                                    <# } #>
                                </p>
                            </div>
                            <div class="service-column">
                                <h3>{{{ settings.service_column_2_title }}}</h3>
                                <p id="residential-text" class="fade-in">
                                    <# if ( settings.process_steps[0] ) { #>
                                        {{{ settings.process_steps[0].service_2_content }}}
                                    <# } #>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <style>
            /* Ensure intro-top has proper positioning for background */
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top {
                position: relative;
                overflow: hidden;
            }
            
            /* Allow image to grow beyond container when size is increased */
            .elementor-element-<?php echo $this->get_id(); ?> .intro-image {
                overflow: visible;
            }
        </style>
        
        <# if ( settings.enable_top_background_image === 'yes' && settings.top_background_image.url ) { #>
        <style>
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                background-image: url('{{{ settings.top_background_image.url }}}');
                background-position: center;
                background-repeat: no-repeat;
                z-index: 0;
                pointer-events: none;
            }
            
            /* Ensure content is above background */
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top .intro-text,
            .elementor-element-<?php echo $this->get_id(); ?> .intro-top .intro-image {
                position: relative;
                z-index: 1;
            }
        </style>
        <# } #>
        
        <# if ( settings.enable_bottom_animation === 'yes' ) { #>
        <style>
            .elementor-element-<?php echo $this->get_id(); ?> .step-item,
            .elementor-element-<?php echo $this->get_id(); ?> .service-column p {
                transition: all {{{ animationSpeed }}}s ease;
            }
        </style>
        <# } #>
        <?php
    }
} 