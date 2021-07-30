<!-- Atenção: utilizando os stilos de header-home.scss -->
<header class="header-home header-imoveis-single">
    <!-- Carrossel #1 -->
    <div class="carrossel1-sec h-100">
        <div class="carrossel1 h-100">
            <?php
            if(have_posts()){
                while(have_posts()) {
                    the_post();
                    $thumb = get_the_post_thumbnail(get_the_ID(),
                                        'post-thumbnail',
                                        array( 'class' => 'fundo w-100 h-100' )
                    );
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
                            <div class="row">
                                <h1 class="bold col-12 order-lg-2"><?php echo the_title(); ?></h1>
                                <h3 class="thin col-12 order-lg-1"><?php echo $categoriaImovel[0]->name; ?></h3>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</header>