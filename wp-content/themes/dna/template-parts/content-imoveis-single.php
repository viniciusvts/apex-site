<section class="content-imoveis-single container">
    <div class="row">
        <div class="col-lg-8">
            <article <?php post_class() ?>>
                <?php the_content(); ?>
            </article>
            <?php include get_template_directory().'/template-parts/sub_section/imoveis-diferenciais.php'; ?>
        </div>
        <div class="col-lg-4">
            <?php include get_template_directory().'/template-parts/sub_section/imoveis-single-sidebar.php'; ?>
        </div>
    </div>
</section>