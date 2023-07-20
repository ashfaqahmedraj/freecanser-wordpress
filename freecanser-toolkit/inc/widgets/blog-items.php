<?php
/**
 * Blogs_items Widget
 */

namespace Elementor;

class Freecanser_Blogs_items extends Widget_Base {

	public function get_name() {
        return 'Freecanser_Blogs_items';
    }

	public function get_title() {
        return __( 'Freecanser Blogs_items', 'freecanser-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'Freecanser-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Freecanser_Blogs_items_Area',
			[
				'label' => __( 'Blogs_items Controls', 'freecanser-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
            
            $this->add_control(
                'btn_text',
                [
                    'label'       => __( 'Button Text', 'freecanser-toolkit' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => __('Read More'),
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

        $this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $blogs_query = new \WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $settings['count'],
            'order' => $settings['order'],
            'paged' => $paged
        ));
        ?>
            <!-- Start FL Blog Area -->
            <div class="fl-blog-area pt-100 pb-70">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php  while($blogs_query->have_posts()): $blogs_query->the_post(); 
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="single-fl-blog-post">
                                    <div class="image">
                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url());?>" alt="image">
                                        </a>
                                        <span class="date"><?php echo get_the_date(); ?></span>
                                    </div>
                                    <div class="content">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="link-btn"><?php echo esc_html($settings['btn_text']); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?> 

                        <div class="col-lg-12">
                            <div class="fl-pagination-area">
                                <div class="nav-links">
                                    <?php
                                    echo paginate_links(array(
                                        'total' => $blogs_query->max_num_pages,
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
            <!-- End FL Blogs_items Area -->
            <?php wp_reset_query(); ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new Freecanser_Blogs_items );