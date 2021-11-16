let map;
function initMap(){
    map = new google.maps.Map(document.getElementById('map'),{
        center: {lat:13.7565 , lng:121.0583},
        zoom: 12,
        mapId: '88b49b45d840c2d2'
    });


var AdiaDelimiters = [
    { lng:121.0583, lat:13.7565},
 
];
    var AdiaPolygon = new google.maps.Polygon({
        paths:AdiaDelimiters,
        strokeColor : '#FF0000',
        strokeOpacity: 0.8, 
        stokeWeight: 3,
        fillColor: '#FF0000',
        fillOpacity:0.2,
        
    });
    AdiaPolygon.setMap(map)

}