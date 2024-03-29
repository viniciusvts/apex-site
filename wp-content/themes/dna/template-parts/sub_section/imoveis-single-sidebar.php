<!-- stilo em content-imoveis-single -->
<div class="imoveis-single-sidebar">
    <div class="actions">
        <a href="#_" class="btn green" data-popup="att-whats">Fale pelo WhatsApp</a>
        <a href="#_" class="btn red" data-modalSimula>Solicite uma simulação</a>
        <a href="#_" class="btn yellow" data-popup="att-email">Falar por email</a>
    </div>
    <div class="ligamos-para-vc">
        <img class="w-100"
        src="<?php echo get_template_directory_uri(); ?>/assets/img/atendimento.jpg"
        alt="logo apex">
        <div class="intern">
            <h3>Ligamos para você</h3>
            <p>Envie seu contato para nossos corretores</p>
            <?php
                $formName = 'ligamos-para-vc';
                /** get slug of page/post */
                $slugCurrent = get_queried_object()->post_name;
                $formId = empty($slugCurrent) ?
                    $formName :
                    $slugCurrent . '-' . $formName ;
                echo do_shortcode('[contact-form-7 id="16316" title="Ligamos para vc" html_name="' . $formId . '"]');
            ?>
        </div>
    </div>
</div>