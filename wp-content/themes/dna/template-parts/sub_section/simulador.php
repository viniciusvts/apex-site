<?php
/* ATENÇÂO: o simulador é utilizado na section-simulador e section-simulador-modal
    Tenha atenção ao alterar os stilos
    Tbm é necessário iniciar as verificações no script.js com "initSimulador('#idDoComponente');" */
$termsCity = get_terms([
    'taxonomy' => 'cidade-imovel',
    'hide_empty' => true,
]);
?>
<div class="container">
    <div class="title row">
        <div class="col-12">
            <h2>Solicite uma simulação</h2>
            <p>Em breve, um de nosso consultores irá entrar em contato.</p>
            <hr>
        </div>
    </div>
    <div class="page-numbers row">
        <div class="col-10 col-md-6 col-lg-4 mx-auto">
            <ul class="row">
                <li class="page active" data-page="1">1</li>
                <li class="page" data-page="2">2</li>
                <li class="page" data-page="3">3</li>
                <li class="page" data-page="4">4</li>
                <li class="page" data-page="5">5</li>
            </ul>
        </div>
    </div>
    <div class="row form">
        <div class="col-11 col-md-8 col-lg-5 mx-auto">
            <?php
                $formName = 'simulacao';
                /** get slug of page/post */
                $slugCurrent = get_queried_object()->post_name;
                $nameOfFormSimulador = empty($slugCurrent) ?
                    $formName :
                    $slugCurrent . '-' . $formName ;
            ?>
            <form action="<?php echo bloginfo( "url" ) ?>/wp-json/dna_theme/v1/simulador"
            method="post" name="<?php echo $nameOfFormSimulador; ?>" id="<?php echo $nameOfFormSimulador; ?>">
                <!-- itens trafic são preenchidos no js -->
                <input type="hidden" name="traffic_source">
                <input type="hidden" name="traffic_medium">
                <input type="hidden" name="traffic_campaign">
                <input type="hidden" name="traffic_value">
                <fieldset data-page="1" class="active">
                    <label for="cidade">Cidade</label>
                    <select name="cidade" id="cidade">
                        <option value="">Qual a sua cidade?</option>
                        <?php 
                            foreach ( $termsCity as $term ){
                        ?>
                        <option value="<?php echo $term->slug; ?>">
                            <?php echo $term->name;?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </fieldset>
                <fieldset data-page="2">
                    <label for="nome">Qual o seu nome?</label>
                    <input type="text" name="nome" id="nome" class="mb-4">
                    <label for="email">Qual o seu email?</label>
                    <input type="text" name="email" id="email">
                </fieldset>
                <fieldset data-page="3">
                    <label for="renda">Qual a sua renda?</label>
                    <input type="text" name="renda" id="renda" class="mb-4 dinMask">
                    <label for="entrada">Quanto será a sua entrada?</label>
                    <input type="text" name="entrada" id="entrada" class="dinMask">
                </fieldset>
                <fieldset data-page="4">
                    <label for="tel">Qual seu telefone com DDD?</label>
                    <input type="tel" name="tel" id="tel" class="mb-4 telMask">
                    <label for="fgts" class="mb-4">Usará seu FGTS?</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="radio" name="fgts" required id="fgts-y" value="sim">
                            <label for="fgts-y" class="text-center w-100">Sim</label>
                        </div>
                        <div class="col-6">
                            <input type="radio" required name="fgts" id="fgts-n" value="nao">
                            <label for="fgts-n" class="text-center w-100">Não</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset data-page="5">
                    <div class="d-flex">
                        <input type="checkbox" name="communicationsconsent"
                        id="communicationsconsent" class="ml-auto">
                        <label for="communicationsconsent" class="mb-4 mr-auto">
                            Eu concordo em receber comunicações.
                        </label>
                    </div>
                    
                    <div class="g-recaptcha mx-auto"
                        data-sitekey="6Lepfa0bAAAAAOqIu6RdY3S0xE9EkyEEmUdltXgK"></div>
                </fieldset>
                <!-- butão fica escondido, será ativado pelo javascript click() -->
                <button type="submit" class="d-none">hidden</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-10 col-md-7 col-lg-4 mx-auto mt-5">
            <div class="row flex-md-nowrap">
                <button class="next mb-1 mb-md-0">Começar</button>
                <button class="prev order-md-first">Voltar</button>
            </div>
        </div>
    </div>
</div>
<!-- recapctch google-->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>