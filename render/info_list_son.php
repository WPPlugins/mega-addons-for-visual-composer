<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_info_list_son extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style'			=>		'image',
			'image_id'		=>		'',
			'icon'			=>		'',
			'size'			=>		'30px',
			'width'			=>		'80px',
			'height'		=>		'80px',
			'iconclr'		=>		'#000',
			'iconbg'		=>		'#fff',
			'borderwidth'	=>		'5px',
			'borderstyle'	=>		'solid',
			'radius'		=>		'50%',
			'borderclr'		=>		'',
			'listwidth'		=>		'2px',
			'liststyle'		=>		'solid',
			'listclr'		=>		'#000',
		), $atts ) );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
	    <li style="border-left: <?php echo $listwidth; ?> <?php echo $liststyle; ?> <?php echo $listclr; ?>;margin-left: <?php echo $width/2; ?>px; padding-top: 20px; float: none;">
	      <div class="info-list-img" style="margin-left: -<?php echo $width/2; ?>px; height: <?php echo $height; ?>; padding-right: 20px; float: left;">
	        <?php if ($style == 'image') { ?>
	        	<img src="<?php echo $image_url; ?>" style="width: <?php echo $width; ?>; height: <?php echo $height; ?>;">
	        <?php } ?>
	        <?php if ($style == 'icon') { ?>
		        	<i class="<?php echo $icon; ?>" aria-hidden="true" style="background: <?php echo $iconbg; ?>; width: <?php echo $width; ?>; height: <?php echo $height; ?>; line-height: <?php echo $height-$borderwidth*2; ?>px; font-size: <?php echo $size; ?>; color: <?php echo $iconclr; ?>;text-align: center; border: <?php echo $borderwidth; ?> <?php echo $borderstyle; ?> <?php echo $borderclr; ?>; border-radius: <?php echo $radius; ?>;"></i>
	        <?php } ?>
	      </div>
	      <div class="info-list-content" style="padding-left: 20px;">
	        <?php echo $content; ?>
	      </div>
	      <div class="clearfix" style="clear: both;"></div>
	    </li>

		<?php return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "info_list_son",
	"name" 			=> __( 'Info List Settings', 'infolist' ),
	"as_child" 		=> array('only' => 'info_list_father'),
	"content_element" => true,
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('Info list for information', ''),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/infolist.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Image/Icon', 'infolist' ),
			"param_name" 	=> 	"style",
			"description" 	=> 	__( 'select', 'infolist' ),
			"group" 		=> 'Icon/Image',
			"value"			=> array(
				"Image"			=>	"image",
				"Icon"			=>	"icon",
			)
		),
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'infolist' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'infolist' ),
			"dependency" => array('element' => "style", 'value' => 'image'),
			"group" 		=> 	'Icon/Image',
        ),
        array(
            "type" 			=> 	"iconpicker",
			"heading" 		=> 	__( 'Icon', 'infolist' ),
			"param_name" 	=> 	"icon",
			"description" 	=> 	__( 'Select icon', 'infolist' ),
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"group" 		=> 	'Icon/Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Size', 'infolist' ),
			"param_name" 	=> 	"size",
			"description" 	=> 	__( 'icon font size in pixel eg, 30px', 'infolist' ),
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"value"			=>	"30px",
			"group" 		=> 	'Icon/Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Width', 'infolist' ),
			"param_name" 	=> 	"width",
			"description" 	=> 	__( 'set width in pixel eg, 80px', 'infolist' ),
			"value"			=>	"80px",
			"group" 		=> 	'Icon/Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Height', 'infolist' ),
			"param_name" 	=> 	"height",
			"description" 	=> 	__( 'set height in pixel eg, 80px', 'infolist' ),
			"value"			=>	"80px",
			"group" 		=> 	'Icon/Image',
        ),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color', 'infolist' ),
			"param_name" 	=> 	"iconclr",
			"description" 	=> __('For icon', 'infolist'),
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"group" 		=> 'Icon/Image',
		),
        array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Backgroud color', 'infolist' ),
			"param_name" 	=> 	"iconbg",
			"description" 	=> __('For icon', 'infolist'),
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"group" 		=> 'Icon/Image',
		),


		// Border
		
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border width', 'infolist' ),
			"param_name" 	=> 	"borderwidth",
			"description" 	=> 	__( 'set border width eg, 5px', 'infolist' ),
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"value"			=>	"5px",
			"group" 		=> 	'Border',
        ),

        array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Border Style', 'infolist' ),
			"param_name" 	=> 	"borderstyle",
			"description" 	=> 	__( 'select border style', 'infolist' ),
			"group" 		=> 'Border',
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"value"			=> array(
				"Solid"			=>	"solid",
				"Dotted"		=>	"dotted",
				"Dashed"		=>	"dashed",
				"Inset"			=>	"inset",
			)
		),
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border Radius', 'infolist' ),
			"param_name" 	=> 	"radius",
			"description" 	=> 	__( 'set border radius eg, 5px or 5%', 'infolist' ),
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"value"			=>	"50%",
			"group" 		=> 	'Border',
        ),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Border color', 'infolist' ),
			"param_name" 	=> 	"borderclr",
			"description" 	=> __('border color', 'infolist'),
			"dependency" => array('element' => "style", 'value' => 'icon'),
			"group" 		=> 'Border',
		),

		// Textarea Html

		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Write info', 'infolist' ),
			"param_name" 	=> 	"content",
			"value"			=>	"<h3>Heading<h3><p>Write your info here.</p>",
			"group" 		=> 'Content',
		),

		// Settings
		
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border width', 'infolist' ),
			"param_name" 	=> 	"listwidth",
			"description" 	=> 	__( 'set border width for info list in pixel eg, 2px', 'infolist' ),
			"value"			=>	"2px",
			"group" 		=> 	'Settings',
        ),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Border Style', 'infolist' ),
			"param_name" 	=> 	"liststyle",
			"description" 	=> 	__( 'set border style for info list', 'infolist' ),
			"group" 		=> 'Settings',
			"value"			=> array(
				"Solid"			=>	"solid",
				"Dotted"		=>	"dotted",
				"Dashed"		=>	"dashed",
				"Inset"			=>	"inset",
			)
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Border color', 'infolist' ),
			"param_name" 	=> 	"listclr",
			"description" 	=> __('set border color for info list', 'infolist'),
			"group" 		=> 'Settings',
		),
	),
) );
