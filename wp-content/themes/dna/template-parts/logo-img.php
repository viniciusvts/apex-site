<!-- Atenção: utilizando os stilos de img-logo.scss -->
<section class="logoimg">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                $logoEmp = get_field('logo_emp');
                echo wp_get_attachment_image($logoEmp['ID'], 'full');
                ?>
            </div>
        </div>
    </div>
</section>