<?php
class Modern_Metals_Contact_Widget extends Modern_Metals_Base_Widget {
    public function get_name() { return 'modern-metals-contact'; }
    public function get_title() { return 'MM Contact Section'; }
    public function get_icon() { return 'eicon-form-horizontal'; }
    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('placeholder', ['type' => \Elementor\Controls_Manager::RAW_HTML, 'raw' => 'Contact Widget - Coming Soon']);
        $this->end_controls_section();
    }
    protected function render_widget($settings) { echo '<div>Contact Widget - Coming Soon</div>'; }
} 