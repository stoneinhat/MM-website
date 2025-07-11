<?php
/**
 * Elementor Introduction Image Left Widget
 *
 * @since 1.0.0
 */
class Elementor_Introduction_Image_Left_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'introduction_image_left';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Introduction Image Left', 'elementor-addon' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-image-box';
    }

    /**
     * Get widget categories.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'modern-metals-theme' ];
    }

    /**
     * Get widget keywords.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return [ 'introduction', 'image', 'content', 'steel-works' ];
    }

    /**
     * Register widget controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        // Content Tab
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Top Section Controls
        $this->add_control(
            'large_heading',
            [
                'label' => esc_html__( 'Large Heading', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Durable, Aesthetic, & Functional', 'elementor-addon' ),
                'placeholder' => esc_html__( 'Type your heading here', 'elementor-addon' ),
            ]
        );

        $this->add_control(
            'small_text',
            [
                'label' => esc_html__( 'Small Text', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'How can steel-scape be incorporated into your landscape or outdoor living space? Contact Us to find out how.', 'elementor-addon' ),
                'placeholder' => esc_html__( 'Type your description here', 'elementor-addon' ),
            ]
        );

        // Image Section Controls
        $this->add_control(
            'intro_image',
            [
                'label' => esc_html__( 'Introduction Image', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'overlay_heading',
            [
                'label' => esc_html__( 'Overlay Heading', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'NEED SOMETHING CUSTOM?', 'elementor-addon' ),
                'placeholder' => esc_html__( 'Type overlay heading here', 'elementor-addon' ),
            ]
        );

        $this->add_control(
            'overlay_text',
            [
                'label' => esc_html__( 'Overlay Text', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'We Can Help.', 'elementor-addon' ),
                'placeholder' => esc_html__( 'Type overlay text here', 'elementor-addon' ),
            ]
        );

        // Content Section Controls
        $this->add_control(
            'content_paragraph_1',
            [
                'label' => esc_html__( 'Heading', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Built to Last. Designed to Impress.', 'elementor-addon' ),
                'placeholder' => esc_html__( 'Type your heading here', 'elementor-addon' ),
            ]
        );

        $this->add_control(
            'content_paragraph_2',
            [
                'label' => esc_html__( 'Paragraph', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'Steel-scapes are where strength meets beauty. Whether you\'re designing a bold entryway, sculptural garden features, custom retaining walls, or sleek privacy screens, steel offers unmatched durability with a clean, modern aesthetic. At Modern Metals Utah, we craft custom steel elements that elevate outdoor spaces, bringing structure, artistry, and longevity to your landscape.', 'elementor-addon' ),
                'placeholder' => esc_html__( 'Type your paragraph here', 'elementor-addon' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'CONTACT US', 'elementor-addon' ),
                'placeholder' => esc_html__( 'Type button text here', 'elementor-addon' ),
            ]
        );

        $this->add_control(
            'button_onclick',
            [
                'label' => esc_html__( 'Button OnClick Function', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'openContactModal()', 'elementor-addon' ),
                'placeholder' => esc_html__( 'JavaScript function name', 'elementor-addon' ),
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'layout_section',
            [
                'label' => esc_html__( 'Layout Options', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_width',
            [
                'label' => esc_html__( 'Layout Width', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'contained',
                'options' => [
                    'contained' => esc_html__( 'Contained (Default)', 'elementor-addon' ),
                    'full-width' => esc_html__( 'Full Width (Edge to Edge)', 'elementor-addon' ),
                    'wide' => esc_html__( 'Wide (Minimal Padding)', 'elementor-addon' ),
                ],
            ]
        );

        $this->add_control(
            'layout_description',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<small><strong>Contained:</strong> Standard container with max-width<br><strong>Full Width:</strong> Extends to viewport edges<br><strong>Wide:</strong> No max-width but keeps padding</small>',
                'content_classes' => 'elementor-control-field-description',
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_background',
            [
                'label' => esc_html__( 'Section Background Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .steel-works-introduction' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__( 'Section Padding', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '120',
                    'right' => '0',
                    'bottom' => '80',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .steel-works-introduction' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Divider Style Section
        $this->start_controls_section(
            'divider_style_section',
            [
                'label' => esc_html__( 'Divider Style', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => esc_html__( 'Divider Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .intro-divider' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'divider_width',
            [
                'label' => esc_html__( 'Divider Width', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 196,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-divider' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'divider_height',
            [
                'label' => esc_html__( 'Divider Height', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-divider' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'divider_opacity',
            [
                'label' => esc_html__( 'Divider Opacity', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.6,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-divider' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'divider_alignment',
            [
                'label' => esc_html__( 'Divider Alignment', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Top', 'elementor-addon' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor-addon' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Bottom', 'elementor-addon' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .intro-divider' => 'align-self: {{VALUE}};',
                    '{{WRAPPER}} .steel-works-intro-top' => 'align-items: {{VALUE}}; display: flex;',
                ],
            ]
        );

        $this->end_controls_section();

        // Heading Style Section
        $this->start_controls_section(
            'content_heading_style_section',
            [
                'label' => esc_html__( 'Heading Style', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .intro-content-section h1' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_heading_typography',
                'selector' => '{{WRAPPER}} .intro-content-section h1',
            ]
        );

        $this->add_control(
            'content_heading_text_shadow',
            [
                'label' => esc_html__( 'Heading Text Shadow', 'elementor-addon' ),
                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                'selector' => '{{WRAPPER}} .intro-content-section h1',
            ]
        );

        $this->add_control(
            'content_heading_alignment',
            [
                'label' => esc_html__( 'Heading Alignment', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elementor-addon' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor-addon' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elementor-addon' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .intro-content-section h1' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_heading_margin',
            [
                'label' => esc_html__( 'Heading Margin', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '30',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-content-section h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Large Heading Style Section
        $this->start_controls_section(
            'large_heading_style_section',
            [
                'label' => esc_html__( 'Large Heading Style', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'large_heading_color',
            [
                'label' => esc_html__( 'Large Heading Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .intro-large-text h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'large_heading_typography',
                'selector' => '{{WRAPPER}} .intro-large-text h2',
                'fields_options' => [
                    'typography' => [
                        'default' => 'yes',
                    ],
                    'font_family' => [
                        'default' => 'DM Sans',
                    ],
                    'font_size' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 38,
                        ],
                    ],
                    'font_weight' => [
                        'default' => '300',
                    ],
                ],
            ]
        );

        $this->add_control(
            'large_heading_text_shadow',
            [
                'label' => esc_html__( 'Large Heading Text Shadow', 'elementor-addon' ),
                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                'selector' => '{{WRAPPER}} .intro-large-text h2',
            ]
        );

        $this->end_controls_section();

        // Small Text Style Section
        $this->start_controls_section(
            'small_text_style_section',
            [
                'label' => esc_html__( 'Small Text Style', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'small_text_color',
            [
                'label' => esc_html__( 'Small Text Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => [
                    '{{WRAPPER}} .intro-small-text p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'small_text_typography',
                'selector' => '{{WRAPPER}} .intro-small-text p',
            ]
        );

        $this->add_control(
            'small_text_text_shadow',
            [
                'label' => esc_html__( 'Small Text Text Shadow', 'elementor-addon' ),
                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                'selector' => '{{WRAPPER}} .intro-small-text p',
            ]
        );

        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => esc_html__( 'Button Style', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__( 'Button Text Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .steel-works-contact-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__( 'Button Background Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .steel-works-contact-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__( 'Button Hover Text Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .steel-works-contact-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__( 'Button Hover Background Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#555',
                'selectors' => [
                    '{{WRAPPER}} .steel-works-contact-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .steel-works-contact-btn',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__( 'Button Padding', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '15',
                    'right' => '30',
                    'bottom' => '15',
                    'left' => '30',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .steel-works-contact-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Button Border Radius', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default' => [
                    'top' => '4',
                    'right' => '4',
                    'bottom' => '4',
                    'left' => '4',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .steel-works-contact-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'button_alignment',
            [
                'label' => esc_html__( 'Button Alignment', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'elementor-addon' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor-addon' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'elementor-addon' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'flex-end',
                'selectors' => [
                    '{{WRAPPER}} .intro-content-section' => 'display: flex; flex-direction: column; align-items: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Overlay Style Section
        $this->start_controls_section(
            'overlay_style_section',
            [
                'label' => esc_html__( 'Image Overlay Style', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'overlay_horizontal_position',
            [
                'label' => esc_html__( 'Horizontal Position', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_vertical_position',
            [
                'label' => esc_html__( 'Vertical Position', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'overlay_background_color',
            [
                'label' => esc_html__( 'Overlay Background Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.8)',
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'overlay_border_color',
            [
                'label' => esc_html__( 'Overlay Border Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_border_width',
            [
                'label' => esc_html__( 'Overlay Border Width', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_padding',
            [
                'label' => esc_html__( 'Overlay Padding', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '15',
                    'right' => '18',
                    'bottom' => '15',
                    'left' => '18',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'overlay_heading_color',
            [
                'label' => esc_html__( 'Overlay Heading Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'overlay_heading_typography',
                'selector' => '{{WRAPPER}} .intro-image-overlay h3',
            ]
        );

        $this->add_control(
            'overlay_text_color',
            [
                'label' => esc_html__( 'Overlay Text Color', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .intro-image-overlay p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'overlay_text_typography',
                'selector' => '{{WRAPPER}} .intro-image-overlay p',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $large_heading = $settings['large_heading'];
        $small_text = $settings['small_text'];
        $intro_image = $settings['intro_image'];
        $overlay_heading = $settings['overlay_heading'];
        $overlay_text = $settings['overlay_text'];
        $content_paragraph_1 = $settings['content_paragraph_1'];
        $content_paragraph_2 = $settings['content_paragraph_2'];
        $button_text = $settings['button_text'];
        $button_onclick = $settings['button_onclick'];
        
        // Determine layout classes
        $layout_classes = '';
        switch ( $settings['layout_width'] ) {
            case 'full-width':
                $layout_classes = 'full-width-section';
                break;
            case 'wide':
                $layout_classes = 'no-max-width minimal-padding';
                break;
            default:
                $layout_classes = '';
                break;
        }

        ?>
        <!-- Introduction Section -->
        <section class="steel-works-introduction <?php echo esc_attr( $layout_classes ); ?>">
            <div class="container">
                <!-- Upper Section: Large text left, thin bar middle, small text right -->
                <div class="steel-works-intro-top">
                    <div class="intro-large-text">
                        <h2><?php echo esc_html( $large_heading ); ?></h2>
                    </div>
                    <div class="intro-divider"></div>
                    <div class="intro-small-text">
                        <p><?php echo esc_html( $small_text ); ?></p>
                    </div>
                </div>
                
                <!-- Lower Section: Image left with text box, content right -->
                <div class="steel-works-intro-bottom">
                    <div class="intro-image-section" style="position: relative;">
                        <?php if ( ! empty( $intro_image['url'] ) ) : ?>
                            <img src="<?php echo esc_url( $intro_image['url'] ); ?>" alt="<?php echo esc_attr( $intro_image['alt'] ); ?>" />
                        <?php endif; ?>
                        <?php if ( ! empty( $overlay_heading ) || ! empty( $overlay_text ) ) : ?>
                            <div class="intro-image-overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0, 0, 0, 0.8); color: white; padding: 15px 18px; border: 2px solid #ffffff; backdrop-filter: blur(15px); z-index: 10;">
                                <?php if ( ! empty( $overlay_heading ) ) : ?>
                                    <h3 style="font-family: 'Avenir', 'Avenir Next', 'Helvetica Neue', Arial, sans-serif; font-size: 1.5rem; font-weight: 300; margin: 0 0 10px 0; letter-spacing: 15px;"><?php echo wp_kses( str_replace( ' ', '<br>', $overlay_heading ), array( 'br' => array() ) ); ?></h3>
                                <?php endif; ?>
                                <?php if ( ! empty( $overlay_text ) ) : ?>
                                    <p style="font-family: 'Nunito Sans', sans-serif; font-size: 1rem; margin: 0; opacity: 0.9;"><?php echo esc_html( $overlay_text ); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="intro-spacer"></div>
                    
                    <div class="intro-content-section">
                        <?php if ( ! empty( $content_paragraph_1 ) ) : ?>
                            <h1 style="color: #000000;"><?php echo esc_html( $content_paragraph_1 ); ?></h1>
                        <?php endif; ?>
                        <?php if ( ! empty( $content_paragraph_2 ) ) : ?>
                            <div><?php echo wp_kses_post( $content_paragraph_2 ); ?></div>
                        <?php endif; ?>
                        <?php if ( ! empty( $button_text ) ) : ?>
                            <button class="steel-works-contact-btn" onclick="<?php echo esc_attr( $button_onclick ); ?>"><?php echo esc_html( $button_text ); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }

    /**
     * Render widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function content_template() {
        ?>
        <#
        var large_heading = settings.large_heading;
        var small_text = settings.small_text;
        var intro_image = settings.intro_image;
        var overlay_heading = settings.overlay_heading;
        var overlay_text = settings.overlay_text;
        var content_paragraph_1 = settings.content_paragraph_1;
        var content_paragraph_2 = settings.content_paragraph_2;
        var button_text = settings.button_text;
        var button_onclick = settings.button_onclick;
        
        // Determine layout classes
        var layoutClasses = '';
        switch ( settings.layout_width ) {
            case 'full-width':
                layoutClasses = 'full-width-section';
                break;
            case 'wide':
                layoutClasses = 'no-max-width minimal-padding';
                break;
            default:
                layoutClasses = '';
                break;
        }
        #>
        <!-- Introduction Section -->
        <section class="steel-works-introduction {{{ layoutClasses }}}">
            <div class="container">
                <!-- Upper Section: Large text left, thin bar middle, small text right -->
                <div class="steel-works-intro-top">
                    <div class="intro-large-text">
                        <h2>{{{ large_heading }}}</h2>
                    </div>
                    <div class="intro-divider"></div>
                    <div class="intro-small-text">
                        <p>{{{ small_text }}}</p>
                    </div>
                </div>
                
                <!-- Lower Section: Image left with text box, content right -->
                <div class="steel-works-intro-bottom">
                    <div class="intro-image-section" style="position: relative;">
                        <# if ( intro_image.url ) { #>
                            <img src="{{{ intro_image.url }}}" alt="" />
                        <# } #>
                        <# if ( overlay_heading || overlay_text ) { #>
                            <div class="intro-image-overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0, 0, 0, 0.8); color: white; padding: 15px 18px; border: 2px solid #ffffff; backdrop-filter: blur(15px); z-index: 10;">
                                <# if ( overlay_heading ) { #>
                                    <h3 style="font-family: 'Avenir', 'Avenir Next', 'Helvetica Neue', Arial, sans-serif; font-size: 1.5rem; font-weight: 300; margin: 0 0 10px 0; letter-spacing: 15px;">{{{ overlay_heading.replace(/ /g, '<br>') }}}</h3>
                                <# } #>
                                <# if ( overlay_text ) { #>
                                    <p style="font-family: 'Nunito Sans', sans-serif; font-size: 1rem; margin: 0; opacity: 0.9;">{{{ overlay_text }}}</p>
                                <# } #>
                            </div>
                        <# } #>
                    </div>
                    
                    <div class="intro-spacer"></div>
                    
                    <div class="intro-content-section">
                        <# if ( content_paragraph_1 ) { #>
                            <h1 style="color: #000000;">{{{ content_paragraph_1 }}}</h1>
                        <# } #>
                        <# if ( content_paragraph_2 ) { #>
                            <div>{{{ content_paragraph_2 }}}</div>
                        <# } #>
                        <# if ( button_text ) { #>
                            <button class="steel-works-contact-btn" onclick="{{{ button_onclick }}}">{{{ button_text }}}</button>
                        <# } #>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} 