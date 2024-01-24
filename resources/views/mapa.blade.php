<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eddymania</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="../js/kml.js"></script>
</head>
<style>
         html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .leaflet-container {
            height: 600px; /* Ajusta la altura según tus necesidades */
            width: 800px;  /* Ajusta el ancho según tus necesidades */
            max-width: 100%;
            max-height: 100%;
        }
</style>

<body>
    <div id="map"></div>
    <script>
        var map = L.map('map').setView([-17.452817, -63.176972], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Load primer kml file
        fetch('../../assets/tesml.kml')
            .then(res => res.text())
            .then(kmltext1 => {
                // Create primer kml overlay
                const parser1 = new DOMParser();
                const kml1 = parser1.parseFromString(kmltext1, 'text/xml');
                const track1 = new L.KML(kml1);
                map.addLayer(track1);

                // Adjust map to show the primer kml
                const bounds1 = track1.getBounds();
                map.fitBounds(bounds1); 
            });

    </script>
</body>

</html>