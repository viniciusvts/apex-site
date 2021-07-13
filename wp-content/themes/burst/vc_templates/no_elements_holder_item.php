<?php

$args = array(
	"background_color" => "",
	"background_image" => "",
	"item_padding" => "",
	"aligment" => "",
	"vertical_alignment" => "",
	"animation_name" => "",
	"animation_delay" => "",
	"advanced_animations" => "no",
	"start_position" => "",
	"end_position" => "",
	"start_animation_style" => "",
	"end_animation_style" => "",
	"item_padding_1300_1600" => "",
	"item_padding_1024_1300" => "",
	"item_padding_768_1024" => "",
	"item_padding_600_768" => "",
	"item_padding_480_600" => "",
	"item_padding_480" => ""
);

$html = "";
$mkd_elements_item_style = "";
$mkd_elements_item_inner_style = "";


extract(shortcode_atts($args, $atts));

$background_color = esc_attr($background_color);
$background_image = esc_attr($background_image);
$item_padding = esc_attr($item_padding);
$animation_delay = esc_attr($animation_delay);
$start_position = esc_attr($start_position);
$end_position = esc_attr($end_position);
$start_animation_style = esc_attr($start_animation_style);
$end_animation_style = esc_attr($end_animation_style);
$item_padding_1300_1600 = esc_attr($item_padding_1300_1600);
$item_padding_1024_1300 = esc_attr($item_padding_1024_1300);
$item_padding_768_1024 = esc_attr($item_padding_768_1024);
$item_padding_600_768 = esc_attr($item_padding_600_768);
$item_padding_480_600 = esc_attr($item_padding_480_600);
$item_padding_480 = esc_attr($item_padding_480);


$vertical_alignment_class = "vertical_alignment_middle";
if($vertical_alignment !== ""){
	$vertical_alignment_class = "vertical_alignment_" . $vertical_alignment;
}

if($background_color != "" || $animation_delay != "" || $background_image != ""){
	$mkd_elements_item_style .= " style='";
}

if($background_color != ""){
	$mkd_elements_item_style .= "background-color:" . $background_color . ";";
}

if($background_image != ""){
	if(is_numeric($background_image)) {
		$background_image_src = wp_get_attachment_url( $background_image );
	} else {
		$background_image_src = $background_image;
	}
	$mkd_elements_item_style .= "background-image: url(".$background_image_src.");";
}

if($animation_delay != ""){
	$mkd_elements_item_style .= 'transition-delay:' . $animation_delay .'ms;'. '-webkit-transition-delay:' . $animation_delay .'ms;' ;
}

if($background_color != "" || $animation_delay != "" || $background_image != ""){
	$mkd_elements_item_style .= "'";
}

$alignment_class = "";
if($aligment != ""){
	$mkd_elements_item_inner_style .= "text-align:" . $aligment . ";";
	$alignment_class = "horizontal_align_".$aligment;
}

if($item_padding != ""){
	$mkd_elements_item_inner_style .= "padding:" . $item_padding . ";";
}

$html .= "<div class='mkd_elements_item $vertical_alignment_class $alignment_class $animation_name' data-animation='$advanced_animations'";
if ($advanced_animations == 'yes') {
	$html .= " data-".$start_position."='$start_animation_style' data-".$end_position."='$end_animation_style'";
}
$html .= $mkd_elements_item_style . "><div class='mkd_elements_item_inner'>";

$random_custom_class = "mkd_elements_inner_" . rand();

$html .= "<div class='mkd_elements_item_content " . $random_custom_class . "' style='". $mkd_elements_item_inner_style ."'>";
if($item_padding_1300_1600 !== "" || $item_padding_1024_1300 !== "" || $item_padding_768_1024 !== "" || $item_padding_600_768 !== "" || $item_padding_480_600 !== "" || $item_padding_480 !== ""){
	$html .= '<style type="text/css" data-type="mkd_elements-custom-padding" scoped>';

	if($item_padding_1300_1600){
		$html .= "@media only screen and (min-width: 1300px) and (max-width: 1600px) {";
		$html .= ".mkd_elements_holder .mkd_elements_item_content.".$random_custom_class."{";
		$html .= "padding:".$item_padding_1300_1600 . "!important";
		$html .= "}";
		$html .= "}";
	}
	if($item_padding_1024_1300){
		$html .= "@media only screen and (min-width: 1000px) and (max-width: 1300px) {";
		$html .= ".mkd_elements_holder .mkd_elements_item_content.".$random_custom_class."{";
		$html .= "padding:".$item_padding_1024_1300 . "!important";
		$html .= "}";
		$html .= "}";
	}
	if($item_padding_768_1024){
		$html .= "@media only screen and (min-width: 768px) and (max-width: 1000px) {";
		$html .= ".mkd_elements_holder .mkd_elements_item_content.".$random_custom_class."{";
		$html .= "padding:".$item_padding_768_1024 . "!important";
		$html .= "}";
		$html .= "}";
	}
	if($item_padding_600_768){
		$html .= "@media only screen and (min-width: 600px) and (max-width: 768px) {";
		$html .= ".mkd_elements_holder .mkd_elements_item_content.".$random_custom_class."{";
		$html .= "padding:".$item_padding_600_768 . "!important";
		$html .= "}";
		$html .= "}";
	}
	if($item_padding_480_600){
		$html .= "@media only screen and (min-width: 480px) and (max-width: 600px) {";
		$html .= ".mkd_elements_holder .mkd_elements_item_content.".$random_custom_class."{";
		$html .= "padding:".$item_padding_480_600 . "!important";
		$html .= "}";
		$html .= "}";
	}
	if($item_padding_480){
		$html .= "@media only screen and (max-width: 480px) {";
		$html .= ".mkd_elements_holder .mkd_elements_item_content.".$random_custom_class."{";
		$html .= "padding:".$item_padding_480 . "!important";
		$html .= "}";
		$html .= "}";
	}
	$html .= "</style>";
}
$html .= do_shortcode($content);
$html .= '</div></div></div>';
print $html;

