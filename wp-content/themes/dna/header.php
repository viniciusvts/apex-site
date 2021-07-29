<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <?php wp_head(); ?>
    </head>
    <body>
    <?php
    get_template_part('template-parts/' . 'menu');
    get_template_part('template-parts/modal', 'buscar');
    get_template_part('template-parts/float', 'contato');
    get_template_part('template-parts/section', 'simulador-modal');
    get_template_part('template-parts/rd', 'pop-whats');
    get_template_part('template-parts/rd', 'pop-email');
    ?>
    