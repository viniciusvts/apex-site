<?php
$videos = get_field('videos');
$perspectiva = get_field('perspectiva');
$planta = get_field('planta');
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
                <li class="active" data-target="all">Ver todos</li>
                <?php
                if($perspectiva){
                ?>
                <li data-target="perspectiva">Perspectiva</li>
                <?php
                }
                if($planta){
                ?>
                <li data-target="planta">Planta</li>
                <?php
                }
                if($videos){
                ?>
                <li data-target="videos">Videos</li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row galeria">
        <?php
        if($videos){
            foreach ($videos as $video) {
        ?>
        <div class="col-md-6 col-lg-4 item videos">
            <?php echo $video['iframe']; ?>
        </div>
        <?php
            }
        }
        if($perspectiva){
            foreach ($perspectiva as $pers) {
        ?>
        <div class="col-md-6 col-lg-4 item perspectiva">
            <img src="<?php echo $pers['sizes']['medium_large']; ?>"
            alt="<?php echo $pers['alt']; ?>"
            data-modalImg="<?php echo $pers['url']; ?>">
        </div>
        <?php
            }
        }
        if($planta){
            foreach ($planta as $plan) {
        ?>
        <div class="col-md-6 col-lg-4 item planta">
            <img src="<?php echo $plan['sizes']['medium_large']; ?>"
            alt="<?php echo $plan['alt']; ?>"
            data-modalImg="<?php echo $plan['url']; ?>">
        </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="row">
        <div class="col">
            <a href="#fale-com-consultor" class="btn btn-y d-none d-lg-block mx-auto mt-5 w-25">
                Fale com um consultor
            </a>
        </div>
    </div>
</section>