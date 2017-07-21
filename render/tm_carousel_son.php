<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_tm_carousel_son extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'image_id'			=>		'',
			'img_width'			=>		'',
			'img_height'		=>		'',
			'img_radius'		=>		'0px',
			'title'				=>		'',
			'titlesize'			=>		'22px',
			'titleclr'			=>		'',
			'fontweight'		=>		'normal',
			'line_height'		=>		'1',
		), $atts ) );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content);
		// wp_enqueue_style( 'social-icons-css', plugins_url( '../css/socialicons.css' , __FILE__ ));
		ob_start(); ?>
		  <div>
		  	<img src="<?php echo $image_url; ?>" style="width: <?php echo $img_width; ?>; height: <?php echo $img_height; ?>; border-radius: <?php echo $img_radius; ?>; margin-bottom: 15px;">
		  	<h2 style="text-align: center; font-size: <?php echo $titlesize; ?>; color: <?php echo $titleclr; ?>; font-weight: <?php echo $fontweight; ?>; line-height: <?php echo $line_height; ?>;">
		  		<?php echo $title; ?>
		  	</h2>
		  	<?php echo $content; ?>
		  </div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "tm_carousel_son",
	"name" 			=> __( 'Slider Settings', 'tm-carousel' ),
	"as_child" 		=> array('only' => 'tm_carousel_father'),
	"content_element" => true,
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('show as slider', ''),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/carousal-slider.png',
	'params' => array(
		array(
			"type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Select Image', 'tm-carousel' ),
			"param_name" 	=> 	"image_id",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Width', 'tm-carousel' ),
			"param_name" 	=> 	"img_width",
			"description"	=>	__( 'set in pixel or leave blank', 'tm-carousel' ),
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Height', 'tm-carousel' ),
			"param_name" 	=> 	"img_height",
			"description"	=>	__( 'set in pixel or leave blank', 'tm-carousel' ),
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Image Radius', 'tm-carousel' ),
			"param_name" 	=> 	"img_radius",
			"description"	=>	__( 'border radius. set in pixel or percentage or leave blank', 'tm-carousel' ),
			"value"			=>	"0px",
			"group" 		=> 'General',
		),


		// Title Section
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'tm-carousel' ),
			"param_name" 	=> 	"title",
			"group" 		=> 'Title',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title Font Size', 'tm-carousel' ),
			"param_name" 	=> 	"titlesize",
			"description"	=>	"set in pixel eg, 22px",
			"value"			=>	"22px",
			"group" 		=> 'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title Color', 'tm-carousel' ),
			"param_name" 	=> 	"titleclr",
			"group" 		=> 'Title',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Weight', 'tm-carousel' ),
			"param_name" 	=> 	"fontweight",
			"description"	=>	"lighter, normal, bold, 100, 300, 500..",
			"value"			=>	"normal",
			"group" 		=> 'Title',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Line Height', 'tm-carousel' ),
			"param_name" 	=> 	"line_height",
			"description"	=>	"default value is 1",
			"value"			=>	"1",
			"group" 		=> 'Title',
		),

		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Write Testimonial Text', 'tm-carousel' ),
			"param_name" 	=> 	"content",
			"value"			=>	"<h2 style='text-align: center;'>Testimonial</h2><p style='text-align: center;'>write any text and make custom design that you want to show as client feedback.</p>",
			"group" 		=> 'Description',
		),
	),
) );
