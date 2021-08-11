<?php
get_header();
?><?php
$pageId = get_option( 'page_for_posts' );
$thumb = get_the_post_thumbnail($pageId,
                    'post-thumbnail',
                    array( 'class' => 'fundo w-100 h-100' )
);
?>
<header class="header-title-sub">
    <?php echo $thumb; ?>
    <div class="container">
        <div class="row content">
            <div class="col-xl-4 title">
                <h1>Página não encontrada</h1>
            </div>
        </div>
    </div>
</header>
<section class="pageContent">
    <div class="container my-5 py-5">
        <div class="row no-gutters">
            <p>Olá, você tentou acessar uma página que não existe,
            ainda assim podemos te ajudar, entre em contato conosco e nos mande uma mensagem
            teremos prazer em lhe responder</p>
        </div>
    </div>
</section>
<?php
get_template_part('template-parts/section', 'sabemosOQQuer');
get_template_part('template-parts/section', 'sabemosOQVcPrecisa');
get_template_part('template-parts/section', 'cta');
get_footer();