@php
$header = \App\Models\Header::first();
@endphp

@if($header)
<div id="site-header-wrap">
    <!-- Top Bar -->        
    <div id="top-bar">
        <div id="top-bar-inner" class="container">
            <div class="top-bar-inner-wrap">
                <div class="top-bar-content">
                    <div class="inner">
                        <span class="address content">{{ $header->address ?? '4946 Marmora Road, Central New' }}</span>
                        <span class="phone content">{{ $header->phone ?? '+61 3 8376 6284' }}</span>
                        <span class="time content">{{ $header->working_hours ?? 'Mon-Sat: 8am - 6pm' }}</span>
                    </div>                            
                </div><!-- /.top-bar-content -->

                <div class="top-bar-socials">
                    <div class="inner">
                        <span class="text">Follow us:</span>
                        <span class="icons">
                            @if($header && $header->icons)
                                @foreach($header->icons as $icon)
                                    <a href="{{ $header->icon_urls[$loop->index] ?? '#' }}"><i class="fa fa-{{ $icon }}"></i></a>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div><!-- /.top-bar-socials -->
            </div>                    
        </div>
    </div><!-- /#top-bar -->

    <!-- Header -->
    <header id="site-header">
        <div id="site-header-inner" class="container">                    
            <div class="wrap-inner clearfix">
                <div id="site-logo" class="clearfix">
                    <div id="site-log-inner">
                        <a href="/" rel="home" class="main-logo">
                            @if($header && $header->logo)
                                <img src="{{asset('admin/headerImage/'.$header->logo)}}" alt="Autora" width="186" height="39" data-retina="assets/img/logo-small@2x.png" data-width="186" data-height="39">
                            @else
                                <span style="font-size: 24px; font-weight: bold;">Autora</span>
                            @endif
                        </a>
                    </div>
                </div><!-- /#site-logo -->

                <div class="mobile-button">
                    <span></span>
                </div><!-- /.mobile-button -->

                <nav id="main-nav" class="main-nav">
                    <ul id="menu-primary-menu" class="menu">
                        <li class="menu-item menu-item-has-children {{ request()->is('/') ? 'current-menu-item' : '' }}">
                            <a href="/">HOME</a>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->is('about') ? 'current-menu-item' : '' }}">
                            <a href="/about">ABOUT US </a>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->is('services*') ? 'current-menu-item' : '' }}">
                            <a href="/services">SERVICES</a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->is('service') ? 'current-menu-item' : '' }}"><a href="/service">SERVICES DETAIL</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->is('projects*') ? 'current-menu-item' : '' }}">
                            <a href="/projects">PROJECTS</a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->is('project') ? 'current-menu-item' : '' }}"><a href="/project">PROJECTS DETAIL</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->is('blogs*') ? 'current-menu-item' : '' }}">
                            <a href="/blogs">BLOG</a>
                            <ul class="sub-menu right-sub-menu">
                                <li class="menu-item {{ request()->is('blog-single') ? 'current-menu-item' : '' }}"><a href="/blog-single">BLOG SINGLE</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->is('contact') ? 'current-menu-item' : '' }}">
                            <a href="/contact">CONTACT</a>
                        </li>
                    </ul>                    
                </nav><!-- /#main-nav -->

                <div id="header-search">
                    <a href="#" class="header-search-icon">
                        <span class="search-icon fa fa-search">
                        </span>
                    </a>

                    <form role="search" method="get" class="header-search-form" action="#">
                        <label class="screen-reader-text">Search for:</label>
                        <input type="text" value="" name="s" class="header-search-field" placeholder="Search...">
                        <button type="submit" class="header-search-submit" title="Search"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- /#header-search -->
            </div><!-- /.wrap-inner -->                    
        </div><!-- /#site-header-inner -->
    </header><!-- /#site-header -->
</div>
@endif