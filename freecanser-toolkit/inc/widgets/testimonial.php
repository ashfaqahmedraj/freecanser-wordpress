<?php
/**
 * Testimonial Widget
 */

namespace Elementor;

class Freecanser_Testimonial extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Testimonial';
    }

	public function get_title() {
        return __( 'Freecanser Testimonial', 'freecanser-toolkit' );
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
			'Freecanser_Testimonial_Area',
			[
				'label' => __( 'Testimonial Section', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'section_title',
            [
                'label'       => __( 'Section Title', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('What Client Say About Me', 'freecanser-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'section_content',
            [
                'label'       => __( 'Section Content', 'freecanser-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.', 'freecanser-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // testimonial Section title controls
        $this->start_controls_section(
			'Freecanser_Testimonial_Area2',
			[
				'label' => __( 'Testimonial Cards', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

			$list_items = new Repeater();

			$list_items->add_control(
                'user_img',
                [
                    'label'       => __( 'User Image', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );

			$list_items->add_control(
				'user_name',
				[
					'label'       => __( 'User Name', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('Jason Doe', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

			$list_items->add_control(
				'user_title',
				[
					'label'       => __( 'User Title', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('Web Developer', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

			$list_items->add_control(
				'testimonial',
				[
					'label'       => __( 'User Opinion', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'freecanser-toolkit'),
                    'label_block' => true,
				]
			);

			$this->add_control(
				'user_cards',
				[
					'label' => esc_html__('Cards', 'freecanser-toolkit'),
					'type' => Controls_Manager::REPEATER,
					'fields' => $list_items->get_controls(),
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
				'label' => __( 'Testimonial Style', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			//testimonial_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'testimonial_typography',
                    'label' => __( 'Testimonial Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-testimonials-item p',
                ]
            );

            //testimonial_color
			$this->add_control(
				'testimonial_color',
				[
					'label' => esc_html__( 'Testimonial Color', 'freecanser-toolkit' ),
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
            <!-- Start FL Feedback Area -->
            <div class="fl-feedback-area pb-100">
                <div class="container">
                    <div class="fl-section-title">
                        <h2><?php echo esc_html($settings['section_title']); ?></h2>
                        <p><?php echo esc_html($settings['section_content']); ?></p>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="fl-feedback-slides owl-carousel owl-theme">
                        <?php foreach($settings['user_cards'] as $content ):  ?>

                            <div class="fl-feedback-box">

                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                </div>

                                <p><?php echo esc_html($content['testimonial']); ?></p>
                                <div class="client-info d-flex align-items-center">

                                    <?php if($content['user_img']['url']): ?>
                                        <img src="<?php echo esc_url($content['user_img']['url']); ?>" alt="<?php echo esc_attr($content['title']); ?>">
                                    <?php endif; ?>

                                    <div class="title">
                                        <h3><?php echo esc_html($content['user_name']); ?></h3>
                                        <span><?php echo esc_html($content['user_title']); ?></span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- End FL Feedback Area -->
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Testimonial );