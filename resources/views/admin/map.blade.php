<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Map Showing Distribution of Data</title>
    <!-- Include Leaflet CSS and JavaScript -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Include a CSS file for custom styles (optional) -->
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div id="map" style="height: 600px;"></div>

    <!-- JavaScript to create the map -->
    <script>
        // Sample data (replace with your actual data or fetch from a data source)
const data = [
    { country: 'USA', city: 'New York', latlng: [40.7128, -74.0060], intensity: 80 },
    { country: 'USA', city: 'Los Angeles', latlng: [34.0522, -118.2437], intensity: 70 },
    { country: 'UK', city: 'London', latlng: [51.5074, -0.1278], intensity: 85 },
    { country: 'Germany', city: 'Berlin', latlng: [52.5200, 13.4050], intensity: 60 },
    // Add more data points as needed
];

// Initialize the map centered at a specific location (e.g., world view)
const map = L.map('map').setView([20, 0], 2); // Centered around the world, zoom level 2

// Add a tile layer for the map (using OpenStreetMap tiles)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Loop through the data and add markers to the map
data.forEach(entry => {
    const { latlng, country, city, intensity } = entry;
    const marker = L.marker(latlng).addTo(map);
    marker.bindPopup(`<b>${city}, ${country}</b><br>Intensity: ${intensity}`);
});

    </script>
</body>
</html>
