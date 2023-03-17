<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')
    <title>{{ appName() }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/upload/image/'.$config_site->icon) }}">

    @stack('before-styles')
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet"> 

    {{-- start plugins --}}
    <!-- Tempusdominus Bbootstrap 4 -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- pace-progress -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/pace-progress/themes/black/pace-theme-flat-top.css') }}">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- timepicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
    <!-- sweetalert -->
    <script src="{{ asset('assets/sweetalert/js/sweetalert.min.js') }}"></script>
    <!-- angular -->
    {{-- <script src="{{ asset('assets/angular/angular.min.js') }}"></script>   --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/sweetalert/css/sweetalert.css') }}">
    {{-- end plugins --}}
    
    @stack('after-styles')
    <link href="{{ asset('css/screen_backend.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/main_backend.css') }}" rel="stylesheet">
    <livewire:styles />

    @stack('before-scripts')
    
</head>
<body class="c-app">
    @include('backend.includes.sidebar')
        
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/backend.js') }}"></script>
        
        {{-- <script>
            $(function() {
                swal({
                    title: "test 1?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-danger',
                    cancelButtonClass: 'btn btn-success',
                    buttonsStyling: false,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, function (isConfirm) {
                    if (isConfirm) {
                        alert('test');
                    }
                    return false;
                });
            });
        </script> --}}

    <div class="c-wrapper c-fixed-components">
        @include('backend.includes.header')
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        @include('includes.partials.announcements')

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div><!--fade-in-->
                </div><!--container-fluid-->
            </main>
        </div><!--c-body-->

        @include('backend.includes.footer')
    </div><!--c-wrapper-->
    
    {{-- start plugins --}}
    {{-- <script src="{{ asset('assets/jquery-ui/external/jquery/jquery.js') }}" type="text/javascript"></script> --}}
    <!-- JQUERY CHAINED -->
    <script src="{{ asset('assets/js/jquery.chained.min.js') }}" type="text/javascript"></script> 
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <link href="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    
    <!-- Viewer js -->
    {{-- <script src="{{ asset('assets/viewerjs/pdf.js') }}"></script> --}}
    <!-- TIMEPICKER -->
    {{-- <script src="{{ asset('assets/timepicker/timepicker.min.js') }}"></script>
    <link href="{{ asset('assets/timepicker/timepicker.min.css') }}" rel="stylesheet"/> --}}
    <script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    {{-- -------------------------------------------------------------------------------------------- --}}

    @php
        $datepicker_sek  = date('Y');
        $datepicker_awal = $datepicker_sek - 100;
        $datepicker_tahundepan = $datepicker_sek + 2;
    @endphp

    <script>
        var asset_url = '{{ asset(""); }}';
        var datepicker_awal = '{{ $datepicker_awal; }}'; 
        var datepicker_tahundepan = '{{ $datepicker_tahundepan; }}';

        @if ($message = Session::get('sukses'))
        // Notifikasi
        swal ( "Berhasil" ,  "<?php echo $message ?>" ,  "success" )
        @endif

        @if ($message = Session::get('warning'))
        // Notifikasi
        swal ( "Oops.." ,  "<?php echo $message ?>" ,  "warning" )
        @endif 

        // Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Bootstrap 4 -->
    {{-- <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- Select2 -->
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
    <!-- Summernote -->
    <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- tinymce -->
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <!-- pace-progress -->
    <script src="{{ asset('assets/admin/plugins/pace-progress/pace.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script> --}}
    
    {{-- end plugins --}}

    @stack('after-scripts')
    <script src="{{ asset('js/plugins_backend.js') }}"></script>
    <script src="{{ asset('js/main_backend.js') }}"></script>
    <livewire:scripts />

    @stack('additional-scripts')
</body>
</html>
