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
        <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
                integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
                crossorigin=""></script>
        <script>
            var tiliktinoLatLon = [56.0858, 36.612];
            var zoom = 17;
            var mymap = L.map('map').setView(tiliktinoLatLon, zoom);
            var osmTilesUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

            L.tileLayer(osmTilesUrl, {
                maxZoom: 19,
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
            }).addTo(mymap);

            var getJsonData = {!! $geoJson !!};

            // Рисуем на карте полученные полигоны
            L.geoJson(getJsonData, {
                // Стиль полигонов
                style: {
                    color: 'green',
                    weight: 1,
                },
                // Навешиваеми свой попап на каждый полигон
                onEachFeature: function (feature, layer) {
                    layer.bindPopup(feature.properties.data);
                },
                filter: function (feature, layer) {
                    return feature.properties.data !== undefined;
                }
            }).addTo(mymap);

        </script>
    </body>
</html>
