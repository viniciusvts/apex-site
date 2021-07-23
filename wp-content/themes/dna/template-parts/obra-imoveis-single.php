<?php
$obraAndamento = get_field('andamento_da_obra');
$obraFotos = get_field('andamento_da_obra_fotos');
?>
<section class="obra-imoveis-single container">
    <div class="row">
        <div class="col">
            <h2>Andamento da obra</h2>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div class="col-11 mx-auto <?php echo $obraFotos ? 'col-lg-5' : 'col-lg-12'; ?>">
            <?php
            if($obraAndamento['projeto']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-target="<?php echo $obraAndamento['projeto']; ?>"></div>
                </div>
                <p>Projeto <span><?php echo $obraAndamento['projeto']; ?></span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['fundacao']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-target="<?php echo $obraAndamento['fundacao']; ?>"></div>
                </div>
                <p>Fundacao <span><?php echo $obraAndamento['fundacao']; ?></span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['estrutura']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-target="<?php echo $obraAndamento['estrutura']; ?>"></div>
                </div>
                <p>Estrutura <span><?php echo $obraAndamento['estrutura']; ?></span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['instalacao']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-target="<?php echo $obraAndamento['instalacao']; ?>"></div>
                </div>
                <p>Instalacao <span><?php echo $obraAndamento['instalacao']; ?></span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['acabamento']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-target="<?php echo $obraAndamento['acabamento']; ?>"></div>
                </div>
                <p>Acabamento <span><?php echo $obraAndamento['acabamento']; ?></span>%</p>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        if($obraFotos){
        ?>
        <div class="col-11 col-lg-7 mx-auto">
            <?php
            foreach ($obraFotos as $obraFoto) {
            ?>
            <div class="row">
                <div class="col">
                    <h3><?php echo $obraFoto['periodo'] ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="obrasFotos">
                        <?php
                        foreach ($obraFoto['fotos'] as $foto) {
                        ?>
                        <img src="<?php echo $foto['sizes']['medium_large']; ?>"
                        alt="<?php echo $foto['alt']; ?>"
                        data-modalImg="<?php echo $foto['url']; ?>">
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        }
        ?>
    </div>
</section>
