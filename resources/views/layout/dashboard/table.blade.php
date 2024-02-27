<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="/dist/assets/css/main/app.css">
    <link rel="stylesheet" href="/dist/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="/dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/dist/assets/images/logo/favicon.png" type="image/png">
    

    <link rel="stylesheet" href="/dist/assets/css/shared/iconly.css">

</head>

<body>
    {{-- Sidebar --}}
    @include('partials.dashboard_sidebar')
    {{-- End of SideBar --}}
    <div id="app">
        {{-- Container --}}
        <div id="main">
            @yield('container')
        </div>
        {{-- End of Container --}}
    </div>
    <script src="/dist/assets/js/bootstrap.js"></script>
    <script src="/dist/assets/js/app.js"></script>

    <script>
        function submit() {
            let form = document.getElementById("logout");
            form.submit();
        }
    </script>

    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="assets/js/pages/datatables.js"></script>

</body>
@stack('scripts')

</html>
