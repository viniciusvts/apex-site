<?php
global $mkd_burst_options;
global $more;
$more = 0;


$blog_show_categories = "no";
if (isset($mkd_burst_options['blog_standard_type_show_categories'])){
	$blog_show_categories = $mkd_burst_options['blog_standard_type_show_categories'];
}

$blog_show_comments = "yes";
if (isset($mkd_burst_options['blog_standard_type_show_comments'])){
    $blog_show_comments = $mkd_burst_options['blog_standard_type_show_comments'];
}
$blog_show_author = "yes";
if (isset($mkd_burst_options['blog_standard_type_show_author'])){
    $blog_show_author = $mkd_burst_options['blog_standard_type_show_author'];
}
$blog_show_like = "yes";
if (isset($mkd_burst_options['blog_standard_type_show_like'])) {
    $blog_show_like = $mkd_burst_options['blog_standard_type_show_like'];
}
$blog_show_ql_icon_mark = "yes";
$blog_title_holder_icon_class = "";
if (isset($mkd_burst_options['blog_standard_type_show_ql_mark'])) {
    $blog_show_ql_icon_mark = $mkd_burst_options['blog_standard_type_show_ql_mark'];
}
if($blog_show_ql_icon_mark == "yes"){
	$blog_title_holder_icon_class = " with_icon_right";
}

$blog_show_date = "yes";
if (isset($mkd_burst_options['blog_standard_type_show_date'])) {
    $blog_show_date = $mkd_burst_options['blog_standard_type_show_date'];
}
$blog_show_social_share = "no";
$blog_social_share_type = "dropdown";
if(isset($mkd_burst_options['blog_standard_type_select_share_option'])){
	$blog_social_share_type = $mkd_burst_options['blog_standard_type_select_share_option'];
}
if (isset($mkd_burst_options['enable_social_share'])&& ($mkd_burst_options['enable_social_share']) =="yes"){
    if (isset($mkd_burst_options['post_types_names_post'])&& $mkd_burst_options['post_types_names_post'] =="post"){
        if (isset($mkd_burst_options['blog_standard_type_show_share'])&& $blog_social_share_type == "dropdown") {
            $blog_show_social_share = $mkd_burst_options['blog_standard_type_show_share'];
        }
    }
}

$blog_image_size = 'full';
if( isset($mkd_burst_options['blog_standard_type_image_size']) && $mkd_burst_options['blog_standard_type_image_size'] !== '') {
    $blog_image_size = $mkd_burst_options['blog_standard_type_image_size'];

}

if( $blog_image_size == 'custom'
    && isset($mkd_burst_options['blog_standard_type_image_size_height']) && $mkd_burst_options['blog_standard_type_image_size_height'] !== ''
    && isset($mkd_burst_options['blog_standard_type_image_size_width']) && $mkd_burst_options['blog_standard_type_image_size_width'] !== '') {

    $image_height = $mkd_burst_options['blog_standard_type_image_size_height'];
    $image_width = $mkd_burst_options['blog_standard_type_image_size_width'];

    $image_html = mkd_burst_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$image_width,$image_height);
}
else{
    $image_html = get_the_post_thumbnail(get_the_ID(), $blog_image_size);
}


$blog_read_more_button_classes = '';
if (isset($mkd_burst_options['blog_standard_type_read_more_button_icon']) && $mkd_burst_options['blog_standard_type_read_more_button_icon'] == 'yes'){
    $blog_read_more_button_classes .= 'with_icon';
}

$blog_ql_background_image = "no";
if(isset($mkd_burst_options['blog_standard_type_ql_background_image'])){
	$blog_ql_background_image = $mkd_burst_options['blog_standard_type_ql_background_image'];
}

$background_image_object = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID()), 'blog_image_format_link_quote');
$background_image_src = $background_image_object[0];

