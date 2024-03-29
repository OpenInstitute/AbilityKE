
var map = L.map( 'map', {
    center: [-1.2667913, 36.8098615],
    minZoom: 2,
    zoom: 16
});

L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    subdomains: ['a','b','c']
}).addTo( map );