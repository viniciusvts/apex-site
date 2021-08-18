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
                                            'full',
                                            array( 'class' => 'fundo' )
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
    </div><?php
                $args = array(
                    'screen_reader_text' => ' ',
                    'mid_size' => 3,
                    'prev_next' => true,
                    'prev_text' => __('<'),
                    'next_text' => __('>'),
                );
                the_posts_pagination($args);
                ?>
</header>
<!-- /Carrossel #1 -->