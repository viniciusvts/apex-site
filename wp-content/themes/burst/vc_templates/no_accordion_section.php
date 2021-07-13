<?php
$output = $title = $icon = $title_color = $title_hover_color = $mark_icon_color = $mark_icon_color_hover = $background_color = $background_hover_color = $border_color = $border_hover_color = $el_id = '';

extract(shortcode_atts(array(
	'title'						=> esc_html__("Accordion Title", "burst"),
	'title_color'				=> "",
	'title_hover_color'			=> "",
	'mark_icon_color'			=> "",
	'mark_icon_color_hover'		=> "",	
	'background_color'			=> "",
	'background_hover_color'	=> "",
	'border_color'				=> "",
	'border_hover_color'		=> "",
    'title_tag'					=> 'h4',
    'content_color'				=> "",
    'content_bckg_color'		=> "",
	'el_id' => ''
), $atts));

$title = esc_html($title);
$title_color = esc_attr($title_color);
$title_tag = esc_attr($title_tag);
$mark_icon_color = esc_html($mark_icon_color);
$mark_icon_color_hover = esc_attr($mark_icon_color_hover);
$title_hover_color = esc_attr($title_hover_color);
$background_color = esc_attr($background_color);
$background_hover_color = esc_attr($background_hover_color);
$border_color = esc_attr($border_color);
$border_hover_color = esc_attr($border_hover_color);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion_section group', $this->settings['base']);
	$heading_styles = '';
	$data_attr = '';
	$content_style = '';
	$icon_style = '';
	
	if($title_color != "") {
	   $data_attr .= " data-title-color='" . $title_color . "'";	
       $heading_styles .= "color: ".$title_color.";";
    }  
	
	if($title_hover_color != "") {
       $data_attr .= " data-title-hover-color='" . $title_hover_color . "'";
	}
	
	if($title_tag == ""){
    	$title_tag = "h4";
    }
	 	
	if($mark_icon_color != "") {		
		$data_attr .= " data-mark-icon-color='" . $mark_icon_color . "'";
		$icon_style .= "color: ".$mark_icon_color.";";
    }  
	
	if($mark_icon_color_hover != "") {
       $data_attr .= " data-mark-icon-hover-color='" . $mark_icon_color_hover . "'";
    }
	
	if($background_color != "") {
        $heading_styles .= " background-color: ".$background_color.";";
		$data_attr .= " data-background-color='" . $background_color . "'";
    }
	
	if($background_hover_color != "") {
       $data_attr .= " data-background-hover-color='" . $background_hover_color . "'";
    }
	
	if($border_color != "") {
        $heading_styles .= " border-color: ".$border_color.";";
		$data_attr .= " data-border-color='" . $border_color . "'";
		$content_style .= " border-color: ".$border_color.";";
    }
	
	if($border_hover_color != "") {
       $data_attr .= " data-border-hover-color='" . $border_hover_color . "'";
    }

	if($content_color !== ""){
		$content_style .= "color: ".$content_color.";";
	}

	if($content_bckg_color !== ""){
		$content_style .= "background-color: ".$content_bckg_color.";";
	}

    $output .= "\n\t\t\t\t" . '<'.$title_tag.' class="clearfix title-holder" style="'.$heading_styles.'" '. $data_attr .'>';

	$output .= '<span class="accordion_mark left_mark"><span class="accordion_mark_icon" '.mkd_burst_get_inline_style($icon_style).'><span class="icon_plus"></span><span class="icon_minus-06"></span></span></span>';
	$output .= '<span class="tab-title"><span class="tab-title-inner">'.$title.'</span></span>';

	$output .= '</'.$title_tag.'>';
    $output .= "\n\t\t\t\t" . '<div ' . ( isset( $el_id ) && ! empty( $el_id ) ? "id='" . esc_attr( $el_id ) . "'" : "" ) . ' class="accordion_content">';
		$output .= "\n\t\t\t" . '<div class="accordion_content_inner" '.mkd_burst_get_inline_style($content_style).'>';
			$output .= ($content=='' || $content==' ') ? esc_html__("Empty section. Edit page to add content here.", "burst") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
			$output .= "\n\t\t\t" . '</div>';
		 $output .= "\n\t\t\t\t" . '</div>' . $this->endBlockComment('.wpb_accordion_section') . "\n";

print $output;