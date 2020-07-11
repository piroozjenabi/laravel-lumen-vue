<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#43a047">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pirooz jenabi - test</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <v-card class="overflow-hidden">
        <header-component> </header-component>
        <v-sheet id="scrolling-techniques-5" class="overflow-y-auto " max-height="600" style="margin-top:140px">
            <v-container style="height: 560px;">
                @yield('content')
            </v-container>
        </v-sheet>
        </v-card>

    </div>
</body>
</html>
