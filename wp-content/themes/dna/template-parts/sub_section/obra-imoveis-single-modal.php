<?php
// ATENÇÂO para um elemento exibir esse modal adicione data-show="modalObraFotos"
$obraFotos = get_field('andamento_da_obra_fotos');
?>
<section class="ssw-modal modal-obrafotos" id="modal-obrafotos">
    <div class=" obra-imoveis-single container intern">
        <div class="row">
            <?php
            if($obraFotos){
            ?>
            <div class="col-10 mx-auto">
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
                            <div class="item">
                                <img src="<?php echo $foto['sizes']['medium_large']; ?>"
                                alt="<?php echo $foto['alt']; ?>"
                                data-modalImg="<?php echo $foto['url']; ?>">
                            </div>
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
    </div>
</section>