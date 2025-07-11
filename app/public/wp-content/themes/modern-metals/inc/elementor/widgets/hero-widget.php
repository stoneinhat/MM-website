<?php
/**
 * Modern Metals Hero Widget
 * 
 * A customizable hero section widget for Elementor
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Hero Widget Class
 */
class Modern_Metals_Hero_Widget extends Modern_Metals_Base_Widget {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'modern-metals-hero';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return esc_html__('MM Hero Section', 'modern-metals');
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-slider-full-screen';
    }

    /**
     * Register widget controls.
     */
    protected function register_controls() {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Hero Content', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_title',
            [
                'label' => esc_html__('Hero Title', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('MODERN METALS UTAH', 'modern-metals'),
                'placeholder' => esc_html__('Enter your hero title', 'modern-metals'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_subtitle',
            [
                'label' => esc_html__('Hero Subtitle', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Aesthetic metal features for your home and landscape', 'modern-metals'),
                'placeholder' => esc_html__('Enter your hero subtitle', 'modern-metals'),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'hero_button_text',
            [
                'label' => esc_html__('Button Text', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('CONTACT US', 'modern-metals'),
                'placeholder' => esc_html__('Enter button text', 'modern-metals'),
            ]
        );

        $this->add_control(
            'hero_button_action',
            [
                'label' => esc_html__('Button Action', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'modal',
                'options' => [
                    'modal' => esc_html__('Open Contact Modal', 'modern-metals'),
                    'link' => esc_html__('Go to Link', 'modern-metals'),
                    'scroll' => esc_html__('Scroll to Section', 'modern-metals'),
                ],
            ]
        );

        $this->add_control(
            'hero_button_link',
            [
                'label' => esc_html__('Button Link', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'modern-metals'),
                'condition' => [
                    'hero_button_action' => 'link',
                ],
            ]
        );

        $this->add_control(
            'scroll_target',
            [
                'label' => esc_html__('Scroll Target', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('#section-id', 'modern-metals'),
                'description' => esc_html__('Enter the ID of the section to scroll to', 'modern-metals'),
                'condition' => [
                    'hero_button_action' => 'scroll',
                ],
            ]
        );

        $this->add_control(
            'show_scroll_indicator',
            [
                'label' => esc_html__('Show Scroll Indicator', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'modern-metals'),
                'label_off' => esc_html__('Hide', 'modern-metals'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->end_controls_section();

        // Background Section
        $this->start_controls_section(
            'background_section',
            [
                'label' => esc_html__('Background', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_full_width_control();

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'hero_background',
                'label' => esc_html__('Background', 'modern-metals'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .hero',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'image' => [
                        'default' => [
                            'url' => get_template_directory_uri() . '/assets/shared/backgrounds/home-hero-background.jpg',
                        ],
                    ],
                    'position' => [
                        'default' => 'center center',
                    ],
                    'size' => [
                        'default' => 'cover',
                    ],
                ],
            ]
        );

        $this->add_control(
            'hero_overlay_color',
            [
                'label' => esc_html__('Overlay Color', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-overlay' => 'background-color: {{VALUE}};',
                ],
                'default' => 'rgba(0, 0, 0, 0.3)',
            ]
        );

        $this->end_controls_section();

        // Style Section - Title
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__('Title Style', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_typography_control(
            '{{WRAPPER}} .hero-title',
            'Title Typography',
            'title_typography'
        );

        $this->add_color_control(
            '{{WRAPPER}} .hero-title',
            'Title Color',
            'title_color'
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Title Margin', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .hero-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Subtitle
        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => esc_html__('Subtitle Style', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_typography_control(
            '{{WRAPPER}} .hero-subtitle',
            'Subtitle Typography',
            'subtitle_typography'
        );

        $this->add_color_control(
            '{{WRAPPER}} .hero-subtitle',
            'Subtitle Color',
            'subtitle_color'
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__('Subtitle Margin', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .hero-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Button
        $this->add_button_style_controls('{{WRAPPER}} .hero-contact-btn', 'hero_button_style');

        // Style Section - Layout
        $this->start_controls_section(
            'layout_style_section',
            [
                'label' => esc_html__('Layout', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'hero_height',
            [
                'label' => esc_html__('Custom Hero Height', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh', '%'],
                'range' => [
                    'px' => [
                        'min' => 300,
                        'max' => 1200,
                        'step' => 10,
                    ],
                    'vh' => [
                        'min' => 30,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 50,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'vh',
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}}.hero-type-custom .hero' => 'height: {{SIZE}}{{UNIT}}; min-height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'hero_type' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'hero_width_mode',
            [
                'label' => esc_html__('Width Mode', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'full',
                'options' => [
                    'contained' => esc_html__('Contained', 'modern-metals'),
                    'full' => esc_html__('Full Width', 'modern-metals'),
                    'full-stretched' => esc_html__('Full Width + Stretched', 'modern-metals'),
                ],
                'prefix_class' => 'hero-width-',
            ]
        );

        $this->add_control(
            'hero_height_mode',
            [
                'label' => esc_html__('Height Mode', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'normal' => esc_html__('Normal', 'modern-metals'),
                    'stretch-top' => esc_html__('Stretch to Top', 'modern-metals'),
                    'full-stretch' => esc_html__('Full Screen Stretch', 'modern-metals'),
                ],
                'prefix_class' => 'hero-height-',
                'description' => esc_html__('Stretch to Top extends the hero upward to cover header space', 'modern-metals'),
            ]
        );

        $this->add_control(
            'hero_type',
            [
                'label' => esc_html__('Hero Type', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'full',
                'options' => [
                    'full' => esc_html__('Full Hero (100vh)', 'modern-metals'),
                    'slim' => esc_html__('Slim Hero (50vh)', 'modern-metals'),
                    'custom' => esc_html__('Custom Height', 'modern-metals'),
                ],
                'prefix_class' => 'hero-type-',
            ]
        );

        $this->add_responsive_control(
            'top_offset',
            [
                'label' => esc_html__('Top Offset', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 5,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}}.hero-height-stretch-top .hero' => 'margin-top: -{{SIZE}}{{UNIT}}; padding-top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.hero-height-full-stretch .hero' => 'margin-top: -{{SIZE}}{{UNIT}}; padding-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'hero_height_mode' => ['stretch-top', 'full-stretch'],
                ],
                'description' => esc_html__('Adjust how far the hero extends upward (usually header height)', 'modern-metals'),
            ]
        );

        $this->add_responsive_control(
            'content_alignment',
            [
                'label' => esc_html__('Content Alignment', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'modern-metals'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'modern-metals'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'modern-metals'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .hero-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_vertical_position',
            [
                'label' => esc_html__('Vertical Position', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Top', 'modern-metals'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Middle', 'modern-metals'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Bottom', 'modern-metals'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .hero' => 'align-items: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_horizontal_position',
            [
                'label' => esc_html__('Horizontal Position', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'modern-metals'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'modern-metals'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'modern-metals'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .hero' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_max_width',
            [
                'label' => esc_html__('Content Max Width', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 300,
                        'max' => 1200,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 5,
                    ],
                    'vw' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Common controls
        $this->add_spacing_controls();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render_widget($settings) {
        // Build button attributes
        $button_attributes = $this->get_button_attributes($settings);
        
        // Get full width class and additional classes
        $full_width_class = $this->get_full_width_class($settings);
        $container_classes = ['hero-widget-container'];
        if ($full_width_class) {
            $container_classes[] = $full_width_class;
        }
        
        ?>
        <div class="<?php echo esc_attr(implode(' ', $container_classes)); ?>">
            <section id="home" class="hero hero-section">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <?php if (!empty($settings['hero_title'])) : ?>
                        <h1 class="hero-title"><?php $this->echo_html($settings['hero_title']); ?></h1>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['hero_subtitle'])) : ?>
                        <p class="hero-subtitle"><?php $this->echo_html($settings['hero_subtitle']); ?></p>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['hero_button_text'])) : ?>
                        <button class="hero-contact-btn" <?php echo $button_attributes; ?>>
                            <?php $this->echo_html($settings['hero_button_text']); ?>
                        </button>
                    <?php endif; ?>
                </div>
                
                <?php if ($settings['show_scroll_indicator'] === 'yes') : ?>
                    <div class="scroll-indicator">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                <?php endif; ?>
            </section>
        </div>
        
        <?php
    }

    /**
     * Get button attributes based on settings
     */
    private function get_button_attributes($settings) {
        $attributes = [];

        switch ($settings['hero_button_action']) {
            case 'modal':
                $attributes[] = 'onclick="openContactModal()"';
                break;
                
            case 'link':
                if (!empty($settings['hero_button_link']['url'])) {
                    $target = $settings['hero_button_link']['is_external'] ? '_blank' : '_self';
                    $nofollow = $settings['hero_button_link']['nofollow'] ? 'rel="nofollow"' : '';
                    $attributes[] = 'onclick="window.open(\'' . esc_url($settings['hero_button_link']['url']) . '\', \'' . $target . '\')"';
                    if ($nofollow) {
                        $attributes[] = $nofollow;
                    }
                }
                break;
                
            case 'scroll':
                if (!empty($settings['scroll_target'])) {
                    $target = esc_attr($settings['scroll_target']);
                    $attributes[] = 'onclick="document.querySelector(\'' . $target . '\').scrollIntoView({behavior: \'smooth\'})"';
                }
                break;
        }

        return implode(' ', $attributes);
    }

    /**
     * Render widget output in the editor (live preview).
     */
    protected function content_template() {
        ?>
        <#
        var buttonAction = '';
        if (settings.hero_button_action === 'modal') {
            buttonAction = 'onclick="openContactModal()"';
        } else if (settings.hero_button_action === 'link' && settings.hero_button_link.url) {
            var target = settings.hero_button_link.is_external ? '_blank' : '_self';
            buttonAction = 'onclick="window.open(\'' + settings.hero_button_link.url + '\', \'' + target + '\')"';
        } else if (settings.hero_button_action === 'scroll' && settings.scroll_target) {
            buttonAction = 'onclick="document.querySelector(\'' + settings.scroll_target + '\').scrollIntoView({behavior: \'smooth\'})"';
        }
        
        var containerClasses = ['hero-widget-container'];
        if (settings.full_width === 'yes') {
            containerClasses.push('full-width-section');
        }
        
        // Add hero width mode class
        if (settings.hero_width_mode) {
            containerClasses.push('hero-width-' + settings.hero_width_mode);
        }
        
        // Add hero height mode class
        if (settings.hero_height_mode) {
            containerClasses.push('hero-height-' + settings.hero_height_mode);
        }
        
        // Add hero type class
        if (settings.hero_type) {
            containerClasses.push('hero-type-' + settings.hero_type);
        }
        #>
        
        <div class="{{ containerClasses.join(' ') }}">
            <section id="home" class="hero hero-section">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <# if (settings.hero_title) { #>
                        <h1 class="hero-title">{{{ settings.hero_title }}}</h1>
                    <# } #>
                    
                    <# if (settings.hero_subtitle) { #>
                        <p class="hero-subtitle">{{{ settings.hero_subtitle }}}</p>
                    <# } #>
                    
                    <# if (settings.hero_button_text) { #>
                        <button class="hero-contact-btn" {{{ buttonAction }}}>
                            {{{ settings.hero_button_text }}}
                        </button>
                    <# } #>
                </div>
                
                <# if (settings.show_scroll_indicator === 'yes') { #>
                    <div class="scroll-indicator">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                <# } #>
            </section>
        </div>
        <?php
    }
} 