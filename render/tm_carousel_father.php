<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_tm_carousel_father extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'arrow'			=>		'false',
			'dot'			=>		'true',
			'autoplay'		=>		'true',
			'speed'			=>		'1500',
			'width'			=>		'100%',
			'slide_visible'	=>		'1',
			'slide_scroll'	=>		'1',
		), $atts ) );
		$content = wpb_js_remove_wpautop($content);
		wp_enqueue_style( 'slick-carousel-css', plugins_url( '../css/slick-carousal.css' , __FILE__ ));
		wp_enqueue_script( 'slick-js', plugins_url( '../js/slick.js' , __FILE__ ), array('jquery'));
		wp_enqueue_script( 'custom-js', plugins_url( '../js/custom-tm.js' , __FILE__ ), array('jquery'));
		ob_start(); ?>
		<section class="tm-slider slider" style="width: <?php echo $width; ?>;" data-slick='{"arrows": <?php echo $arrow; ?>, "autoplaySpeed": <?php echo $speed; ?>, "dots": <?php echo $dot; ?>, "autoplay": <?php echo $autoplay; ?>, "slidesToShow": <?php echo $slide_visible; ?>, "slidesToScroll": <?php echo $slide_scroll; ?>}'>
		    <?php echo $content; ?>
		</section>

		<?php return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "tm_carousel_father",
	"name" 			=> __( 'Carousal Slider', 'tm-carousel' ),
	"as_parent" 	=> array('only' => 'tm_carousel_son'),
	"content_element" => true,
	"js_view" 		=> 'VcColumnView',
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('show as slider', ''),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/carousal-slider.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Arrows', 'tm-carousel' ),
			"param_name" 	=> 	"arrow",
			"description"	=>	__('Show/Hide on left & right', 'tm-carousel'),
			"group" 		=> 'Settings',
				"value" 		=> 	array(
					"Hide" 			=> 		"false",
					"Show" 			=> 		"true",
				)
			),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Dots', 'tm-carousel' ),
			"param_name" 	=> 	"dot",
			"description"	=>	__('Show/Hide show at bottom', 'tm-carousel'),
			"group" 		=> 'Settings',
				"value" 		=> 	array(
					"Show" 			=> 		"true",
					"Hide" 			=> 		"false",
				)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Autoplay', 'tm-carousel' ),
			"param_name" 	=> 	"autoplay",
			"description"	=>	__('move auto or slide on click', 'tm-carousel'),
			"group" 		=> 'Settings',
			"value" 		=> 	array(
				"True" 		=> 		"true",
				"False" 	=> 		"false",
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Width', 'tm-carousel' ),
			"param_name" 	=> 	"width",
			"description"	=>	__('container width in percentage eg, 100%', 'tm-carousel'),
			"value"			=>	"100%",
			"group" 		=> 'Settings',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Slider Speed', 'tm-carousel' ),
			"param_name" 	=> 	"speed",
			"description"	=>	__('write in ms eg, 1500 [1s = 1000]', 'tm-carousel'),
			"value"			=>	"1500",
			"group" 		=> 'Settings',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Slide To Show', 'tm-carousel' ),
			"param_name" 	=> 	"slide_visible",
			"description"	=>	__('set visible number of slides. default is 1', 'tm-carousel'),
			"value"			=>	"1",
			"group" 		=> 'Settings',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Slide To Scroll', 'tm-carousel' ),
			"param_name" 	=> 	"slide_scroll",
			"description"	=>	__('allow user to multiple slide on click or drag. default is 1', 'tm-carousel'),
			"value"			=>	"1",
			"group" 		=> 'Settings',
		),

	)
) );
