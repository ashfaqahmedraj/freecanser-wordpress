<?php
/**
 * Banner Widget
 */

namespace Elementor;

class Freecanser_Banner extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Banner';
    }

	public function get_title() {
        return __( 'Freecanser Banner', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'freecanser-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Freecanser_Banner_Area',
			[
				'label' => __( 'Banner Controls', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
            $this->add_control(
				'heading_text',
				[
					'label'       => __( 'Title', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXTAREA,
					'default'     => __('Im A Full Stack Web Developer', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $this->add_control(
				'content',
				[
					'label'       => __( 'Content', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXTAREA,
					'default'     => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum.', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $this->add_control(
				'btn_text',
				[
					'label'       => __( 'Button Text', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('Lets Work Together', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $this->add_control(
				'btn_icon',
				[
					'label'       => __( 'Button Icon', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::ICONS,
                    'label_block' => true,
				]
			);

            $this->add_control(
				'btn_link',
				[
					'label'       => __( 'Button URL', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('#', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $this->add_control(
				'banner_img',
				[
					'label'       => __( 'Banner Image', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::MEDIA,
                    'label_block' => true,
				]
			);

        $this->end_controls_section();

		//style_tab_Control
		$this->start_controls_section(
			'Freecanser_Section_Style',
			[
				'label' => __( 'Style', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Heading_Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Heading Typography', 'freecanser-toolkit' ),
				'selector' => '{{WRAPPER}} .fl-banner-content h1',
			]
		);
		
		//Heading_Color
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'freecanser-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fl-banner-content h1' => 'color: {{VALUE}}',
				],
			]
		);

		//Content_Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_Typography',
				'label' => __( 'Content Typography', 'freecanser-toolkit' ),
				'selector' => '{{WRAPPER}} .fl-banner-content p',
			]
		);

		//Content_Color
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'freecanser-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fl-banner-content p' => 'color: {{VALUE}}',
				],
			]
		);

		//Button_Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Button_Typography',
				'label' => __( 'Button Typography', 'freecanser-toolkit' ),
				'selector' => '{{WRAPPER}} .fl-default-btn',
			]
		);

		// Start_Button_color_Control
		$this->start_controls_tabs(
			'button_style_tabs'
		);
			// Normal_color_Control
			$this->start_controls_tab(
				'button_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'freecanser-toolkit' ),
				]
			);
				// Text_color
				$this->add_control(
					'button_text_color',
					[
						'label' => esc_html__( 'Button Text Color', 'freecanser-toolkit' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .fl-default-btn' => 'color: {{VALUE}}',
						],
					]
				);

				// Background_color
				$this->add_control(
					'button_color',
					[
						'label' => esc_html__( 'Button Color', 'freecanser-toolkit' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .fl-default-btn' => 'background-color: {{VALUE}}',
						],
					]
				);
			$this->end_controls_tab();

			// Hover_color_Control
			$this->start_controls_tab(
				'button_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'freecanser-toolkit' ),
				]
			);
				// Hover_Text_color
				$this->add_control(
					'button_text_hover_color',
					[
						'label' => esc_html__( 'Button Text Hover Color', 'freecanser-toolkit' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .fl-default-btn:hover' => 'color: {{VALUE}}',
						],
					]
				);

				// Backgroundr-hover_color
				$this->add_control(
					'button_hover_color',
					[
						'label' => esc_html__( 'Button Hover Color', 'freecanser-toolkit' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .fl-default-btn:hover' => 'background-color: {{VALUE}}',
						],
					]
				);
			$this->end_controls_tab();
			
		// End_Button_color_Control
		$this->end_controls_tabs();


		//End_style_tab_Control
		$this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>

        <!-- Start FL Banner Area -->
        <div class="fl-banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="fl-banner-content">
                            <h1><?php echo esc_html($settings['heading_text']); ?></h1>
                            <p><?php echo wp_kses_post($settings['content']); ?></p>

							<?php if($settings['btn_text']): ?>
                                <a class="fl-default-btn" href="<?php echo esc_url($settings['btn_link']); ?>"><i class="<?php echo esc_attr($settings['btn_icon']['value']); ?>"></i> <?php echo esc_html($settings['btn_text']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="fl-banner-image">
                            <?php if($settings['banner_img']['url']): ?>
                                <img src="<?php echo esc_url($settings['banner_img']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End FL Banner Area -->

        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Banner );