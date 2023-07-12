<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HRD Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('../../build/assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('../../build/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('../../build/assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('../../build/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('../../build/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('../../build/assets/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('../../build/assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('../../build/assets/images/favicon.png')}}" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- NAVBAR MULAI -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <h4>Pengajuan Izin HRD</h4>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              @if (empty(Auth::guard('web')->user()->foto))
                  <img src="{{asset('../../build/assets/images/ProfileKosong.png')}}" alt="profile"/>
              @else
                <img src="{{asset('upload/admin_images/'.Auth::guard('web')->user()->foto)}}" alt="">
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="{{route ('hrd.profile')}}" class="dropdown-item">
                <i class="ti-user text-primary"></i>
                Profile
              </a>
              <a href="{{route('hrd.logout')}}" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- NAVBAR SELESAI -->
    
    <!-- BODY START -->
    <div class="container-fluid page-body-wrapper">
      <!-- SETTING WARNA NAVBAR DAN SIDEBAR MULAI -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- SETTING WARNA NAVBAR DAN SIDEBAR SELESAI -->

      <!-- SIDEBAR MULAI -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('hrd.dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Cuti</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('hrd.syaratcutihrd')}}">Syarat Cuti</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('hrd.pengajuancutihrd')}}">Pengajuan Cuti</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('hrd.approvalhrd')}}">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Approval</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('hrd.persetujuanhrd')}}">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Permintaan Persetujuan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- SIDEBAR SELESAI -->

      <!-- partial -->
      <div class="main-panel">
          {{-- ISI MULAI --}}
                            @yield('hrd')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        {{-- ISI SELESAI --}}

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- BODY END -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('../../build/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('../../build/assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('../../build/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('../../build/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('../../build/assets/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('../../build/assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('../../build/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('../../build/assets/js/template.js')}}"></script>
  <script src="{{asset('../../build/assets/js/settings.js')}}"></script>
  <script src="{{asset('../../build/assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('../../build/assets/js/dashboard.js')}}"></script>
  <script src="{{asset('../../build/assets/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>

