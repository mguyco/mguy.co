<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="application-name" content="{{ env('APP_NAME') }}" />
    <meta name="apple-mobile-web-app-title" content="{{ env('APP_NAME') }}" />
    <meta name="msapplication-starturl" content="/index.html" />

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mix css -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- mix js -->
    <script src="{{ mix('/js/app.js') }}" defer></script>  

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cookie&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css">
    <style>
        .font-great-vibes { font-family: 'Great Vibes', cursive; }
        .font-pacifico { font-family: 'Pacifico', cursive; }
        .font-cookie { font-family: 'Cookie', cursive; }
        .font-shadows-into-light { font-family: 'Shadows Into Light', cursive; }
        .font-architects-daughter { font-family: 'Architects Daughter', cursive; }
    </style>

    <!-- ziggy -->
    @routes
</head>
<body>
    <!-- inertiaJS -->
    @inertia
</body>
</html>