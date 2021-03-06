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

                    $nvp = array(
                        'TOKEN' => $token,
                        'METHOD' => 'GetExpressCheckoutDetails',
                        'VERSION' => '108.0',
                         'USER' => 'fpm2336-homer2_api1.gmail.com',
                         'PWD' => '1390971538',
                         'SIGNATURE' => 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAyHCGxmJO-KYyGvZNIrM9KTFAjAT'
                        );
                  
                    $responseNvp = sendNvpRequest($nvp, true);

                    if (isset($responseNvp['TOKEN']) && isset($responseNvp['ACK'])) {
                        if ($responseNvp['TOKEN'] == $token && $responseNvp['ACK'] == 'Success') {
                            $nvp = array(

                                "USER"=>"fpm2336-homer2_api1.gmail.com", 
                                "PWD"=>"1390971538", 
                                "SIGNATURE"=>"AiPC9BjkCyDFQXbSkoZcgqH3hpacAyHCGxmJO-KYyGvZNIrM9KTFAjAT", 
                                "VERSION"=>108.0, 
                                "METHOD"=>"CreateRecurringPaymentsProfile", 
                                "LOCALECODE"=>"pt_BR", 
                                "TOKEN"=>$responseNvp['TOKEN'], 
                                "PAYERID"=>$responseNvp['PAYERID'], 
                                "PROFILESTARTDATE"=>$responseNvp['TIMESTAMP'], //date("d-m-Y H:i:s", time() + 10*60*60), 
                                "NOTIFYURL"=>"http://hrsconsultoria/graacc/ipn.php", 
                                "PAYMENTREQUEST_0_CURRENCYCODE"=>"BRL", 
                                "PAYMENTREQUEST_0_PAYMENTACTION"=>"SALE", 
                                //"PAYMENTREQUEST_0_INVNUM"=>61, 
                                "PAYMENTREQUEST_0_ITEMAMT"=>$responseNvp["PAYMENTREQUEST_0_ITEMAMT"], 
                                "DESC"=>"Exemplo", 
                                "BILLINGPERIOD"=>"Month", 
                                "BILLINGFREQUENCY"=>"1", 
                                "AMT"=>$responseNvp['AMT'], 
                                "CURRENCYCODE"=>"BRL", 
                                "COUNTRYCODE"=>"BR", 
                                "MAXFALIEDPAYMENTS"=>3);

                            echo "<pre>";
                            var_dump($nvp);
                            echo "</pre>";                    

                            $responseNvpDo = sendNvpRequest($nvp, true);

                            echo "<pre>";
                            var_dump($responseNvpDo);
                            echo "</pre>";

                            if ($responseNvpDo['PAYMENTINFO_0_PAYMENTSTATUS'] == 'Completed') {
                                echo "<h5>".$responseNvp['FIRSTNAME']." ".$responseNvp['LASTNAME']."</h5>";    
                               
                               echo "<br>Suas contribuições de R$ " . $responseNvpDo['PAYMENTINFO_0_AMT']. " ajuda a manter nossa luta contra o câncer ainda mais forte, 
                               abaixo um recado nosso para você! <br>";
                            } else {
                                echo 'Não foi possível concluir a transação';
                            }
                        } else {
                            echo 'Não foi possível concluir a transação';
                        }
                    } else {
                        echo 'Não foi possível concluir a transação';
                    }

                } else {
                    if (isset($_GET['st'])) {
                        if ($_GET['st'] == "Completed") {
                            echo "Sua contribuição de R$ " . $_GET['amt'] . " ajuda a manter nossa luta contra o câncer ainda mais forte, abaixo um recado nosso para você! ";
                        }
                    } else {
                        echo "Não encontramos informações do seu pagamento, consulte sua conta PayPal e tente novamente =)";
                    }
                }
                ?>


            </div>
            <div class="row text-center">
                <iframe width="420" height="315" src="//www.youtube.com/embed/_K3ikIHaGVw" frameborder="0" allowfullscreen></iframe>
            </div>
            <!--End Reg Block-->
        </div><!--/container-->

        <!--=== End Content Part ===-->

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