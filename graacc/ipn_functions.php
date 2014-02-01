<?php
/**
 * Verifica se uma notificação IPN é válida, fazendo a autenticação
 * da mensagem segundo o protocolo de segurança do serviço.
 * 
 * @param array $message Um array contendo a notificação recebida.
 * @return boolean TRUE se a notificação for autência, ou FALSE se
 *                 não for.
 */
function isIPNValid(array $message)
{
    $endpoint = 'https://www.paypal.com';
 
    if (isset($message['test_ipn']) && $message['test_ipn'] == '1') {
        $endpoint = 'https://www.sandbox.paypal.com';
    }
 
    $endpoint .= '/cgi-bin/webscr?cmd=_notify-validate';
 
    $curl = curl_init();
 
    curl_setopt($curl, CURLOPT_URL, $endpoint);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($message));
  
    $response = curl_exec($curl);
    $error = curl_error($curl);
    $errno = curl_errno($curl);
 
    curl_close($curl);
  
    return empty($error) && $errno == 0 && $response == 'VERIFIED';
}


function logIPN(PDO $pdo, array $message)
{
    $stm = $pdo->prepare('
        INSERT INTO `ipn`(
            `txn_id`,
            `txn_type`,
            `receiver_email`,
            `payment_status`,
            `pending_reason`,
            `reason_code`,
            `custom`,
            `invoice`,
            `notification`,
            `hash`
        ) VALUES (
            :txn_id,
            :txn_type,
            :receiver_email,
            :payment_status,
            :pending_reason,
            :reason_code,
            :custom,
            :invoice,
            :notification,
            :hash
        );');
 
    $ipn = array_merge(array(
        'txn_id' => null,
        'txn_type' => null,
        'payment_status' => null,
        'pending_reason' => null,
        'reason_code' => null,
        'custom' => null,
        'invoice' => null
    ), $message);
 
    $notification = serialize($message);
    $hash = md5($notification);
 
    $stm->bindValue(':txn_id', $ipn['txn_id']);
    $stm->bindValue(':txn_type', $ipn['txn_type']);
    $stm->bindValue(':receiver_email', $ipn['receiver_email']);
    $stm->bindValue(':payment_status', $ipn['payment_status']);
    $stm->bindValue(':pending_reason', $ipn['pending_reason']);
    $stm->bindValue(':reason_code', $ipn['reason_code']);
    $stm->bindValue(':custom', $ipn['custom']);
    $stm->bindValue(':invoice', $ipn['invoice']);
    $stm->bindValue(':notification', $notification);
    $stm->bindValue(':hash', $hash);
 
    return $stm->execute();
}