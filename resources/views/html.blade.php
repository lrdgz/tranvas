<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tranvas</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script>
            window.Laravel = {
                csrfToken : '{{ csrf_token() }}',
                basePath  : '{{ url('/') }}'
            };
        </script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('header-styles')
    </head>
    <body>

        @include('partials.menu')

        <div id="app">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

{{--            <div class="content-container">--}}
{{--                @yield('content')--}}
{{--            </div>--}}

        @yield('footer-script')
    </body>
</html>
