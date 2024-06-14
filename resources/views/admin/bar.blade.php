<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relevance of Topics</title>
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
const topics = ['Technology', 'Science', 'Politics', 'Health', 'Business'];
const relevanceValues = [80, 70, 60, 85, 75]; // Sample relevance values

// Get the canvas element from HTML
const ctx = document.getElementById('myChart').getContext('2d');

// Create the chart
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: topics,
        datasets: [{
            label: 'Relevance',
            data: relevanceValues,
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Relevance (%)'
                }
            }],
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Topics'
                }
            }]
        }
    }
});

    </script>
</body>
</html>
