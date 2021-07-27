<?php
$diferenciais = get_field('diferenciais');
?>
<section class="diferenciais">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Nossos diferenciais</h2>
                <h3>Nossa busca é sua inteira segurança e bem-estar</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel" id="section-diferenciais">
                    <?php
                    foreach ($diferenciais as $dif) {
                        $imgUri = $dif['imagem']['sizes']['medium'];
                        $imgAlt = $dif['imagem']['alt']?$dif['imagem']['alt']:get_the_title();
                        $title = $dif['titulo'];
                        $text = $dif['texto'];
                    ?>
                    <div class="item">
                        <img src="<?php echo $imgUri; ?>" alt="<?php echo $imgAlt; ?>">
                        <h4><?php echo $title; ?></h3>
                        <div class="text"><?php echo $text; ?></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>