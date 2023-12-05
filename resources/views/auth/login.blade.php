<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  
  <link href="{{ asset('backend/assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  
  <link id="sleek-css" rel="stylesheet" href="{{ asset('backend/assets/css/sleek.css') }}" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>


  

  <!-- FAVICON -->
  <link href="{{ asset('dist/img/B.png') }}" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('backend/assets/plugins/nprogress/nprogress.js') }}"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
    @if(session('success'))
        {{ session('success') }}
      @endif
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/index.html">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="10" height="13"
                    viewBox="0 0 10 13">
                  </svg>
                  <img src="{{ asset('dist/img/B.png') }}" width="40" height="43" class="brand-image elevation-3">
                  <span class="brand-name" >ERP BIGS </span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Sign In Here</h4>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" name="email" class="form-control input-lg" aria-describedby="emailHelp" placeholder="Your Email">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" name="password" placeholder="Password">
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">&copy; 2022 Copyright PT. Bigs Integrasi Teknologi
        </p>
      </div>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
      case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
      case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
      case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
      case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
        
    }
    @endif
    </script>
    

</html>