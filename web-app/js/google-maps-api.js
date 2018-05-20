let geocoder;
let map;

function initMap() {
    geocoder = new google.maps.Geocoder();
    const address = document.getElementById('zip_code').innerText.slice(-5);
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            const marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location

            });
        }
    });
    const lat_lng = new google.maps.LatLng();
    const map_options = {
        zoom: 14,
        center: lat_lng
    };
    map = new google.maps.Map(document.getElementById('map'), map_options);
}
