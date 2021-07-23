<?php
$mapa = get_field('mapa');
if($mapa){
?>
<!-- stilo em content-imoveis-single -->
<section class="map-imoveis-single">
    <?php echo $mapa; ?>
</section>
<?php
}