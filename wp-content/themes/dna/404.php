<?php
get_header();
?>
<header class="pageContent">
    <?php echo(file_get_contents(get_template_directory() . '/assets/img/headerArt.svg')); ?>
    <div class="container">
        <div class="row no-gutters">
            <h1>Página não encontrada</h1>
        </div>
        <div class="row no-gutters">
            <h2>Olá, você tentou acessar uma página que não existe,
            ainda assim podemos te ajudar, entre em contato conosco e nos mande uma mensagem
            teremos prazer em lhe responder</h2>
        </div>
    </div>
</header>
<?php
get_template_part('template-parts/section', 'sabemosOQQuer');
get_template_part('template-parts/section', 'sabemosOQVcPrecisa');
get_template_part('template-parts/section', 'cta');
get_footer();