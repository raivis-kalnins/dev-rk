<?php
/*
*  Create Shortcode to Display Components Post Types [com id=14]
*/
// function tfa_shortcode_com( $atts ) {
// 	$atts = shortcode_atts( array( 'id' => null, ), $atts,'com' );
// 	$content_post = get_post( $atts['id'] );
// 	$blocks = $content_post->post_content ?? '';
// 	return '<div class="short-component">'. do_blocks( $blocks ).'</div>';
// }
// add_shortcode( 'com', 'tfa_shortcode_com' ); //=> only if need specific large reusable sections

/*
*  Create Shortcode to Display scroll down btn [scroll-down]
*/
// function tfa_shortcode_scrolldown( $gm ) {
// 	$gm = shortcode_atts( array(), $gm,'scroll-down' );
// 	return '<div class="scroll-down"><svg xmlns="http://www.w3.org/2000/svg" width="20.05" height="47.012" viewBox="0 0 20.05 47.012"><g id="Group_22636" data-name="Group 22636" transform="translate(-949.985 -1006.5)"><line id="Line_5" data-name="Line 5" y2="46" transform="translate(960 1006.5)" fill="none" stroke="#fff" stroke-width="1.5"/><path id="Path_30" data-name="Path 30" d="M969.52,1043.49l-9.52,8.99-9.5-8.99" fill="none" stroke="#fff" stroke-width="1.5"/></g></svg></div>';
// }
// add_shortcode( 'scroll-down', 'tfa_shortcode_scrolldown' );

/*
*  Create Shortcode to Display Swiper navigation [swipernav]
*/
function tfa_shortcode_swiper_nav( $sw ) {
	$sw = shortcode_atts( array(), $sw,'swipernav' );
	return do_shortcode('<div class="swiper-life"><div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div></div>');
}
add_shortcode( 'swipernav', 'tfa_shortcode_swiper_nav' );

// Add short code Form [locations]
include( get_template_directory() . '/templates/shortcodes/acf_form.php' );

// Add short code Testimonials [locations]
include( get_template_directory() . '/templates/shortcodes/locations.php' );