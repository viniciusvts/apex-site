<?php
// todos os menus
register_nav_menus (
  array (
  	'main' => 'Menu Principal SSW',
    'footer-menu' => 'Menu Footer',
    // 'footer-links' => 'Links Úteis Footer',
  )
);

/**
 * Registra widgets áreas
 * @author Vinicius de Santana
 */
function dna_register_sidebar(){
  $args = array(
    'name'          => 'Sidebar Blog',
    'id'            => 'sidebar_area',
    'description'   => 'Área para inserir widgets na sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2><hr>',
  );

  register_sidebar($args);
}
    
add_action( 'widgets_init', 'dna_register_sidebar' );