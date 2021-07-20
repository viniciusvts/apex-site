<section class="imoveis-slide">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-rodape.jpg"
    alt="logo apex"
    class="bg">
    <div class="container">
        <div class="row">
            <div class="d-none d-lg block">
                <h2>Empreendimentos</h2>
            </div>
        </div>
        <!-- filtro -->
        <?php
        $catImoveis = get_terms(array(
            'taxonomy' => 'categoria-imovel',
            'hide_empty' => true,
        ));
        ?>
        <div class="row">
            <div class="col d-flex mb-4">
                <div class="line"></div>
                <ul class="cat-list">
                    <li class="active" data-target="all">
                        Todos os imóveis
                    </li>
                    <?php
                    foreach ($catImoveis as $catImovel) {
                    ?>
                    <li data-target="<?php echo $catImovel->slug ?>">
                        <?php echo $catImovel->name ?>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /filtro -->
        <!-- carrosseis -->
        <div class="row">
            <div class="col">
                
                <!-- carrossel imoveis slide -->
                <div id="imoveisSlide" class="owl-carousel carrosselimoveis">
                    <?php
                    $imoveis = get_posts(
                        array(
                        'post_type' => 'imoveis',
                        'posts_per_page'=>'10',
                        )
                    );
                    if($imoveis){
                        foreach ($imoveis as $imovel) {
                            setup_postdata( $imovel );
                            $thumb = get_the_post_thumbnail($imovel->ID,
                                                'post-thumbnail',
                                                array( 'class' => 'fundo w-100 h-100' )
                            );
                            $postLink = get_post_permalink($imovel->ID);
                            $quartos = get_field('quartos', $imovel->ID);
                            $metragem = get_field('metragem', $imovel->ID);
                            $vagas = get_field('vagas', $imovel->ID);
                            $categoriaImovel = get_the_terms($imovel->ID, 'categoria-imovel');
                            // verifica se é lançamento
                            $isLancamento = false;
                            foreach ($categoriaImovel as $value) {
                                if($value->slug == 'lancamento'){
                                    $isLancamento = true;
                                    break;
                                }
                            }
                    ?>
                    <div class="item h-100">
                        <?php
                        if($isLancamento) echo '<p class="isLancamento">Lançamento</p>';
                        echo $thumb;
                        ?>
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="h-content position-relative text-content">
                                    <h2><?php echo $imovel->post_title; ?></h2>
                                    <div class="details d-none d-lg-flex regular">
                                        <?php
                                        if($quartos){
                                        ?>
                                            <div class="detail">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bed.svg"
                                                alt="indicador de quartos">
                                                <p class="regular"><?php echo $quartos; ?></p>
                                            </div>
                                        <?php
                                        }
                                        if($metragem){
                                        ?>
                                            <div class="detail">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home.svg"
                                                alt="indicador de metragem">
                                                <p class="regular"><?php echo $metragem; ?></p>
                                            </div>
                                        <?php
                                        }
                                        if($vagas){
                                        ?>
                                            <div class="detail">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/car.svg"
                                                alt="indicador de vagas">
                                                <p class="regular"><?php echo $vagas; ?></p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <h3 class="thin"><?php echo $categoriaImovel[0]->name; ?></h3>
                                    <a href="<?php echo $postLink; ?>" class="btn-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-sair.svg" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <p class="text-center mt-3">
                    <!-- o javascript vai atualizando com base no id -->
                    <span id="imovelSlideAtual"><?php echo str_pad('1', 2, '0', STR_PAD_LEFT); ?></span>
                     / 
                    <span id="imovelSlideTotal"><?php echo str_pad(count($imoveis), 2, '0', STR_PAD_LEFT); ?></span>
                </p>
                <!-- /carrossel imoveis slide -->
            </div>
        </div>
        <!-- /carrosseis -->
        <div class="row">
            <div class="col d-flex">
                <a href="#" class="btn btn-y mx-auto mt-3">
                    Ver todos os imóveis
                </a>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl-carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/carousels.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl-carousel.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl-theme-default.min.css">