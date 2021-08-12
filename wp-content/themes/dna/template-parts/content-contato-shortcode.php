<?php
// stilos em content-blog.scss
$shortcode = get_field('contato-shortcode');
$exibeInformacoesDeContato = get_field('exibe_contato_inf');
?>
<section class="blog-single content-contato container">
    <div class="row">
        <div class="form-contato <?php echo $exibeInformacoesDeContato?'col-lg-7':'col-12'; ?>">
            <?php echo do_shortcode($shortcode); ?>
        </div>
        <?php
        if($exibeInformacoesDeContato){
        ?>
        <div class="col-lg-4 offset-lg-1 contato-data">
            <h3>ÁREA ADM. E COMERCIAL</h3>
            <p class="tel"><a href="tel:+55 61 3361.4455">+55 61 3361 4455</a></p>
            <address>
                Sia Trecho 6, Lote 90/100 <br>
                Brasília/DF <br>
                CEP 71205-060
            </address>
            <h3 class="mt-4">ÁREA DE VENDAS</h3>
            <p class="tel"><a href="tel:+55 61 3905 3090">+55 61 3905 3090</a></p>
            <address>
                QS 406, Conjunto C, Loja 4 <br>
                Samambaia/DF <br>
                CEP 72318-573
            </address>
        </div>
        <?php
        }
        ?>
    </div>
</section>