<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Chef Portfolio</title>
    @include('layouts.style')
    @stack('style')

</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
       @include('layouts.sidebar')
       @include('layouts.header')

        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                {{-- <div class="theme-wrapper">
                    <h6 class="text-muted mb-2">Light Theme:</h6>
                    <a class="theme-item" href="{{ asset('demo1/dashboard.html') }}">
                        <img src="{{ asset('assets/admin/images/screenshots/light.jpg') }}" alt="light theme">
                    </a>
                    <h6 class="text-muted mb-2">Dark Theme:</h6>
                    <a class="theme-item active" href="{{ asset('demo2/dashboard.html') }}">
                        <img src="{{ asset('assets/admin/images/screenshots/dark.jpg') }}" alt="light theme">
                    </a>
                </div> --}}
            </div>
        </nav>
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
         @yield('content')
            <!-- partial -->

            
        
            <!-- partial:partials/_footer.html -->
            <footer
                class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com"
                        target="_blank">NobleUI</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm"
                        data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>

@include('layouts.script')
@stack('script')

</body>

</html>
