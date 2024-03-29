<?php
function custom_imovel() {
	$labels = array(
		'name'                  => _x( 'Imóveis', 'Post Type General Name', 'apextheme' ),
		'singular_name'         => _x( 'Imóvel', 'Post Type Singular Name', 'apextheme' ),
		'menu_name'             => __( 'Imóveis', 'apextheme' ),
		'name_admin_bar'        => __( 'Imóvel', 'apextheme' ),
		'archives'              => __( 'Imóvels Arquivados', 'apextheme' ),
		'parent_item_colon'     => __( 'Item pai:', 'apextheme' ),
		'all_items'             => __( 'Todos os Imóveis', 'apextheme' ),
		'add_new_item'          => __( 'Adicionar novo Imóvel', 'apextheme' ),
		'add_new'               => __( 'Adicionar novo', 'apextheme' ),
		'new_item'              => __( 'Novo Imóvel', 'apextheme' ),
		'edit_item'             => __( 'Editar Imóvel', 'apextheme' ),
		'update_item'           => __( 'Atualizar Imóvel', 'apextheme' ),
		'view_item'             => __( 'Ver Imóvel', 'apextheme' ),
		'search_items'          => __( 'Buscar Imóvel', 'apextheme' ),
		'not_found'             => __( 'Nenhum cadastrado', 'apextheme' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'apextheme' ),
		'featured_image'        => __( 'Imagem destaque', 'apextheme' ),
		'set_featured_image'    => __( 'Definir imagem', 'apextheme' ),
		'remove_featured_image' => __( 'Remover imagem', 'apextheme' ),
		'use_featured_image'    => __( 'Usar imagem Imóvel', 'apextheme' ),
		'insert_into_item'      => __( 'Inserir no Imóvel', 'apextheme' ),
		'uploaded_to_this_item' => __( 'Subir para Imóvel', 'apextheme' ),
		'items_list'            => __( 'Lista de Imóvels', 'apextheme' ),
		'items_list_navigation' => __( 'Navegar pelos Imóvels', 'apextheme' ),
		'filter_items_list'     => __( 'Filtrar Imóvels', 'apextheme' ),
	);
	$args = array(
		'label'                 => __( 'imovel', 'apextheme' ),
		'description'           => __( 'Cadastrar Imóveis', 'apextheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'editor', ),
		'taxonomies'            => array( 'categoria_imovel' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		"show_in_rest"			=> true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-admin-multisite',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'				=> array( 'slug' => 'empreendimentos' ),		
	);
	register_post_type( 'imoveis', $args );
}
add_action( 'init', 'custom_imovel', 0 );


// Register Custom Post Type Categoria
function categoria_imovel_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Categorias do Imóvel', 'Taxonomy General Name', 'apextheme' ),
		'singular_name'              => _x( 'Categoria do Imóvel', 'Taxonomy Singular Name', 'apextheme' ),
		'menu_name'                  => __( 'Categorias', 'apextheme' ),
		'all_items'                  => __( 'Todas as categorias', 'apextheme' ),
		'parent_item'                => __( 'Categoria Mãe', 'apextheme' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'apextheme' ),
		'new_item_name'              => __( 'Nova Categoria de Imóvel', 'apextheme' ),
		'add_new_item'               => __( 'Adicionar Categoria de Imóvel', 'apextheme' ),
		'edit_item'                  => __( 'Editar Categoria de Imóvel', 'apextheme' ),
		'update_item'                => __( 'Atualizar Categoria de Imóvel', 'apextheme' ),
		'view_item'                  => __( 'Ver Categoria de Imóvel', 'apextheme' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'apextheme' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de Imóvel', 'apextheme' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'apextheme' ),
		'popular_items'              => __( 'Categorias populares', 'apextheme' ),
		'search_items'               => __( 'Buscar Categoria de Imóvel', 'apextheme' ),
		'not_found'                  => __( 'Nada encontrado', 'apextheme' ),
		'no_terms'                   => __( 'Nenhuma Categoria de Imóvel', 'apextheme' ),
		'items_list'                 => __( 'Lista de categorias', 'apextheme' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de Imóvel', 'apextheme' ),
	);
	$rewrite = array(
		'slug'                       => 'categoria-imovel',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		"show_in_rest"				 => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'categoria-imovel', array( 'imoveis' ), $args );
}
add_action( 'init', 'categoria_imovel_taxonomy', 0 );

// Register Custom Post Type Categoria
function cidade_imovel_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Cidades do Imóvel', 'Taxonomy General Name', 'apextheme' ),
		'singular_name'              => _x( 'Cidade do Imóvel', 'Taxonomy Singular Name', 'apextheme' ),
		'menu_name'                  => __( 'Cidades', 'apextheme' ),
		'all_items'                  => __( 'Todas as Cidades', 'apextheme' ),
		'parent_item'                => __( 'Cidade Mãe', 'apextheme' ),
		'parent_item_colon'          => __( 'Cidade mãe:', 'apextheme' ),
		'new_item_name'              => __( 'Nova Cidade de Imóvel', 'apextheme' ),
		'add_new_item'               => __( 'Adicionar Cidade de Imóvel', 'apextheme' ),
		'edit_item'                  => __( 'Editar Cidade de Imóvel', 'apextheme' ),
		'update_item'                => __( 'Atualizar Cidade de Imóvel', 'apextheme' ),
		'view_item'                  => __( 'Ver Cidade de Imóvel', 'apextheme' ),
		'separate_items_with_commas' => __( 'Separar Cidades por vírgula', 'apextheme' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Cidade de Imóvel', 'apextheme' ),
		'choose_from_most_used'      => __( 'Mostrar Cidades mais usadas', 'apextheme' ),
		'popular_items'              => __( 'Cidades populares', 'apextheme' ),
		'search_items'               => __( 'Buscar Cidade de Imóvel', 'apextheme' ),
		'not_found'                  => __( 'Nada encontrado', 'apextheme' ),
		'no_terms'                   => __( 'Nenhuma Cidade de Imóvel', 'apextheme' ),
		'items_list'                 => __( 'Lista de Cidades', 'apextheme' ),
		'items_list_navigation'      => __( 'Navegar por Cidade de Imóvel', 'apextheme' ),
	);
	$rewrite = array(
		'slug'                       => 'cidade-imovel',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		"show_in_rest"				 => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'cidade-imovel', array( 'imoveis' ), $args );
}
add_action( 'init', 'cidade_imovel_taxonomy', 0 );