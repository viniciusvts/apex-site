<header class="header-home">
    <!-- Carrossel #1 -->
    <div class="carrossel1-sec h-100">
        <div id="carousel1" class="owl-carousel carrossel1 h-100">
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
                    $categoriaImovel = get_the_terms($imovel->ID, 'categoria-imovel');
                    $quartos = get_field('quartos', $imovel->ID);
                    $metragem = get_field('metragem', $imovel->ID);
                    $vagas = get_field('vagas', $imovel->ID);
                    $postLink = get_post_permalink($imovel->ID);
            ?>
            <div class="item h-100">
                <?php
                // verifica se é lançamento
                foreach ($categoriaImovel as $value) {
                    if($value->slug == 'lancamento'){
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lancamento-flag.svg"
                alt="flag que indica lançamento"
                class="isLancamento">
                <?php
                        break;
                    }
                }
                echo $thumb;
                ?>
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="h-content my-auto">
                            <h2 class="bold"><?php echo $imovel->post_title; ?></h2>
                            <h3 class="thin"><?php echo $categoriaImovel[0]->name; ?></h3>
                            <div class="details d-flex regular">
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
                            <a href="<?php echo $postLink; ?>" class="btn btn-y">Saiba mais</a>
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
    </div>
</header>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl-carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/carousels.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl-carousel.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl-theme-default.min.css">
<!-- /Carrossel #1 -->