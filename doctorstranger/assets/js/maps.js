    var mapStyle = [{
        featureType: 'landscape.man_made',
        elementType: 'geometry',
        stylers: [{
            color: '#f7f1df'
            }]
        }, {
        featureType: 'landscape.natural',
        elementType: 'geometry',
        stylers: [{
            color: '#d0e3b4'
            }]
        }, {
        featureType: 'landscape.natural.terrain',
        elementType: 'geometry',
        stylers: [{
            visibility: 'off'
            }]
        }, {
        featureType: 'poi',
        elementType: 'labels',
        stylers: [{
            visibility: 'off'
            }]
        }, {
        featureType: 'poi.business',
        elementType: 'all',
        stylers: [{
            visibility: 'off'
            }]
        }, {
        featureType: 'poi.medical',
        elementType: 'geometry',
        stylers: [{
            color: '#fbd3da'
            }]
        }, {
        featureType: 'poi.park',
        elementType: 'geometry',
        stylers: [{
            color: '#bde6ab'
            }]
        }, {
        featureType: 'road',
        elementType: 'geometry.stroke',
        stylers: [{
            visibility: 'off'
            }]
        }, {
        featureType: 'road',
        elementType: 'labels',
        stylers: [{
            visibility: 'off'
            }]
        }, {
        featureType: 'road.highway',
        elementType: 'geometry.fill',
        stylers: [{
            color: '#ffe15f'
            }]
        }, {
        featureType: 'road.highway',
        elementType: 'geometry.stroke',
        stylers: [{
            color: '#efd151'
            }]
        }, {
        featureType: 'road.arterial',
        elementType: 'geometry.fill',
        stylers: [{
            color: '#ffffff'
            }]
        }, {
        featureType: 'road.local',
        elementType: 'geometry.fill',
        stylers: [{
            color: 'black'
            }]
        }, {
        featureType: 'transit.station.airport',
        elementType: 'geometry.fill',
        stylers: [{
            color: '#cfb2db'
            }]
        }, {
        featureType: 'water',
        elementType: 'geometry',
        stylers: [{
            color: '#a2daf2'
            }]
        }];
    var contactMapID = document.getElementById('contact-map');

    function initContactMap() {
        var latlng = new google.maps.LatLng(19.072853, 72.900770);
        var options = {
            zoom: 15,
            center: latlng,
            disableDefaultUI: true,
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_BOTTOM
            },
            styles: mapStyle
        };
        var contactMap = new google.maps.Map(contactMapID, options);
        var marker = new google.maps.Marker({
            map: contactMap,
            position: latlng,
            icon: 'assets/images/map-marker.png'
        });
    }

    if (contactMapID) {
        google.maps.event.addDomListener(window, 'load', initContactMap);
    }