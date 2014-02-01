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

                <div class="reg-block-header">
                    <div class="visivel">
                    <p>Clique <a class="color-green" href="https://www.graacc.org.br/o-graacc.aspx" target="_blank">aqui</a> e conheça nossa luta!</p>
                    <ul class="list-inline style-icons text-center">
                        <li>                            
                            <a class="color-green" href="https://www.graacc.org.br/o-graacc.aspx" target="_blank"><img src="../assets/img/bg/15.jpg" width="100"></a>
                        </li>
                    </ul>

                    <p>Contamos com você para continuarmos vitoriosos nessa batalha contra o câncer infanto-juvenil! </p>
                    <p>Sendo um sócio mantenedor do GRAACC, você coloca em prática sua vontade de ajudar e contribui para que nosso hospital possa oferecer uma estrutura adequada e completa aos pacientes.<p/>
                    <hr>
                    <p>Você pode optar entre duas modalidades de doação: </p>
                    </div>
                </div>



                <form  action="/graacc/checkoutRec.php" id="logarfrm" name="logarfrm" method="post" target="_top">
                    <div class="row"> 
                        <div class="text-center ">
                            <h5>** Assinatura mensal **</h5>
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="BR6NK7DGVBEW6">                       
                            <input type="hidden" name="currency_code" value="BRL"> 
                            <input type="hidden"  name="on0" value="">
                            <select name="assinatura" class="form-control" >
                                <option value="5">R$ 5 - mensalmente</option>
                                <option value="10">R$ 10 - mensalmente</option>
                                <option value="15">R$ 15 - mensalmente</option>
                            </select>
                        </div>
                        <br>
                        <div class="row text-center">  
                            <div class="col-md-10 col-md-offset-1 text-center">
                                <input type="image" src="https://www.paypal-brasil.com.br/logocenter/util/img/botao-checkout_horizontal_assinecom_ap.png" border="0" name="submit" alt="PayPal - A maneira mais fácil e segura de efetuar pagamentos online!">
                            </div>
                        </div>
                    </div>
                </form>

                <hr>
                <div class="row text-center">  
                    <h3>OU</h3>
                </div>
                <hr>
                <form action="/graacc/checkout.php" id="logarfrm" name="logarfrm" method="post" target="_top">
                    <div class="text-center">
                        <h5> ** Doação única **</h5>
                        <input type='text' name='vlrdoacao' id='vlrdoacao' class='form-control'>
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="AUVWE3YKM656U">
                        <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">

                        <div class="col-md-10 col-md-offset-1">
                       <input type="image" src="https://www.paypal-brasil.com.br/logocenter/util/img/botao-checkout_horizontal_paguecom_ap.png" border="0" name="submit" alt="PayPal - A maneira mais fácil e segura de efetuar pagamentos online!">
                        </div>
                    </div>
                </form> 
                <hr>
                <div class="row text-center">

                    <object width="250" height="40" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="gsSong3909534653" name="gsSong3909534653">
                        <param name="movie" value="http://grooveshark.com/songWidget.swf" />
                        <param name="wmode" value="window" /><param name="allowScriptAccess" value="always" />
                        <param name="flashvars" value="hostname=grooveshark.com&songID=39095346&style=metal&p=1" />
                        <object type="application/x-shockwave-flash" data="http://grooveshark.com/songWidget.swf" width="250" height="40">
                            <param name="wmode" value="window" /><param name="allowScriptAccess" value="always" />
                            <param name="flashvars" value="hostname=grooveshark.com&songID=39095346&style=metal&p=1" />
                            <span>
                                <a href="http://grooveshark.com/search/song?q=Lowing%20I%20Will%20Wait%20For%20You%20(Everybody%20Wants%20To%20Be%20A%20Cowboy)" title="I Will Wait For You (Everybody Wants To Be A Cowboy) by Lowing on Grooveshark">I Will Wait For You (Everybody Wants To Be A Cowboy) by Lowing on Grooveshark</a>
                            </span>
                        </object>
                    </object>
                </div>
            </div>
            <!--End Reg Block-->
        </div><!--/container-->
<div class='row text-center'>
    <!-- PayPal Logo --><img  src="https://www.paypal-brasil.com.br/logocenter/util/img/compra_segura_horizontal_pb.png" border="0" alt="Imagens de solução" /><!-- PayPal Logo -->
</div>
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

            // $('#vlrdoacao').change(function(){
            //     var regex = \0-9\;
            //     console.log(test($(this).val()),regex);
            // });
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