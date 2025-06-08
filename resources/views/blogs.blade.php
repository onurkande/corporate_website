<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr-TR" lang="tr-TR"><!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Bloglar</title>
    
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

<body class="header-fixed sidebar-right header-style-2 topbar-style-1 menu-has-search">

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



                            @foreach($blogs as $blog)
                            <article class="hentry data-effect">
                                <div class="post-media data-effect-item has-effect-icon offset-v-25 offset-h-24 clerafix">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}">
                                    </a>
                                    <div class="post-calendar">                                    
                                        <span class="inner">
                                            <span class="entry-calendar">
                                                <span class="day">{{ $blog->created_at->format('d') }}</span>
                                                <span class="month">{{ $blog->created_at->format('M') }}</span>
                                            </span>
                                        </span>                           
                                    </div>
                                    <div class="overlay-effect bg-color-1"></div>
                                    <div class="elm-link">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="icon-1"></a>
                                    </div>
                                </div>

                                <div class="post-content-wrap clearfix">
                                    <h2 class="post-title">
                                        <span class="post-title-inner">
                                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                        </span>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-meta-content">
                                            <div class="post-meta-content-inner">
                                                <span class="post-date item"><span class="inner"><span class="entry-date">{{ $blog->created_at->format('M d, Y') }}</span></span></span>
                                                <span class="post-by-author item"><span class="inner">By: {{ $blog->author }}</span></span>
                                                <span class="comment item"><span class="inner">{{ $blog->comments->where('status', true)->count() }} Comments</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content post-excerpt">
                                        <p>{{ \Str::limit(strip_tags($blog->content), 200) }}</p>
                                    </div>
                                    <div class="post-read-more">
                                        <div class="post-link">
                                            <a href="{{ route('blog.show', $blog->slug) }}">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach

                            <div class="themesflat-pagination clearfix">
                                {{ $blogs->links() }}
                            </div> 


                            
                        </div>
                    </div>
                    <div id="sidebar">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                        <div id="inner-sidebar" class="inner-content-wrap">
                            {!! $sidebarContent ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
                @livewire('footer')
            <!-- Footer -->

        </div>
    </div>

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

