<?php
$mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d959.777337000357!2d-47.949019070823425!3d-15.79818720886867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a31dd9aa5c18d%3A0xfbb060a4ab50ff5!2sApex%20Engenharia!5e0!3m2!1spt-BR!2sbr!4v1627400712201!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
if($mapa){
?>
<!-- stilo em content-imoveis-single -->
<section class="map-imoveis-single">
    <?php echo $mapa; ?>
</section>
<?php
}