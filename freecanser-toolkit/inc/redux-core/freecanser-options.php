<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = 'freecanser_opt';

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', $opt_name );

    // Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {
        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();
            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    // All the possible arguments for Redux.
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'freecanser-toolkit' ),
        'page_title'           => esc_html__( 'Theme Options', 'freecanser-toolkit' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 90,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'opt_nameion',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p></p>', 'freecanser-toolkit' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'freecanser-toolkit' );
    }
    Redux::setArgs( $opt_name, $args );

// General Options
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'General Options', 'freecanser-toolkit' ),
    'id'                => 'general_options',
    'customizer'        => false,
    'icon'              => ' el el-home',
    'fields'     => array(
        array(
            'id'       => 'main_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Site Logo', 'freecanser-toolkit' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'freecanser-toolkit' ),
        ),
        array(
            'title'     => esc_html__( 'Main Logo dimensions', 'freecanser-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo. Recommended size 160X35', 'freecanser-toolkit' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.guto-nav .navbar .navbar-brand img'
        ),
        array(
            'id'       => 'mobile_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Logo For Mobile (optional)', 'freecanser-toolkit' ),
            'subtitle' => esc_html__( 'Upload here a image file for your mobile logo.', 'freecanser-toolkit' ),
        ),
        array(
            'title'     => esc_html__( 'Mobile Logo dimensions', 'freecanser-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo. Recommended size 130X35', 'freecanser-toolkit' ),
            'id'        => 'mobile_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.guto-responsive-nav .logo>img'
        ),
        array(
            'id'        => 'enable_sticky_header',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Sticky Header', 'freecanser-toolkit'),
            'desc'      => esc_html__('', 'freecanser-toolkit'),
            'default'   => '1'
        ),
    ),
) );

// Header Option
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Header', 'freecanser-toolkit'),
	'icon'  => 'el el-align-justify',
	'customizer' => false,
) );

// Header Styling
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Styling', 'freecanser-toolkit' ),
    'id'               => 'header_styling_sec',
    'customizer_width' => '400px',
    'icon'             => 'el el-magic',
    'subsection'       => true,
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Navbar box layout', 'freecanser-toolkit' ),
            'id'        => 'nav_layout',
            'type'      => 'select',
            'default'   => 'container',
            'options'   => array(
                'container' => esc_html__( 'Container', 'freecanser-toolkit' ),
                'container-fluid' => esc_html__( 'Full Width', 'freecanser-toolkit' ),
            )
        ),
        array(
            'id'            => 'opt-typography-menu-item',
            'type'          => 'typography',
            'title'         => esc_html__( 'Menu Item Typography', 'freecanser-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => true,
            'output' => array(
                '.guto-nav .navbar .navbar-nav .nav-item a',
            ),
        ),
        // Mobile Menu
        array(
            'id'            => 'opt-typography-mobile-menu-item',
            'type'          => 'typography',
            'title'         => esc_html__( 'Mobile Menu Item Typography', 'freecanser-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => true,
            'output' => array(
                '.mean-container .mean-nav ul li a, .mean-container .mean-nav ul li li a',
            ),
        ),

    ),
));

// Banner
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Banner', 'freecanser-toolkit' ),
    'id'                => 'banner_options',
    'customizer'        => false,
    'icon'              => 'el el-website',
    'fields'     => array(
        array(
            'id'        => 'page_title_tag',
            'type'      => 'select',
            'title'     => esc_html__( 'Banner Title Tag', 'freecanser-toolkit' ),
            'options' => array(
                'h1'         => esc_html__( 'h1', 'freecanser-toolkit' ),
                'h2'         => esc_html__( 'h2', 'freecanser-toolkit' ),
                'h3'         => esc_html__( 'h3', 'freecanser-toolkit' ),
                'h4'         => esc_html__( 'h4', 'freecanser-toolkit' ),
                'h5'         => esc_html__( 'h5', 'freecanser-toolkit' ),
                'h6'         => esc_html__( 'h6', 'freecanser-toolkit' ),
            ),
            'default' => 'h2',
        ),
        array(
            'id'        => 'titlebar_title_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Title Typography', 'freecanser-toolkit' ),
            'output'    => '.page-title-content h2'
        ),

        array(
            'id'      => 'is_breadcrumb',
            'type'    => 'switch',
            'title'   => esc_html__( 'Breadcrumb', 'freecanser-toolkit' ),
            'on'      => esc_html__( 'Enable', 'freecanser-toolkit' ),
            'off'     => esc_html__( 'Disable', 'freecanser-toolkit' ),
            'default' => true,
        ),

        array(
            'id'        => 'titlebar_breadcrumb_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Breadcrumb Typography', 'freecanser-toolkit' ),
            'output'    => '.page-title-content ul li, .learn-press-breadcrumb, .woocommerce-breadcrumb',
            'required'  => array('is_breadcrumb','equals','1'),
        ),

        array(
            'title'     => esc_html__( 'Banner Padding', 'freecanser-toolkit' ),
            'subtitle'  => esc_html__( 'Padding around the Banner.', 'freecanser-toolkit' ),
            'id'        => 'banner_padding',
            'type'      => 'spacing',
            'output'    => array( '.page-title-area' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),
            'units_extended' => 'true',
        ),

        array(
            'id'        => 'banner_shape_img1',
            'type'      => 'media',
            'title'     => esc_html__('Shape Image 1', 'freecanser-toolkit'),
            'url'      => true,
        ),
        array(
            'id'        => 'banner_shape_img2',
            'type'      => 'media',
            'title'     => esc_html__('Shape Image 2', 'freecanser-toolkit'),
            'url'      => true,
        ),
        
    ),
) );

