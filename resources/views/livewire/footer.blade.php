<div>
    <footer id="footer" class="clearfix">
        <div id="footer-widgets" class="container">
            <div class="themesflat-row gutter-30">
                @if($infoRecord != null)
                    <div class="col span_1_of_3">
                        <div class="widget widget_text">
                            <div class="textwidget">
                                <p>
                                    <img src="assets/img/logo-white@2x.png" alt="Image" width="170" height="34">
                                </p>

                                {{-- <p class="margin-bottom-15">We have over 15 years of experien able to help you 24 hours a day.</p> --}}

                                <ul>
                                    @php
                                        $inforows = json_decode($infoRecord->inforows, TRUE);
                                    @endphp
                                    @foreach($inforows as $inforow)
                                        <li>
                                            <div class="inner">
                                                <span class="fa fa-map-marker"></span>
                                                <span class="text">{{$inforow['info']}}</span>
                                            </div>
                                        </li>
                                    @endforeach

                                    {{-- <li>
                                        <div class="inner">
                                            <span class="fa fa-phone"></span>
                                            <span class="text">CALL US : (+61) 3 8376 6284</span>
                                        </div>
                                    </li>

                                    <li class="margin-top-7">
                                        <div class="inner">
                                            <span class=" font-size-14 fa fa-envelope"></span>
                                            <span class="text">SUPPORT@NICHE_THEME</span>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div><!-- /.widget_text -->
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                    </div><!-- /.col -->
                @endif

                @if($title4Record != null)
                    <div class="col span_1_of_3">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="0"></div>

                        <div class="widget widget_lastest">
                            <h2 class="widget-title"><span>{{$title4Record->title4}}</span></h2>
                            <ul class="lastest-posts data-effect clearfix">
                                <li class="clearfix">
                                    <div class="thumb data-effect-item has-effect-icon">
                                        <img src="assets/img/news/post-1-65x65.jpg" alt="Image">
                                        <div class="overlay-effect bg-color-2"></div>
                                        <div class="elm-link">
                                            <a href="page-blog-single.html" class="icon-2"></a>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h3><a href="page-blog-single.html">SMART BUILDING WITH CONCRETE SUSTAINABLE</a></h3>
                                        <span class="post-date"><span class="entry-date">29 June 2018</span></span>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="thumb data-effect-item has-effect-icon">
                                        <img src="assets/img/news/post-2-65x65.jpg" alt="Image">
                                        <div class="overlay-effect bg-color-2"></div>
                                        <div class="elm-link">
                                            <a href="page-blog-single.html" class="icon-2"></a>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h3><a href="page-blog-single.html">HI-TECH WOODEN HOUSE BUILT WITHOUT GLUE</a></h3>
                                        <span class="post-date"><span class="entry-date">31 June 2018</span></span>
                                    </div>
                                </li>                                
                            </ul>
                        </div><!-- /.widget_lastest -->                       
                    </div><!-- /.col -->
                @endif

                @if($tagRecord != null)
                    <div class="col span_1_of_3">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>

                        <div class="widget widget_tags">
                            <h2 class="widget-title margin-bottom-30"><span>{{$tagRecord->title2}}</span></h2>
                            <div class="tags-list">
                                @php
                                    $tagsrows = json_decode($tagRecord->tagsrows, TRUE);
                                @endphp
                                @foreach($tagsrows as $tagsrow)
                                    <a href="#">{{$tagsrow['tag']}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div><!-- /.col -->
                @endif

                @if($imageRecord != null)
                    <div class="col span_1_of_3">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>

                        <div class="widget widget_instagram">
                            <h2 class="widget-title margin-bottom-30"><span>{{$imageRecord->title3}}</span></h2>
                            <div class="instagram-wrap data-effect clearfix col3 g10">
                                @php
                                    $imagerows = json_decode($imageRecord->imagerows, TRUE);
                                @endphp
                                @foreach($imagerows as $imagerow)
                                    <div class="instagram_badge_image has-effect-icon">
                                        <a href="#" target="_blank" class="data-effect-item">
                                            <span class="item"><img src="/images/{{$imagerow['image']}}" alt="Image" ></span>
                                            <div class="overlay-effect bg-color-2"></div>
                                            <div class="elm-link">
                                                <span class="icon-3"></span>
                                            </div>
                                        </a>                                    
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- /.widget_instagram -->

                    </div><!-- /.col -->
                @endif
            </div><!-- /.themesflat-row -->
        </div>
    </footer>

    <div id="bottom" class="clearfix has-spacer">
        <div id="bottom-bar-inner" class="container">
            <div class="bottom-bar-inner-wrap">
                <div class="bottom-bar-content">
                    <div id="copyright">© <span class="text">Construction Template. Design <a href="#" class="text-accent">by @Niche_Theme</a></span> 
                    </div>
                </div><!-- /.bottom-bar-content -->

                <div class="bottom-bar-menu">
                    <ul class="bottom-nav">
                        <li class="menu-item current-menu-item">
                            <a href="home.html">HOME</a>
                        </li>
                        <li class="menu-item">
                            <a href="page-about.htnml">ABOUT US</a>
                        </li>
                        <li class="menu-item">
                            <a href="page-services.html">SERVICES</a>
                        </li>
                        <li class="menu-item">
                            <a href="page-projects.html">PROJECTS</a>
                        </li>
                        <li class="menu-item">
                            <a href="page-testimonial.html">PAGE</a>
                        </li>
                        <li class="menu-item ">
                            <a href="page-blog.html">BLOG</a>
                        </li>
                        <li class="menu-item">
                            <a href="page-contact.html">CONTACT</a>
                        </li>
                    </ul>
                </div><!-- /.bottom-bar-menu -->
            </div><!-- /.bottom-bar-inner-wrap -->                
        </div><!-- /#bottom-bar-inner -->
    </div>
</div>