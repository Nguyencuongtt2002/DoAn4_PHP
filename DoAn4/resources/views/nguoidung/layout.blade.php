<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="/nguoidung/images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/nguoidung/css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/lib/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/lib/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/lib/select2/css/select2.min.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/lib/jquery.bxslider/jquery.bxslider.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/lib/owl.carousel/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/lib/jquery-ui/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/lib/fancyBox/source/jquery.fancybox.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/css/green.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/css/responsive.css"/>
        <link rel="stylesheet" type="text/css" href="/nguoidung/css/style_frm_dkdn.css"/>
        <link rel="stylesheet" href="/nguoidung/css/switcher.css">
        <title>Mark Shop</title>
        <style>
            .btnStyle {
                border-radius: 6px;
                cursor: pointer;
                color: red;
                background-size: 200%;
                padding: 13px;
                width: 130px;
                transition: all .5s !important;
                outline: none;
                border: none;
            }

            .btnStyle:focus {
                        outline: none;
            }
            .btn1 {
                background-image: linear-gradient(to left,#FFC312,#EE5A24,#FFC312);
            }

            .btn2 {
                font-size:9.66px;
                height:46px;
                background-image: linear-gradient(to left, #badc58,#6ab04c,#badc58);
            }

            .btnStyle:hover {
                background-position: right;
            }
            .btn_muangay {
                width: 91%;
                text-transform: uppercase;
                text-decoration: none;
                text-align: center;
                display: block;
                background-image: linear-gradient(to left,#FFC312,#EE5A24,#FFC312);
                color: #FFF;
                padding: 10px 0px;
                transition: 0.25s ease-in-out;
                opacity: 0;
                position: absolute;
                top: 150px;
                cursor: pointer;
            }
        
                .btn_muangay:hover {
                    opacity: 1;
                }
        
            .label {
                position: absolute;
                background-color: red;
                right: 0px;
                top: 20px;
                font-size: 14px;
                width: 80px;
                height: 20px;
                text-align: center;
                z-index: 1000;
            }
            #cart{
                width: 80px;
                height:40px;
                float:right;
                margin-top: 24px;	
                text-align: center;
                font-size: 12px;
            }

            #img-cart{
                width: 20px;
                height:20px;
                margin-bottom: 2px;
            }
            .intro-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1em;
            }

            .intro-image {
                max-width: 100%;
                height: auto;
                border-radius: 50%;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            }
            .contact-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            }

            h1 {
                text-align: center;
                margin-bottom: 30px;
            }

            .contact-info {
                margin-bottom: 30px;
            }

            .contact-info p {
                margin-bottom: 10px;
            }

            .contact-button {
                display: block;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background-color: #4caf50;
                color: #fff;
                font-size: 16px;
                text-align: center;
                text-decoration: none;
            }

            .contact-button:hover {
                background-color: #3e8e41;
            }
            .carousel-control.left, .carousel-control.right {
            background-image: none;
            }
            .carousel-control.left span, .carousel-control.right span {
            background-image: none;
            color: #fff; 
            }
        </style>
    </head>
     @include('nguoidung/header')
     @yield('nguoidung/content')
     @include('nguoidung/footer')
    <body >
        <script type="text/javascript" src="/nguoidung/lib/jquery/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="/nguoidung/lib/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="/nguoidung/lib/fancyBox/source/jquery.fancybox.pack.js" ></script>
        <script type="text/javascript" src="/nguoidung/lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/nguoidung/lib/select2/js/select2.min.js"></script>
        <script type="text/javascript" src="/nguoidung/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="/nguoidung/lib/owl.carousel/owl.carousel.min.js"></script>



        <script type="text/javascript" src="/nguoidung/js/jquery.actual.min.js"></script>
        <script type="text/javascript" src="/nguoidung/js/theme-script.js"></script>
        <script type="text/javascript" src="/nguoidung/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="/nguoidung/js/boostrap.min.js"></script>

        <script type="text/javascript" src="/nguoidung/js/layout.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Layout.init();
                Layout.initOWL();
                Layout.initTwitter();
                Layout.initImageZoom();
                Layout.initTouchspin();
                Layout.initUniform();
                Layout.initSliderRange();
            });
        </script>
    </body>

</html>