<!-- Atenção: layout utilizando _imoveis-slide.scss -->
<header class="imoveis-slide headerImoveis">
    <div id="all">
        <div class="col">
            <!-- carrossel imoveis slide -->
            <div id="carouselHeaderImoveis" class="owl-carousel carrosselimoveis">
                <?php
                if(have_posts()){
                    while(have_posts()) {
                        the_post();
                        $thumb = get_the_post_thumbnail(get_the_ID(),
                                            'post-thumbnail',
                                            array( 'class' => 'fundo w-100 h-100' )
                        );
                        $postLink = get_post_permalink(get_the_ID());
                        $quartos = get_field('quartos', get_the_ID());
                        $metragem = get_field('metragem', get_the_ID());
                        $vagas = get_field('vagas', get_the_ID());
                        $categoriaImovel = get_the_terms(get_the_ID(), 'categoria-imovel');
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
                    echo $thumb;
                    $contentClass = $isLancamento ? 'col-9' : 'col-12';
                    ?>
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="h-content position-relative text-content row">
                                <div class="<?php echo $contentClass; ?>">
                                    <h2><?php the_title(); ?></h2>
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
                                <?php
                                if($isLancamento){
                                ?>
                                <div class="lancamento col-3 p-0">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lancamento-flag.svg"
                                    alt="flag que indica lançamento">
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
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