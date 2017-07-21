<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_counter extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'counter_style' 	=> 'style',
			'css' 				=> '',
			'sec_style' 		=> 'image',
			'image_id' 		=> '',
			'image_width' 		=> '',
			'image_height' 		=> '',
			'count_icon' 		=> '',
			'icon_size' 		=> '',
			'icon_clr' 			=> '',
			'css2' 				=> '',
			'count_title' 		=> '',
			'title_size' 		=> '30px',
			'title_font' 		=> '500',
			'title_clr' 		=> '',
			'stat_numb' 		=> '',
			'stat_size' 		=> '20px',
			'stat_font' 		=> '',
			'stat_clr' 			=> '',
			'count_decimal' 			=> '0',
			'count_speed' 			=> '4000',
			'count_interv' 			=> '10',
			'start_from' 			=> '0',
		), $atts ) );
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		$css_class2 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css2, ' ' ), $this->settings['base'], $atts );
		wp_enqueue_style( 'counter-css', plugins_url( '../css/statcounter.css' , __FILE__ ));
		wp_enqueue_script( 'count-to', plugins_url( '../js/countTo.min.js' , __FILE__ ), array('jquery') );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
	    	<!-- Counter style one -->
		<?php if ($counter_style == 'style') { ?>
			<div id="mega_count_bar" class="<?php echo $css_class; ?>">
				<div class="mega_count_img">
					<?php if ($sec_style == 'image') { ?>		   
						<img src="<?php echo $image_url; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" alt="">
					<?php } ?>
					<?php if ($sec_style == 'icon') { ?>
						<i class="<?php echo $count_icon; ?> <?php echo $css_class2; ?>" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_clr; ?>;"></i>
					<?php } ?>
				</div>
				<div class="mega_count_content">
					<p class="timer" data-decimals="<?php echo $count_decimal; ?>" data-speed="<?php echo $count_speed; ?>" data-to="<?php echo $stat_numb; ?>" data-refresh-interval="<?php echo $count_interv; ?>" data-from="<?php echo $start_from; ?>" style="text-align: center; font-size: <?php echo $stat_size; ?>; font-weight: <?php echo $stat_font; ?>; color: <?php echo $stat_clr; ?>;">
						<?php echo $start_from; ?>
					</p>
					<h3 style="font-size: <?php echo $title_size; ?>; font-weight: <?php echo $title_font; ?>; color: <?php echo $title_clr; ?>;">
						<?php echo $count_title; ?>
					</h3>
				</div>
			</div>
		<?php } ?>

		<!-- Counter style two -->
		<?php if ($counter_style == 'style2') { ?>
			<div id="mega_count_bar" class="<?php echo $css_class; ?>">
				<div class="mega_count_img">
					<?php if ($sec_style == 'image') { ?>		   
						<img src="<?php echo $image_url; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" alt="">
					<?php } ?>
					<?php if ($sec_style == 'icon') { ?>
						<i class="<?php echo $count_icon; ?> <?php echo $css_class2; ?>" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_clr; ?>;"></i>
					<?php } ?>
				</div>
				<div class="mega_count_content">
					<h3 style="font-size: <?php echo $title_size; ?>; font-weight: <?php echo $title_font; ?>; color: <?php echo $title_clr; ?>;">
						<?php echo $count_title; ?>
					</h3>
					<hr>
					<p class="timer" data-decimals="<?php echo $count_decimal; ?>" data-speed="<?php echo $count_speed; ?>" data-to="<?php echo $stat_numb; ?>" data-refresh-interval="<?php echo $count_interv; ?>" data-from="<?php echo $start_from; ?>" style="text-align: center; font-size: <?php echo $stat_size; ?>; font-weight: <?php echo $stat_font; ?>; color: <?php echo $stat_clr; ?>;">
						<?php echo $start_from; ?>
					</p>
				</div>
			</div>
		<?php } ?>

		<!-- Counter style three -->
		<?php if ($counter_style == 'style3') { ?>
			<div id="mega_count_bar_2">
				<div class="mega_count_img">		   
					<?php if ($sec_style == 'image') { ?>		   
						<img src="<?php echo $image_url; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" alt="">
					<?php } ?>
					<?php if ($sec_style == 'icon') { ?>
						<i class="<?php echo $count_icon; ?> <?php echo $css_class2; ?>" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_clr; ?>;"></i>
					<?php } ?>
				</div>
				<div class="mega_count_content">
					<h3 style="font-size: <?php echo $title_size; ?>; font-weight: <?php echo $title_font; ?>; color: <?php echo $title_clr; ?>;">
						<?php echo $count_title; ?>
					</h3>
					<p class="timer" data-decimals="<?php echo $count_decimal; ?>" data-speed="<?php echo $count_speed; ?>" data-to="<?php echo $stat_numb; ?>" data-refresh-interval="<?php echo $count_interv; ?>" data-from="<?php echo $start_from; ?>" style="text-align: center; font-size: <?php echo $stat_size; ?>; font-weight: <?php echo $stat_font; ?>; color: <?php echo $stat_clr; ?>;">
						<?php echo $start_from; ?>
					</p>		
				</div>
			</div>
		<?php } ?>

		<!-- Counter style four -->
		<?php if ($counter_style == 'style4') { ?>
			<div id="mega_count_bar_3">
				<div class="mega_count_content">
					<h3 style="font-size: <?php echo $title_size; ?>; font-weight: <?php echo $title_font; ?>; color: <?php echo $title_clr; ?>;">
						<?php echo $count_title; ?>
					</h3>
					<p class="timer" data-decimals="<?php echo $count_decimal; ?>" data-speed="<?php echo $count_speed; ?>" data-to="<?php echo $stat_numb; ?>" data-refresh-interval="<?php echo $count_interv; ?>" data-from="<?php echo $start_from; ?>" style="text-align: right; font-size: <?php echo $stat_size; ?>; font-weight: <?php echo $stat_font; ?>; color: <?php echo $stat_clr; ?>;">
						<?php echo $start_from; ?>
					</p>
				</div>
				<div class="mega_count_img">		   
					<?php if ($sec_style == 'image') { ?>		   
						<img src="<?php echo $image_url; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" alt="">
					<?php } ?>
					<?php if ($sec_style == 'icon') { ?>
						<i class="<?php echo $count_icon; ?> <?php echo $css_class2; ?>" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_clr; ?>;"></i>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

		<!-- Counter style five -->
		<?php if ($counter_style == 'style5') { ?>
			<div id="mega_count_bar_4" class="<?php echo $css_class2; ?>">
				<div class="mega_count_content">
					<h3 style="font-size: <?php echo $title_size; ?>; font-weight: <?php echo $title_font; ?>; color: <?php echo $title_clr; ?>;">
						<?php echo $count_title; ?>
					</h3>
				</div>
				<div class="mega_count_img">		   
					<?php if ($sec_style == 'image') { ?>		   
						<img src="<?php echo $image_url; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" alt="">
					<?php } ?>
					<?php if ($sec_style == 'icon') { ?>
						<i class="<?php echo $count_icon; ?>" style="font-size: <?php echo $icon_size; ?>; color: <?php echo $icon_clr; ?>;"></i>
					<?php } ?>
				</div>
				<div class="mega_count_content">
					<p class="timer" data-decimals="<?php echo $count_decimal; ?>" data-speed="<?php echo $count_speed; ?>" data-to="<?php echo $stat_numb; ?>" data-refresh-interval="<?php echo $count_interv; ?>" data-from="<?php echo $start_from; ?>" style="text-align: center; font-size: <?php echo $stat_size; ?>; font-weight: <?php echo $stat_font; ?>; color: <?php echo $stat_clr; ?>;">
						<?php echo $start_from; ?>
					</p>
				</div>
			</div>
		<?php } ?>
		

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Stats counter', 'counter' ),
	"base" 			=> "mvc_counter",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('Stats count for client info', 'counter'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/counter.jpg',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Counter styles', 'counter' ),
			"param_name" 	=> 	"counter_style",
			"description" 	=> 	__( 'Select counter styles', 'counter' ),
			"group" 		=> 	'General',
			"value" 		=> array(
				"Top logo bottom content"		=> "style", 
				"Top logo bottom content 2" 	=> "style2",
				"Left logo right content" 	=> "style3",
				"Left content right logo" 	=> "style4",
				"Logo in center" 	=> "style5",
			)
		),

		array(
			"type" 			=> 	"css_editor",
			"heading" 		=> 	__( 'Set styles of complete box or leave blank accordingly', 'counter' ),
			"param_name" 	=> 	"css",
			"group" 		=> 	'General',
		),


		// Image Section

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Image/Icon', 'counter' ),
			"param_name" 	=> 	"sec_style",
			"description" 	=> 	__( 'Select image or font icon', 'counter' ),
			"group" 		=> 	'Image',
			"value" => array(
				"Image" => "image", 
				"Icon" => "icon", 
			)
		),
		array(
			"type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'counter' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'select image for logo', 'counter' ),
			"group" 		=> 	'Image',
			"dependency" => array('element' => "sec_style", 'value' => 'image'),
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Width', 'counter' ),
			"param_name" 	=> 	"image_width",
			"description" 	=> 	__( 'Set custom image width in pixel or leave blank e.g 100px', 'counter' ),
			"group" 		=> 	'Image',
			"dependency" => array('element' => "sec_style", 'value' => 'image'),
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Height', 'counter' ),
			"param_name" 	=> 	"image_height",
			"description" 	=> 	__( 'Set custom image height in pixel or leave blank e.g 100px', 'counter' ),
			"group" 		=> 	'Image',
			"dependency" => array('element' => "sec_style", 'value' => 'image'),
		),

		array(
			"type" 			=> 	"iconpicker",
			"heading" 		=> 	__( 'Font Icon', 'counter' ),
			"param_name" 	=> 	"count_icon",
			"description" 	=> 	__( 'Select font icon', 'counter' ),
			"dependency" => array('element' => "sec_style", 'value' => 'icon'),
			"group" 		=> 	'Image',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Icon font size', 'counter' ),
			"param_name" 	=> 	"icon_size",
			"description" 	=> 	__( 'set font size in pixel e.g 30px', 'counter' ),
			"dependency" => array('element' => "sec_style", 'value' => 'icon'),
			"group" 		=> 	'Image',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Icon Color', 'counter' ),
			"param_name" 	=> 	"icon_clr",
			"description" 	=> 	__( 'Select icon color', 'counter' ),
			"dependency" => array('element' => "sec_style", 'value' => 'icon'),
			"group" 		=> 	'Image',
		),
		array(
			"type" 			=> 	"css_editor",
			"heading" 		=> 	__( 'Set styles of icon or leave blank accordingly', 'counter' ),
			"param_name" 	=> 	"css2",
			"dependency" => array('element' => "sec_style", 'value' => 'icon'),
			"group" 		=> 	'Image',
		),


		// Content Section 
		
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'counter' ),
			"param_name" 	=> 	"count_title",
			"description" 	=> 	__( 'write counter title for info', 'counter' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font size', 'counter' ),
			"param_name" 	=> 	"title_size",
			"description" 	=> 	__( 'set title font size in pixel e.g 30px', 'counter' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Weight', 'counter' ),
			"param_name" 	=> 	"title_font",
			"description" 	=> 	__( 'set font thickness with difference of 100 in numbers e.g 500', 'counter' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title Color', 'counter' ),
			"param_name" 	=> 	"title_clr",
			"description" 	=> 	__( 'Select title color', 'counter' ),
			"group" 		=> 	'Title',
		),


		// Counter Section 
		
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Stat Counts', 'counter' ),
			"param_name" 	=> 	"stat_numb",
			"description" 	=> 	__( 'write in numbers e.g 4329', 'counter' ),
			"group" 		=> 	'Stat Counter',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font size', 'counter' ),
			"param_name" 	=> 	"stat_size",
			"description" 	=> 	__( 'set counter font size in pixel e.g 20px', 'counter' ),
			"group" 		=> 	'Stat Counter',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Font Weight', 'counter' ),
			"param_name" 	=> 	"stat_font",
			"description" 	=> 	__( 'set counter font thickness with difference of 100 in numbers e.g 500', 'counter' ),
			"group" 		=> 	'Stat Counter',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title Color', 'counter' ),
			"param_name" 	=> 	"stat_clr",
			"description" 	=> 	__( 'Select counter title color', 'counter' ),
			"group" 		=> 	'Stat Counter',
		),

		// Setting Section 
		
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Decimal', 'counter' ),
			"param_name" 	=> 	"count_decimal",
			"description" 	=> 	__( 'put numbers after decimal e.g 2 or leave blank', 'counter' ),
			"group" 		=> 	'Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Speed', 'counter' ),
			"param_name" 	=> 	"count_speed",
			"description" 	=> 	__( 'set completion time from start to end in milli second 1s=1000 e.g 4000', 'counter' ),
			"group" 		=> 	'Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Start from', 'counter' ),
			"param_name" 	=> 	"count_value",
			"description" 	=> 	__( 'set counter from starting point in number default 0', 'counter' ),
			"group" 		=> 	'Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Count interval', 'counter' ),
			"param_name" 	=> 	"count_interv",
			"description" 	=> 	__( 'set counter interval e.g 100', 'counter' ),
			"group" 		=> 	'Setting',
		),
	),
) );

