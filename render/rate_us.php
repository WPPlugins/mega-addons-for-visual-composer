<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_rate_us_vc extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style_visibility'		=>		'top_to_bottom',
		), $atts ) );
		$content = wpb_js_remove_wpautop($content);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		ob_start(); ?>
			
		
		<?php return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Support Us', 'support' ),
	"base" 			=> "rate_us_vc",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('We need your feedback', 'support'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/support.png',
	'params' => array(
        array(
            "type" 			=> 	"textfields",
			"heading" 		=> 	__( 'Thanks for using our plugin, we really need your support and suggestion to make it more attractive. Just click on link and give us feedback.', 'support' ),
			"param_name" 	=> 	"pic_width",
			"description" 	=> 	__( '<a href="https://wordpress.org/support/plugin/mega-addons-for-visual-composer/reviews/#new-post">Give Feedback</a>', 'support' ),
			"group" 		=> 	'General',
        ),
	),
) );

