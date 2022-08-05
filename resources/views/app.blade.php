<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}" defer></script>

        @routes

        @inertiaHead
    </head>
    <body class="font-sans antialiased">

        @inertia

    </body>
</html>