// Social Profiles
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Social Profiles', 'freecanser-toolkit'),
	'desc'  => 'Social profiles are used in different places inside the theme.',
	'text'  => 'text',
	'customizer' => false,
	'fields' => array(
        array(
            'id' => 'freecanser_social_link',
            'type' => 'select',
            'options' => array(
                '_blank'    => 'Load in a new window. ( _blank )',
                '_self'     => 'Load in the same frame as it was clicked. ( _self )',
                '_parent'   => 'Load in the parent frameset. ( _parent )',
                '_top'      => 'Load in the full body of the window ( _top )',
            ),
            'title'     => esc_html__( 'Social Link Target', 'freecanser-toolkit' ),
            'default'   => '_blank',
        ),

        array(
			'id'    => 'twitter_url',
            'type'  => 'text',
			'title' => esc_html__('Twitter URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'facebook_url',
			'type'  => 'text',
			'title' =>esc_html__('Facebook URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'instagram_url',
			'type'  => 'text',
			'title' => esc_html__('Instagram URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'linkedin_url',
			'type'  => 'text',
			'title' => esc_html__('Linkedin URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'pinterest_url',
			'type'  => 'text',
			'title' =>esc_html__('Pinterest URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'dribbble_url',
			'type'  => 'text',
			'title' =>esc_html__('Dribbble URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'tumblr_url',
			'type'  => 'text',
			'title' =>esc_html__('Tumblr URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'youtube_url',
			'type'  => 'text',
			'title' =>  esc_html__('Youtube URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'flickr_url',
			'type'  => 'text',
			'title' =>  esc_html__('Flickr URL', 'freecanser-toolkit')
		),
		array(
			'id'    => 'behance_url',
			'type'  => 'text',
			'title' =>  esc_html__('Behance URL', 'freecanser-toolkit'),
		),
		array(
			'id'    => 'github_url',
			'type'  => 'text',
			'title' =>  esc_html__('Github URL', 'freecanser-toolkit'),
		),
		array(
			'id'    => 'skype_url',
			'type'  => 'text',
			'title' =>  esc_html__('Skype URL', 'freecanser-toolkit'),
		),
		array(
			'id'    => 'rss_url',
			'type'  => 'text',
			'title' =>  esc_html__('RSS URL', 'freecanser-toolkit')
		),
	)
) );

// Footer Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Footer', 'freecanser-toolkit' ),
    'id'                => 'footer',
    'customizer'        => false,
    'icon'              => 'el el-edit',
    'fields' => array(
        
		array(
			'id'    => 'footer_heading',
			'type'  => 'text',
			'title' =>  esc_html__('Footer Heading', 'freecanser-toolkit'),
            'default'   => 'Lets Make Waves Together',
		),
		array(
			'id'    => 'footer_text',
			'type'  => 'textarea',
			'title' =>  esc_html__('Footer Text', 'freecanser-toolkit'),
            'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.',
		),
		array(
			'id'    => 'footer_button_text',
			'type'  => 'text',
			'title' =>  esc_html__('Footer Button Text', 'freecanser-toolkit'),
            'default'   => 'Lets Work Together',
		),
        array(
			'id'        => 'footer_button_link',
            'type'      => 'text',
			'title'     => esc_html__('Footer Button Link', 'the6m-toolkit'),
            'default'   => '#',
        ),
        array(
            'id'       => 'footer_shape_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Footer Image', 'freecanser-toolkit' ),        
        ),
        array(
            'id'        => 'copyright_text',
            'type'      => 'editor',
            'title'     => esc_html__('Footer copyright text (optional)', 'freecanser-toolkit'),
            'subtitle'  => esc_html__('HTML and Shortcodes are allowed', 'freecanser-toolkit'),
            'desc'      => '',
            'args' => array(
                'teeny'         => true,
                'media_buttons' => false
            ),
        ),
    )
));

// contact info Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Contact', 'freecanser-toolkit' ),
    'id'                => 'Contact Infos',
    'customizer'        => false,
    'icon'              => 'el el-edit',
    'fields' => array(
        
		array(
			'id'    => 'mail_text',
			'type'  => 'text',
			'title' =>  esc_html__('Email Address', 'freecanser-toolkit'),
            'default'   => 'hello@guto.com',
		),

        array(
			'id'    => 'address_text',
			'type'  => 'text',
			'title' =>  esc_html__('Address', 'freecanser-toolkit'),
            'default'   => '2750 Quadra Street Victoria Road, New York, USA',
		),

        array(
			'id'    => 'number_text',
			'type'  => 'text',
			'title' =>  esc_html__('Phone Number', 'freecanser-toolkit'),
            'default'   => '+1 (123) 456 7890',
		),

        array(
            'id'       => 'contact_shape_1',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Mail Image', 'freecanser-toolkit' ),        
        ),
        array(
            'id'       => 'contact_shape_2',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Location Image', 'freecanser-toolkit' ),        
        ),
        array(
            'id'       => 'contact_shape_3',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Phone Image', 'freecanser-toolkit' ),        
        ),
        
    )
));

// Styling
Redux::setSection( $opt_name, array(
    'title'        => esc_html__( 'Styling Options', 'freecanser-toolkit' ),
    'id'           => 'styling_options',
    'customizer'   => false,
    'icon'         => ' el el-magic',
    'fields'     => array(
        array(
            'id'            => 'primary_color',
            'type'          => 'color',
            'title'         => esc_html__('Primary Color', 'freecanser-toolkit'),
            'default'       => '#08A9E6',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'secondary_color',
            'type'          => 'color',
            'title'         => esc_html__('Secondary Color', 'freecanser-toolkit'),
            'default'       => '#EC272E',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'header_background_color',
            'type'          => 'color',
            'title'         => esc_html__('Header Background Color.', 'freecanser-toolkit'),
            'default'       => '#fff',
            'validate'      => 'color',
            'transparent'   => false
        ),
        array(
            'title'     => esc_html__( 'Menu Item Color', 'freecanser-toolkit' ),
            'id'        => 'menu_item_color',
            'type'      => 'color',
            'output'    => array( '.ellen-nav .navbar .navbar-nav .nav-item .nav-link, .ellen-nav .navbar .navbar-nav .nav-item .dropdown-menu .nav-item .nav-link' ),
            'important'     => true,
        ),
        array(
            'id'            => 'footer_bg',
            'type'          => 'color',
            'title'         => esc_html__('Footer Background Color.', 'freecanser-toolkit'),
            'default'       => '#E6F8FF',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'title'     => esc_html__( 'Footer Color', 'freecanser-toolkit' ),
            'id'        => 'footer_item_color',
            'type'      => 'color',
            'output'    => array( '.footer-area .single-footer-widget p, .footer-area .single-footer-widget ul li, .single-footer-widget .footer-contact-info li a, .single-footer-widget ul li a' ),
        ),
        array(
            'title'     => esc_html__( 'Footer Title Color', 'freecanser-toolkit' ),
            'id'        => 'footer_title_color',
            'type'      => 'color',
            'output'    => array( '.footer-area .single-footer-widget h3' ),
        ),
    ),
) );

// Blog Area
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Blog Settings', 'freecanser-toolkit' ),
    'id'            => 'ellen_blog',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your blog settings.',
    'fields' => array(
        array(
            'id' => 'ellen_blog_style',
            'type' => 'select',
            'options' => array(
                '1'         => 'Style One',
                '2'         => 'Style Two',
            ),
            'title'     => esc_html__( 'Blog Style', 'freecanser-toolkit' ),
            'default'   => '1',
        ),
        array(
			'id'    => 'ellen_search_page',
            'type'  => 'switch',
            'title' => esc_html__('Enable Pages on Search Result Page', 'freecanser-toolkit'),
        ),
        array(
			'id'    => 'hide_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide Blog Breadcrumb', 'freecanser-toolkit'),
            'default'   => '0',
        ),
        array(
            'id'       => 'blog_sub_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Sub Title', 'freecanser-toolkit' ),
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Title', 'freecanser-toolkit' ),
        ),
        array(
            'id' => 'ellen_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'ellen_with_sidebar'              => 'With Sidebar',
                'ellen_without_sidebar'           => 'Without Sidebar',
            ),
            'title'     => esc_html__( 'Blog Sidebar', 'freecanser-toolkit' ),
            'default'   => 'ellen_with_sidebar',
        ),

        array(
            'id' => 'ellen_single_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'ellen_with_sidebar'              => 'With Sidebar',
                'ellen_without_sidebar'           => 'Without Sidebar ',
            ),
            'title'     => esc_html__( 'Single Blog Sidebar', 'freecanser-toolkit' ),
            'default'   => 'ellen_with_sidebar',
        ),
        array(
			'id'    => 'hide_post_meta',
            'type'  => 'switch',
			'title' => esc_html__('Hide Post Meta', 'freecanser-toolkit'),
            'default'   => '0',
        ),
    )
));

