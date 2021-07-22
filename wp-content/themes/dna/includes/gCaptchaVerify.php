<?php
if( !function_exists ('gCaptchaVerify') ){
    function gCaptchaVerify($secret, $response, $remoteip){
        /* Envia as informações para verificação de captcha */
        /** url de verificação do google */
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        // Attach encoded to the POST fields
        $postFields = '';
        $postFields .= 'secret='.$secret;
        $postFields .= '&response='.$response;
        if($remoteip){ $postFields .= '&remoteip='.$remoteip; }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        // Set the content type to application/x-www-form-urlencoded
        $headersArray = array('Content-Type: application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headersArray);
        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Execute the POST request
        $result = curl_exec($ch);
        // Close cURL resource
        curl_close($ch);
        //return
        return json_decode($result);
    }
}