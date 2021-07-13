<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;
global $mkd_burst_options;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}

$prev_text = '<i class="fa fa-angle-left"></i>';
if (isset($mkd_burst_options['pagination_arrows_type']) && $mkd_burst_options['pagination_arrows_type'] != '') {
	$icon_navigation_class = $mkd_burst_options['pagination_arrows_type'];
	$direction_nav_classes = mkd_burst_horizontal_slider_icon_classes($icon_navigation_class);
	$prev_text = '<span class="pagination_arrow ' . $direction_nav_classes['left_icon_class']. '"></span>';
}

$next_text = '<i class="fa fa-angle-right"></i>';
if (isset($mkd_burst_options['pagination_arrows_type']) && $mkd_burst_options['pagination_arrows_type'] != '') {
	$icon_navigation_class = $mkd_burst_options['pagination_arrows_type'];
	$direction_nav_classes = mkd_burst_horizontal_slider_icon_classes($icon_navigation_class);
	$next_text = '<span class="pagination_arrow ' . $direction_nav_classes['right_icon_class']. '"></span>';
}

$pagination_classes = '';
if( isset($mkd_burst_options['pagination_type']) && $mkd_burst_options['pagination_type'] == 'standard' ) {
	if( isset($mkd_burst_options['pagination_standard_position']) && $mkd_burst_options['pagination_standard_position'] !== '' ) {
		$pagination_classes .= "standard_".esc_attr($mkd_burst_options['pagination_standard_position']);
	}
}
elseif ( isset($mkd_burst_options['pagination_type']) && $mkd_burst_options['pagination_type'] == 'arrows_on_sides' ) {
	$pagination_classes .= "arrows_on_sides";
}
?>

<nav class="woocommerce-pagination  <?php echo esc_attr($pagination_classes);?>">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'add_args'     => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => $prev_text,
			'next_text'    => $next_text,
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );
	?>
</nav>