<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="application-name" content="{{ env('APP_NAME') }}" />
    <meta name="apple-mobile-web-app-title" content="{{ env('APP_NAME') }}" />
    <meta name="msapplication-starturl" content="/index.html" />
    <title>{{ env('APP_NAME') }}</title>

    <!-- pwa manifest -->
    <link rel="manifest" href="pwa-manifest.json" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cookie&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css">

    <!-- mix css -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- mix js -->
    <script src="{{ mix('/js/app.js') }}" defer></script>  
</head>
<body>
    <!-- inertiaJS -->
    @inertia
</body>
</html>