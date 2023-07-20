<?php
/**
 * Protfolios_items_item Widget
 */

namespace Elementor;

class Freecanser_Protfolios_item extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Protfolios_item';
    }

	public function get_title() {
        return __( 'Freecanser Protfolios_item', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'Freecanser-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Freecanser_Protfolios_item_Area',
			[
				'label' => __( 'Protfolios_item Controls', 'freecanser-toolkit' ),
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

        $protfolio_query = new \WP_Query(array(
            'post_type' => 'protfolios',
            'posts_per_page' => $settings['count'],
            'order' => $settings['order'],
        ));
        ?>
            <!-- Start FL Portfolio Area -->
            <div class="fl-portfolio-area pt-100 pb-70">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php  while($protfolio_query->have_posts()): $protfolio_query->the_post();  
                        ?>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="single-fl-portfolio-box bg-f9f9f9">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url());?>" alt="portfolio">
                                    <h3><?php the_title(); ?></h3>
                                    <a href="<?php the_permalink(); ?>" class="link-btn"></a>
                                </div>
                            </div>
                        <?php endwhile; ?> 
                    </div>
                </div>
            </div>
        <!-- End FL Portfolio Area -->                            

            <?php wp_reset_query(); ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Protfolios_item );