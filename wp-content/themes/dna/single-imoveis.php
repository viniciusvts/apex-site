<?php
get_header();
get_template_part('template-parts/header', 'imoveis-single');
get_template_part('template-parts/content', 'imoveis-single');
// verifica se o empreendimento tem materiais para baixar
if(is_array(get_field('materiais'))){
?>
<?php
    get_template_part('template-parts/modal', 'baixar-materiais');

}
get_template_part('template-parts/galeria', 'imoveis-single');
get_template_part('template-parts/modal', 'img'); // spotilight
get_template_part('template-parts/modal', 'img-galeria');
get_template_part('template-parts/obra', 'imoveis-single');
get_template_part('template-parts/estab-prox', 'imoveis-single');
get_template_part('template-parts/map', 'imoveis-single');
get_template_part('template-parts/imoveis', 'slide');
get_template_part('template-parts/form', 'faleComConsultor');
get_footer();