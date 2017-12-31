<?php
session_start();
$id = $_SESSION['id'];
?>

<html>
    <head>  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../css/freelancer.min.css" rel="stylesheet">
        <script src="../js/jquery.min.js"></script>

        <link rel="stylesheet" href="../css/animate.css" />
        <link rel="stylesheet" href="../css/csshake.min.css" />
        <script src="../js/jquery.dataTables.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/alertify.js"></script>


        <link rel="stylesheet" href="../css/imagen.css" />
        <script src="../js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css"  href="../css/alertify.css">
        <link rel="stylesheet" href="../css/tem.css" />

        <script src="../js/ajax1.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="row">

                <div id="bk-wrap">
                    <div id="bk-no-blur"></div>
                    <div id="bk-blur"></div>
                </div>

                <div id="bk-shadow"></div>

                <p id="logo"> VRAMM DEV </p>
                <a id="menu-link" class="animated bounceInDown " href="javascript:Cerrar('../Controlador','Admin',8,'id='+<?php echo $id ?>),showOverlay();" >
                    <span class="menu-sub">Full Turismo</span>
                    <span class="menu-main">MENU:</span>
                </a>
                <div id="menu-wrap">
                    <div id="menu-inner">
                        <h1 id="menu-title">Opciones:</h1>
                        <a  href="javascript:Cerrar('../Controlador','Admin',8,'id='+<?php echo $id ?>),hideOverlay();" id="close">x</a>
                        <div id="contenido1" class="col-md-12">


                        </div>
                    </div>  
                </div>
            </div>
        </div>    
        <script>

            var $menuWrap = $('#menu-wrap'),
                    $body = $('body'),
                    $menuTitle = $('#menu-title'),
                    $close = $('#close'),
                    $menuCards = $('.menu-card'),
                    $menuInner = $('#menu-inner'),
                    $menuLink = $('#menu-link');

            setCardHeight();
            $(window).resize(setCardHeight);



            function showOverlay() {
                $body.addClass('menu-on');
                $menuWrap.addClass('display').addClass('visible');
                setTimeout(function () {
                    $menuTitle.addClass('on');
                    $close.addClass('on');
                }, 200);
                $menuCards.each(function (i) {
                    var $card = $(this);
                    setTimeout(function () {
                        $card.addClass('on');
                    }, 200 + 50 * i);
                });
            }

            function hideOverlay() {
                $body.removeClass('menu-on');
                $menuCards.removeClass('on');
                $menuTitle.removeClass('on');
                $close.removeClass('on');
                setTimeout(function () {
                    $menuWrap.removeClass('display').removeClass('visible');
                }, 350);
            }

            function setCardHeight() {
                var windowWidth = $(window).width();
                var topVal;
                if (windowWidth >= 1300) {
                    topVal = ($(window).height() - 700) / 2;
                } else {
                    topVal = ($(window).height() - 200 - (windowWidth / 1300 * 513)) / 2;
                }
                if (topVal < 10) {
                    topVal = 10;
                }
                $menuInner.css('top', topVal);
            }

        </script>

    </body>
</html>
