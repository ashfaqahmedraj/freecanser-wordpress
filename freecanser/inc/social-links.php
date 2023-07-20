<?php
/**
 * Social Link
 *
 * @package WordPress
 * @subpackage freecanser
 */
if ( ! function_exists( 'freecanser_social_link' ) ) :
    function freecanser_social_link() {
        $social_links = [
            'twitter'   => 'Twitter',
            'facebook'  => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin'  => 'Linkedin',
            'pinterest' => 'Pinterest',
            'dribbble'  => 'Dribbble',
            'tumblr'    => 'Tumblr',
            'youtube'   => 'Youtube',
            'flickr'    => 'Flickr',
            'behance'   => 'Behance',
            'github'    => 'Github',
            'skype'     => 'Skype',
        ];
        global $freecanser_opt;
        $target = isset( $freecanser_opt['freecanser_social_target'] ) ? $freecanser_opt['freecanser_social_target'] : '_blank';
        foreach ( $social_links as $key => $value ) {
            if ( isset( $freecanser_opt[ $key . '_url' ] ) && $freecanser_opt[ $key . '_url' ] ) {
                printf(
                    '<li><a class="%s" target="%s" href="%s"></a></li>',
                    esc_attr( $key ),
                    esc_attr( $target ),
                    esc_url( $freecanser_opt[ $key . '_url' ] ),
                    esc_attr( $value )
                );
            }
        }
    }
endif;