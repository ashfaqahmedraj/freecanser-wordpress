<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package freecanser
 */

get_header();
?>
	<!-- Start FL Page Title Area -->
	<div class="fl-page-title-area">
		<div class="container">
			<div class="page-title-content">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="divider"></div>
	</div>
	
	<!-- End FL Page Title Area -->
	<?php the_content(); ?>


<?php
get_footer();
