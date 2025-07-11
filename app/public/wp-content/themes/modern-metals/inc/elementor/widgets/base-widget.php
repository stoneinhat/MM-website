<?php
/**
 * Base Widget Class
 * 
 * All Modern Metals Elementor widgets extend this base class
 * to ensure consistency and shared functionality.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Base Widget Class
 */
abstract class Modern_Metals_Base_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget categories.
     */
    public function get_categories() {
        return ['modern-metals'];
    }

    /**
     * Get widget keywords.
     */
    public function get_keywords() {
        return ['modern', 'metals', 'utah', 'metalwork', 'fabrication'];
    }

    /**
     * Register widget dependencies.
     */
    public function get_script_depends() {
        return ['modern-metals-elementor-frontend'];
    }

    /**
     * Register widget style dependencies.
     */
    public function get_style_depends() {
        return ['modern-metals-elementor-frontend'];
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_widget($settings);
    }

    /**
     * Render widget output in the editor.
     */
    protected function content_template() {
        // Override in child classes if needed for live editing
    }

    /**
     * Abstract method to be implemented by child classes
     */
    abstract protected function render_widget($settings);

    /**
     * Common control section for spacing
     */
    protected function add_spacing_controls() {
        $this->start_controls_section(
            'section_spacing',
            [
                'label' => esc_html__('Spacing', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_margin',
            [
                'label' => esc_html__('Section Margin', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Common control section for background
     */
    protected function add_background_controls() {
        $this->start_controls_section(
            'section_background',
            [
                'label' => esc_html__('Background', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => esc_html__('Background', 'modern-metals'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}}',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Common control for full width option
     */
    protected function add_full_width_control() {
        $this->add_control(
            'full_width',
            [
                'label' => esc_html__('Full Width', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'modern-metals'),
                'label_off' => esc_html__('No', 'modern-metals'),
                'return_value' => 'yes',
                'default' => '',
                'description' => esc_html__('Make the section stretch to full browser width', 'modern-metals'),
            ]
        );

        $this->add_control(
            'full_height',
            [
                'label' => esc_html__('Full Height', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'modern-metals'),
                'label_off' => esc_html__('No', 'modern-metals'),
                'return_value' => 'yes',
                'default' => '',
                'description' => esc_html__('Make the section stretch to full viewport height', 'modern-metals'),
            ]
        );

        $this->add_control(
            'width_mode',
            [
                'label' => esc_html__('Width Mode', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'contained',
                'options' => [
                    'contained' => esc_html__('Contained', 'modern-metals'),
                    'full-width' => esc_html__('Full Width', 'modern-metals'),
                    'edge-to-edge' => esc_html__('Edge to Edge', 'modern-metals'),
                ],
                'prefix_class' => 'width-mode-',
                'condition' => [
                    'full_width' => 'yes',
                ],
            ]
        );
    }

    /**
     * Get full width class
     */
    protected function get_full_width_class($settings) {
        $classes = [];
        
        if (!empty($settings['full_width'])) {
            $classes[] = 'full-width-section';
        }
        
        if (!empty($settings['full_height'])) {
            $classes[] = 'full-height-section';
        }
        
        return implode(' ', $classes);
    }

    /**
     * Common typography control
     */
    protected function add_typography_control($selector, $label = 'Typography', $control_name = 'typography') {
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => $control_name,
                'label' => esc_html__($label, 'modern-metals'),
                'selector' => $selector,
            ]
        );
    }

    /**
     * Common color control
     */
    protected function add_color_control($selector, $label = 'Color', $control_name = 'color') {
        $this->add_control(
            $control_name,
            [
                'label' => esc_html__($label, 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    $selector => 'color: {{VALUE}};',
                ],
            ]
        );
    }

    /**
     * Common hover color control
     */
    protected function add_hover_color_control($selector, $label = 'Hover Color', $control_name = 'hover_color') {
        $this->add_control(
            $control_name,
            [
                'label' => esc_html__($label, 'modern-metals'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    $selector . ':hover' => 'color: {{VALUE}};',
                ],
            ]
        );
    }

    /**
     * Common button style controls
     */
    protected function add_button_style_controls($button_selector, $section_name = 'button_style') {
        $this->start_controls_section(
            $section_name,
            [
                'label' => esc_html__('Button Style', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_typography_control($button_selector, 'Button Typography', 'button_typography');

        $this->start_controls_tabs('button_tabs');

        // Normal state
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__('Normal', 'modern-metals'),
            ]
        );

        $this->add_color_control($button_selector, 'Text Color', 'button_color');

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => esc_html__('Background', 'modern-metals'),
                'types' => ['classic', 'gradient'],
                'selector' => $button_selector,
            ]
        );

        $this->end_controls_tab();

        // Hover state
        $this->start_controls_tab(
            'button_hover',
            [
                'label' => esc_html__('Hover', 'modern-metals'),
            ]
        );

        $this->add_hover_color_control($button_selector, 'Hover Text Color', 'button_hover_color');

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_hover_background',
                'label' => esc_html__('Hover Background', 'modern-metals'),
                'types' => ['classic', 'gradient'],
                'selector' => $button_selector . ':hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    $button_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => esc_html__('Border', 'modern-metals'),
                'selector' => $button_selector,
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    $button_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render opening container div with classes
     */
    protected function render_container_start($settings, $additional_classes = '') {
        $classes = [];
        
        if (!empty($settings['full_width'])) {
            $classes[] = 'full-width-section';
        }
        
        if (!empty($additional_classes)) {
            $classes[] = $additional_classes;
        }

        $class_string = !empty($classes) ? ' class="' . esc_attr(implode(' ', $classes)) . '"' : '';
        
        echo '<div' . $class_string . '>';
    }

    /**
     * Render closing container div
     */
    protected function render_container_end() {
        echo '</div>';
    }

    /**
     * Helper to get template directory URI
     */
    protected function get_template_dir_uri() {
        return get_template_directory_uri();
    }

    /**
     * Helper to safely echo attributes
     */
    protected function echo_attr($value) {
        echo esc_attr($value);
    }

    /**
     * Helper to safely echo HTML
     */
    protected function echo_html($value) {
        echo wp_kses_post($value);
    }
} 