<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_infobox extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'info_style' => 'mega_info_box',
			'info_opt' => 'show_image',
			'image_id' => '',
			'image_alt' => 'Alt',
			'image_size' => '',
			'font_icon' => '',
			'icon_size' => '',
			'icon_color' => '',
			'css' 		 => '',
			'info_title' => '',
			'title_size' => '',
			'info_desc' => '',
			'info_size' => '',
			'btn_visibility' => 'none',
			'btn_text' => '',
			'btn_url' => '',
			'btn_bg' => '',
		), $atts ) );
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		wp_enqueue_style( 'info-box-css', plugins_url( '../css/infobox.css' , __FILE__ ));
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
		<div class="<?php echo $info_style; ?>">
			<div class="mega-info-header">
				<?php if ($info_opt == 'show_image') { ?>
					<img class="mega-info-img" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" width="<?php echo $image_size; ?>">			
				<?php } ?>
				<?php if ($info_opt == 'show_icon') { ?>
					<i class="<?php echo $font_icon; ?> <?php echo $css_class; ?>" aria-hidden="true" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_color; ?>;"></i>
				<?php } ?>
			</div>
			<div class="mega-info-footer">
				<h3 class="mega-info-title" style="font-size: <?php echo $title_size; ?>;">
					<?php echo $info_title; ?>
				</h3>
				<p class="mega-info-desc" style="font-size: <?php echo $desc_size; ?>;">
					<?php echo $info_desc; ?>
				</p>
				<a class="mega-info-btn" href="<?php echo $btn_text; ?>" style="background: <?php echo $btn_bg; ?>; display: <?php echo $btn_visibility; ?>;">
					<?php echo $btn_url; ?>
				</a>
			</div>
		</div>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Info Box', 'infobox' ),
	"base" 			=> "mvc_infobox",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('Service info box', 'infobox'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/infobox.png',
	'params' => array(
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Select Style', 'infobox' ),
			"param_name" 	=> "info_style",
			"description" 	=> __( 'Choose info style', 'infobox' ),
			"group" 		=> 'General',
			"value" 		=> array(
				'Vertical'	=>	'mega_info_box',
				'Horizental'	=>	'mega_info_box_2',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Select Image or Font icon', 'infobox' ),
			"param_name" 	=> "info_opt",
			"description" 	=> __( 'Select Image or Font icon', 'infobox' ),
			"group" 		=> 'General',
			"value" 		=> array(
				'Image'	=>	'show_image',
				'Font Icon'	=>	'show_icon',
			)
		),
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'infobox' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'infobox' ),
			"group" 		=> 	'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
        ),
        array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Alternate Text', 'infobox' ),
			"param_name" 	=> "image_alt",
			"description" 	=> __( 'It will be used as alt attribute of img tag', 'infobox' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Width', 'infobox' ),
			"param_name" 	=> "image_size",
			"description" 	=> __( 'Set the width in pixel e.g 80px', 'infobox' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
		),
		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Font icon', 'infobox' ),
			"param_name" 	=> "font_icon",
			"description" 	=> __( 'Select the font icon', 'infobox' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Font size', 'infobox' ),
			"param_name" 	=> "icon_size",
			"description" 	=> __( 'Set icon font size in pixel e.g 30px', 'infobox' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Font Color', 'infobox' ),
			"param_name" 	=> "icon_color",
			"description" 	=> __( 'Set icon color', 'infobox' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> 	"css_editor",
			"heading" 		=> 	__( 'Set styles for Font icon', 'infobox' ),
			"param_name" 	=> 	"css",
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			"group" 		=> 	'General',
		),

		/* Detail */

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Title', 'infobox' ),
			"param_name" 	=> "info_title",
			"description" 	=> __( 'Write title for heading', 'infobox' ),
			"group" 		=> 'Detail',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Title font size', 'infobox' ),
			"param_name" 	=> "title_size",
			"description" 	=> __( 'Set font size for title e.g 16px', 'infobox' ),
			"group" 		=> 'Detail',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Description', 'infobox' ),
			"param_name" 	=> "info_desc",
			"description" 	=> __( 'Write description for detail', 'infobox' ),
			"group" 		=> 'Detail',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Description font size', 'infobox' ),
			"param_name" 	=> "desc_size",
			"description" 	=> __( 'Set font size for description e.g 14px', 'infobox' ),
			"group" 		=> 'Detail',
		),

		/* Button */

        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Show/Hide button', 'infobox' ),
			"param_name" 	=> 	"btn_visibility",
			"description" 	=> 	__( 'Select Show or Hide Button ', 'infobox' ),
			"group" 		=> 	'Button',
			"value" 		=> array(
				'Hide' =>  'none',
				'Show' =>  'initial',
			)
        ),

		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Text', 'infobox' ),
			"param_name" 	=> 	"btn_text",
			"description" 	=> 	__( 'Button text name', 'infobox' ),
			"group" 		=> 	'Button',
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Url', 'infobox' ),
			"param_name" 	=> 	"btn_url",
			"description" 	=> 	__( 'Write Button URL for link', 'infobox' ),
			"group" 		=> 	'Button',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background color', 'infobox' ),
			"param_name" 	=> 	"btn_bg",
			"description" 	=> 	__( 'Set Button background color', 'infobox' ),
			"group" 		=> 	'Button',
        ),
	),
) );

