<?php
/* MODAL para exibir o form 
use data-popup="<id-do-elemento>" para abrir o modal
stilos em _modal.scss */
$formName = 'atendimento-online';
/** get slug of page/post */
$slugCurrent = get_queried_object()->post_name;
$formId = empty($slugCurrent) ?
    $formName :
    $slugCurrent . '-' . $formName ;
?>
<section class="ssw-modal modal-form-att" id="att-online">
    <div class="intern">
        <div class="title">
            <h2 class="text-center">Atendimento online</h2>
            <p>Precisamos dos dados abaixo para dar continuidade ao atendimento:</p>
            <hr>
        </div>
        <div class="row form">
            <div class="col-11 col-md-8 col-lg-7 col-xxl-10 mx-auto">
                <?php
                echo do_shortcode('[contact-form-7 id="16693" title="Atendimento dos modais" html_name="' . $formId . '"]');
                ?>
            </div>
        </div>
    </div>
</section>