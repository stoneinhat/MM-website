<?php
/**
 * Modern Metals Introduction Widget
 * 
 * A customizable introduction section widget for Elementor
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
        // Placeholder - will be implemented later
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'modern-metals'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'placeholder_text',
            [
                'label' => esc_html__('Coming Soon', 'modern-metals'),
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<p>This widget will be implemented next.</p>',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render_widget($settings) {
        echo '<div class="modern-metals-widget-placeholder">Introduction Widget - Coming Soon</div>';
    }
} 