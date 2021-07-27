<?php
$depoimentos = get_posts(
    array(
    'post_type' => 'depoimentos',
    'posts_per_page'=>'4',
    )
);
include get_template_directory().'/template-parts/sub_section/depoimentos-modal.php';
?>
<section class="content-depoimentos container">
    <div class="row">
        <div class="col-12">
            <h2>Depoimentos</h2>
            <h3>Clientes satisfeitos com a Apex</h3>
        </div>
    </div>
    <div class="row videos">
        <?php
        foreach ($depoimentos as$depoimento) {
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
    <div class="row">
        <div class="d-flex">
            <a href="#_" class="btn btn-y mx-auto" data-show="modalDepoimentos">Ver Mais</a>
        </div>
    </div>
</section>
