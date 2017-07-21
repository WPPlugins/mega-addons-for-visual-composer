<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_info_list_father extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'body_bg' 	=> '#fff',
		), $atts ) );
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		<ul class="mega-info-list" style="background: <?php echo $body_bg; ?>; list-style-type: none; height: 100%;">
			<?php echo $content; ?>
		</ul>

		<?php return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "info_list_father",
	"name" 			=> __( 'Info List', 'infolist' ),
	"as_parent" 	=> array('only' => 'info_list_son'),
	"content_element" => true,
	"js_view" 		=> 'VcColumnView',
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('Info list for information', ''),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/infolist.png',
	'params' => array(
		array(
				"type" 			=> 	"colorpicker",
				"heading" 		=> 	__( 'Social Position', 'infolist' ),
				"param_name" 	=> 	"body_bg",
				"description" 	=> __('Background color of info list', 'infolist'),
				"group" 		=> 'General',
			),
		)
) );
