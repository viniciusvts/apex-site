<section class="container form-faleComConsultor" id="fale-com-consultor">
    <div class="row">
        <div class="col">
            <h2>Fale com um consultor</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-11 col-md-7 col-lg-4 mx-auto formext">
            <p class="preform">Preencha os dados para que um dos nossos corretores possa entrar em contato</p>
            <?php
                $formName = 'fale-com-um-consultor';
                /** get slug of page/post */
                $slugCurrent = get_queried_object()->post_name;
                $formId = empty($slugCurrent) ?
                    $formName :
                    $slugCurrent . '-' . $formName ;
                echo do_shortcode('[contact-form-7 id="16303" title="Fale com um consultor" html_name="' . $formId . '"]');
            ?>
        </div>
    </div>
</section>