<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr-TR" lang="tr-TR"><!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>İletişim</title>

    <meta name="author" content="TURKANLTD">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="assets/css/colors/color1.css" id="colors">

    <!-- Favicon and Touch Icons  -->
    <!-- <link rel="shortcut icon" href="assets/icon/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/icon/apple-touch-icon-158-precomposed.png"> -->

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->

</head>

<body class="header-fixed page no-sidebar header-style-2 topbar-style-1 menu-has-search">

    <div id="wrapper" class="animsition">
        <div id="page" class="clearfix">
            
            <!-- Header Wrap -->
            @livewire('header')
            <!-- Header Wrap -->

            <!-- Main Content -->
            <div id="main-content" class="site-main clearfix">
                <div id="content-wrap">
                    <div id="site-content" class="site-content clearfix">
                        <div id="inner-content" class="inner-content-wrap">
                        <div class="page-content">

                                <!-- ICONBOX -->
                                    @livewire('contact-us-row')
                                <!-- END ICONBOX -->

                            <!-- CONTACT -->
                                <div class="row-contact">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">                                            
                                                <div class="themesflat-contact-form style-2 w100 clearfix">
                                                    <form id="contactform" action="./contact/contact-process2.php" method="post" class="contact-form wpcf7-form">
                                                        <span class="wpcf7-form-control-wrap your-name">
                                                            <input type="text" tabindex="1" id="name" name="name" value="" class="wpcf7-form-control" placeholder="Name*" required>
                                                        </span>                                                                                                           
                                                        <span class="wpcf7-form-control-wrap your-email">
                                                            <input type="email" tabindex="3" id="email" name="email" value="" class="wpcf7-form-control" placeholder="Your Email*" required>
                                                        </span>
                                                        <span class="wpcf7-form-control-wrap your-phone">
                                                            <input type="text" tabindex="2" id="phone" name="phone" value="" class="wpcf7-form-control" placeholder="Phone">
                                                        </span>
                                                        <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea name="message" tabindex="5" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Message*" required ></textarea>
                                                        </span>                                                             
                                                        <span class="wrap-submit">
                                                            <input type="submit" value="GÖNDER" class="submit wpcf7-form-control wpcf7-submit" id="submit" name="submit">
                                                        </span>                                                            
                                                    </form>
                                                </div><!-- /.themesflat-contact-form -->
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-8">
                                                <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                                <div class="themesflat-map style-2"></div>
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="themesflat-spacer clearfix" data-desktop="81" data-mobile="60" data-smobile="60"></div>
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.container -->
                                </div>
                                <!-- END CONTACT -->
                        </div><!-- /.page-content -->
                        </div><!-- /#inner-content -->
                    </div><!-- /#site-content -->
                </div><!-- /#content-wrap -->
            </div><!-- /#main-content -->

            <!-- Footer -->
                @livewire('footer')
            <!-- Footer -->

        </div><!-- /#page -->
    </div><!-- /#wrapper -->

    <a id="scroll-top"></a>

    <!-- Javascript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/animsition.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/countto.js"></script>
    <script src="assets/js/equalize.min.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/owl.carousel2.thumbs.js"></script>

    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPH8h1UpcK01BdcvoZeOzq-_wJqRxN1Pc&region=GB"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/jquery-validate.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Revolution Slider -->
    <script src="includes/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="includes/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/js/rev-slider.js"></script>
    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->  
    <script src="includes/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="includes/rev-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>
</html>

