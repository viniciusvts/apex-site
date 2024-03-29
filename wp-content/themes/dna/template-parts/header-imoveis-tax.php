<!-- Atenção: layout utilizando _imoveis-slide.scss -->
<?php
$category = get_queried_object();
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$imoveis = new WP_Query(array(
    'post_type' => 'imoveis',
    'tax_query' => array(
        array (
            'taxonomy' => $category->taxonomy,
            'field' => 'slug',
            'terms' => $category->slug,
            'paged' => $paged,
        )
    ),
));
?>
<header class="imoveis-slide headerImoveis">
    <div id="all">
        <div class="col">
            <!-- carrossel imoveis slide -->
            <div id="carouselHeaderImoveis" class="owl-carousel carrosselimoveis">
                <?php
                if($imoveis->have_posts()){
                    while($imoveis->have_posts()) {
                        $imoveis->the_post();
                        $thumb = get_the_post_thumbnail($imoveis->ID,
                                            'post-thumbnail',
                                            array( 'class' => 'fundo' )
                        );
                        $postLink = get_post_permalink($imoveis->ID);
                        $quartos = get_field('quartos', $imoveis->ID);
                        $metragem = get_field('metragem', $imoveis->ID);
                        $vagas = get_field('vagas', $imoveis->ID);
                        $categoriaImovel = get_the_terms($imoveis->ID, 'categoria-imovel');
                        // verifica se é lançamento
                        $isLancamento = false;
                        foreach ($categoriaImovel as $value) {
                            if($value->slug == 'lancamento'){
                                $isLancamento = true;
                                break;
                            }
                        }
                ?>
                <a href="<?php echo $postLink; ?>"
                class="item row m-0">
                    <?php
                    echo $thumb;
                    $contentClass = $isLancamento ? 'col-10' : 'col-12';
                    ?>
                    <div class="text-content row m-0">
                        <?php
                        if($isLancamento){
                        ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lancamento-flag.svg"
                            alt="flag que indica lançamento"
                            class="lancamento">
                        <?php
                        }
                        ?>
                        <div class="<?php echo $contentClass; ?>">
                            <h2><?php the_title(); ?></h2>
                            <div class="details d-none d-lg-flex regular">
                                <?php
                                if($quartos){
                                ?>
                                    <div class="detail">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bed-blue.svg"
                                        alt="indicador de quartos">
                                        <p class="regular"><?php echo $quartos; ?></p>
                                    </div>
                                <?php
                                }
                                if($metragem){
                                ?>
                                    <div class="detail">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home-blue.svg"
                                        alt="indicador de metragem">
                                        <p class="regular"><?php echo $metragem; ?></p>
                                    </div>
                                <?php
                                }
                                if($vagas){
                                ?>
                                    <div class="detail">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/car-blue.svg"
                                        alt="indicador de vagas">
                                        <p class="regular"><?php echo $vagas; ?></p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <h3 class="light"><?php echo $categoriaImovel[0]->name; ?></h3>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-sair-blue.svg"
                            class="btn-img" />
                        </div>
                    </div>
                </a>
                <?php
                    }
                }
                ?>
            </div>
            <!-- /carrossel imoveis slide -->
        </div>
    </div>
</header>
<!-- /Carrossel #1 -->