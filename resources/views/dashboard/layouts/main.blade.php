<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SimPro - Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('simpro/datatables/style.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
    <script src=" https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.dataTables.js"></script>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('web-report/assets/img/logo/logo.png') }}" />
    <script data-search-pseudo-elements defer src="{{ asset('simpro/font-awesome/all.min.js') }}" crossorigin="anonymous">
    </script>
    <script src="{{ asset('simpro/feather.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('simpro/feather.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class = "nav-fixed">
    @include('dashboard.layouts.header')
    <div id = "layoutSidenav">
        @include('dashboard.layouts.sidebar')

        <div id = "layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('dashboard.layouts.footer')
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ asset('sb-admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb-admin/assets/demo/chart-bar-demo.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script src="{{ asset('sb-admin/js/datatables/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="{{ asset('sb-admin/js/litepicker.js') }}"></script>
    <!-- Tambahkan SweetAlert skrip -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.project').select2({
                placeholder: "Select a project",
                allowClear: true
            });

        });
        // Fungsi untuk menampilkan SweetAlert
        function showAlert(status, message) {
            Swal.fire({
                icon: status === 'success' ? 'success' : 'error',
                title: status === 'success' ? 'Sukses' : 'Error',
                text: message,
            });
        }
    </script>


    <!-- Update redirect dengan pemanggilan fungsi showAlert -->
    <script>
        // let table = new DataTable('#dataTable');
        $('#dataTable').DataTable({
            responsive: true,
            "drawCallback": function(settings) {
                feather.replace();
            },
            "ordering": false
        });

        $('#dataTable1').DataTable({
            responsive: true,
            width: 100,
            "ordering": false
        });
        feather.replace()
    </script>

</body>

</html>
