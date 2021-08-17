<!-- MODAL para exibir os materiais da página single imoveis -->
<?php
$materiais = get_field('materiais');
?>
<section class="ssw-modal modal-baixar-materiais" id="baixar-materiais">
    <div class="intern">
        <h2 class="text-center mb-4">Materiais</h2>
        <ul class="down-list p-0">
            <?php
            foreach ($materiais as $material) {
                $item = $material['material'];
            ?>
            <li class="row">
                <b class="col-lg-4">
                    <a href="<?php echo $item['url']; ?>" download="Apex - <?php echo $item['title']; ?>">
                        <?php echo $item['title']; ?>
                    </a>
                </b>
                <span class="col-lg-6"><?php echo $item['description']; ?></span>
                <a href="<?php echo $item['url']; ?>" class="col-lg-2" download="Apex - <?php echo $item['title']; ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cloud-download-blue.svg"
                    class="img-download"
                    alt="cloud download">
                </a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</section>