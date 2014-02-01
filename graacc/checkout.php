<?php

require_once 'sendNvpRequest.php';
//Vai usar o Sandbox, ou produção?
$sandbox = true;
 
//Baseado no ambiente, sandbox ou produção, definimos as credenciais
//e URLs da API.
if ($sandbox) {
    //credenciais da API para o Sandbox
    $user = 'thavnd_api1.teste.com';
    $pswd = '1391260351';
    $signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31A8j2ABF0MwPBZ5J9vTz4uT5lCMDx';
 
    //URL da PayPal para redirecionamento, não deve ser modificada
    $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
} else {
    //credenciais da API para produção
   $pswd = '1391260351';
    $user = 'thavnd_api1.teste.com';
    $signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31A8j2ABF0MwPBZ5J9vTz4uT5lCMDx';
    //URL da PayPal para redirecionamento, não deve ser modificada
    $paypalURL = 'https://www.paypal.com/cgi-bin/webscr';
}
 
//Campos da requisição da operação SetExpressCheckout, como ilustrado acima.
$requestNvp = array(
    'USER' => $user,
    'PWD' => $pswd,
    'SIGNATURE' => $signature,
 
    'VERSION' => '108.0',
    'METHOD'=> 'SetExpressCheckout',
 
    'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
    'PAYMENTREQUEST_0_AMT' => $_POST['vlrdoacao'],
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'BRL',
    'PAYMENTREQUEST_0_ITEMAMT' => $_POST['vlrdoacao'],
    
 
    'L_PAYMENTREQUEST_0_NAME0' => 'Doação',
    'L_PAYMENTREQUEST_0_DESC0' => 'Doação para uma instituição carente',
    'L_PAYMENTREQUEST_0_AMT0' => $_POST['vlrdoacao'],
    'L_PAYMENTREQUEST_0_QTY0' => '1',
    'L_PAYMENTREQUEST_0_ITEMAMT' => $_POST['vlrdoacao'],
 
 
    'RETURNURL' => 'http://hrsconsultoria.com/graacc/retorno.php',
    'CANCELURL' => 'http://hrsconsultoria.com/graacc/cancela.php',
    'BUTTONSOURCE' => 'BR_EC_EMPRESA'
);
 
//Envia a requisição e obtém a resposta da PayPal
$responseNvp = sendNvpRequest($requestNvp, $sandbox);

//Se a operação tiver sido bem sucedida, redirecionamos o cliente para o
//ambiente de pagamento.
if (isset($responseNvp['ACK']) && $responseNvp['ACK'] == 'Success') {
    $query = array(
        'cmd'    => '_express-checkout',
        'token'  => $responseNvp['TOKEN']
    );
 
    //$redirectURL = sprintf('%s?%s', $paypalURL, http_build_query($query));

    require 'redirect.php';
 
    //header('Location: ' . $redirectURL);
} else {
   echo "<pre>";
   var_dump($responseNvp);
   echo "</pre>";
}
