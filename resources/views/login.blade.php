<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.meta')
        <title>Signin | SendItOut International Outsourcing Inc.</title>
        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="bg-gray-600">
        <div id="app">
            <signin></signin>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
