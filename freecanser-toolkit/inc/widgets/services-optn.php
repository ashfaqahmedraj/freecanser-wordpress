<?php
/**
 * service-opt Widget
 */

namespace Elementor;

class Freecanser_service_opt extends Widget_Base {

	public function get_name() {
        return 'Freecanser_service_opt';
    }

	public function get_title() {
        return __( 'Freecanser service Opt', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'Freecanser-elements' ];
    }

	protected function register_controls() {

        // testimonial Section title controls
        $this->start_controls_section(
			'Freecanser_service_Area',
			[
				'label' => __( 'service Section', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'service_subtitle',
            [
                'label'       => __( 'Service Sub Title', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('DEVELOPMENT', 'freecanser-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_opt_title',
            [
                'label'       => __( 'Service Title', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Creative Thinking & Design', 'freecanser-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_opt_content',
            [
                'label'       => __( 'Service Content', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 'freecanser-toolkit'),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'service_opt_content2',
            [
                'label'       => __( 'Service Content', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla.', 'freecanser-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_opt_img',
            [
                'label'       => __( 'Service Image', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'       => __( 'Button Text', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Lets Work Together'),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'btn_url',
            [
                'label'       => __( 'Button Url', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('#'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

		//style_tab_Control
		$this->start_controls_section(
			'Freecanser_Section_Style',
			[
				'label' => __( 'Section Style', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			//section_top_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'section_top_typography',
                    'label' => __( 'Top Title Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .section-title .sub-title',
                ]
            );

			//section_typography
			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'section_typography',
                    'label' => __( 'Title Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .section-title h2',
                ]
            );

			//section_top_typography_color
			$this->add_control(
				'section_top_typography',
				[
					'label' => esc_html__( 'Content Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
					],
				]
			);

			//section_typography_color
			$this->add_control(
				'section_typography',
				[
					'label' => esc_html__( 'Content Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
					],
				]
			);

		//End_style_tab_Control
        $this->end_controls_section();


        //style_tab_Control
		$this->start_controls_section(
			'Freecanser_testimonial_Style',
			[
				'label' => __( 'service Style', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			//testimonial_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'testimonial_typography',
                    'label' => __( 'service Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-testimonials-item p',
                ]
            );

            //testimonial_color
			$this->add_control(
				'testimonial_color',
				[
					'label' => esc_html__( 'service Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-item p' => 'color: {{VALUE}}',
					],
				]
			);

			//user_name_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'user_name_typography',
                    'label' => __( 'User Name Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-testimonials-item .clients-info .info h3',
                ]
            );

            //user_name_color
			$this->add_control(
				'user_name_color',
				[
					'label' => esc_html__( 'User Name Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-item .clients-info .info h3' => 'color: {{VALUE}}',
					],
				]
			);

            //user_title_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'user_title_typography',
                    'label' => __( 'User Title Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-testimonials-item .clients-info .info span',
                ]
            );

			 //user_name_color
             $this->add_control(
				'user_title_color',
				[
					'label' => esc_html__( 'User Title Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-testimonials-item .clients-info .info span' => 'color: {{VALUE}}',
					],
				]
			);

		//End_style_tab_Control
        $this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>

            <!-- Start FL Services Details Area -->
            <div class="fl-services-details-area">
                <div class="fl-services-details-box ptb-100">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12 image">
                                <img src="<?php echo esc_url($settings['service_opt_img']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                            </div>
                            <div class="col-lg-6 col-md-12 content">
                                <span class="sub-title"><?php echo esc_html($settings['service_subtitle']); ?></span>
                                <h2><?php echo esc_html($settings['service_opt_title']); ?></h2>
                                <p><?php echo esc_html($settings['service_opt_content']); ?></p>
                                <p><?php echo esc_html($settings['service_opt_content2']); ?></p>
                                <a href="<?php echo esc_url($settings['btn_url']); ?>" class="link-btn"><i class='bx bx-chevron-right'></i> <?php echo esc_html($settings['btn_text']); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End FL Services Details Area -->     
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_service_opt );