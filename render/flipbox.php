<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_flip_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style'			=> 'horizental',
			'height'			=> '200px',
			'info_opt'		=> 'show_image',
			'image_id'		=> '',
			'radius'		=> '',
			'image_size'	=> '',
			'font_icon'		=> '',
			'icon_size'		=> '',
			'icon_color'	=> '',
			'lineheight'	=> '1',
			'title'			=> '',
			'size'			=> '',
			'color'			=> '',
			'desc'			=> '',
			'descrsize'		=> '',
			'descrcolor'	=> '',
			'bgcolor'		=> '',
			'css'			=> '',
		), $atts ) );
		wp_enqueue_style( 'flip-box-css', plugins_url( '../css/flipbox.css' , __FILE__ ));
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
	    <?php if ($style == 'vertical') { ?>
	      	<div class="hover panel" style="height: <?php echo $height; ?>;">
			  <div class="front <?php echo $css_class; ?>">
			    <div class="pad">
			      <?php if ($info_opt == 'show_image') { ?>
					<img class="" src="<?php echo $image_url; ?>" width="<?php echo $image_size; ?>" style="border-radius: <?php echo $radius; ?>;">			
				  <?php } ?>
				  <?php if ($info_opt == 'show_icon') { ?>
					<i class="<?php echo $font_icon; ?>" aria-hidden="true" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_color; ?>;"></i>
				  <?php } ?>
			      <h4 style="color: <?php echo $color; ?>; font-size: <?php echo $size; ?>; line-height: <?php echo $lineheight; ?>;">
			      		<b><?php echo $title; ?></b>
			      </h4>
			      <p style="color: <?php echo $descrcolor; ?>; font-size: <?php echo $descrsize; ?>;">
			        <?php echo $desc; ?>
			      </p>
			    </div>
			  </div>
			  <div class="back" style="background: <?php echo $bgcolor; ?>">
			    <div class="pad">
			      <?php echo $content; ?>
			    </div>
			  </div>
			</div> 	
	    <?php } ?>

	    <?php if ($style == 'horizental') { ?>
	      	<div class="hover panel" style="height: <?php echo $height; ?>;">
			  <div class="front1 <?php echo $css_class; ?>">
			    <div class="pad">
			      <?php if ($info_opt == 'show_image') { ?>
					<img class="" src="<?php echo $image_url; ?>" width="<?php echo $image_size; ?>" style="border-radius: <?php echo $radius; ?>;">			
				  <?php } ?>
				  <?php if ($info_opt == 'show_icon') { ?>
					<i class="<?php echo $font_icon; ?>" aria-hidden="true" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_color; ?>;"></i>
				  <?php } ?>
			      <h4 style="color: <?php echo $color; ?>; font-size: <?php echo $size; ?>; line-height: <?php echo $lineheight; ?>;">
			      		<b><?php echo $title; ?></b>
			      </h4>
			      <p style="color: <?php echo $descrcolor; ?>; font-size: <?php echo $descrsize; ?>;">
			        <?php echo $desc; ?>
			      </p>
			    </div>
			  </div>
			  <div class="back1" style="background: <?php echo $bgcolor; ?>">
			    <div class="pad">
			      <?php echo $content; ?>
			    </div>
			  </div>
			</div>
		<?php } ?>

		<?php if ($style == '3d') { ?>
			<div style="height: <?php echo $height; ?>;">
				<div class="cube">
				    <div class="active-state" style="background: <?php echo $bgcolor; ?>; height: <?php echo $height; ?>;transform-origin: center center -<?php echo $height/2; ?>px;">
				        <?php echo $content; ?>
				    </div>
				    <div class="default-state <?php echo $css_class; ?>" style="height: <?php echo $height; ?>; transform-origin: center center -<?php echo $height/2; ?>px;">
				        <?php if ($info_opt == 'show_image') { ?>
							<img class="" src="<?php echo $image_url; ?>" width="<?php echo $image_size; ?>" style="border-radius: <?php echo $radius; ?>;">			
						<?php } ?>
						<?php if ($info_opt == 'show_icon') { ?>
							<i class="<?php echo $font_icon; ?>" aria-hidden="true" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_color; ?>;"></i>
						<?php } ?>
					    <h4 style="color: <?php echo $color; ?>; font-size: <?php echo $size; ?>; line-height: <?php echo $lineheight; ?>;">
					      	<b><?php echo $title; ?></b>
					    </h4>
					    <p style="color: <?php echo $descrcolor; ?>; font-size: <?php echo $descrsize; ?>;">
					        <?php echo $desc; ?>
					    </p>
				    </div>
				</div>
			</div>
		<?php } ?>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Flip Box', 'flipbox' ),
	"base" 			=> "mvc_flip_box",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('Show flip box for Info', 'flipbox'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/flipbox.png',
	'params' => array(
		array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Style Flip Box', 'flipbox' ),
				"param_name" 	=> "style",
				"description" 	=> __( 'select style', 'flipbox' ),
				"group" 		=> 'General',
				"value" 		=> array(
					'Horizental'	=>	'horizental',
					'Vertical'	=>	'vertical',
					'3D'	=>	'3d',
				)
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Flip height', 'flipbox' ),
				"param_name" 	=> "height",
				"description" 	=> __( 'Required. set flip box height e.g 200px', 'flipbox' ),
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Select Image or Font icon', 'flipbox' ),
				"param_name" 	=> "info_opt",
				"description" 	=> __( 'Select Image or Font icon', 'flipbox' ),
				"group" 		=> 'General',
				"value" 		=> array(
					'Image'	=>	'show_image',
					'Icon'	=>	'show_icon',
				)
			),
			array(
                "type" 			=> 	"attach_image",
				"heading" 		=> 	__( 'Image', 'flipbox' ),
				"param_name" 	=> 	"image_id",
				"description" 	=> 	__( 'Select the image', 'flipbox' ),
				"group" 		=> 	'General',
				"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
            ),
            array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Image Radius', 'flipbox' ),
				"param_name" 	=> "radius",
				"description" 	=> __( 'Set Image radius in pixel or % e.g 50%', 'flipbox' ),
				"group" 		=> 'General',
				"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Width', 'flipbox' ),
				"param_name" 	=> "image_size",
				"description" 	=> __( 'Set the width in pixel e.g 80px', 'flipbox' ),
				"group" 		=> 'General',
				"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
			),
			array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( 'Font icon', 'flipbox' ),
				"param_name" 	=> "font_icon",
				"description" 	=> __( 'Select the font icon', 'flipbox' ),
				"group" 		=> 'General',
				"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Font size', 'flipbox' ),
				"param_name" 	=> "icon_size",
				"description" 	=> __( 'Set icon font size in pixel e.g 30px', 'flipbox' ),
				"group" 		=> 'General',
				"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Font Color', 'flipbox' ),
				"param_name" 	=> "icon_color",
				"description" 	=> __( 'Set icon color', 'flipbox' ),
				"group" 		=> 'General',
				"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			),

			// Fron Content 
			
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Line height', 'flipbox' ),
				"param_name" 	=> "lineheight",
				"description" 	=> __( 'set line height for front display e.g 1.5', 'flipbox' ),
				"group" 		=> 'Front',
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Title', 'flipbox' ),
				"param_name" 	=> "title",
				"description" 	=> __( 'set title for front display', 'flipbox' ),
				"group" 		=> 'Front',
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Font Size', 'flipbox' ),
				"param_name" 	=> "size",
				"description" 	=> __( 'set title font size for front display e.g 15px', 'flipbox' ),
				"group" 		=> 'Front',
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Title color', 'flipbox' ),
				"param_name" 	=> "color",
				"description" 	=> __( 'set title color', 'flipbox' ),
				"group" 		=> 'Front',
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Description', 'flipbox' ),
				"param_name" 	=> "desc",
				"description" 	=> __( 'set description for front display', 'flipbox' ),
				"group" 		=> 'Front',
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Font Size', 'flipbox' ),
				"param_name" 	=> "descrsize",
				"description" 	=> __( 'set description font size for front display e.g 13px', 'flipbox' ),
				"group" 		=> 'Front',
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Title color', 'flipbox' ),
				"param_name" 	=> "descrcolor",
				"description" 	=> __( 'set description color', 'flipbox' ),
				"group" 		=> 'Front',
			),


			// Back Display 
			
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Background color', 'flipbox' ),
				"param_name" 	=> "bgcolor",
				"description" 	=> __( 'set background color', 'flipbox' ),
				"group" 		=> 'Flip Display',
			),

			array(
	            "type" 			=> 	"textarea_html",
				"heading" 		=> 	__( 'Description', 'flipbox' ),
				"param_name" 	=> 	"content",
				"description" 	=> 	__( 'write detail about flip box', 'flipbox' ),
				"group" 		=> 	'Flip Display',
				"value"			=> '<h3>Caption Text Here</h3><p>Change color, background color and text in button. Dont remove mega_hvr_btn class from button.</p> <a href="#" class="mega_hvr_btn" style="padding:6px 14px;color:#fff;background:#000;">Learn More</a>'
        	),
        	array(
				"type" 			=> "css_editor",
				"heading" 		=> __( 'Display Design', 'flipbox' ),
				"param_name" 	=> "css",
				"group" 		=> 'Front Design',
			),
	),
) );

