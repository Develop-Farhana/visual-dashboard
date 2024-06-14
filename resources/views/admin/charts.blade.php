<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Doughnut chart</h4>
            <canvas id="doughnutChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // AJAX request to fetch chart data
        fetch('/chart-data')
            .then(response => response.json())
            .then(data => {
                // Extracting data for labels and values
                var labels = data.map(item => item.end_year + ' - ' + item.country);
                var values = data.map(item => item.value || 1); // Assuming 'value' exists and default to 1 if not

                // Doughnut Chart Data
                var doughnutData = {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: generateRandomColor(data.length), // Function to generate random colors
                        hoverBackgroundColor: generateRandomColor(data.length),
                        borderWidth: 1
                    }]
                };

                // Doughnut Chart Options
                var doughnutOptions = {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                };

                // Get the context of the canvas element we want to select
                var doughnutChartCanvas = document.getElementById("doughnutChart").getContext("2d");

                // Create the doughnut chart
                var doughnutChart = new Chart(doughnutChartCanvas, {
                    type: 'doughnut',
                    data: doughnutData,
                    options: doughnutOptions
                });
            })
            .catch(error => console.error('Error fetching chart data:', error));

        // Function to generate random colors for chart segments
        function generateRandomColor(num) {
            var colors = [];
            for (var i = 0; i < num; i++) {
                colors.push('#' + (Math.random().toString(16) + '000000').slice(2, 8));
            }
            return colors;
        }
    });
</script>
