<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr-TR" lang="tr-TR"><!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>{{ $blog->title }}</title>

    <meta name="author" content=" ">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    
    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors/color1.css') }}" id="colors">

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
                            


                            <article class="hentry data-effect">
                                <div class="post-media data-effect-item has-effect-icon offset-v-25 offset-h-24 clerafix">
                                    <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}">
                                    <div class="post-calendar">                                    
                                        <span class="inner">
                                            <span class="entry-calendar">
                                                <span class="day">{{ $blog->created_at->format('d') }}</span>
                                                <span class="month">{{ $blog->created_at->format('M') }}</span>
                                            </span>
                                        </span>                           
                                    </div>
                                </div>
                            
                                <div class="post-content-wrap clearfix">
                                    <h2 class="post-title">
                                        <span class="post-title-inner">
                                            {{ $blog->title }}
                                        </span>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-meta-content">
                                            <div class="post-meta-content-inner">
                                                <span class="post-date item"><span class="inner"><span class="entry-date">{{ $blog->created_at->format('M d, Y') }}</span></span></span>
                                                <span class="post-by-author item"><span class="inner">By: {{ $blog->author }}</span></span>
                                                <span class="comment item"><span class="inner">{{ $comments->count() }} Comments</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content post-excerpt margin-bottom-43">
                                        {!! $blog->content !!}
                                    </div>
                                    <div class="post-tags-socials clearfix">
                                        <div class="post-tags">
                                            <span>Tags :</span>
                                            @foreach($blog->tags as $tag)
                                                <a href="#">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                        <div class="post-socials">
                                            <a href="#" class="facebook"><span class="fa fa-facebook-square"></span></a>
                                            <a href="#" class="twitter"><span class="fa fa-twitter"></span></a>
                                            <a href="#" class="linkedin"><span class="fa fa-linkedin-square"></span></a>
                                            <a href="#" class="pinterest"><span class="fa fa-pinterest-p"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <div id="comments" class="comments-area">
                                <h2 class="comments-title">{{ $comments->count() }} Comments</h2>
                                
                                <ol class="comment-list">
                                    @foreach($comments as $comment)
                                    <li class="comment">
                                        <article class="comment-wrap clearfix">
                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <h6 class="comment-author">{{ $comment->name }}</h6>
                                                    <span class="comment-time">{{ $comment->created_at->format('M d, Y') }}</span>
                                                </div>
                                                <div class="comment-text">
                                                    <p>{{ $comment->comment }}</p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    @endforeach
                                </ol>
                            
                                <div id="respond" class="comment-respond">
                                    <h3 class="respond-title">Leave a comment</h3>
                                    <form action="{{ route('blog.comment', $blog->slug) }}" method="post" class="comment-form">
                                        @csrf
                                        <div class="text-wrap clearfix">
                                            <fieldset class="name-wrap">
                                                <input type="text" id="name" class="name" name="name" placeholder="Name *" required>
                                            </fieldset>
                                            <fieldset class="email-wrap">
                                                <input type="email" id="email" class="email" name="email" placeholder="Email *" required>
                                            </fieldset>
                                        </div>
                                        <fieldset class="message-wrap">
                                            <textarea id="comment" name="comment" rows="8" placeholder="Comment *" required></textarea>
                                        </fieldset>
                                        <button type="submit" class="submit">Post Comment</button>
                                    </form>
                                </div>
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/animsition.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/countto.js') }}"></script>
    <script src="{{ asset('assets/js/equalize.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel2.thumbs.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/gmap3.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script>
    <script src="{{ asset('assets/js/shortcodes.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Revolution Slider -->
    <script src="{{ asset('includes/rev-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev-slider.js') }}"></script>
    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->  
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('includes/rev-slider/js/extensions/revolution.extension.video.min.js') }}"></script>

</body>
</html>

