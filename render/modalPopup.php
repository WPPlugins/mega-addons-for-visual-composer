<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_modal_popup_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'animation'		=>		'Default',
			'top'			=>		'60px',
			'width'			=>		'600px',
			'id'			=>		'123',
			'bodybg'		=>		'',
			'bgclr'			=>		'#ececec',
			'btntext'		=>		'',
			'btnsize'		=>		'18px',
			'leftpadding'	=>		'20px',
			'toppadding'	=>		'5px',
			'border'		=>		'1px solid transparent',
			'btnradius'		=>		'3px',
			'btnclr'		=>		'',
			'btnbg'			=>		'',
			'titlealign'	=>		'left',
			'titletext'		=>		'Image Gallery',
			'titlesize'		=>		'20px',
			'titleline'		=>		'2',
			'titleclr'		=>		'',
			'titlebg'		=>		'',
			'titleborder'	=>		'',
		), $atts ) );
		$content = wpb_js_remove_wpautop($content, true);
		wp_enqueue_style( 'animate-css', plugins_url( '../css/animate.css' , __FILE__ ));
		wp_enqueue_script( 'bpopup-js', plugins_url( '../js/bpopup.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		ob_start(); ?>
		<!-- HTML DESIGN HERE -->
		<div class="modal-popup-box" data-bodybg="<?php echo $bodybg; ?>">
			<button class="model-popup-btn" data-id="popup-<?php echo $id; ?>" style="color: <?php echo $btnclr; ?>;background: <?php echo $btnbg; ?> ; border: <?php echo $border; ?>; border-radius: <?php echo $btnradius; ?>; font-size: <?php echo $btnsize; ?>; padding: <?php echo $toppadding; ?> <?php echo $leftpadding; ?>;">
				<?php echo $btntext; ?>
			</button>

			<div class="mega-model-popup <?php echo $animation; ?> animated" id="popup-<?php echo $id; ?>" style="display: none; margin-top: <?php echo $top; ?>; width: 95%;max-width: <?php echo $width; ?>; background: <?php echo $bgclr; ?>;">
				<span class="b-close"><span><img src="<?php echo plugin_dir_url( __FILE__ ); ?>../images/cross.png"></span></span>
			    <div class="model-popup-container">
			    	<h2 style="border-bottom: 1px solid <?php echo $titleborder; ?>; text-align: <?php echo $titlealign; ?>; font-size: <?php echo $titlesize; ?>; line-height: <?php echo $titleline; ?>; color: <?php echo $titleclr; ?>; background: <?php echo $titlebg; ?>; margin: 0px; padding: 0px 20px;">
			    		<?php echo $titletext; ?>
			    	</h2>
			      <span style="padding: 15px 20px; display: block;">
			      	<?php echo $content; ?>
			      </span>
			    </div>
			</div>
		</div>
        <!-- HTML END DESIGN HERE -->
		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Modal Popup', 'modal_popup' ),
	"base" 			=> "modal_popup_box",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('show content in popup', ''),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/popup.png',
	'params' => array(
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Unique ID', 'modal_popup' ),
			"param_name" 	=> 	"id",
			"description" 	=> 	__( 'Id must be unique eg, 123', 'modal_popup' ),
			"value" 		=> __( "123", "modal_popup" ),
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animation Effect', 'modal_popup' ),
			"param_name" 	=> 	"animation",
			"description" 	=> 	__( 'animation style on visible', 'modal_popup' ),
			"group" 		=> 	'General',
			"value"			=>	array(
				"Default"		=>	"Default",
				"bounce"		=>	"bounce",
				"bounceIn"		=>	"bounceIn",
				"rubberBand"	=>	"rubberBand",
				"shake"			=>	"shake",
				"swing"			=>	"swing",
				"bounceInDown"	=>	"bounceInDown",
				"bounceInLeft"	=>	"bounceInLeft",
				"bounceInRight"	=>	"bounceInRight",
				"bounceInUp"	=>	"bounceInUp",
				"fadeInLeft"	=>	"fadeInLeft",
				"fadeInRight"	=>	"fadeInRight",
				"fadeInDown"	=>	"fadeInDown",
				"flash"			=>	"flash",
				"pulse"			=>	"pulse",
				"tada"			=>	"tada",
				"wobble"		=>	"wobble",
				"flip"			=>	"flip",
				"flipInX"		=>	"flipInX",
				"flipInY"		=>	"flipInY",
				"lightSpeedIn"	=>	"lightSpeedIn",
				"rotateIn"		=>	"rotateIn",
				"rotateInDownLeft"	=>	"rotateInDownLeft",
				"rotateInDownRight"	=>	"rotateInDownRight",
				"rotateInUpLeft"	=>	"rotateInUpLeft",
				"rotateInUpRight"	=>	"rotateInUpRight",
				"slideInUp"		=>	"slideInUp",
				"slideInDown"	=>	"slideInDown",
				"slideInRight"	=>	"slideInRight",
				"zoomIn"	=>	"zoomIn",
				"zoomInDown"	=>	"zoomInDown",
				"zoomInLeft"	=>	"zoomInLeft",
				"zoomInRight"	=>	"zoomInRight",
				"zoomInUp"		=>	"zoomInUp",
				"rollIn"		=>	"rollIn",
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Top', 'modal_popup' ),
			"param_name" 	=> 	"top",
			"description" 	=> 	__( 'set position from top in pixel', 'modal_popup' ),
			"value" 		=> __( "60px", "modal_popup" ),
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Popup Width', 'modal_popup' ),
			"param_name" 	=> 	"width",
			"description" 	=> 	__( 'set in pixel', 'modal_popup' ),
			"value" 		=> __( "600px", "modal_popup" ),
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Popup Background', 'modal_popup' ),
			"param_name" 	=> 	"bodybg",
			"description" 	=> 	__( 'Popup body background color', 'modal_popup' ),
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Text', 'modal_popup' ),
			"param_name" 	=> 	"btntext",
			"description" 	=> 	__( 'text for button', 'modal_popup' ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Size', 'modal_popup' ),
			"param_name" 	=> 	"btnsize",
			"description" 	=> 	__( 'font size for button in pixel', 'modal_popup' ),
			"value" 		=> __( "18px", "modal_popup" ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Padding [Left,Right]', 'modal_popup' ),
			"param_name" 	=> 	"leftpadding",
			"description" 	=> 	__( 'write in pixel for button width', 'modal_popup' ),
			"value" 		=> __( "20px", "modal_popup" ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Padding [Top,Bottom]', 'modal_popup' ),
			"param_name" 	=> 	"toppadding",
			"description" 	=> 	__( 'write in pixel for button height', 'modal_popup' ),
			"value" 		=> __( "5px", "modal_popup" ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border Style [length style color]', 'modal_popup' ),
			"param_name" 	=> 	"border",
			"description" 	=> 	__( 'button border', 'modal_popup' ),
			"value" 		=> __( "1px solid #44448F", "modal_popup" ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Radius', 'modal_popup' ),
			"param_name" 	=> 	"btnradius",
			"description" 	=> 	__( 'button radius in pixel', 'modal_popup' ),
			"value" 		=> __( "5px", "modal_popup" ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color', 'modal_popup' ),
			"param_name" 	=> 	"btnclr",
			"description" 	=> 	__( 'Button text color', 'modal_popup' ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'modal_popup' ),
			"param_name" 	=> 	"btnbg",
			"description" 	=> 	__( 'Button background color', 'modal_popup' ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Title Align', 'modal_popup' ),
			"param_name" 	=> 	"titlealign",
			"group" 		=> 	'Title',
			"value"			=>	array(
				"Left"		=>	"left",
				"Center"		=>	"center",
				"Right"		=>	"right",
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'modal_popup' ),
			"param_name" 	=> 	"titletext",
			"description" 	=> 	__( 'title text', 'modal_popup' ),
			"value" 		=> __( "Image Gallery", "modal_popup" ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Size', 'modal_popup' ),
			"param_name" 	=> 	"titlesize",
			"description" 	=> 	__( 'write in pixel e.g 20px', 'modal_popup' ),
			"value" 		=> __( "20px", "modal_popup" ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Line Height', 'modal_popup' ),
			"param_name" 	=> 	"titleline",
			"description" 	=> 	__( 'it increases the title height, default 2', 'modal_popup' ),
			"value" 		=> __( "2", "modal_popup" ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color', 'modal_popup' ),
			"param_name" 	=> 	"titleclr",
			"description" 	=> 	__( 'title color', 'modal_popup' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'modal_popup' ),
			"param_name" 	=> 	"titlebg",
			"description" 	=> 	__( 'title background color', 'modal_popup' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Border Color', 'modal_popup' ),
			"param_name" 	=> 	"titleborder",
			"description" 	=> 	__( 'below title border color', 'modal_popup' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'modal_popup' ),
			"param_name" 	=> 	"bgclr",
			"description" 	=> 	__( 'Content background color', 'modal_popup' ),
			"group" 		=> 	'Popup Content',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'You can also use shortcode', 'modal_popup' ),
			"param_name" 	=> 	"content",
			"group" 		=> 	'Popup Content',
		),
	),
) );

