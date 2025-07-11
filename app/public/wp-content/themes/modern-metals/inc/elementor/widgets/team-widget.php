<?php
class Modern_Metals_Team_Widget extends Modern_Metals_Base_Widget {
    public function get_name() { return 'modern-metals-team'; }
    public function get_title() { return 'MM Team Section'; }
    public function get_icon() { return 'eicon-person'; }
    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('placeholder', ['type' => \Elementor\Controls_Manager::RAW_HTML, 'raw' => 'Team Widget - Coming Soon']);
        $this->end_controls_section();
    }
    protected function render_widget($settings) { echo '<div>Team Widget - Coming Soon</div>'; }
} 