<?php
$linhaTempo = get_field('li_tmp');
?>
<section class="linha-tempo container">
    <div class="row">
        <div class="col-lg-4 left d-flex">
            <div class="row mxAuto-mlLgAuto">
                <div class="col-lg-12 ml-auto d-flex d-lg-block">
                    <h2>Linha do tempo</h2>
                </div>
            </div>
        </div>
        <div class="col-11 col-lg-7 ml-auto right">
            <div class="row">
                <div class="col-lg-11 ml-auto">
                    <?php
                    foreach ($linhaTempo as $item) {
                    ?>
                    <div class="row linha" data-bg="<?php echo $item['imagem']['sizes']['medium']; ?>">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                        class="d-block d-lg-none"
                        alt="<?php echo $item['alt']; ?>">
                        <img src="<?php echo $item['imagem']['sizes']['medium']; ?>"
                        class="d-none d-lg-block"
                        alt="<?php echo $item['alt']; ?>">
                        <div class="col-lg-10">
                            <p class="ano"><?php echo $item['ano']; ?></p>
                            <p class="titulo"><?php echo $item['titulo']; ?></p>
                            <p class="texto"><?php echo $item['texto']; ?></p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>