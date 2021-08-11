<?php
/*
Template Name: Perguntas e respostas layout
Template Post Type: page
*/
get_header();
get_template_part('template-parts/header', 'title-sub');
// se tem conteúdo na página
if(get_post()->post_content !== '') {
get_template_part('template-parts/content', 'page');
}
get_template_part('template-parts/content', 'faq');
get_template_part('template-parts/form', 'faleComConsultor');
get_footer();
