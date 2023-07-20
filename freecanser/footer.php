<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freecanser
 */

global $freecanser_opt;
$footer_heading	= isset($freecanser_opt['footer_heading']) ? $freecanser_opt['footer_heading'] : '';
$footer_text	= isset($freecanser_opt['footer_text']) ? $freecanser_opt['footer_text'] : '';
$footer_button_text	= isset($freecanser_opt['footer_button_text']) ? $freecanser_opt['footer_button_text'] : '';
$footer_button_link	= isset($freecanser_opt['footer_button_link']) ? $freecanser_opt['footer_button_link'] : '';
$footer_shape_image	= isset($freecanser_opt['footer_shape_image']['url']) ? $freecanser_opt['footer_shape_image']['url']: '';

// comtact Info
$mail_text	= isset($freecanser_opt['mail_text']) ? $freecanser_opt['mail_text'] : '';
$address_text	= isset($freecanser_opt['address_text']) ? $freecanser_opt['address_text'] : '';
$number_text	= isset($freecanser_opt['number_text']) ? $freecanser_opt['number_text'] : '';

$contact_shape_1	= isset($freecanser_opt['contact_shape_1']['url']) ? $freecanser_opt['contact_shape_1']['url']: '';
$contact_shape_2	= isset($freecanser_opt['contact_shape_2']['url']) ? $freecanser_opt['contact_shape_2']['url']: '';
$contact_shape_3	= isset($freecanser_opt['contact_shape_3']['url']) ? $freecanser_opt['contact_shape_3']['url']: '';

?>

<!-- Start FL Contact Info Area -->
<div class="fl-contact-info-area">
    <div class="container">
        <div class="row justify-content-center">
            <?php if($mail_text): ?>
                <div class="col-lg-4 col-sm-12 col-md-6">
                    <div class="fl-contact-info-box">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="icon">
                                    <img src="<?php echo esc_url( $contact_shape_1 ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </div>
                                <h3><a href="<?php echo esc_html($mail_text); ?>"><?php echo esc_html($mail_text); ?></a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>

            <?php if($address_text): ?>
                <div class="col-lg-4 col-sm-12 col-md-6">
                    <div class="fl-contact-info-box">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="icon">
                                    <img src="<?php echo esc_url( $contact_shape_2 ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </div>
                                <h3><?php echo esc_html($address_text); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>

            <?php if($number_text): ?>
                <div class="col-lg-4 col-sm-12 col-md-6">
                    <div class="fl-contact-info-box">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="icon">
                                    <img src="<?php echo esc_url( $contact_shape_3 ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </div>
                                <h3><a href="<?php echo esc_html($number_text); ?>"><?php echo esc_html($number_text); ?></a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>

        </div>
    </div>
</div>
<!-- End FL Contact Info Area -->


<!-- Start FL Hire Me Area -->
<div class="fl-hire-me-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="fl-hire-me-content">
                    <div class="content">
                        <h2><?php echo esc_html($footer_heading); ?></h2>
                        <p><?php echo esc_html($footer_text); ?></p>

                        <?php if($footer_button_link): ?>
                            <a href="<?php echo esc_url($footer_button_link); ?>" class="fl-default-btn"><i class='bx bxs-user-circle'></i> <?php echo esc_html($footer_button_text); ?></a>
                        <?php endif;?>
                    </div>
                    <div class="social-list">
                        <ul>
                            <li><a href="#" target="_blank">Linkedin</a></li>
                            <li><a href="#" target="_blank">Instagram</a></li>
                            <li><a href="#" target="_blank">Dribbble</a></li>
                            <li><a href="#" target="_blank">Behance</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="fl-hire-me-image">
                    <?php if( $footer_shape_image != '' ): ?>
                        <img src="<?php echo esc_url( $footer_shape_image ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    <?php else: ?>
                        <h2><?php bloginfo( 'name' ); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start FL Hire Me Area -->

<!-- Start FL Footer Area -->
<footer class="fl-footer-area">
    <div class="container">
        <p><?php echo $freecanser_opt['copyright_text']; ?></p>
    </div>
</footer>
<!-- End FL Footer Area -->
	

<?php wp_footer(); ?>

</body>
</html>
