<?php require 'sendNvpRequest.php'; ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <title>GRAACC | PayPal</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Ajude a salvar um futuro!" name="description">
        <meta content="Thamara Hessel" name="author">

        <!-- CSS Global Compulsory-->
        <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/headers/header1.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <link rel="shortcut icon" href="favicon.ico">        
        <!-- CSS Implementing Plugins -->    
        <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.css">
        <!-- CSS Page Style -->    
        <link rel="stylesheet" href="../assets/css/pages/page_log_reg_v2.css">    
        <!-- CSS Theme -->    
        <link rel="stylesheet" href="../assets/css/themes/orange.css" id="style_color">
        <style>
            .transparente{
                opacity:0.85;
                -moz-opacity: 0.85;
                filter: alpha(opacity=85);
            }


        </style>
    </head> 

    <body>

         <!--=== Content Part ===-->    
        <div class="container " >
            <div class="reg-block transparente" >


                <?php
                if (isset($_GET['token'])) {
                    $token = urldecode($_GET['token']);

                    $curl = curl_init();
 
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
                    'USER' => 'thavnd_api1.teste.com',
                    'PWD' => '1391260351',
                    'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31A8j2ABF0MwPBZ5J9vTz4uT5lCMDx',
                    'METHOD' => 'GetExpressCheckoutDetails',
                    'VERSION' => '91',
                    'TOKEN' => $token
                    )));
                     
                    $response =    curl_exec($curl);
                     
                    curl_close($curl);
                     
                    $nvp = array();
                     
                    if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
                        foreach ($matches['name'] as $offset => $name) {
                            $nvp[$name] = urldecode($matches['value'][$offset]);
                        }
                    }
                     
                    // print_r($nvp);
                   
                    $curl = curl_init();
 
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
                        'USER' => 'thavnd_api1.teste.com',
                         'PWD' => '1391260351',
                            'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31A8j2ABF0MwPBZ5J9vTz4uT5lCMDx',
                     
                        'METHOD' => 'CreateRecurringPaymentsProfile',
                        'VERSION' => '91',
                        'LOCALECODE' => 'pt_BR',
                     
                        'TOKEN' => $nvp['TOKEN'],
                        'PayerID' =>  $nvp['PAYERID'],
                     
                        'PROFILESTARTDATE' => $nvp['TIMESTAMP'],
                        'DESC' => 'Exemplo',
                        'BILLINGPERIOD' => 'Month',
                        'BILLINGFREQUENCY' => '1',
                        'AMT' => $nvp['AMT'],
                        'CURRENCYCODE' => 'BRL',
                        'COUNTRYCODE' => 'BR',
                        'MAXFAILEDPAYMENTS' => 3
                    )));
                     
                    $response =    curl_exec($curl);
                     
                    curl_close($curl);
                     
                    $nvp2 = array();
                     
                    if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
                        foreach ($matches['name'] as $offset => $name) {
                            $nvp2[$name] = urldecode($matches['value'][$offset]);
                        }
                    }



                 if ($nvp2['ACK'] == 'Success') {

                            if ($nvp['PAYMENTREQUEST_0_AMT']) {
                                echo "<h5>".$nvp['FIRSTNAME']." ".$nvp['LASTNAME']."</h5>";    
                               
                               echo "<br>Sua contribuição de R$ " . $nvp['PAYMENTREQUEST_0_AMT']. " ajuda a manter nossa luta contra o câncer ainda mais forte, 
                               abaixo um recado nosso para você! <br>";
                            } else {
                                echo 'Não foi possível concluir a transação';
                            }
                        } else {
                            echo 'Não foi possível concluir a transação';
                        }
                    




                   
                    } else {
                        echo "Não encontramos informações do seu pagamento, consulte sua conta PayPal e tente novamente =)";
                    }
                
                ?>


            </div>
            <div class="row text-center">
                <iframe width="420" height="315" src="//www.youtube.com/embed/_K3ikIHaGVw" frameborder="0" allowfullscreen></iframe>
            </div>
            <!--End Reg Block-->
        </div><!--/container-->

        <!--=== End Content Part ===-->
<div class='row text-center'>
    <!-- PayPal Logo --><img  src="https://www.paypal-brasil.com.br/logocenter/util/img/compra_segura_horizontal_pb.png" border="0" alt="Imagens de solução" /><!-- PayPal Logo -->
</div>
        <!-- JS Global Compulsory -->           
        <script type="text/javascript" src="../assets/plugins/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../assets/plugins/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="../assets/plugins/hover-dropdown.min.js"></script> 
        <script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
        <!-- JS Implementing Plugins -->           
        <script type="text/javascript" src="../assets/plugins/countdown/jquery.countdown.js"></script>
        <script type="text/javascript" src="../assets/plugins/backstretch/jquery.backstretch.min.js"></script>
        <script>

            $('#acessarBt').click(
                    function() {
                        var datafrm = $('#logarfrm').serialize();
                        $.post($('#logarfrm').attr('action'), datafrm,
                                function(data) {
                                    if (data.status) {
                                        $("#retornoForm").html(data.msg);
                                        $("#retornoForm").removeClass("alert alert-danger");
                                        $("#retornoForm").addClass("alert alert-success");
                                        $('html, body').animate({scrollTop: 0}, 'slow');
                                        $(location).attr('href', "/");
                                    }
                                    else {
                                        $("#retornoForm").html(data.msg);
                                        $("#retornoForm").addClass("alert alert-danger");
                                        $('html, body').animate({scrollTop: 0}, 'slow');
                                    }

                                }, "json");

                        return false;
                    });
        </script>
        <script type="text/javascript">
            $.backstretch([
                "../assets/img/bg/11.jpg",
                "../assets/img/bg/12.jpg",
                "../assets/img/bg/14.jpg",
                "../assets/img/bg/15.jpg",
            ], {
                fade: 1200,
                duration: 2500
            });
        </script>
        <!-- JS Page Level -->           
        <script type="text/javascript" src="../assets/js/app.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                App.init();
            });
        </script>
        <!--[if lt IE 9]>
            <script src="../assets/plugins/respond.js"></script>
        <![endif]-->


    </body>
</html> 