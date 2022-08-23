<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{config('app.name')}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="{{asset('backend/vendor/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('backend/vendor/summerNots/summernote-bs4.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendor/datepicker/themes/classic.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendor/datepicker/themes/classic.date.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendor/easyautocompleate/easy-autocomplete.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendor/easyautocompleate/easy-autocomplete.themes.min.css')}}" rel="stylesheet">

    <style>
        .picker__select--year, .picker__select--month {
            height: 39px;
        }
    </style>

</head>


<body id="page-top">


<div id="wrapper">


    @include('layouts._aside-admin')


    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            @include('layouts._admin-nav')



            @yield('content')


        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper --> <!-- Content Wrapper -->


</div>

<!-- Page Wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('backend/vendor/easyautocompleate/jquery.easy-autocomplete.min.js')}}"></script>
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.compatibility.js')}}"></script>
<script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script>
<script src="{{asset('backend/js/custom.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-fileinput/js/plugins/piexif.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-fileinput/themes/fa5/theme.js')}}"></script>
<script src="{{asset('backend/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('backend/vendor/summerNots/summernote-bs4.min.js')}}"></script>
<script src="{{asset('backend/vendor/summerNots/summernote-bs4.min.js.map')}}"></script>
<script src="{{asset('backend/vendor/datepicker/picker.js')}}"></script>
<script src="{{asset('backend/vendor/datepicker/picker.date.js')}}"></script>
<script src="{{asset('backend/vendor/datepicker/picker.time.js')}}"></script>


<script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        }

    });


</script>

@stack('scripts')
</body>

</html>
