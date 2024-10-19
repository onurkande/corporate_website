<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    @yield('title')
  </title>
  
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('/assets/dashboard/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />

  {{--  BOOTSTRAP LİNKS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  {{-- JQUERY LINKS --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{asset('assets/dashboard/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Admin Paneli</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-table-columns"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/header') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/header')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-heading"></i>
            </div>
            <span class="nav-link-text ms-1">Header</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/footer') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/footer')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-shoe-prints"></i>
            </div>
            <span class="nav-link-text ms-1">Footer</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/about-row') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/about-row')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">About Rows</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/about') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/about')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">About</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/best-services') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/best-services')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">Best Services</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/consult-with-us') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/consult-with-us')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">Consult With Us</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/contact-us-line') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/contact-us-line')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">Contact Us Line</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/contact-us-row') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/contact-us-row')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">Contact Us Row</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/counter') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/counter')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">Counter</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/email-box') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/email-box')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">Email Box</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard/dynamic-edit/faqs') ? 'active bg-gradient-primary':'' }}" href="{{url('dashboard/dynamic-edit/faqs')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">FAQs</span>
          </a>
        </li>
        

        <!-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li> -->
        
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol> -->
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div> -->
          </div>
          <ul class="navbar-nav  justify-content-end">            

            <li class="nav-item d-flex align-items-center">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="nav-link text-body font-weight-bold px-0">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        @yield('content')
      </div>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="{{asset('assets/dashboard/js/core/bootstrap.min.js')}}"></script>

  {{-- BOOTSTRAP JAVASCRİPT LİNKS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  {{-- ICONS --}}
  <script src="https://kit.fontawesome.com/44158fe681.js" crossorigin="anonymous"></script>
</body>

</html>