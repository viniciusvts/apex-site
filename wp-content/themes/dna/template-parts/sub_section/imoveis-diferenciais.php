<?php
$diferenciais = get_field('informacoes_adicionais');
if(count($diferenciais) > 0){
?>
<!-- stilo em content-imoveis-single -->
<div class="subsection-diferenciais">
    <div class="d-flex">
        <h3>Diferenciais do empreendimento</h3>
        <span class="line"></span>
    </div>
    <div class="carrossel-diferenciais">
        <div id="diferenciaisCarrossel" class="owl-carrossel">
            <?php
            foreach ($diferenciais as $item) {
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
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl-carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/carousels.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl-carousel.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl-theme-default.min.css">
<?php
}