<?php
/**
 * Freecanser Elementor Support
 */

// Main Elementor Freecanser Extension Class
final class Elementor_Freecanser_Extension {

    const VERSION = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '7.0';

    // Instance
    private static $_instance = null;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    // Constructor
    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    // init
    public function init() {
        load_plugin_textdomain( 'freecanser-toolkit' );

        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Add Plugin actions
         add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

         add_action('elementor/elements/categories_registered',[ $this, 'register_new_category'] );

    }

    public function register_new_category($manager){
        $manager->add_category('freecanser-elements',[
            'title'=>esc_html__('Freecanser','freecanser-toolkit'),
            'icon'=> 'fa fa-image'
        ]);
    }

    //Admin notice
    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'freecanser-toolkit' ),
            '<strong>' . esc_html__( 'Freecanser Toolkit', 'freecanser-toolkit' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'freecanser-toolkit' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }
    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'freecanser-toolkit' ),
            '<strong>' . esc_html__( 'Freecanser Toolkit', 'freecanser-toolkit' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'freecanser-toolkit' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }
    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'freecanser-toolkit' ),
            '<strong>' . esc_html__( 'Freecanser Toolkit', 'freecanser-toolkit' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'freecanser-toolkit' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    // Toolkit Widgets
    public function init_widgets() {
        // Include Widget files
        require_once( __DIR__ . '/widgets/banner.php' );
        require_once( __DIR__ . '/widgets/about.php' );
        require_once( __DIR__ . '/widgets/testimonial.php' );
        require_once( __DIR__ . '/widgets/award.php' );
        require_once( __DIR__ . '/widgets/about-award.php' );
        require_once( __DIR__ . '/widgets/clients.php' );
        require_once( __DIR__ . '/widgets/services.php' );
        require_once( __DIR__ . '/widgets/protfolio.php' );
        require_once( __DIR__ . '/widgets/blog.php' );
        require_once( __DIR__ . '/widgets/protfolio-items.php' );
        require_once( __DIR__ . '/widgets/services-items.php' );
        require_once( __DIR__ . '/widgets/services-optn.php' );
        require_once( __DIR__ . '/widgets/services-optn2.php' );
        require_once( __DIR__ . '/widgets/blog-items.php' );
        require_once( __DIR__ . '/widgets/single-protfolio.php' );
    }
  
}
Elementor_Freecanser_Extension::instance();