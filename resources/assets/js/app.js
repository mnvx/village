
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

L.polygon([
    [56.0874326, 36.6100406],
    [56.0879243, 36.6099735],
    [56.0880779, 36.6103181],
    [56.0874442, 36.6104105]
], memberStyle).addTo(mymap).bindPopup(["Участок 1", "hello world"].join('<br>'));

L.polygon([
    [56.0875042, 36.6118597],
    [56.0875145, 36.6120588],
    [56.0875981, 36.6121368],
    [56.0881112, 36.6120410],
    [56.0881584, 36.6117440]
], memberStyle).addTo(mymap).bindPopup(["Участок 6", "Something is happend!"].join('<br>'));
