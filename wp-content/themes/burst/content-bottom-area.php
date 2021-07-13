<?php
global $mkd_burst_options;

$page_id							= mkd_burst_get_page_id();
$content_bottom_area 				= "yes";
$content_bottom_area_sidebar 		= "";
$content_bottom_area_in_grid 		= true;
$content_bottom_background_color 	= '';

//is content bottom area enabled for current page?
if(get_post_meta($page_id, "mkd_enable_content_bottom_area", true) != ""){
	$content_bottom_area = get_post_meta($page_id, "mkd_enable_content_bottom_area", true);
} elseif(isset($mkd_burst_options['enable_content_bottom_area'])) {
	//content bottom area is turned on in theme options
	$content_bottom_area = $mkd_burst_options['enable_content_bottom_area'];
}

//is content bottom area enabled?
if($content_bottom_area == 'yes') {
	//is sidebar chosen for content bottom area for current page?
	if(get_post_meta($page_id, 'mkd_choose_content_bottom_sidebar', true) != ""){
		$content_bottom_area_sidebar = get_post_meta($page_id, 'mkd_choose_content_bottom_sidebar', true);
	} elseif(isset($mkd_burst_options['content_bottom_sidebar_custom_display'])) {
		//sidebar is chosen for content bottom area in theme options
		$content_bottom_area_sidebar = $mkd_burst_options['content_bottom_sidebar_custom_display'];
	}

	//take content bottom area in grid option for current page if set or from theme options otherwise
	if(get_post_meta($page_id, 'mkd_content_bottom_sidebar_in_grid', true) != ""){
		$content_bottom_area_in_grid = get_post_meta($page_id, 'mkd_content_bottom_sidebar_in_grid', true);
	} elseif(isset($mkd_burst_options['content_bottom_in_grid'])) {
		$content_bottom_area_in_grid = $mkd_burst_options['content_bottom_in_grid'];
	}

	//is background color for content bottom area set for current page
	if(get_post_meta($page_id, "mkd_content_bottom_background_color", true) != ""){
		$content_bottom_background_color = 'background-color: '.esc_attr(get_post_meta($page_id, "mkd_content_bottom_background_color", true));
	}
}
?>
<?php if(($content_bottom_area == "yes") && (is_active_sidebar($content_bottom_area_sidebar))) { ?>

	<div class="content_bottom" <?php mkd_burst_inline_style($content_bottom_background_color); ?>>
		<?php if($content_bottom_area_in_grid == 'yes'){ ?>
		<div class="container">
			<div class="container_inner clearfix">
				<?php } ?>
				<?php dynamic_sidebar($content_bottom_area_sidebar); ?>
				<?php if($content_bottom_area_in_grid == 'yes'){ ?>
			</div>
		</div>
	<?php } ?>
	</div>
<?php } ?>