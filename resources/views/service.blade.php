<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr-TR" lang="tr-TR"><!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Servis</title>

    <meta name="author" content=" ">

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

<body class="header-fixed page sidebar-left header-style-2 topbar-style-1 menu-has-search">

    <div id="wrapper" class="animsition">
        <div id="page" class="clearfix">

            <!-- Header Wrap -->
                @livewire('header')
            <!-- Header Wrap -->

            <!-- Main Content -->
            <div id="main-content" class="site-main clearfix">
                <div id="content-wrap" class="container">
                    <div id="site-content" class="site-content clearfix">
                        <div id="inner-content" class="inner-content-wrap">
                            <!-- Info -->
                                @livewire('info')
                            <!-- Info -->
                            <div class="themesflat-spacer clearfix" data-desktop="39" data-mobile="39" data-smobile="39"></div>  

                            @if($record)
                                <div class="flat-content-wrap style-2 clearfix">
                                    <h5 class="title">{{$record->title}}</h5>
                                    <p>{{$record->content}}</p>
                                </div>
                            @else
                                
                            @endif 
                            <div class="themesflat-spacer clearfix" data-desktop="37" data-mobile="35" data-smobile="35"></div>     
                            <div class="flat-content-wrap style-2 clearfix">
                                <!-- Our Services -->
                                    @livewire('our-services')
                                <!-- Our Services -->

                                <!-- Info Box -->
                                    @livewire('info-box')
                                <!-- Info Box -->
                            </div>
                            <div class="themesflat-spacer clearfix" data-desktop="37" data-mobile="35" data-smobile="35"></div> 
                            <!-- Consult With Us -->
                                @livewire('consult-with-us')
                            <!-- Consult With Us -->
                            <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
                        </div><!-- /#inner-content -->
                    </div><!-- /#site-content -->
                    <div id="sidebar">
                        <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="0" data-smobile="0"></div>
                        <!-- Email Box -->
                        @livewire('email-box')
                        <!-- Email Box -->
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                    </div><!-- /#sidebar -->
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script>
    <script src="assets/js/shortcodes.js"></script>
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