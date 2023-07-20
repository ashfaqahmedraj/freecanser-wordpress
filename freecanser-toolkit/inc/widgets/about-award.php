<?php
/**
 * About_Award Widget
 */

namespace Elementor;

class Freecanser_About_Award extends Widget_Base {

	public function get_name() {
        return 'Freecanser_About_Award';
    }

	public function get_title() {
        return __( 'Freecanser About Award', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'Freecanser-elements' ];
    }

	protected function register_controls() {

        // about_award Section title controls
        $this->start_controls_section(
			'Freecanser_About',
			[
				'label' => __( 'About Section', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
            //about Cortolls
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


        // Award Section title controls
        $this->start_controls_section(
			'Freecansert_Award',
			[
				'label' => __( 'Award Sections', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        
            // award Cortolls
            $this->add_control(
                'award_title',
                [
                    'label'       => __( 'Section Title', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('AWARDS AND INDUSTRY RECOGNITION', 'freecanser-toolkit'),
                    'label_block' => true,
                ]
            );

			$list_items = new Repeater();

			$list_items->add_control(
                'award_img',
                [
                    'label'       => __( 'Award Image', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );

			$this->add_control(
				'award_cards',
				[
					'label' => esc_html__('About Award Cards', 'freecanser-toolkit'),
					'type' => Controls_Manager::REPEATER,
					'fields' => $list_items->get_controls(),
				]
			);

        $this->end_controls_section();




        //style_tab_Control
		$this->start_controls_section(
			'Freecanser_award_Style',
			[
				'label' => __( 'Award Style', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			//about_award_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'award_typography',
                    'label' => __( 'Award Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-about_awards-item p',
                ]
            );

            //about_award_color
			$this->add_control(
				'award_color',
				[
					'label' => esc_html__( 'Award Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-about_awards-item p' => 'color: {{VALUE}}',
					],
				]
			);

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

                    <div class="fl-awards-list">
                        <h4><?php echo esc_html($settings['award_title']); ?></h4>
                        <div class="row justify-content-center">
                            <?php foreach($settings['award_cards'] as $content ):  ?>
                                <div class="col-lg-2 col-4 col-sm-4 col-md-3">
                                    <div class="fl-awards-box">
                                        <img src="<?php echo esc_url($content['award_img']['url']); ?>" alt="<?php echo esc_attr($content['title']); ?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>                      

                </div>
            </div>
            <!-- End FL About Area -->
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_About_Award );
