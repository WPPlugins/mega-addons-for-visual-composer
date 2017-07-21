<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_price_listing extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'offer_visibility' => '',
			'offer_text' => '',
			'offer_bg' => '',
			'price_title' => '',
			'price_visibility' => '',
			'price_currency' => '',
			'price_amount' => '',
			'price_plan' => '',
			'feature_size' => '15px',
			'btn_text' => '',
			'btn_url' => '',
			'price_bg' => '',
			'top_bg' => '',
			'text_clr' => '',
		), $atts ) );	
		wp_enqueue_style( 'price-listing-css', plugins_url( '../css/price_listing.css' , __FILE__ ));
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
		<div class="price_table_1" style="background-color: <?php echo $price_bg; ?>; box-shadow: 0 0 9px rgba(0,0,0,0.5), 0 -3px 0px <?php echo $top_bg; ?> inset;">
			<div class="type" style="background-color: <?php echo $top_bg; ?>;">
				<div class="ribbon-right" style="display: <?php echo $offer_visibility; ?>;">
					<span style="background: <?php echo $offer_bg; ?>;"><?php echo $offer_text; ?></span>
				</div>
				<p><?php echo $price_title; ?></p>
			</div>

			<div class="plan">
				<div class="header" style="display: <?php echo $price_visibility; ?>;">
						<span class="price_curr" style="color: <?php echo $top_bg; ?>">
							<?php echo $price_currency; ?>
						</span>
						<span class="amount" style="color: <?php echo $top_bg; ?>">
							<?php echo $price_amount; ?>
						</span>
					<p class="month"><?php echo $price_plan; ?></p>
				</div>
				<div class="content">
					<?php echo $content; ?>
				</div>			
				<div class="price">
		      		<a href="<?php echo $btn_url; ?>" class="price-btn" style="background-color: <?php echo $top_bg; ?>; box-shadow: inset 0 -2px <?php echo $top_bg; ?>;-webkit-box-shadow: inset 0 -2px <?php echo $top_bg; ?>;">
		      			<?php echo $btn_text; ?>
		      		</a>
				</div>
			</div>
		</div>

		<style>
			.price_table_1 .content *{
				color: <?php echo $text_clr; ?>;
				font-size: <?php echo $feature_size; ?>;
			}
		</style>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Price Table', 'infobox' ),
	"base" 			=> "mvc_price_listing",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('Pricing Table', 'infobox'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/price.png',
	'params' => array(
		array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Show/Hide Offer', 'pt-vc' ),
			"param_name" 	=> 	"offer_visibility",
			"description" 	=> 	__( 'Select Show or Hide offer ', 'pt-vc' ),
			"group" 		=> 	'Offer',
			"value" 		=>  array(
				'Show' =>  'block',
				'Hide' =>  'none',
			)
        ),
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Offer text', 'pt-vc' ),
			"param_name" 	=> 	"offer_text",
			"description" 	=> 	__( 'Write text for showing best offer in Ribbon e.g BEST', 'pt-vc' ),
			"group" 		=> 	'Offer',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Offer Background color', 'pt-vc' ),
			"param_name" 	=> 	"offer_bg",
			"description" 	=> 	__( 'background color of offer', 'pt-vc' ),
			"group" 		=> 	'Offer',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Top Header Title', 'pt-vc' ),
			"param_name" 	=> 	"price_title",
			"description" 	=> 	__( 'It will be used as price package name', 'pt-vc' ),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Show/Hide price amount', 'pt-vc' ),
			"param_name" 	=> 	"price_visibility",
			"description" 	=> 	__( 'Select Show or Hide amount and currency ', 'pt-vc' ),
			"group" 		=> 	'Price Header',
			"value" 		=>  array(
				'Show' =>  'block',
				'Hide' =>  'none',
			)
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Currency sign', 'pt-vc' ),
			"param_name" 	=> 	"price_currency",
			"description" 	=> 	__( 'Write currency sign e.g "$"', 'pt-vc' ),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Amount', 'pt-vc' ),
			"param_name" 	=> 	"price_amount",
			"description" 	=> 	__( 'Write amount in number e.g 299', 'pt-vc' ),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Price plan', 'pt-vc' ),
			"param_name" 	=> 	"price_plan",
			"description" 	=> 	__( 'Price plan e.g "per month"', 'pt-vc' ),
			"group" 		=> 	'Price Header',
        ),

        /* Features */

        array(
			"type" 			=> "textarea_html",
			"heading" 		=> __( 'Caption Text', 'ich-vc' ),
			"param_name" 	=> "content",
			"description" 	=> __( 'Enter your pricing content. You can use a UL list as shown by default but anything would really work!', 'ich-vc' ),
			"group" 		=> 'Features',
			"value"			=> '<li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li>'
		),
		 array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Text color', 'pt-vc' ),
			"param_name" 	=> 	"text_clr",
			"description" 	=> 	__( 'Text color of price list', 'pt-vc' ),
			"group" 		=> 	'Features',
        ),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Font size', 'ich-vc' ),
			"param_name" 	=> "feature_size",
			"description" 	=> __( 'Font size of price list item e.g 13px', 'ich-vc' ),
			"group" 		=> 'Features',
		),

        /* Button */

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Text', 'pt-vc' ),
			"param_name" 	=> 	"btn_text",
			"description" 	=> 	__( 'Button text name', 'pt-vc' ),
			"group" 		=> 	'Button',
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Url', 'pt-vc' ),
			"param_name" 	=> 	"btn_url",
			"description" 	=> 	__( 'Write Button URL for link', 'pt-vc' ),
			"group" 		=> 	'Button',
        ),

        /* colors */

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Price background color', 'pt-vc' ),
			"param_name" 	=> 	"price_bg",
			"description" 	=> 	__( 'Set complete background color', 'pt-vc' ),
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Header Background color', 'pt-vc' ),
			"param_name" 	=> 	"top_bg",
			"description" 	=> 	__( 'Top Header and button background color', 'pt-vc' ),
			"group" 		=> 	'Color',
        ),
	),
) );

