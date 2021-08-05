<footer class="f-main">
    <div class="container">
        <div class="row">
            <div class="col-10 col-lg-3 mx-auto mb-5">
                <h2>Menu</h2>
                <?php
                wp_nav_menu(
                    array(
                        'container' => false,
                        'theme_location' => 'footer-menu',
                        'depth' => 1,
                        'menu_id' => 'footer-menu',
                        'menu_class' => 'list-unstyled p-0 m-0',
                    )
                );
                ?>
            </div>
            <div class="col-10 col-lg-5 mx-auto mb-5">
                <h2>Links Úteis</h2>
                <?php
                wp_nav_menu(
                    array(
                        'container' => false,
                        'theme_location' => 'footer-links',
                        'depth' => 1,
                        'menu_id' => 'footer-links',
                        'menu_class' => 'list-unstyled p-0 m-0',
                    )
                );
                ?>
            </div>
            <div class="col-10 col-lg-4 mx-auto mb-5">
                <h2>Contato</h2>
                <h3>ÁREA ADM. E COMERCIAL</h3>
                <p class="tel"><a href="tel:+55 61 3361 4455">+55 61 3361 4455</a></p>
                <address>Sia Trecho 6, Lote 90/100 <br>
                    Brasília – DF – CEP 71205-060</address>
                <h3 class="mt-4">ÁREA DE VENDAS</h3>
                <p class="tel"><a href="tel:+55 61 3905 3090">+55 61 3905 3090</a></p>
                <address>QS 406, Conjunto C, Loja 4 <br>
                Samambaia – DF – CEP 72318-573</address>
                <!-- redes sociais -->
                <div class="row">
                    <div class="col-2">
                        <a href="https://www.facebook.com/GrupoApex" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-facebook.svg"
                            alt="logo facebook">
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="https://www.linkedin.com/company/apex-engenharia" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-linkedin.svg"
                            alt="logo linkedin">
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="https://www.instagram.com/apexoficial" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-instagram.svg"
                            alt="logo instagram">
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="https://twitter.com/ApexEngenharia" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-twitter.svg"
                            alt="logo twitter">
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="https://www.youtube.com/channel/UC83qef_bpuNesmfaUnhQb_w" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-youtube.svg"
                            alt="logo youtube">
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#_" data-popup="pop-whats">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-whatsapp.svg"
                            alt="logo whatsapp">
                        </a>
                    </div>
                </div>
                <!-- /redes sociais -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p class="text-center">Copyright © 2021 Apex - Todos os direitos reservados.</p>
            </div>
        </div>
    </div>
</footer>