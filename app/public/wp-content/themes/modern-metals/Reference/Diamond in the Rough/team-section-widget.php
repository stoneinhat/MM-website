<?php
/**
 * Team Section Widget for Elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Team_Section_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'team_section';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'Team Section', 'hello-elementor-child' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Get custom help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories() {
		return [ 'modern-metals-theme' ];
	}

	/**
	 * Get widget keywords.
	 */
	public function get_keywords() {
		return [ 'team', 'members', 'staff', 'people', 'about' ];
	}

	/**
	 * Register widget controls.
	 */
	protected function register_controls() {

		// Team Members Section
		$this->start_controls_section(
			'team_members_section',
			[
				'label' => esc_html__( 'Team Members', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'team_members',
			[
				'label' => esc_html__( 'Team Members', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'member_image',
						'label' => esc_html__( 'Member Photo', 'hello-elementor-child' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'member_name',
						'label' => esc_html__( 'Name', 'hello-elementor-child' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'Team Member',
						'placeholder' => esc_html__( 'Enter name', 'hello-elementor-child' ),
					],
					[
						'name' => 'member_title',
						'label' => esc_html__( 'Title/Position', 'hello-elementor-child' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'POSITION',
						'placeholder' => esc_html__( 'Enter position', 'hello-elementor-child' ),
					],
				],
				'default' => [
					[
						'member_image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/team/Gabe.png' ],
						'member_name' => 'Gabriel Spotts',
						'member_title' => 'OWNER / OPERATOR',
					],
					[
						'member_image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/team/Dillon.png' ],
						'member_name' => 'Dillon Flinders',
						'member_title' => 'OWNER / PROJECT MANAGER',
					],
					[
						'member_image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/team/Monika.png' ],
						'member_name' => 'Monika Robinson',
						'member_title' => 'DESIGN MANAGER',
					],
					[
						'member_image' => [ 'url' => get_stylesheet_directory_uri() . '/assets/home/team/Guillermo.png' ],
						'member_name' => 'Guillermo Medici',
						'member_title' => 'STEEL SCAPE ARTIST',
					],
				],
				'title_field' => '{{{ member_name }}}',
			]
		);

		$this->end_controls_section();

		// Meet The Team Button Section
		$this->start_controls_section(
			'meet_team_section',
			[
				'label' => esc_html__( 'Meet The Team Button', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_meet_team_button',
			[
				'label' => esc_html__( 'Show Meet The Team Button', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hello-elementor-child' ),
				'label_off' => esc_html__( 'Hide', 'hello-elementor-child' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'meet_team_text',
			[
				'label' => esc_html__( 'Button Text', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Meet The Team',
				'placeholder' => esc_html__( 'Meet The Team', 'hello-elementor-child' ),
				'condition' => [
					'show_meet_team_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'meet_team_url',
			[
				'label' => esc_html__( 'Button URL', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'hello-elementor-child' ),
				'default' => [
					'url' => 'team.html',
					'is_external' => false,
					'nofollow' => false,
				],
				'condition' => [
					'show_meet_team_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'meet_team_position',
			[
				'label' => esc_html__( 'Button Position', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'middle',
				'options' => [
					'after-2' => esc_html__( 'After 2nd Member', 'hello-elementor-child' ),
					'middle' => esc_html__( 'Middle (Default)', 'hello-elementor-child' ),
					'end' => esc_html__( 'At End', 'hello-elementor-child' ),
				],
				'condition' => [
					'show_meet_team_button' => 'yes',
				],
				'description' => esc_html__( 'Choose where to position the Meet The Team button in the grid.', 'hello-elementor-child' ),
			]
		);

		$this->end_controls_section();

		// Style Section - General
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__( 'General', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'grid_gap',
			[
				'label' => esc_html__( 'Grid Gap', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
					'rem' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .team-grid' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Team Photos
		$this->start_controls_section(
			'photos_style',
			[
				'label' => esc_html__( 'Team Photos', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'photo_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .photo-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'photo_box_shadow',
				'selector' => '{{WRAPPER}} .photo-item img',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'photo_border',
				'selector' => '{{WRAPPER}} .photo-item img',
			]
		);

		$this->end_controls_section();

		// Style Section - Team Names
		$this->start_controls_section(
			'names_style',
			[
				'label' => esc_html__( 'Team Names', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Text Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .text-item h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .text-item h4',
			]
		);

		$this->add_responsive_control(
			'name_margin',
			[
				'label' => esc_html__( 'Margin', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .text-item h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Team Titles
		$this->start_controls_section(
			'titles_style',
			[
				'label' => esc_html__( 'Team Titles', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .text-item p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .text-item p',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .text-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Section - Meet The Team Button
		$this->start_controls_section(
			'meet_team_button_style',
			[
				'label' => esc_html__( 'Meet The Team Button', 'hello-elementor-child' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_meet_team_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .meet-team-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .meet-team-btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label' => esc_html__( 'Hover Text Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .meet-team-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_hover_background_color',
			[
				'label' => esc_html__( 'Hover Background Color', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#555555',
				'selectors' => [
					'{{WRAPPER}} .meet-team-btn:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .meet-team-btn',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__( 'Padding', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .meet-team-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'hello-elementor-child' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .meet-team-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$team_members = $settings['team_members'];
		$show_button = $settings['show_meet_team_button'] === 'yes';
		$button_position = $settings['meet_team_position'];
		
		$target = $settings['meet_team_url']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['meet_team_url']['nofollow'] ? ' rel="nofollow"' : '';
		?>
		<section class="team">
			<div class="container">
				<div class="team-grid">
					<?php 
					$member_count = 0;
					foreach ( $team_members as $index => $member ) :
						$image_url = $member['member_image']['url'] ?: \Elementor\Utils::get_placeholder_image_src();
						$member_count++;
					?>
						<!-- Team Member Photo -->
						<div class="team-item photo-item">
							<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $member['member_name'] ); ?>">
						</div>
						
						<!-- Team Member Text -->
						<div class="team-item text-item">
							<h4><?php echo esc_html( $member['member_name'] ); ?></h4>
							<p><?php echo esc_html( $member['member_title'] ); ?></p>
						</div>
						
						<?php 
						// Insert Meet The Team button at specified position
						if ( $show_button && 
							 (($button_position === 'after-2' && $member_count === 2) || 
							  ($button_position === 'middle' && $member_count === 2)) ) : 
						?>
							<!-- Meet The Team Button -->
							<div class="team-item meet-team-item">
								<a href="<?php echo esc_url( $settings['meet_team_url']['url'] ); ?>" class="meet-team-btn"<?php echo $target . $nofollow; ?>><?php echo esc_html( $settings['meet_team_text'] ); ?></a>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
					
					<?php 
					// Insert Meet The Team button at end if specified
					if ( $show_button && $button_position === 'end' ) : 
					?>
						<!-- Meet The Team Button -->
						<div class="team-item meet-team-item">
							<a href="<?php echo esc_url( $settings['meet_team_url']['url'] ); ?>" class="meet-team-btn"<?php echo $target . $nofollow; ?>><?php echo esc_html( $settings['meet_team_text'] ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<?php
	}

	/**
	 * Render widget output in the editor.
	 */
	protected function content_template() {
		?>
		<#
		var teamMembers = settings.team_members || [];
		var showButton = settings.show_meet_team_button === 'yes';
		var buttonPosition = settings.meet_team_position;
		var target = settings.meet_team_url.is_external ? ' target="_blank"' : '';
		var nofollow = settings.meet_team_url.nofollow ? ' rel="nofollow"' : '';
		#>
		<section class="team">
			<div class="container">
				<div class="team-grid">
					<# 
					var memberCount = 0;
					_.each( teamMembers, function( member, index ) {
						var imageUrl = member.member_image.url || elementor.imagesManager.getImageUrl( member.member_image );
						memberCount++;
					#>
						<!-- Team Member Photo -->
						<div class="team-item photo-item">
							<img src="{{{ imageUrl }}}" alt="{{{ member.member_name }}}">
						</div>
						
						<!-- Team Member Text -->
						<div class="team-item text-item">
							<h4>{{{ member.member_name }}}</h4>
							<p>{{{ member.member_title }}}</p>
						</div>
						
						<# 
						// Insert Meet The Team button at specified position
						if ( showButton && 
							 ((buttonPosition === 'after-2' && memberCount === 2) || 
							  (buttonPosition === 'middle' && memberCount === 2)) ) { 
						#>
							<!-- Meet The Team Button -->
							<div class="team-item meet-team-item">
								<a href="{{{ settings.meet_team_url.url }}}" class="meet-team-btn"{{{ target }}}{{{ nofollow }}}>{{{ settings.meet_team_text }}}</a>
							</div>
						<# } #>
					<# }); #>
					
					<# 
					// Insert Meet The Team button at end if specified
					if ( showButton && buttonPosition === 'end' ) { 
					#>
						<!-- Meet The Team Button -->
						<div class="team-item meet-team-item">
							<a href="{{{ settings.meet_team_url.url }}}" class="meet-team-btn"{{{ target }}}{{{ nofollow }}}>{{{ settings.meet_team_text }}}</a>
						</div>
					<# } #>
				</div>
			</div>
		</section>
		<?php
	}
} 