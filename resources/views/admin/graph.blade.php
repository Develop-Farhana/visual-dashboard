<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Intensity and Likelihood Trends</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <!-- JavaScript to create the chart -->
    <script>
        // Sample data (replace with your actual data)
const years = [2010, 2011, 2012, 2013, 2014, 2015, 2016];
const intensityData = [10, 15, 20, 18, 25, 30, 28]; // Sample intensity values
const likelihoodData = [5, 8, 12, 10, 15, 20, 18]; // Sample likelihood values

// Get the canvas element from HTML
const ctx = document.getElementById('myChart').getContext('2d');

// Create the chart
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: years,
        datasets: [
            {
                label: 'Intensity',
                data: intensityData,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Likelihood',
                data: likelihoodData,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 2,
                fill: false
            }
        ]
    },
    options: {
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Year'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Value'
                }
            }]
        }
    }
});

    </script>
</body>
</html>
