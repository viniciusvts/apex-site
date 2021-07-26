<?php
// Adiciono um view ao post
// ssw_addViewToPost(get_the_ID());
get_header();
get_template_part('template-parts/header', 'blog-single');
get_template_part('template-parts/content', 'blog-single');
get_template_part('template-parts/relacionados', 'blog-single');
get_footer();