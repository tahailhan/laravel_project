<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD professional admin dashboard template">
    <title>@yield('title', 'Dashboard | adminHMD')</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    @yield('head')
</head>
<body>

<div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    @include('admin.sidemenu')

    <div class="admin-main">
        @include('admin.header')

        @yield('content')

        @include('admin.footer')
    </div>
</div>

<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>

@yield('scripts')
</body>
</html>
