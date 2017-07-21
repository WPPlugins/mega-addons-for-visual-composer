<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_tooltip_icons extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'image_id'		=>		'',
			'text'			=>		'',
			'bgclr'			=>		'#000',
			'top'			=>		'',
			'left'			=>		'',
			'visible'		=>		'tooltip-top',
		), $atts ) );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		wp_enqueue_style( 'animate-css', plugins_url( '../css/tooltip.css' , __FILE__ ));
		ob_start(); ?>
		<?php if ($visible == 'tooltip-top' || $visible == 'tooltip-bottom') { ?>
			<a class="<?php echo $visible; ?>">
				<img src="<?php echo $image_url; ?>">
				<span class="icon-span" style="background: <?php echo $bgclr; ?>; top: <?php echo $top; ?>; left: <?php echo $left; ?>;">
					<?php echo $text; ?>
					<span class="icon-after" style="border-top: 8px solid <?php echo $bgclr; ?>; border-right: 8px solid <?php echo $bgclr; ?>; border-bottom: 8px solid <?php echo $bgclr; ?>; border-left: 8px solid <?php echo $bgclr; ?>;"></span>
				</span>
			</a>
		<?php } ?>

		<?php if ($visible == 'tooltip-right' || $visible == 'tooltip-left') { ?>
			<a class="<?php echo $visible; ?>">
				<img src="<?php echo $image_url; ?>">
				<span class="icon-span" style="background: <?php echo $bgclr; ?>; top: -<?php echo $top; ?>;">
					<?php echo $text; ?>
					<span class="icon-after" style="border-top: 8px solid <?php echo $bgclr; ?>; border-right: 8px solid <?php echo $bgclr; ?>; border-bottom: 8px solid <?php echo $bgclr; ?>; border-left: 8px solid <?php echo $bgclr; ?>;"></span>
				</span>
			</a>
		<?php } ?>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Tooltip Icons', 'justicons' ),
	"base" 			=> "tooltip_icons",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('show icons with tooltip', ''),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/icon.png',
	'params' => array(
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'justicons' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'justicons' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'ToolTip Text', 'justicons' ),
			"param_name" 	=> 	"text",
			"description" 	=> 	__( 'it will show on hover image', 'justicons' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background', 'justicons' ),
			"param_name" 	=> 	"bgclr",
			"description" 	=> 	__( 'tooltip background color', 'justicons' ),
			"value"			=>	"#000",
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Visibility', 'justicons' ),
			"param_name" 	=> 	"visible",
			"description" 	=> 	__( 'tooltip visibility', 'justicons' ),
			"group" 		=> 	'Settings',
			"value"			=>	array(
				"Top"		=>	"tooltip-top",
				"Right"		=>	"tooltip-right",
				"Bottom"	=>	"tooltip-bottom",
				"Left"		=>	"tooltip-left",
			)
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Position from top', 'justicons' ),
			"param_name" 	=> 	"top",
			"description" 	=> 	__( 'set in pixel or percentage eg, 50px', 'justicons' ),
			"group" 		=> 	'Settings',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Position from Left', 'justicons' ),
			"param_name" 	=> 	"left",
			"description" 	=> 	__( 'set in pixel or percentage eg, 50px', 'justicons' ),
			"dependency" => array('element' => "visible", 'value' => array('tooltip-top', 'tooltip-bottom')),
			"group" 		=> 	'Settings',
        ),
	),
) );

