<meta charset="utf-8" />
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', config('app.name'))</title>
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('dashboard-assets/img/favicon.png') }}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/fonts/fontawesome.css') }}" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/fonts/flag-icons.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/css/rtl/core.css') }}"
    class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/css/rtl/theme-default.css') }}"
    class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/libs/toastr/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/libs/sweetalert2/sweetalert2.css') }}">

<!-- Page CSS -->

<!-- Helpers -->
<script src="{{ asset('dashboard-assets/vendor/js/helpers.js') }}"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="{{ asset('dashboard-assets/vendor/js/template-customizer.js') }}"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('dashboard-assets/js/config.js') }}"></script>
<!-- beautify ignore:end -->
<style>
    #template-customizer {
        display: none !important;
    }

    .select2-container {
        margin: 0;
        width: 100% !important;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        box-sizing: border-box;
        z-index: 999;
    }

    .select2-container--open {
        z-index: 9999;
    }

    .icon-card {
        width: 72px;
        height: 72px;
        top: 131px;
        left: 1076px;
        border-radius: 8px;
        background: #3B599826;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .category-card {
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 14px;
        color: black !important;
        background: #f8f8f8;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }
</style>
