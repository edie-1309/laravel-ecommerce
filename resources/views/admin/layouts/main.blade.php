<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="/img/po.png"> --}}
    
    <!-- CSS -->
    <link rel="stylesheet" href="/sidebar-assets/css/style.css">

    <!-- JS -->
    <script src="/sidebar-assets/js/solid.js"></script>
    <script src="/sidebar-assets/js/fontawesome.js"></script>
    <script src="/sidebar-assets/js/jquery-3.3.1.slim.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b0f01835ff.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.umd.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('admin.layouts.sidebar')

        <!-- Page Content  -->
        <div id="content">
            <!-- Navbar -->
            @include('admin.layouts.navbar')

            <!-- Main Content -->
            @yield('content')
        </div>
    </div>
    
    <script src="/sidebar-assets/js/script.js"></script>
    <script src="/sidebar-assets/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>

</body>
</html>