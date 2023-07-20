<?php
/**
 * Clients Widget
 */

namespace Elementor;

class Freecanser_Clients extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Clients';
    }

	public function get_title() {
        return __( 'Freecanser Clients', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'Freecanser-elements' ];
    }

	protected function register_controls() {

        // award Section title controls
        $this->start_controls_section(
			'Freecanser_Clients_Area2',
			[
				'label' => __( 'Clients Cards', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'section_title',
                [
                    'label'       => __( 'Section Title', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('My Honorable Clients', 'freecanser-toolkit'),
                    'label_block' => true,
                ]
            );

			$list_items = new Repeater();

			$list_items->add_control(
                'client_img',
                [
                    'label'       => __( 'Clients Image', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );

			$this->add_control(
				'client_cards',
				[
					'label' => esc_html__('Clients Cards', 'freecanser-toolkit'),
					'type' => Controls_Manager::REPEATER,
					'fields' => $list_items->get_controls(),
				]
			);

        $this->end_controls_section();


        //style_tab_Control
		$this->start_controls_section(
			'Freecanser_award_Style',
			[
				'label' => __( 'Section Style', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			//award_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'client_typography',
                    'label' => __( 'Section Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .fl-section-title h2',
                ]
            );

            //award_color
			$this->add_control(
				'client_color',
				[
					'label' => esc_html__( 'Section Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .fl-section-title h2' => 'color: {{VALUE}}',
					],
				]
			);
       
		//End_style_tab_Control
        $this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>

            <!-- Start FL Clients Area -->
            <div class="fl-clients-area pb-100">
                <div class="container">
                    <div class="fl-section-title">
                        <h2><?php echo esc_html($settings['section_title']); ?></h2>
                    </div>
                    <div class="fl-clients-inner">
                        <ul>
                            <?php foreach($settings['client_cards'] as $content ):  ?>
                                <li><a href="#">
                                    <img src="<?php echo esc_url($content['client_img']['url']); ?>" alt="<?php echo esc_attr($content['title']); ?>">
                                </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End FL Clients Area -->

        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Clients );
