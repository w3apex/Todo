<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('auth-title','Dashboard | Star')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
		@include('backend.layouts.partials._styles')
        @yield('styles')
    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        @yield('auth-master')

        <footer class="footer footer-alt">
            2021 - <script>document.write(new Date().getFullYear())</script> &copy; Theme by <a href="" class="text-white-50"> w3apex</a> 
        </footer>

        <!-- Vendor js -->
        @include('backend.layouts.partials._scripts')
        @yield('scripts')
    </body>
</html>