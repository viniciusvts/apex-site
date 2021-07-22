<!--front-page.php-->
<?php
get_header();
get_template_part('template-parts/header', 'home');
get_template_part('template-parts/section', 'saidoaluguel');
get_template_part('template-parts/imoveis', 'slide');
get_template_part('template-parts/blog', 'feed');
get_template_part('template-parts/form', 'newsletter');
get_template_part('template-parts/section', 'simulador');
get_template_part('template-parts/form', 'faleComConsultor');
get_footer();