$_post_format = get_post_format();
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				 <div class="post_image">
					<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
					<?php if($_video_type == "youtube") { ?>
						<iframe  src="//www.youtube.com/embed/<?php echo esc_attr(get_post_meta(get_the_ID(), "video_format_link", true));  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
					<?php } elseif ($_video_type == "vimeo"){ ?>
						<iframe src="//player.vimeo.com/video/<?php echo esc_attr(get_post_meta(get_the_ID(), "video_format_link", true));  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php } elseif ($_video_type == "self"){ ?> 
						<div class="video"> 
						    <div class="mobile-video-image" style="background-image: url(<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>);"></div>
					    	<div class="video-wrap"  >
							    <video class="video" poster="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>" preload="auto">
								    <?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_webm", true));  ?>"> <?php } ?>
								    <?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_mp4", true));  ?>"> <?php } ?>
								    <?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_ogv", true));  ?>"> <?php } ?>
								    <object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>">
								    	<param name="movie" value="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>" />
									    <param name="flashvars" value="controls=true&file=<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_mp4", true));  ?>" />
									    <img src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
								    </object>
							    </video>
						    </div>
                        </div>
					<?php } ?>
				 </div>
				
				 <div class="post_date_title clearfix">
					<?php if ($blog_show_date == "yes") { ?>
                 		<?php mkd_burst_post_info(array('date' => $blog_show_date)); ?>
                 	<?php } ?>
                 	<h2>
                 	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                 	</h2>
                </div>
                 <div class="post_text">
                    <div class="post_text_inner">         
						<?php
							mkd_burst_excerpt();
							mkd_burst_read_more_button('blog_standard_type_read_more_button',$blog_read_more_button_classes);
						?>
						<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
							<div class="post_info">
								<?php if ($blog_show_date == "yes") { ?>
									<?php get_template_part('templates/blog/parts/post-info-time'); ?>
								<?php } ?>
								<?php mkd_burst_post_info(array('author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
						<?php } ?>
						<?php if(isset($mkd_burst_options['blog_standard_type_show_share']) && $mkd_burst_options['blog_standard_type_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
						}; ?>
                    </div>
                </div>
			</div>
		</article>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
					<div class="post_image">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php echo wp_kses($image_html, array(
                                'img' => array(
                                    'src' => true,
                                    'alt' => true,
                                    'width' => true,
                                    'height' => true,
                                    'draggable' => true
                                )
                            )); ?>
						</a>
					</div>
                <?php } ?>
				<div class="audio_image">
					<audio class="blog_audio" src="<?php echo esc_url(get_post_meta(get_the_ID(), "audio_link", true)) ?>" controls="controls">
						<?php esc_html_e("Your browser don't support audio player","burst"); ?>
					</audio>
				</div>
				<div class="post_date_title clearfix">
					<?php if ($blog_show_date == "yes") { ?>
                 		<?php mkd_burst_post_info(array('date' => $blog_show_date)); ?>
                 	<?php } ?>
                 	<h2>
                 	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                 	</h2>
                </div>
                <div class="post_text">
                    <div class="post_text_inner">
						<?php
							mkd_burst_excerpt();
							mkd_burst_read_more_button('blog_standard_type_read_more_button',$blog_read_more_button_classes);
						?>
						<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
							<div class="post_info">
								<?php if ($blog_show_date == "yes") { ?>
									<?php get_template_part('templates/blog/parts/post-info-time'); ?>
								<?php } ?>
								<?php mkd_burst_post_info(array('author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
						<?php } ?>
						<?php if(isset($mkd_burst_options['blog_standard_type_show_share']) && $mkd_burst_options['blog_standard_type_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
						}; ?>		
                    </div>
                </div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
            <div class="post_content_holder">
                <div class="post_text_columns">
					<div class="post_text  <?php if($blog_ql_background_image == "yes") {if ( has_post_thumbnail() ) { ?> link_image" style="background:url(<?php echo esc_url($background_image_src); ?>); <?php } } ?>">
						<div class="post_text_inner">
							<?php if ($blog_show_ql_icon_mark == "yes") { ?>
								<div class="post_info_link_mark">
									<span aria-hidden="true" class="icon_link"></span>
								</div>
							<?php } ?>
							<div class="post_title link">
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>								
							</div>							
							<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
								<div class="post_info">
									<?php if ($blog_show_date == "yes") { ?>
										<?php get_template_part('templates/blog/parts/post-info-time'); ?>
									<?php } ?>
									<?php mkd_burst_post_info(array('author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
								</div>
							<?php } ?>
							<?php if(isset($mkd_burst_options['blog_standard_type_show_share']) && $mkd_burst_options['blog_standard_type_show_share'] == "yes" && $blog_social_share_type == "list") {
								echo do_shortcode('[no_social_share_list]'); // XSS OK
							}; ?>
						</div>
					</div>
                </div>
            </div>
        </article>
<?php
		break;
		case "gallery":
?>
		<article id="post-<?php the_ID(); ?>">
			
			<div class="post_content_holder">
				<div class="post_image">
					<?php get_template_part('templates/blog/parts/post-format-gallery-slider');	  ?>
				</div>
				
				<div class="post_date_title clearfix">
					<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="1920" height="173" src="http://rupptura.com.br/apex/wp-content/uploads/2019/01/bg_padronagem-1-1.png" class="vc_single_image-img attachment-full" alt="" srcset="http://rupptura.com.br/apex/wp-content/uploads/2019/01/bg_padronagem-1-1.png 1920w, http://rupptura.com.br/apex/wp-content/uploads/2019/01/bg_padronagem-1-1-300x27.png 300w, http://rupptura.com.br/apex/wp-content/uploads/2019/01/bg_padronagem-1-1-768x69.png 768w, http://rupptura.com.br/apex/wp-content/uploads/2019/01/bg_padronagem-1-1-1024x92.png 1024w, http://rupptura.com.br/apex/wp-content/uploads/2019/01/bg_padronagem-1-1-700x63.png 700w" sizes="(max-width: 1920px) 100vw, 1920px" /></div>
					<?php if ($blog_show_date == "yes") { ?>
                 		<?php mkd_burst_post_info(array('date' => $blog_show_date)); ?>
                 	<?php } ?>
                 	<h2>
                 	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                 	</h2>
                </div>
                <div class="post_text">
                    <div class="post_text_inner">
						<?php
							mkd_burst_excerpt();
							mkd_burst_read_more_button('blog_standard_type_read_more_button',$blog_read_more_button_classes);
						?>
						<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
							<div class="post_info">
								<?php if ($blog_show_date == "yes") { ?>
									<?php get_template_part('templates/blog/parts/post-info-time'); ?>
								<?php } ?>
								<?php mkd_burst_post_info(array('author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
						<?php } ?>
						<?php if(isset($mkd_burst_options['blog_standard_type_show_share']) && $mkd_burst_options['blog_standard_type_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
						}; ?>
                    </div>
                </div>
            </div>
		</article>
<?php
		break;
		case "quote":
?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post_content_holder">
                    <div class="post_text_columns">
                         <div class="post_text  <?php if($blog_ql_background_image == "yes") {if ( has_post_thumbnail() ) { ?> quote_image" style="background:url(<?php echo esc_url($background_image_src); ?>); <?php } } ?>">
                            <div class="post_text_inner clearfix">
								<?php if ($blog_show_ql_icon_mark == "yes") { ?>
									<div class="post_info_quote_mark">
										<span aria-hidden="true" class="icon_quotations"></span>
									</div>
								<?php } ?>
								<div class="post_title quote">
									<h3>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), "quote_format", true)); ?></a>
									</h3>								
									<span class="quote_author">&mdash; <?php the_title(); ?></span>
								</div>
                                <?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
									<div class="post_info">
										<?php if ($blog_show_date == "yes") { ?>
											<?php get_template_part('templates/blog/parts/post-info-time'); ?>
										<?php } ?>
										<?php mkd_burst_post_info(array('author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
									</div>
								<?php } ?>
								<?php if(isset($mkd_burst_options['blog_standard_type_show_share']) && $mkd_burst_options['blog_standard_type_show_share'] == "yes" && $blog_social_share_type == "list") {
									echo do_shortcode('[no_social_share_list]'); // XSS OK
								}; ?>   
                            </div>
                        </div>
                    </div>
                </div>
            </article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                        <div class="post_image">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php echo wp_kses($image_html, array(
                                    'img' => array(
                                        'src' => true,
                                        'alt' => true,
                                        'width' => true,
                                        'height' => true,
                                        'draggable' => true
                                    )
                                )); ?>
                            </a>
                        </div>
				<?php } ?>
				<div class="post_date_title clearfix">
					<?php if ($blog_show_date == "yes") { ?>
                 		<?php mkd_burst_post_info(array('date' => $blog_show_date)); ?>
                 	<?php } ?>
                 	<h2>
                 	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                 	</h2>
                </div>
				<div class="post_text">
					<div class="post_text_inner">
                            <?php
                            	mkd_burst_excerpt();
                            	mkd_burst_read_more_button('blog_standard_type_read_more_button',$blog_read_more_button_classes);
                            ?>
							<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
								<div class="post_info clearfix">
									<?php if ($blog_show_date == "yes") { ?>
										<?php get_template_part('templates/blog/parts/post-info-time'); ?>
									<?php } ?>
									<?php mkd_burst_post_info(array('author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
								</div>
							<?php } ?>	
							<?php if(isset($mkd_burst_options['blog_standard_type_show_share']) && $mkd_burst_options['blog_standard_type_show_share'] == "yes" && $blog_social_share_type == "list") {
								echo do_shortcode('[no_social_share_list]'); // XSS OK
							}; ?>		
                    </div>
				</div>
			</div>
		</article>
<?php
}
?>

