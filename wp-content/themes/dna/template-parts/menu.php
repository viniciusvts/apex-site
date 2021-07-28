<nav class="top-menu row m-0" id="top-menu">
    <div class="left col-10 col-lg-auto order-0 d-flex p-0 h-100">
        <a href="/" class="d-flex">
            <img class="logo mx-3 my-auto" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_apex.svg" alt="logo apex">
        </a>
        <div class="d-flex hambmenu cursor-pointer mx-3" id="hambmenu">
            <img class="mx-3 my-auto hamb" src="<?php echo get_template_directory_uri(); ?>/assets/img/hamb_menu.svg" alt="hamurguer menu apex">
            <img class="mx-3 my-auto x" src="<?php echo get_template_directory_uri(); ?>/assets/img/x.svg" alt="hamurguer menu apex">
            <p class="mx-3 my-auto">MENU</p>
        </div>
    </div>
    <div class="right col-2 col-lg-3 order-1 order-lg-2 d-flex">
        <div data-target="modal-buscar" class="buscar m-auto d-lg-flex cursor-pointer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loupe.svg" alt="lupa de pesquisa">
            <p class="d-none d-lg-block mx-2 my-auto">Buscar</p>
        </div>
        <div class="tel row m-0 d-none d-lg-flex col-8">
            <div class="col-3 px-0 d-flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/telephone.svg"
                alt="lupa de pesquisa"
                class="m-auto">
            </div>
            <div class="col-9 align-self-center">
                <a href="tel:(061) 3905 3090">
                    <p class="mb-0">LIGUE AGORA</p>
                    <p class="mb-0 bold">(061) 3905 3090</p>
                </a>
            </div>
        </div>
    </div>
    <?php
    wp_nav_menu(
        array(
            'container' => false,
            'theme_location' => 'main',
            'depth' => 1,
            'menu_id' => 'main-menu',
            'menu_class' => 'main-menu list-unstyled p-0 m-0 col-10 col-lg-7 order-2 order-lg-1',
        )
    );
    ?>
</nav>