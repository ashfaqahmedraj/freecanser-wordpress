<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freecanser
 */

global $freecanser_opt;

// Site Logo
$main_logo		= isset($freecanser_opt['main_logo']['url']) ? $freecanser_opt['main_logo']['url'] : '';
$mobile_logo	= isset($freecanser_opt['mobile_logo']['url']) ? $freecanser_opt['mobile_logo']['url'] : '';
$nav_layout = isset($freecanser_opt['nav_layout']) ? $freecanser_opt['nav_layout'] : '';
?>
<!doctype html>
<html lang="zxx">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php bloginfo('name'); ?> <?php bloginfo('description'); ?></title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Start FL Navbar Area -->
<div class="fl-navbar-area navbar-area">
	<div class="guto-responsive-nav">
		<div class="container">
			<div class="guto-responsive-menu">
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) );?>">
					<?php if( $mobile_logo != '' ): ?>
						<img src="<?php echo esc_url($mobile_logo); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php else: ?>
						<h2><?php bloginfo( 'name' ); ?></h2>
					<?php endif; ?>
				</a>
			</div>
		</div>
	</div>
	<div class="guto-nav">
		<div class="<?php echo esc_attr($nav_layout); ?>">
			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) );?>">
					<?php if( $main_logo != '' ): ?>
						<img src="<?php echo esc_url($main_logo); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php else: ?>
						<h2><?php bloginfo( 'name' ); ?></h2>
					<?php endif; ?>
				</a>
				<div class="collapse navbar-collapse mean-menu">
					<?php
						wp_nav_menu( array(
							'theme_location'  => 'header-menu',
							'depth'           =>  2, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarResponsive',
							'menu_class'      => 'navbar-nav ms-auto py-4 py-lg-0',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						) );
					?>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- End FL Navbar Area -->
