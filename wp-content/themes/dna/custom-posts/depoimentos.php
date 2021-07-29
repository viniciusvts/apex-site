<?php
function custom_depoimento() {
	$labels = array(
		'name'                  => _x( 'Depoimentos', 'Post Type General Name', 'apextheme' ),
		'singular_name'         => _x( 'Depoimento', 'Post Type Singular Name', 'apextheme' ),
		'menu_name'             => __( 'Depoimentos', 'apextheme' ),
		'name_admin_bar'        => __( 'Depoimento', 'apextheme' ),
		'archives'              => __( 'Depoimentos Arquivados', 'apextheme' ),
		'parent_item_colon'     => __( 'Item pai:', 'apextheme' ),
		'all_items'             => __( 'Todos os Depoimentos', 'apextheme' ),
		'add_new_item'          => __( 'Adicionar novo Depoimento', 'apextheme' ),
		'add_new'               => __( 'Adicionar novo', 'apextheme' ),
		'new_item'              => __( 'Novo Depoimento', 'apextheme' ),
		'edit_item'             => __( 'Editar Depoimento', 'apextheme' ),
		'update_item'           => __( 'Atualizar Depoimento', 'apextheme' ),
		'view_item'             => __( 'Ver Depoimento', 'apextheme' ),
		'search_items'          => __( 'Buscar Depoimento', 'apextheme' ),
		'not_found'             => __( 'Nenhum cadastrado', 'apextheme' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'apextheme' ),
		'featured_image'        => __( 'Imagem destaque', 'apextheme' ),
		'set_featured_image'    => __( 'Definir imagem', 'apextheme' ),
		'remove_featured_image' => __( 'Remover imagem', 'apextheme' ),
		'use_featured_image'    => __( 'Usar imagem Depoimento', 'apextheme' ),
		'insert_into_item'      => __( 'Inserir no Depoimento', 'apextheme' ),
		'uploaded_to_this_item' => __( 'Subir para Depoimento', 'apextheme' ),
		'items_list'            => __( 'Lista de Depoimentos', 'apextheme' ),
		'items_list_navigation' => __( 'Navegar pelos Depoimentos', 'apextheme' ),
		'filter_items_list'     => __( 'Filtrar Depoimentos', 'apextheme' ),
	);
	$args = array(
		'label'                 => __( 'depoimento', 'apextheme' ),
		'description'           => __( 'Depoimentos dos clientes', 'apextheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		"show_in_rest"			=> true,
		'menu_position'         => 6,
		'menu_icon'				=> 'dashicons-admin-comments',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',		
	);
	register_post_type( 'depoimentos', $args );
}
add_action( 'init', 'custom_depoimento', 0 );