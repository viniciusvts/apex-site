<!-- MODAL para exibir imagens da galeria na tela inteira
difere de modal-img.php por ter navegação, usar em galerias
No tag img utilize data-galeria-name="name" data-galeria-index="000" -->
<section class="ssw-modal modal-img modal-galeria" id="modal-galeria">
    <div class="intern loading">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
        data-name data-index
        alt="none">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.svg"
        class="loading"
        alt="loading">
        <div class="row navs">
            <span id="modal-galeria-prev"><</span>
            <span id="modal-galeria-next">></span>
        </div>
    </div>
</section>