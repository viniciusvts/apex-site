<?php
function ssw_api_simulador(WP_REST_Request $request){
    $allparams = $request->get_params();
    if(isset($allparams['g-recaptcha-response'])){
        $respCaptcha = gCaptchaVerify('6Lepfa0bAAAAANxQ4nXEbKX-judGoVy6kc3TNzEU',
        $allparams['g-recaptcha-response'],
        $_SERVER['REMOTE_ADDR']
        );
    }
    if(isset($allparams["nome"]) && $respCaptcha->success){
        $cidade = $allparams["cidade"];
        $nome = $allparams["nome"];
        $email = $allparams["email"];
        $renda = $allparams["renda"];
        $entrada = $allparams["entrada"];
        $tel = $allparams["tel"];
        $fgts = $allparams["fgts"];
        /** se consentiu com o envio de comunicações */
        $communicationsconsent = isset($allparams["communicationsconsent"]);
        //send email
        $to = get_option('admin_email');
        $subject = 'Form Apex (simulador Pop-Up)';
        $message = "Nome: ".$nome
            ."<br>Email: ".$email
            ."<br>Cidade: ".$cidade
            ."<br>Renda: ".$renda
            ."<br>Entrada: ".$entrada
            ."<br>Telefone: ".$tel
            ."<br>Pretende usar o FGTS: ".$fgts;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $wpmail = wp_mail( $to, $subject, $message, $headers );
        // // envio para o RD
        // $RDI = new Rdi_wp();
        // $getContact = $RDI->getContactByEmail($email);
        // // se há registro do contato removo as tag
        // if ($getContact){
        // // novas tag a serem inseridas, neste caso
        // $newtags = array(
        //     "tags" => array()
        // );
        // $esdited = $RDI->editContact($getContact->uuid, $newtags);
        // }
        // // envio a conversão
        // $data = array(
        // 'email' => $email,
        // 'name' => $nome,
        // 'city' => $cidade,
        // 'cf_renda' => $renda,
        // 'cf_entrada' => $entrada,
        // 'personal_phone' => $tel,
        // 'cf_fgts' => $fgts,
        // 'traffic_source' => $allparams['traffic_source'],
        // 'traffic_medium' => $allparams['traffic_medium'],
        // 'traffic_campaign' => $allparams['traffic_campaign'],
        // 'traffic_value' => $allparams['traffic_value'],
        // );
        // // se consentiu com o envio de informações
        // if ($communicationsconsent){
        // $legal_bases = array(
        //     array(
        //     "category" => "communications",
        //     "type" => "consent",
        //     "status" => "granted"
        //     ),
        // );
        // $data['legal_bases'] = $legal_bases;
        // }
        // $conversionIdentifier = 'form-simulador';
        // if (isset($allparams['nomeDoEmpreendimento'])){
        // $conversionIdentifier .= '-'.$allparams['nomeDoEmpreendimento'];
        // }
        // $statusRD = $RDI->sendConversionEvent($conversionIdentifier, $data);
    }
    $url = get_option('siteurl') . '/agradecimento/';
    wp_redirect($url);
    exit;
}

/**
 * Função registra os endpoints
 * @author Vinicius de Santana
 */
function ssw_api_register(){
    // simulador
    register_rest_route('dna_theme/v1',
        '/simulador',
        array(
            'methods' => 'POST',
            'callback' => 'ssw_api_simulador',
            'description' => 'Recebe as informações do simulador',
            'args' => array(
                'email' => array(
                    'required' => true,
                ),
            ),
            'args' => array(
                'g-recaptcha-response' => array(
                    'required' => true,
                ),
            )
        )
    );
}
add_action('rest_api_init', 'ssw_api_register');