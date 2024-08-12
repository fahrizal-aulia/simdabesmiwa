<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatable - Voler Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('layouts.warga.partials.navbar')
        <div class="main-content container-fluid">
            @yield('container')
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-left">
                    <p>Copyright &copy; SIMDABESMIWA 2024</p>
                </div>
            </div>
        </footer>
        </div>
    </div>

    <script src="{{ asset('../assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('../assets/js/app.js') }}"></script>
    <script src="{{ asset('../assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('../assets/js/vendors.js') }}"></script>
    <script src="{{ asset('../assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</body>

</html>
