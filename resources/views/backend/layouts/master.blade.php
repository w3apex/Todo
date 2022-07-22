<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title','Dashboard | Codemen')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
        @yield('style-top')
        @include('backend.layouts.partials._styles')
        @yield('styles')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>

    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('backend.layouts.partials._header')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('backend.layouts.partials._left-sidebar')
            <!-- Left Sidebar End -->

            <div class="content-page">
                @yield('content')
                <!-- Footer Start -->
                @include('backend.layouts.partials._footer')
                <!-- end Footer -->
            </div>
        </div>
        <!-- END wrapper -->

        <!-- Codemen Modal Form -->
        <form id="delete-form" action="" method="POST">
            @csrf
            <input type="hidden" id="method" name="_method" value="DELETE">
        </form>

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        
        @include('backend.layouts.partials._scripts')
        <script>
            $(document).on("click",".delete-row", function(e){
                e.preventDefault();
                //console.log(1);
                let confirmStr = "Are you sure ?";

                if($(this).attr("data-confirm")){
                    confirmStr = $(this).attr("data-confirm");
                }

                if(confirm(confirmStr)){
                    let href = $(this).attr("href");
                    $("#delete-form").attr("action", href);
                    $("#delete-form").submit();
                }
            });
        </script>
         @yield('scripts')
    </body>
</html>