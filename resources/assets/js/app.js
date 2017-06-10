
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

let L = require('leaflet');

let tiliktinoLatLon = [56.0858, 36.612];
let zoom = 17;
let mymap = L.map('map').setView(tiliktinoLatLon, zoom);
let osmTilesUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let memberStyle = {
    color: 'green',
    stroke: false,
};

L.tileLayer(osmTilesUrl, {
    maxZoom: 19,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
}).addTo(mymap);

$.get('geojson-data', function (response) {
    let geoJsonData = response;

    // Преобразуем контуры в полигоны (закрашенные области)
    for (let i in geoJsonData.features) {
        if (geoJsonData.features[i].geometry.type !== 'LineString') {
            continue;
        }
        geoJsonData.features[i].geometry.type = 'Polygon';
        geoJsonData.features[i].geometry.coordinates = [geoJsonData.features[i].geometry.coordinates];
    }

    // Рисуем на карте полученные полигоны
    L.geoJson(geoJsonData, {
        // Стиль полигонов
        style: {
            color: 'green',
            weight: 1,
        },
        // Навешиваеми свой попап на каждый полигон
        onEachFeature: function (feature, layer) {
            layer.bindPopup([
                "<b>Участок " + feature.properties['ref'] + '</b>',
                "Дополнительная информация, приджойненная из Excel"
            ].join('<br>'));
        },
        filter: function (feature, layer) {
            return feature.properties.ref !== undefined;
        }
    }).addTo(mymap);
});
