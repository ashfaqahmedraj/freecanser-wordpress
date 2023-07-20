<?php
/**
 * SingleProtfolio Widget
 */

namespace Elementor;

class Freecanser_Single_Protfolio extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Single_Protfolio';
    }

	public function get_title() {
        return __( 'Freecanser Single Protfolio', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'Freecanser-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Freecanser_Single_Protfolio_Area',
			[
				'label' => __( 'Single Protfolio Controls', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'Project_title',
                [
                    'label'       => __( 'Project Title', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Online Learning', 'freecanser-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'protfolio_text',
                [
                    'label'       => __( 'Project Text', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::WYSIWYG,
                    'default'     => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ligula ligula. Duis ac urna eget massa hendrerit consectetur a non lacus. Sed luctus scelerisque eleifend.'),
                    'label_block' => true,
                ]
            );

            $social_list = new Repeater();

			$social_list->add_control(
                'social_icon',
                [
                    'label'       => __( 'Button Icon', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );

            $social_list->add_control(
                'social_links',
                [
                    'label'       => __( 'Button Link', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            

			$this->add_control(
				'social_cards',
				[
					'label' => esc_html__('social Icons', 'freecanser-toolkit'),
					'type' => Controls_Manager::REPEATER,
					'fields' => $social_list->get_controls(),
				]
			);

            $this->add_control(
                'btn_text',
                [
                    'label'       => __( 'Button Text', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Visit Website'),
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'btn_url',
                [
                    'label'       => __( 'Button Url', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('#'),
                    'label_block' => true,
                ]
            );

            $project_list = new Repeater();

			$project_list->add_control(
                'project_img',
				[
					'label'       => __( 'project Image', 'freecanser-toolkit' ),
					'type'        => Controls_Manager::MEDIA,
                    'label_block' => true,
				]
            );

			$this->add_control(
				'project_cards',
				[
					'label' => esc_html__('project Images', 'freecanser-toolkit'),
					'type' => Controls_Manager::REPEATER,
					'fields' => $project_list->get_controls(),
				]
			);

        $this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>

            <!-- Start FL Portfolio Details Area -->
            <div class="fl-portfolio-details-area pb-100">
                <div class="container">
                    <div class="fl-portfolio-details-desc">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                            <?php foreach($settings['project_cards'] as $content ):  ?>
                                <div class="image">
                                    <img src="<?php echo esc_url($content['project_img']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="fl-portfolio-details-sticky">
                                    <div class="content">
                                        <h3><?php echo esc_html($settings['Project_title']); ?></h3>
                                        <p><?php echo ($settings['protfolio_text']); ?></p>

                                        <ul class="info">
                                            <li><span>Client:</span> The Abc Website Company</li>
                                            <li><span>Tags:</span> Gifts, Design</li>
                                            <li><span>Date:</span> April 14, 2021</li>
                                            <li><span>Category:</span> Branding</li>
                                        </ul>
                                        
                                        <ul class="social-links">
                                            <?php foreach($settings['social_cards'] as $content ):  ?>
                                                <li><a href="<?php echo esc_url($content['social_links']); ?>" ><i class='<?php echo esc_attr($content['social_icon']['value']); ?>'></i></a></li>
                                            <?php endforeach; ?>
                                        </ul>

                                        <a href="#" class="fl-default-btn"><i class='bx bxs-user-circle'></i> <?php echo esc_html($settings['btn_text']); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End FL Portfolio Details Area -->







            <?php wp_reset_query(); ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Single_Protfolio );