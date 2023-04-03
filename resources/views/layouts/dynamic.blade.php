<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <!-- Bootstrap -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      {{-- <link href="assets/css/dynamic/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      {{-- <link href="assets/css/dynamic/font-awesome.min.css" rel="stylesheet"> --}}

    <!-- NProgress -->
      <link href="../../assets/css/dynamic/nprogress.css" rel="stylesheet">

    <!-- iCheck -->
      <link href="../../assets/css/dynamic/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
      <link href="../../assets/css/dynamic/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
      <link href="../../assets/css/dynamic/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
      <link href="../../assets/css/dynamic/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
      <link href="../../assets/css/dynamic/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/dashboard/dynamic-edit"><i class="fa fa-home"></i>HOME PAGE</a>
                    {{-- <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul> --}}
                  </li>

                  <li><a href="/dashboard/dynamic-edit/faqs"><i class="fa fa-edit"></i>FAQS</a></li>

                  <li><a href="/dashboard/dynamic-edit/contact-us-row"><i class="fa fa-desktop"></i>CONTACT US ROW</a></li>

                  <li><a href="/dashboard/dynamic-edit/contact-us-line"><i class="fa fa-table"></i>CONTACT US LINE</a></li>

                  <li><a href="/dashboard/dynamic-edit/counter"><i class="fa fa-bar-chart-o"></i>COUNTER</a></li>

                  <li><a href="/dashboard/dynamic-edit/team"><i class="fa fa-bar-chart-o"></i>TEAM</a></li>

                  <li><a href="/dashboard/dynamic-edit/about"><i class="fa fa-bar-chart-o"></i>ABOUT</a></li>

                  <li><a href="/dashboard/dynamic-edit/about-row"><i class="fa fa-bar-chart-o"></i>ABOUT ROW</a></li>

                  <li><a href="/dashboard/dynamic-edit/featured-project"><i class="fa fa-bar-chart-o"></i>FEATURED PROJECT</a></li>

                  <li><a href="/dashboard/dynamic-edit/best-services"><i class="fa fa-bar-chart-o"></i>BEST SERVİCES</a></li>

                  <li><a href="/dashboard/dynamic-edit/email-box"><i class="fa fa-bar-chart-o"></i>EMAİL BOX</a></li>

                  <li><a href="/dashboard/dynamic-edit/consult-with-us"><i class="fa fa-bar-chart-o"></i>CONSULT WİTH US</a></li>

                  <li><a href="/dashboard/dynamic-edit/info-box"><i class="fa fa-bar-chart-o"></i>INFO BOX</a></li>

                  <li><a href="/dashboard/dynamic-edit/our-services"><i class="fa fa-bar-chart-o"></i>OUR SERVİCES</a></li>

                  <li><a href="/dashboard/dynamic-edit/info"><i class="fa fa-bar-chart-o"></i>INFO</a></li>

                  <li><a href="/dashboard/dynamic-edit/service-detail"><i class="fa fa-bar-chart-o"></i>SERVİCE DETAİL</a></li>
                </ul>
              </div>

              {{-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div> --}}

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../assets/js/dynamic/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/js/dynamic/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../assets/js/dynamic/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../assets/js/dynamic/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../assets/js/dynamic/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../assets/js/dynamic/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../assets/js/dynamic/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../assets/js/dynamic/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../assets/js/dynamic/skycons.js"></script>
    <!-- Flot -->
    <script src="../../assets/js/dynamic/jquery.flot.js"></script>
    <script src="../../assets/js/dynamic/jquery.flot.pie.js"></script>
    <script src="../../assets/js/dynamic/jquery.flot.time.js"></script>
    <script src="../../assets/js/dynamic/jquery.flot.stack.js"></script>
    <script src="../../assets/js/dynamic/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../assets/js/dynamic/jquery.flot.orderBars.js"></script>
    <script src="../../assets/js/dynamic/jquery.flot.spline.min.js"></script>
    <script src="../../assets/js/dynamic/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../assets/js/dynamic/date.js"></script>
    <!-- JQVMap -->
    <script src="../../assets/js/dynamic/jquery.vmap.js"></script>
    <script src="../../assets/js/dynamic/jquery.vmap.world.js"></script>
    <script src="../../assets/js/dynamic/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../assets/js/dynamic/moment.min.js"></script>
    <script src="../../assets/js/dynamic/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../assets/js/dynamic/custom.min.js"></script>
	
  </body>
</html>