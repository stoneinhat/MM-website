<?php
class Modern_Metals_Testimonials_Widget extends Modern_Metals_Base_Widget {
    public function get_name() { return 'modern-metals-testimonials'; }
    public function get_title() { return 'MM Testimonials Section'; }
    public function get_icon() { return 'eicon-testimonial'; }
    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('placeholder', ['type' => \Elementor\Controls_Manager::RAW_HTML, 'raw' => 'Testimonials Widget - Coming Soon']);
        $this->end_controls_section();
    }
    protected function render_widget($settings) { echo '<div>Testimonials Widget - Coming Soon</div>'; }
} 