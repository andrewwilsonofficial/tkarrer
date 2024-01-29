<!DOCTYPE html>
<html lang="ar" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ asset('dashboard-assets') }}/" data-template="vertical-menu-template">

<head>
    @section('head')
        @include('layouts.partials.head')
        <style>
            body {
                right: 0;
                position: relative;
                overflow-x: hidden;
            }
        </style>
    @show
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.partials.menu')

            <!-- Layout container -->
            <div class="layout-page">
                @section('navbar')
                    @include('layouts.partials.navbar')
                @show
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @yield('content')
                    @section('footer')
                        @include('layouts.partials.footer')
                    @show
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    @section('scripts')
        @include('layouts.partials.scripts')
    @show
    @yield('modals')
</body>

</html>
