<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('employee.partials.head')
    @include('employee.partials.style')
</head>

<body>
    <div class="main-wrapper main-wrapper-1" id="app">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('employee.partials.topnav')
        </nav>
        <div class="main-sidebar sidebar-style-2">
            @include('employee.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Page Content -->
            @yield('content')
        </div>
        <footer class="main-footer">
            {{-- @include('employee.partials.footer') --}}
        </footer>
    </div>


    @include('employee.partials.script')
    @include('employee.partials.notif')
</body>

</html>