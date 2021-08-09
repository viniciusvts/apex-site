<section class="imoveis-slide">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-rodape.jpg"
    alt="logo apex"
    class="bg">
    <div class="container">
        <div class="row">
            <div class="d-none d-lg-block">
                <h2 class="text-center mb-5"><em>Empreendimentos</em></h2>
            </div>
        </div>
        <!-- filtro -->
        <div class="row">
            <div class="col d-flex mb-4">
                <div class="line"></div>
                <ul class="cat-list">
                    <li data-target="lancamento">
                        Lançamento
                    </li>
                    <li data-target="pronto-para-morar">
                        Pronto para morar
                    </li>
                    <li class="active" data-target="all">
                        Todos os imóveis
                    </li>
                </ul>
            </div>
        </div>
        <!-- /filtro -->
        <!-- carrosseis imoveis slide -->
        <div class="row carImoSlide active" id="all">
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
                                                array( 'class' => 'fundo' )
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
                        <a href="<?php echo $postLink; ?>"
                        class="item row m-0">
                            <?php
                            if($isLancamento) echo '<p class="isLancamento">Lançamento</p>';
                            echo $thumb;
                            ?>
                            <div class="text-content row m-0">
                                <h2><?php echo $imovel->post_title; ?></h2>
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
                        </a>
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
        <!-- lançamento -->
        <div class="row carImoSlide" id="lancamento">
            <div class="col">
                
                <!-- carrossel imoveis slide -->
                <div id="lancamentoImoveisSlide" class="owl-carousel carrosselimoveis">
                    <?php
                    $imoveis = get_posts(
                        array(
                            'post_type' => 'imoveis',
                            'posts_per_page'=>'10',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categoria-imovel',
                                    'field' => 'slug',
                                    'terms' => 'lancamento',
                                ),
                            ),
                        )
                    );
                    if($imoveis){
                        foreach ($imoveis as $imovel) {
                            setup_postdata( $imovel );
                            $thumb = get_the_post_thumbnail($imovel->ID,
                                                'post-thumbnail',
                                                array( 'class' => 'fundo' )
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
                    <a href="<?php echo $postLink; ?>"
                    class="item row m-0">
                        <?php
                        if($isLancamento) echo '<p class="isLancamento">Lançamento</p>';
                        echo $thumb;
                        ?>
                        <div class="text-content row m-0">
                            <h2><?php echo $imovel->post_title; ?></h2>
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
                    </a>
                    <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <p class="text-center mt-3">
                    <!-- o javascript vai atualizando com base no id -->
                    <span id="lancamentoImoveisSlideAtual"><?php echo str_pad('1', 2, '0', STR_PAD_LEFT); ?></span>
                     / 
                    <span id="lancamentoImoveisSlideTotal"><?php echo str_pad(count($imoveis), 2, '0', STR_PAD_LEFT); ?></span>
                </p>
                <!-- /carrossel imoveis slide -->
            </div>
        </div>
        <!-- pronto para morar -->
        <div class="row carImoSlide" id="pronto-para-morar">
            <div class="col">
                
                <!-- carrossel imoveis slide -->
                <div id="ppmImoveisSlide" class="owl-carousel carrosselimoveis">
                    <?php
                    $imoveis = get_posts(
                        array(
                            'post_type' => 'imoveis',
                            'posts_per_page'=>'10',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categoria-imovel',
                                    'field' => 'slug',
                                    'terms' => 'pronto-para-morar',
                                ),
                            ),
                        )
                    );
                    if($imoveis){
                        foreach ($imoveis as $imovel) {
                            setup_postdata( $imovel );
                            $thumb = get_the_post_thumbnail($imovel->ID,
                                                'post-thumbnail',
                                                array( 'class' => 'fundo' )
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
                    <a href="<?php echo $postLink; ?>"
                    class="item row m-0">
                        <?php
                        if($isLancamento) echo '<p class="isLancamento">Lançamento</p>';
                        echo $thumb;
                        ?>
                        <div class="text-content row m-0">
                            <h2><?php echo $imovel->post_title; ?></h2>
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
                    </a>
                    <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <p class="text-center mt-3">
                    <!-- o javascript vai atualizando com base no id -->
                    <span id="ppmImoveisSlideAtual"><?php echo str_pad('1', 2, '0', STR_PAD_LEFT); ?></span>
                     / 
                    <span id="ppmImoveisSlideTotal"><?php echo str_pad(count($imoveis), 2, '0', STR_PAD_LEFT); ?></span>
                </p>
                <!-- /carrossel imoveis slide -->
            </div>
        </div>
        <!-- /carrosseis imoveis slide -->
        <div class="row">
            <div class="col d-flex">
                <a href="/empreendimentos/" class="btn btn-y mx-auto mt-3">
                    Ver todos os imóveis
                </a>
            </div>
        </div>
    </div>
</section>
