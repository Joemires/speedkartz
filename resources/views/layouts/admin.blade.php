<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ config('app.name') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    @section('inpage-css')
      {{-- <!-- add to document <head> --> --}}
    @show
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('admin/assets/app/app.css')}}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('admin/assets/img/logo-small.png') }}">
          </div>
          {{-- <p>CT</p> --}}
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          {{ config('app.name') }}
          {{-- <div class="logo-image-big">
            <img src="{{ asset('admin/assets/img/logo-small.png') }}">
          </div> --}}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active" data-nav-name='home'>
            <a href="{{ route('dashboard.home') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="javascript:;" data-nav-name='customer'>
              <i class="nc-icon nc-pin-3"></i>
              <p>Customer</p>
            </a>
          </li>
          <li>
            <a data-toggle="collapse" href="#forms" data-nav-name='products'>
                <i class="nc-icon nc-bank"></i>
                <p>Products <i class="nc-icon nc-minimal-right float-right text-muted" style="font-size: 14px"></i> </p>
            </a>
            <div class="sub-nav collapse" id="forms" role="navigation" aria-expanded="true">
                <ul class="nav flex-column">
                    <li>
                        <a href="{{ route('product.add') }}">Add Product</a>
                    </li>
                    <li>
                        <a href="#subnav">All Products</a>
                    </li>
                    <li>
                        <a href="{{ route('product.category') }}">Category</a>
                    </li>
                    <li>
                        <a href="{{ route('product.subcategory') }}">Subcategory</a>
                    </li>
                    {{-- <li>
                        <a href="#subnav">Sample Forms</a>
                    </li> --}}
                </ul>
            </div>
          </li>
          <li>
            <a href="javascript:;" data-nav-name='orders'>
              <i class="nc-icon nc-pin-3"></i>
              <p>Orders</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Admin Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#navbarDropMenu" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        @section('content-wrapper')
            
        @show
      </div>
      <footer class="footer footer-black  footer-black">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Aspirelabs</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Contact Us</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Our Projects</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © 2020, Developed with <i class="fa fa-heart heart"></i> by Aspirelabs
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('admin/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src=" {{ asset('admin/assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin/assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/app/app.js') }}"></script>
  @section('inpage-js')
  <script>
      $(() => {          
        var activeNav = "{{ $active ?? '' }}"

        $('.sidebar-wrapper .nav li').each( function() {
            if($(this).children('a').data('navName') == activeNav) {
                // alert("hello")
                // $(this).addClass('active')
            }
            
            // console.log($(this).children('a').children('p').html())
        })
        
      });
  </script>
  @show
  
</body>

</html>