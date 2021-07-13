<nav class="top-menu">
    <div class="left">
        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_apex.svg" alt="logo apex">
        <img id="hambmenu" src="<?php echo get_template_directory_uri(); ?>/assets/img/hamb_menu.svg" alt="hamurguer menu apex">
        <?php
        wp_nav_menu(
            array(
                'container' => false,
                'theme_location' => 'main',
                'depth' => 1,
                'menu_id' => 'main-menu',
                'menu_class' => 'nav',
            )
        );
        ?>
    </div>
    <div class="right">
        <div class="buscar">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loupe.svg" alt="lupa de pesquisa">
            <p>Buscar</p>
        </div>
        <div class="tel row no-gutters">
            <div class="col-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/telephone.svg" alt="lupa de pesquisa">
            </div>
            <div class="col-9">
                <p>LIGUE AGORA</p>
                <p>(061) 3905 3090</p>
            </div>
        </div>
    </div>
</nav>