<?php
/**
 * Award Widget
 */

namespace Elementor;

class Freecanser_Award extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Award';
    }

	public function get_title() {
        return __( 'Freecanser Award', 'freecanser-toolkit' );
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
			'Freecanser_Award_Area2',
			[
				'label' => __( 'Award Cards', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

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
					'label' => esc_html__('Award Cards', 'freecanser-toolkit'),
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
			//award_typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'award_typography',
                    'label' => __( 'Award Typography', 'freecanser-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-awards-item p',
                ]
            );

            //award_color
			$this->add_control(
				'award_color',
				[
					'label' => esc_html__( 'Award Color', 'freecanser-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-awards-item p' => 'color: {{VALUE}}',
					],
				]
			);
       
		//End_style_tab_Control
        $this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
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
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Award );
