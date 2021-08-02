<?php
// ATENÇÂO para um elemento exibir esse modal adicione data-show="modalObraFotos"
// offset está 4 pq content-depoimentos já exibe 4 vídeos
$depoimentosModal = get_posts(
    array(
    'post_type' => 'depoimentos',
    'posts_per_page'=>'100',
    'offset'         => 4,
    )
);
?>
<section class="ssw-modal modal-depoimentos" id="modal-depoimentos">
    <div class="content-depoimentos container intern">
        <div class="row videos">
            <?php
            foreach ($depoimentosModal as$depoimento) {
                $iframe = get_field('if_yt', $depoimento->ID);
            ?>
            <div class="col-md-6">
                <?php echo $iframe; ?>
                <h4><?php echo $depoimento->post_title; ?></h4>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>