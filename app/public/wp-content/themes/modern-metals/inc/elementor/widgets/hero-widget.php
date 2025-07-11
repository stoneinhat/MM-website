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
                'default' => 'yes',
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
                'label' => esc_html__('Hero Height', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
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
                ],
                'default' => [
                    'unit' => 'vh',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero' => 'height: {{SIZE}}{{UNIT}};',
                ],
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
        ?>
        
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
        #>
        
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
        <?php
    }
} 