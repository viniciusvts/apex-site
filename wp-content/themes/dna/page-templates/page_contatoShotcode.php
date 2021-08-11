<?php
/*
Template Name: Contato shortcode layout
Template Post Type: page
*/
get_header();
get_template_part('template-parts/header', 'title-sub');
// se tem conteúdo na página
if(get_post()->post_content !== '') {
    get_template_part('template-parts/content', 'page');
}
get_template_part('template-parts/content', 'contato-shortcode');
if(get_field('exibe_map')) {
    get_template_part('template-parts/map', 'contato');
}
get_footer();
