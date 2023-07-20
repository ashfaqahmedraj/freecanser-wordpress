<?php
/**
 * About Widget
 */

namespace Elementor;

class Freecanser_About extends Widget_Base {

	public function get_name() {
        return 'Freecanser_About';
    }

	public function get_title() {
        return __( 'Freecanser About', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'freecanser-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Freecanser_About_Area',
			[
				'label' => __( 'About Controls', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
            $this->add_control(
				'top_title',
				[
					'label'       => __( 'Title', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('I’m David Smith', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);
            
            $this->add_control(
				'title',
				[
					'label'       => __( 'Title', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('A Freelance Full Stack Web Developer', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $this->add_control(
				'short_content',
				[
					'label'       => __( 'Content', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXTAREA,
					'default'     => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum.', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $about_item = new Repeater();

			$about_item->add_control(
                'counter_number',
                [
                    'label'       => __( 'Counter Number', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
					'default'     => __('123', 'freecanser-toolkit'),
                    'label_block' => true,
                ]
            );
           
            $about_item->add_control(
				'counter_text',
				[
					'label'       => __( 'Content Text', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('FINISHED PROJECTS', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $this->add_control(
				'counter',
				[
					'label' => esc_html__('Counter', 'the6m-toolkit'),
					'type' => Controls_Manager::REPEATER,
					'fields' => $about_item->get_controls(),
				]
			);

            $this->add_control(
				'abt_content',
				[
					'label'       => __( 'Content', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXTAREA,
					'default'     => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

            $this->add_control(
				'aut_text',
				[
					'label'       => __( 'Button Text', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('Hire Me Now', 'freecanser-toolkit'),
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
				'about_img',
				[
					'label'       => __( 'About Image', 'freecanser-toolkit' ),
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

		//Sub_Heading_Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_heading_typography',
				'label' => __( 'Sub Heading Typography', 'freecanser-toolkit' ),
				'selector' => '{{WRAPPER}} .fl-about-content h2 span',
			]
		);

        //Heading_Color
		$this->add_control(
			'sub_heading_color',
			[
				'label' => esc_html__( 'Sub Heading Color', 'freecanser-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fl-about-content h2 span' => 'color: {{VALUE}}',
				],
			]
		);

		//Heading_Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Heading Typography', 'freecanser-toolkit' ),
				'selector' => '{{WRAPPER}} .fl-about-content h2',
			]
		);
		
		//Heading_Color
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'freecanser-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fl-about-content h2' => 'color: {{VALUE}}',
				],
			]
		);

		//Content_Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_Typography',
				'label' => __( 'Content Typography', 'freecanser-toolkit' ),
				'selector' => '{{WRAPPER}} .fl-about-content p',
			]
		);

		//Content_Color
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'freecanser-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fl-about-content p' => 'color: {{VALUE}}',
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
            <!-- Start FL About Area -->
            <div class="fl-about-area ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="fl-about-image">
                                <?php if($settings['about_img']['url']): ?>
                                    <img src="<?php echo esc_url($settings['about_img']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="fl-about-content">
                                <h2><span><?php echo esc_html($settings['top_title']); ?></span><?php echo wp_kses_post($settings['title']); ?></h2>
                                <p><?php echo wp_kses_post($settings['short_content']); ?></p>

                                <ul class="features-list">
                                    <?php foreach($settings['counter'] as $content ):  ?>
                                        <li>
                                            <h3><span class="odometer" data-count="<?php echo esc_html($content['counter_number']); ?>">00</span></h3>
                                            <p><?php echo esc_html($content['counter_text']); ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <p><?php echo esc_html($settings['abt_content']); ?></p>

                                <?php if($settings['aut_text']): ?>
                                    <a class="fl-default-btn" href="<?php echo esc_url($settings['btn_link']); ?>"><i class="<?php echo esc_attr($settings['btn_icon']['value']); ?>"></i> <?php echo esc_html($settings['aut_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End FL About Area -->
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_About );