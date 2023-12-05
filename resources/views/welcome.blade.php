@extends('body.resource')
@extends('body.sidebar')
@extends('body.footer')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PT Bigs Integrasi Teknologi</title>

    <link href="{{ asset('dist/img/B.png') }}" rel="shortcut icon" />
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Top Bar ERP -->
      
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a
                  class="nav-link"
                  href="#"
                  id="userDropdown"
                  data-toggle="dropdown"
                 
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >{{ Auth::user()->name }}</span
                  >
                 
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"
            >Setting</span
          >
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile.update') }}" class="dropdown-item">
            <i class="ion-person"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('user.logout') }}" class="dropdown-item">
            <i class="ion-log-out"></i> Logout
          </a>
        </div>
      </li>
      
    </ul>
  </nav>
      <!-- /.Top Bar ERP -->

      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            
            @yield('content')
            
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-blue">
        
      </aside>
      
    </div>
    </body>

</html>
