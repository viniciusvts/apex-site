<?php
$estabelecimentos = get_field('estabelecimentos');
$endereco = get_field('endereco');
?>
<!-- stilo em content-imoveis-single -->
<section class="estab-prox-imoveis-single">
    <div class="row">
        <div class="col-lg-3">
            <h2>Estabelecimentos próximos</h2>
            <hr>
            <address><?php echo $endereco ? $endereco : ''; ?></address>
        </div>
        <div class="col-lg-9">
            <div class="carrossel-estProximos">
                <div id="estProximosCarrossel" class="owl-carrossel">
                    <?php
                    foreach ($estabelecimentos as $item) {
                        $safeStr = getNoAcentsString($item);
                        $iconPath = get_template_directory()."/assets/img/". $safeStr . ".svg";
                    ?>
                    <div class="item">
                        <?php echo file_get_contents($iconPath); ?> 
                        <p><?php echo $item; ?></p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>