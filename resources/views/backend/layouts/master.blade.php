<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
       @include('backend.layouts.partial.styles')
       @yield('styles')
    </head>
    <body class="sb-nav-fixed">
        @include('backend.layouts.partial.navbar')
        <div id="layoutSidenav">
            @include('backend.layouts.partial.sidebar')
            <div id="layoutSidenav_content">
                @yield('main-content')
                @include('backend.layouts.partial.footer')
            </div>
        </div>
        @include('backend.layouts.partial.scripts')
        @yield('scripts')
    </body>
</html>
