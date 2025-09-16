<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Store</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('import/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('import/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/css/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('import/assets/css/select2/select2-bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('import/assets/css/select2/select2-bootstrap4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('import/assets/css/style.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        @include('layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layout.modal-logout')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('import/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('import/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('import/assets/js/sb-admin-2.min.js') }}"></script>

    <!-- datatables -->
    <script src="{{ asset('import/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('import/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('import/assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('import/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('import/assets/js/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('import/assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('import/assets/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('import/assets/js/datatables.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').each(function() {
                $(this).select2({
                    dropdownParent: $(this).closest('.modal').length ? $(this).closest('.modal') :
                        $('body'),
                    placeholder: $(this).data('placeholder') || 'Select an option',
                    width: '100%',
                    theme: 'bootstrap4',
                    allowClear: true,
                    dropdownAutoWidth: true
                });
            });
        });
    </script>

</body>

</html>
