<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="description" content="Swaraj Suiting Limited Bhilwara Rajasthan">
    <meta property="og:title" content="Swaraj Suiting Limited Bhilwara Rajasthan">
    <meta property="og:description" content="Swaraj Suiting Limited Bhilwara Rajasthan">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <!-- PAGE TITLE HERE -->
    <title>Swaraj Suiting Limited | Weaving the future</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
 <script src="js/html5shiv.min.js"></script>
 <script src="js/respond.min.js"></script>
 <![endif]-->

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="css/plugins.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="plugins/themify/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.min.css">
    <link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-2.min.css">
    <link rel="stylesheet" type="text/css" href="css/templete.min.css">
    <!-- Google Font -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
    </style>

    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/revolution.min.css">
</head>

<body id="bg">
    <div class="page-wraper roboto-condensed">
        <div id="loading-area"></div>
        <!-- ======= Header ======= -->
        @include('frontends.partials.header')
        <!-- ======= Header ======= -->

        <!-- ======= Content ======= -->
        <main id="main" class="main">
            @yield('content')
        </main>
        <!-- ======= End Content ======= -->

        <!-- ======= Footer ======= -->
        @include('frontends.partials.footer')
        <!-- ======= End Footer ======= -->
        <button class="scroltop style3" type="button"><i class="fa fa-arrow-up"></i></button>
    </div>
    <!-- JAVASCRIPT FILES ========================================= -->
    <script src="js/combining.js"></script><!-- CONTACT JS  -->
    <script src="js/jquery.lazy.min.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/rev.slider.js"></script>
    <script>
        jQuery(document).ready(function() {
            'use strict';
            dz_rev_slider_12();
            $('.lazy').Lazy();
        }); /*ready*/
    </script>
    <script>
        function openModal(key, name) {
            $("#bioModalLabel").html(name);
            let desc = $("#bio_" + key).html();
            $("#bioModalDescription").html(desc);
            $('#bioModal').modal('show');
        }
    </script>
</body>

</html>