// Typography
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography', 'freecanser-toolkit' ),
    'desc' => esc_html__( 'Manage your fonts and typefaces.', 'freecanser-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'opt-typography-body',
            'type'          => 'typography',
            'title'         => esc_html__( 'Body primary font', 'freecanser-toolkit' ),
            'google'        => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                "body, .tutor-font-family, .tutor-backend #wpbody-content, [class*='tutor-screen-'], .tutor-course-details-page, .tutor-course-single-content-wraper, .tutor-wrap",
            ),
        ),
    ),
) );

// Advanced Settings
Redux::setSection( $opt_name, array(
	'title'         => esc_html__('Advanced Settings', 'freecanser-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'css_code',
			'type' => 'ace_editor',
			'title' => esc_html__('Custom CSS Code', 'freecanser-toolkit'),
			'desc' => esc_html__('e.g. .btn-primary{ background: #000; } Don\'t use &lt;style&gt; tags', 'freecanser-toolkit'),
			'subtitle' => esc_html__('Paste your CSS code here.', 'freecanser-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'js_code',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom JS Code', 'freecanser-toolkit'),
			'desc'      => esc_html__('e.g. alert("Hello World!"); Don\'t use&lt;script&gt;tags.', 'freecanser-toolkit'),
			'subtitle'  => esc_html__('Paste your JS code here.', 'freecanser-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

// 404 Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( '404 Settings', 'freecanser-toolkit' ),
    'id'                => 'ellen_404',
    'customizer'        => false,
    'icon'              => 'el el-question-sign',
    'fields'            => array(
        array(
            'id'       => 'not_found_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( '404 Page Image', 'freecanser-toolkit' ),
        ),
        array(
            'id'    => 'title_not_found',
            'type'  => 'text',
            'title' => esc_html__('404 Title', 'freecanser-toolkit'),
            'defult' => esc_html__('Error 404 : Page Not Found', 'freecanser-toolkit'),
        ),
        array(
            'id'       => 'content_not_found',
            'type'     => 'textarea',
            'title'    => esc_html__( '404 Content', 'freecanser-toolkit' ),
        ),
        array(
            'id'       => 'button_not_found',
            'type'     => 'text',
            'title'    => esc_html__( 'Back to Home Button Text', 'freecanser-toolkit' ),
        ),
    )
));

    /**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}

// Custom function for the callback validation referenced above
if ( ! function_exists( 'redux_validate_callback_function' ) ) {
    function redux_validate_callback_function( $field, $value, $existing_value ) {
        $error   = false;
        $warning = false;

        //do your validation
        if ( $value == 1 ) {
            $error = true;
            $value = $existing_value;
        } elseif ( $value == 2 ) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ( $error == true ) {
            $field['msg']    = 'your custom error message';
            $return['error'] = $field;
        }

        if ( $warning == true ) {
            $field['msg']      = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

// Custom function for the callback referenced above
if ( ! function_exists( 'redux_my_custom_field' ) ) {
    function redux_my_custom_field( $field, $value ) {
        print_r( $field );
        echo '<br/>';
        print_r( $value );
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if ( ! function_exists( 'dynamic_section' ) ) {
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => esc_html__( 'Section via hook', 'freecanser-toolkit' ),
            'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'freecanser-toolkit' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }
}

// Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
if ( ! function_exists( 'change_arguments' ) ) {
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }
}

// Filter hook for filtering the default value of any given field. Very useful in development mode.
if ( ! function_exists( 'change_defaults' ) ) {
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}

// Removes the demo link and the notice of integrated demo from the redux-framework plugin
if ( ! function_exists( 'remove_demo' ) ) {
    function remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}