<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="128x128" href="/img/favicon/favicon.png">

    <!-- Material Design Icons -->
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.9.97/css/materialdesignicons.min.css">
</head>
<body class="bg-gray-200 h-screen antialiased leading-none">
    <div id="app">
        <div class="flex flex-col min-h-screen">
            <div>
                @include('nav.nav')
            </div>

            <div class="flex flex-grow">
                @yield('content')
            </div>

            <div>
                @include('footer.footer')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
