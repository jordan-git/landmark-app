/**
 * Initialize the map for the current landmark.
 */
function initMap() {
    const dataElement = document.querySelector('.landmark');

    const title = dataElement.dataset.title;
    const lat = Number(dataElement.dataset.lat);
    const lng = Number(dataElement.dataset.lng);

    const landmarkCoordinates = { lat, lng };

    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: landmarkCoordinates,
    });

    new google.maps.Marker({
        position: landmarkCoordinates,
        map,
        title,
    });
}
