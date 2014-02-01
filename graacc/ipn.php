<?php

require 'ipn_functions.php';


$receiver_email = 'seller@paypalsandbox.com';
 
//Informações para conexão com o banco de dados, que utilizaremos
//para gravar o log.
/*$mysql = array(
    'host' => 'localhost',
    'user' => 'root',
    'pswd' => 'root',
    'dbname' => 'hackaton'
);*/
//As notificações sempre serão via HTTP POST, então verificamos o método
//utilizado na requisição, antes de fazer qualquer coisa.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Antes de trabalhar com a notificação, precisamos verificar se ela
    //é válida e, se não for, descartar.
    if (!isIPNValid($_POST)) {
        return;
    }
 
    //Se chegamos até aqui, significa que estamos lidando com uma
    //notificação IPN válida. Agora precisamos verificar se somos o
    //destinatário dessa notificação, verificando o campo receiver_email.
    //if ($_POST['receiver_email'] == $receiver_email) {
        logIPN($_POST);
            //Log gravado, podemos seguir com as regras de negócio para
            //essa notificação.
        
    //}
}