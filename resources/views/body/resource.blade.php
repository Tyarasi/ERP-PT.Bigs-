
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}" />
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" />
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"/>
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}" />
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}" />
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}" />
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}" />
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}" />
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge("uibutton", $.ui.button);
</script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<script src="{{ asset('dist/js/demo.js')}}"></script>

<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>

<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>