<?php
$obraAndamento = get_field('andamento_da_obra');
$obraFotos = get_field('andamento_da_obra_fotos');
include get_template_directory().'/template-parts/sub_section/obra-imoveis-single-modal.php';
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
        <!-- js procura esse elemento para animar os estados da obra -->
        <div id="estadosDaObra"
        class="col-11 mx-auto <?php echo $obraFotos ? 'col-lg-5' : 'col-lg-12'; ?>">
            <?php
            if($obraAndamento['projeto']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-width="<?php echo $obraAndamento['projeto']; ?>%"></div>
                </div>
                <p>Projeto <span data-value="<?php echo $obraAndamento['projeto']; ?>">0</span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['fundacao']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-width="<?php echo $obraAndamento['fundacao']; ?>%"></div>
                </div>
                <p>Fundacao <span data-value="<?php echo $obraAndamento['fundacao']; ?>">0</span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['estrutura']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-width="<?php echo $obraAndamento['estrutura']; ?>%"></div>
                </div>
                <p>Estrutura <span data-value="<?php echo $obraAndamento['estrutura']; ?>">0</span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['instalacao']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-width="<?php echo $obraAndamento['instalacao']; ?>%"></div>
                </div>
                <p>Instalacao <span data-value="<?php echo $obraAndamento['instalacao']; ?>">0</span>%</p>
            </div>
            <?php
            }
            if($obraAndamento['acabamento']){
            ?>
            <div class="item">
                <div class="external">
                    <div class="internal" data-width="<?php echo $obraAndamento['acabamento']; ?>%"></div>
                </div>
                <p>Acabamento <span data-value="<?php echo $obraAndamento['acabamento']; ?>">0</span>%</p>
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
            foreach ($obraFotos as $key => $obraFoto) {
                // só vou exibir dois aqui, vou exibir todos no modal
                if($key >= 2) break;
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
            <div class="row">
                <div class="col-10 col-md-6 col lg-3 mx-auto d-flex">
                    <a href="#_" class="btn btn-y mx-auto" data-show="modalObraFotos">Ver Mais</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>
