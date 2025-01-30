<div>
    <footer id="footer" class="clearfix">
        <div id="footer-widgets" class="container">
            <div class="themesflat-row gutter-30">
                <div class="col span_1_of_3">
                    <div class="widget widget_text">
                        <div class="textwidget">
                            <p>
                                @if($footer && $footer->logo)
                                    <img src="{{ asset('admin/footerImage/'.$footer->logo) }}" alt="Logo" width="170" height="34">
                                @endif
                            </p>

                            <p class="margin-bottom-15">{{ $footer->description ?? '' }}</p>

                            <ul>
                                @if($footer && $footer->contact_items && $footer->icons)
                                    @foreach($footer->contact_items as $key => $item)
                                        <li>
                                            <div class="inner">
                                                <span class="fa fa-map-{{ $footer->icons[$key] }}"></span>
                                                <span class="text">{{ $item }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                </div>

                <div class="col span_1_of_3">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="0"></div>

                    <div class="widget widget_lastest">
                        <h2 class="widget-title"><span>RECENT POSTS</span></h2>
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
                    </div>                      
                </div>

                <div class="col span_1_of_3">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>

                    <div class="widget widget_tags">
                        <h2 class="widget-title margin-bottom-30"><span>TAGS</span></h2>
                        <div class="tags-list">
                            @if($footer && $footer->tags)
                                @foreach($footer->tags as $tag)
                                    <a href="#">{{ $tag }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col span_1_of_3">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>

                    <div class="widget widget_instagram">
                        <h2 class="widget-title margin-bottom-30"><span>INSTAGRAM PHOTOS</span></h2>
                        <div class="instagram-wrap data-effect clearfix col3 g10">
                            @if($footer && $footer->instagram_photos)
                                @foreach($footer->instagram_photos as $photo)
                                    <div class="instagram_badge_image has-effect-icon">
                                        <a href="#" target="_blank" class="data-effect-item">
                                            <span class="item">
                                                <img src="{{ asset('admin/footerImage/'.$photo) }}" alt="Instagram">
                                            </span>
                                            <div class="overlay-effect bg-color-2"></div>
                                            <div class="elm-link">
                                                <span class="icon-3"></span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="bottom" class="clearfix has-spacer">
        <div id="bottom-bar-inner" class="container">
            <div class="bottom-bar-inner-wrap">
                <div class="bottom-bar-content">
                    <div id="copyright">
                        {{ $footer->copyright_text ?? '' }}
                    </div>
                </div>

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
                </div>
            </div>               
        </div>
    </div>
</div>