<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>{{ env('APP_NAME') }} </title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css" />

    <!-- webpack mix -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    
</head>
<body>
    <!-- inertiaJS render -->
    @inertia
</body>
</html>