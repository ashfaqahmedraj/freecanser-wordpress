<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

<?php the_content(); ?>


<?php
get_footer();
