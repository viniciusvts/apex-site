<?php
$videos = get_field('videos');
$perspectiva = get_field('perspectiva');
$planta = get_field('planta');
/** contador para galeria, será utilizado no atributo data-galeria-index */
$countGaleria = 0;
/** nome para galeria, será utilizado no atributo data-galeria-name */
$nomeGaleria = 'galeriaImoveis';
?>
<section class="galeria-imoveis-single">
    <div class="row">
        <div class="col-lg-3">
            <h2>Galeria</h2>
            <hr>
        </div>
        <div class="col-lg-6 offset-lg-3 d-flex mb-5">
            <div class="line ml-auto"></div>
            <ul class="selection">
                <?php
                if($perspectiva){
                ?>
                <li class="active" data-target="perspectiva">Perspectivas</li>
                <?php
                }
                if($planta){
                ?>
                <li data-target="planta">Plantas</li>
                <?php
                }
                if($videos){
                ?>
                <li data-target="videos">Vídeos</li>
                <?php
                }
                ?>
                <li data-target="all">Ver todos</li>
            </ul>
        </div>
    </div>
    <div class="row galeria">
        <?php
        if($perspectiva){
            foreach ($perspectiva as $pers) {
        ?>
        <div class="col-md-6 col-lg-4 item perspectiva">
            <img src="<?php echo $pers['sizes']['medium_large']; ?>"
            data-galeria-name="<?php echo $nomeGaleria; ?>"
            data-galeria-index="<?php echo ++$countGaleria; ?>"
            data-galeria-src="<?php echo $pers['url']; ?>"
            class="cursor-pointer"
            alt="<?php echo $pers['alt']; ?>">
        </div>
        <?php
            }
        }
        if($planta){
            foreach ($planta as $plan) {
        ?>
        <div class="col-md-6 col-lg-4 item planta disabled">
            <img src="<?php echo $plan['sizes']['medium_large']; ?>"
            data-galeria-name="<?php echo $nomeGaleria; ?>"
            data-galeria-index="<?php echo ++$countGaleria; ?>"
            data-galeria-src="<?php echo $plan['url']; ?>"
            class="cursor-pointer"
            alt="<?php echo $plan['alt']; ?>">
        </div>
        <?php
            }
        }
        if($videos){
            foreach ($videos as $video) {
        ?>
        <div class="col-md-6 col-lg-4 item videos disabled">
            <?php echo $video['iframe']; ?>
        </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="bottom-buttons <?php echo is_array(get_field('materiais')) ? 'has-materiais' : ''; ?>">
        <?php
        // verifica se o empreendimento tem materiais para baixar
        if(is_array(get_field('materiais'))){
        ?>
        <a href="#_" class="btn btn-cloud" data-modal="baixar-materiais">
            baixe o book do empreendimento
            <img class="mx-2 my-auto"
            src="<?php echo get_template_directory_uri(); ?>/assets/img/cloud-download.svg"
            alt="cloud download">
        </a>
        <?php
        }
        ?>
        <a href="#fale-com-consultor" class="btn btn-y">
            Fale com um consultor
        </a>
    </div>
</section>