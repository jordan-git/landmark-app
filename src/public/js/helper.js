/**
 * Initialize the map for the current landmark.
 */
function initMap() {
    // Get data from data attributes attached to element from database through Twig template
    const dataElement = document.querySelector('.landmark');
    const { title, lat, lng } = dataElement.dataset;
    const landmarkCoordinates = { lat: Number(lat), lng: Number(lng) };

    const map = new google.maps.Map(document.querySelector('#map'), {
        zoom: 15,
        center: landmarkCoordinates,
    });

    new google.maps.Marker({
        position: landmarkCoordinates,
        map,
        title,
    });
}
