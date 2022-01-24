<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="Cache-control" content="private, no-store, no-cache, must-revalidate, proxy-revalidate" />
    <meta http-equiv="Expires" content="Sat, 05 Nov 1955 00:00:00 EST" />
    <meta name="robots" content="index, follow" />
    <meta name="referer" content="origin" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="application-name" content="{{ env('APP_NAME') }}" />
    <meta name="apple-mobile-web-app-title" content="{{ env('APP_NAME') }}" />
    <meta name="msapplication-starturl" content="/index.php" />
    <meta name="author" content="{{ env('APP_NAME') }}" />
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}" />
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}" />
    <link rel="canonical" href="{{ env('APP_URL') }}">

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mix css -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- mix js -->
    <script src="{{ mix('/js/app.js') }}" defer></script>  

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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

    <!-- icons -->
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/ZKMDhdV/m-icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="192x192" href="https://i.ibb.co/4SVQT44/m-icon.png">

    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>

    <!-- ziggy -->
    @routes
</head>
<body>
    <!-- inertiaJS -->
    @inertia
</body>
</html>