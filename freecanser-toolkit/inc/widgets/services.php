<?php
/**
 * Services Widget
 */

namespace Elementor;

class Freecanser_Service extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Service';
    }

	public function get_title() {
        return __( 'Freecanser Service', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'Freecanser-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Freecanser_Service_Area',
			[
				'label' => __( 'Service Controls', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'service_title',
                [
                    'label'       => __( 'Service Title', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Provide Best Services', 'freecanser-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'service_text',
                [
                    'label'       => __( 'Service Text', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.', 'freecanser-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => __( 'Project Order By', 'freecanser-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'DESC'      => __( 'DESC', 'freecanser-toolkit' ),
                        'ASC'       => __( 'ASC', 'freecanser-toolkit' ),
                    ],
                    'default' => 'DESC',
                ]
            );

            $this->add_control(
                'count',
                [
                    'label' => __( 'Post Per Page', 'freecanser-toolkit' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 6,
                ]
            );

            $this->add_control(
                'btn_text',
                [
                    'label'       => __( 'Button Text', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => __('View More'),
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

    }

	protected function render() {
		$settings = $this->get_settings_for_display();

        $services_query = new \WP_Query(array(
            'post_type' => 'services',
            'posts_per_page' => $settings['count'],
            'order' => $settings['order'],
        ));
        ?>

            <!-- Start FL Services Area -->
            <div class="fl-services-area bg-F2E5DE pt-100">
                <div class="container">
                    <div class="fl-section-title text-start">
                        <h2><?php echo esc_html($settings['service_title']); ?></h2>
                        <p><?php echo esc_html($settings['service_text']); ?></p>
                    </div>
                    <div class="fl-services-slides owl-carousel owl-theme">
                        <?php  while($services_query->have_posts()): $services_query->the_post();  
                            $service_icon = get_field('service_icons');
                            ?>
                            <div class="fl-services-box">
                                <?php if($service_icon): ?>
                                    <div class="icon">
                                        <i class='bx <?php echo esc_attr($service_icon); ?>'></i>
                                    </div>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="link-btn"><?php echo esc_html($settings['btn_text']); ?></a>
                            </div>
                        <?php endwhile; ?> 
                    </div>
                </div>
            </div>
            <!-- End FL Services Area -->
            <?php wp_reset_query(); ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Service );