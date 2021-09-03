<?php
/**
 * Adiciona os scripts e folha de estilos ao site
 *
 * @package SSW
 * @subpackage loadSources
 * @author Vinicius de Santana
 */
function add_css_and_js() {
  //remove jquery padrão do wp
  wp_deregister_script( 'jquery' );
  // renmove os dashicons
  if (!current_user_can( 'update_core' )){
    wp_deregister_style('dashicons');
  }
  
  //scripts: wp_enqueue_script( $nome, $origem, $dependencia, $versao, $rodape );

  $jsInternalPath = get_template_directory() . "/"."assets/js/";
  $jsUriPath = get_template_directory_uri() . "/"."assets/js/";

  $archive = 'script.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);

  $archive = 'jquery.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('script.js'), $fileVersion, true);

  $archive = 'owl-carousel.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js'), $fileVersion, true);

  $archive = 'carousels.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js'), $fileVersion, true);
  
  //###############################################################################################
  //styles: wp_enqueue_style( $nome, $origem, $dependencia, $versao, $media );

  $media = 'all';
  $cssInternalPath = get_template_directory() . "/"."assets/css/";
  $cssUriPath = get_template_directory_uri() . "/"."assets/css/";

  $archive = 'style.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );
}

/**
 * Adiciona os scripts e folha de estilos ao site, modo de debug
 *
 * @package SSW
 * @subpackage loadSources
 * @author Vinicius de Santana
 */
function add_css_and_js_debug() {
  //scripts: wp_enqueue_script( $nome, $origem, $dependencia, $versao, $rodape );

  $jsInternalPath = get_template_directory() . "/"."assets/js/";
  $jsUriPath = get_template_directory_uri() . "/"."assets/js/";

  $archive = 'script.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);
  
  //###############################################################################################
  //styles: wp_enqueue_style( $nome, $origem, $dependencia, $versao, $media );

  $media = 'all';
  $cssInternalPath = get_template_directory() . "/"."assets/css/";
  $cssUriPath = get_template_directory_uri() . "/"."assets/css/";

  $archive = 'style.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );
  // Poppins fonte
  wp_enqueue_style( 'poppinFont',
    'https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap',
    array()
  );
}
//do it if debug
if(WP_DEBUG){
  add_action( 'wp_enqueue_scripts', 'add_css_and_js_debug' );
} else{
  add_action( 'wp_enqueue_scripts', 'add_css_and_js' );
}

//examples
/*
if(is_page('contato')) {
  wp_enqueue_script('form-contato', get_template_directory_uri() . '/js/formulario.js', array(), '1.2', true);
}
*/