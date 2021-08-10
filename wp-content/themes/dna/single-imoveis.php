<?php
get_header();
get_template_part('template-parts/header', 'imoveis-single');
get_template_part('template-parts/content', 'imoveis-single');
get_template_part('template-parts/galeria', 'imoveis-single');
get_template_part('template-parts/modal', 'img'); // spotilight
get_template_part('template-parts/modal', 'img-galeria');
get_template_part('template-parts/obra', 'imoveis-single');
get_template_part('template-parts/estab-prox', 'imoveis-single');
get_template_part('template-parts/map', 'imoveis-single');
get_template_part('template-parts/imoveis', 'slide');
get_template_part('template-parts/form', 'faleComConsultor');
get_footer();