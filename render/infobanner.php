	<!-- Style1 & 2 info banner -->
	<?php if ($style_visibility == 'left' || $style_visibility == 'right') { ?>
		<div id="mega_info_bar" style="background: <?php echo $bg_clr; ?>; background-image: url('<?php echo $image_url; ?>'); padding-top: <?php echo $box_padding; ?>; padding-bottom: <?php echo $box_padding2; ?>; padding-left: <?php echo $box_padding3; ?>; padding-right: <?php echo $box_padding3; ?>;">		   
			<div class="ribbon">
				<span style="color: <?php echo $ribbon_clr; ?>; background-color: <?php echo $ribbon_bg; ?>">
					<?php echo $ribbon_text; ?>
				</span>
			</div>
			<div class="mega_wrap" style="width: <?php echo $pic_width; ?>; float: <?php echo $style_visibility; ?>; padding-top: <?php echo $pic_ptop; ?>; ">
				<img src="<?php echo $image_url2; ?>" style="width: <?php echo $pic_size; ?>; height: <?php echo $pic_height; ?>;">
			</div>

			<div class="mega_content" style="width: <?php echo $content_width; ?>; padding-top: <?php echo $content_ptop; ?>;padding-left: <?php echo $content_pleft; ?>;padding-right: <?php echo $content_pright; ?>;">
				<?php echo $content; ?>

				<a data-onhovercolor="<?php echo $btn_hvrclr; ?>" data-onhoverbg="<?php echo $btn_hvrbg; ?>" data-onleavebg="<?php echo $btn_bg; ?>" data-onleavecolor="<?php echo $btn_clr; ?>" href="<?php echo $btn_url; ?>" target="<?php echo $btn_next; ?>" class="mega_hvr_btn <?php echo $anim_style; ?>" style="font-size: <?php echo $btn_size; ?>; color: <?php echo $btn_clr; ?>; background: <?php echo $btn_bg; ?>; border: <?php echo $border_width; ?> solid <?php echo $border_clr; ?>; padding: <?php echo $btn_ptop; ?> <?php echo $btn_pleft; ?>; border-radius: <?php echo $btn_radius; ?>;">
					<i class="<?php echo $btn_icon; ?>"></i> <?php echo $btn_text; ?>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php } ?>


	<!-- Style3 info banner -->
	<?php if ($style_visibility == 'top_to_bottom') { ?>
		<div id="mega_info_bar_2" style="background: <?php echo $bg_clr; ?>; background-image: url('<?php echo $image_url; ?>');padding-top: <?php echo $box_padding; ?>; padding-bottom: <?php echo $box_padding2; ?>; padding-left: <?php echo $box_padding3; ?>; padding-right: <?php echo $box_padding3; ?>;">			   
			<div class="ribbon">
				<span style="color: <?php echo $ribbon_clr; ?>; background-color: <?php echo $ribbon_bg; ?>">
					<?php echo $ribbon_text; ?>
				</span>
			</div>
			<div class="mega_wrap" style="padding-top: <?php echo $pic_ptop; ?>;">
				<img src="<?php echo $image_url2; ?>" style="width: <?php echo $pic_size; ?>; height: <?php echo $pic_height; ?>;">
			</div>

			<div class="mega_content" style="padding-top: <?php echo $content_ptop; ?>;padding-left: <?php echo $content_pleft; ?>;padding-right: <?php echo $content_pright; ?>;">
				<?php echo $content; ?>

				<a data-onhovercolor="<?php echo $btn_hvrclr; ?>" data-onhoverbg="<?php echo $btn_hvrbg; ?>" data-onleavebg="<?php echo $btn_bg; ?>" data-onleavecolor="<?php echo $btn_clr; ?>" href="<?php echo $btn_url; ?>" target="<?php echo $btn_next; ?>" class="mega_hvr_btn <?php echo $anim_style; ?>" style="font-size: <?php echo $btn_size; ?>; color: <?php echo $btn_clr; ?>; background: <?php echo $btn_bg; ?>; border: <?php echo $border_width; ?> solid <?php echo $border_clr; ?>; padding: <?php echo $btn_ptop; ?> <?php echo $btn_pleft; ?>;">
					<i class="<?php echo $btn_icon; ?>"></i> <?php echo $btn_text; ?>
				</a>
				<br>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php } ?>