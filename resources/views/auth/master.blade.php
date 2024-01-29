<!DOCTYPE html>
<html lang="ar" class="light-style customizer-hide" dir="rtl" data-theme="theme-default"
    data-assets-path="{{ asset('dashboard-assets') }}/" data-template="vertical-menu-template">

<head>
    @section('head')
        @include('layouts.partials.head')
        <link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/css/pages/page-auth.css') }}" />
    @show
</head>

<body>
    @yield('content')
    @section('scripts')
        @include('layouts.partials.scripts')
        <script src="{{ asset('dashboard-assets/js/pages-auth.js') }}"></script>
    @show
</body>

</html>
