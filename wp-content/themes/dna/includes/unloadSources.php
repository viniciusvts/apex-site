<?php
/**
 * Remove os scripts e folha de estilos ao site
 *
 * @package SSW
 * @subpackage unloadSources
 * @author Vinicius de Santana
 */
function remove_css_and_js() {
  // scripts
  wp_deregister_script('wp-embed');
  // styles
  wp_deregister_style('wp-block-library');
}
//do it
add_action( 'wp_enqueue_scripts', 'remove_css_and_js' );
// remove emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles'); // remove css inline

// remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
// remove_action( 'admin_print_styles', 'print_emoji_styles' );