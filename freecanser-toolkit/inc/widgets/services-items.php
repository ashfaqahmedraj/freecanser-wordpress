<?php
/**
 * Services_items Widget
 */

namespace Elementor;

class Freecanser_Service_Items extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Service_Items';
    }

	public function get_title() {
        return __( 'Freecanser Service Items', 'freecanser-toolkit' );
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

        $this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $services_query = new \WP_Query(array(
            'post_type' => 'services',
            'posts_per_page' => $settings['count'],
            'order' => $settings['order'],
            'paged' => $paged
        ));
        ?>

        <!-- Start FL Services Area -->
        <div class="fl-services-area ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <?php  while($services_query->have_posts()): $services_query->the_post();  
                        $service_icon = get_field('service_icons');
                        ?>
                         <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="fl-services-box">
                                <?php if($service_icon): ?>
                                    <div class="icon">
                                        <i class='bx <?php echo esc_attr($service_icon); ?>'></i>
                                    </div>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="link-btn">View More</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                
                    <div class="col-lg-12">
                        <div class="fl-pagination-area">
                            <div class="nav-links">
                                <?php
                                echo paginate_links(array(
                                    'total' => $services_query->max_num_pages,
                                    'current' => $paged,
                                    'prev_text' => '<i class="bx bx-left-arrow-alt"></i>',
                                    'next_text' => '<i class="bx bx-right-arrow-alt"></i>',
                                ));
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End FL Services Area -->
            <?php wp_reset_query(); ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Service_Items );