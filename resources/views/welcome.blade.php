<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container wrapper">
            <div class="head">
                <h2>{{ config('app.name') }}</h2>
            </div>
            <div id="map" class="map"></div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
