<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Chef alomgir Hossen Portfolio Website">
    <meta name="author" content="ChefAlomgirHossen">
    {{-- <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"> --}}
    <title>Alomgir Hossen</title>
    @include('layouts.style')
    @stack('style')

</head>

<body>
    <div class="main-wrapper">
       
       @include('layouts.sidebar')
       @include('layouts.header')

        <div class="page-wrapper">
            
            <!--start main content -->
            <div class="page-content">
                @yield('content')
            </div>
        
            <!-- end main content -->

            <!-- footer -->
            <footer
                class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2024 <a href="#"
                        target="_blank">ChefAlomgirHossen</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm"
                        data-feather="heart"></i></p>
            </footer>
            <!--end footer -->

        </div>
    </div>

@include('layouts.script')
@stack('script')

</body>

</html>
