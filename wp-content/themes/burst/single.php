<?php

$id = get_the_ID();

$chosen_sidebar = get_post_meta(get_the_ID(), "mkd_show-sidebar", true);
$default_array = array('default', '');

if(!in_array($chosen_sidebar, $default_array)){
	$sidebar = get_post_meta(get_the_ID(), "mkd_show-sidebar", true);
}else{
	$sidebar = $mkd_burst_options['blog_single_sidebar'];
}

$blog_single_show_comments = "";
if (isset($mkd_burst_options['blog_single_show_comments']))
	$blog_single_show_comments = $mkd_burst_options['blog_single_show_comments'];

if(get_post_meta($id, "mkd_page_background_color", true) != ""){
	$background_color = 'background-color: '.esc_attr(get_post_meta($id, "mkd_page_background_color", true));
}else{
	$background_color = "";
}
$blog_single_loop = "blog_standard_type";

$content_style = "";
if(get_post_meta($id, "mkd_content-top-padding", true) != ""){
	if(get_post_meta($id, "mkd_content-top-padding-mobile", true) == 'yes'){
		$content_style = "padding-top:".esc_attr(get_post_meta($id, "mkd_content-top-padding", true))."px !important";
	}else{
		$content_style = "padding-top:".esc_attr(get_post_meta($id, "mkd_content-top-padding", true))."px";
	}
}


$gallery_position = "above_post_content";
if(get_post_meta(get_the_ID(), "gallery_position", true) !== ""){
	$gallery_position = get_post_meta(get_the_ID(), "gallery_position", true);
}

?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		<script>
			<?php if(get_post_meta($id, "mkd_page_scroll_amount_for_sticky", true)) { ?>
			page_scroll_amount_for_sticky = <?php echo esc_attr(get_post_meta($id, "mkd_page_scroll_amount_for_sticky", true)); ?>;
			<?php }else{ ?>
			page_scroll_amount_for_sticky = undefined
			<?php } ?>
		</script>

		<?php get_template_part( 'title' ); ?>
		<?php get_template_part('slider'); ?>

		<div class="container"<?php mkd_burst_inline_style($background_color); ?>>
		<?php if($mkd_burst_options['overlapping_content'] == 'yes') {?>
			<div class="overlapping_content"><div class="overlapping_content_inner">
		<?php } ?>
			<div class="container_inner default_template_holder" <?php mkd_burst_inline_style($content_style); ?>>

			<?php if(($sidebar == "default")||($sidebar == "")) : ?>
				<div class="blog_holder blog_single <?php echo esc_attr($blog_single_loop )?>">
				<?php
					get_template_part('templates/blog/blog_single', 'loop');
				?>
				<?php
					if($blog_single_show_comments == "yes"){
						comments_template('', true);
					}else{
						echo "<br/><br/>";
					}
				?>

			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
				<?php if($gallery_position == "above_post_content_and_sidebar"){
					get_template_part('templates/blog/parts/post-format-gallery-slider');
				}?>	
				<?php if($sidebar == "1") : ?>
					<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
					<div class="column1 content_left_from_sidebar">
				<?php elseif($sidebar == "2") : ?>
					<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
						<div class="column1 content_left_from_sidebar">
				<?php endif; ?>

							<div class="column_inner">
								<div class="blog_holder blog_single <?php echo esc_attr($blog_single_loop )?>">
									<?php
										get_template_part('templates/blog/blog_single', 'loop');
									?>
								</div>

								<?php
									if($blog_single_show_comments == "yes"){
										comments_template('', true);
									}else{
										echo "<br/><br/>";
									}
								?>
							</div>
						</div>
						<div class="column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
				<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
					<?php if($gallery_position == "above_post_content_and_sidebar"){
						get_template_part('templates/blog/parts/post-format-gallery-slider');
					}?>	
					<?php if($sidebar == "3") : ?>
						<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
						<div class="column1">
							<?php get_sidebar(); ?>
						</div>
						<div class="column2 content_right_from_sidebar">
					<?php elseif($sidebar == "4") : ?>
						<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
							<div class="column1">
								<?php get_sidebar(); ?>
							</div>
							<div class="column2 content_right_from_sidebar">
					<?php endif; ?>

								<div class="column_inner">
									<div class="blog_holder blog_single <?php echo esc_attr($blog_single_loop); ?>">
										<?php
											get_template_part('templates/blog/blog_single', 'loop');
										?>
									</div>
									<?php
										if($blog_single_show_comments == "yes"){
											comments_template('', true);
										}else{
											echo "<br/><br/>";
										}
									?>
								</div>
							</div>

						</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if($mkd_burst_options['overlapping_content'] == 'yes') {?>
			</div></div>
		<?php } ?>
	</div>
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	