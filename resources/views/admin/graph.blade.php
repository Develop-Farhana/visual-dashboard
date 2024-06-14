<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Intensity and Likelihood Trends</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include Axios for making HTTP requests -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        #myChartContainer {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div id="myChartContainer">
        <canvas id="myChart"></canvas>
    </div>

    <!-- JavaScript to create the chart -->
   <script>
    async function fetchChartData() {
        try {
            // This is a placeholder function, you should replace it with actual logic to fetch your chart data
            // Example: const response = await axios.get('/chart-data');
            // Adjust this logic to match your actual endpoint and parameters
            const response = await axios.get('/chart-data');
            return response.data;
        } catch (error) {
            console.error('Error fetching chart data:', error);
            return [];
        }
    }

    async function createChart() {
        const chartData = await fetchChartData();

        // Extract end years, intensity, and likelihood from chartData
        const end_year = chartData.map(item => item.end_year);
        const intensityData = chartData.map(item => item.intensity);
        const likelihoodData = chartData.map(item => item.likelihood);

        // Find the highest and lowest years
        const highestYear = Math.max(...end_year);
        const lowestYear = Math.min(...end_year);

        // Calculate the year range
        const yearRange = highestYear - lowestYear;

        // Initialize variables to store total intensity and likelihood for each 10-year gap
        const totalIntensity = [];
        const totalLikelihood = [];

        // Loop through each 10-year gap
        for (let i = lowestYear; i <= highestYear; i += 10) {
            let intensitySum = 0;
            let likelihoodSum = 0;

            // Sum up intensity and likelihood values for each 10-year gap
            for (let j = 0; j < end_year.length; j++) {
                if (end_year[j] >= i && end_year[j] < i + 10) {
                    intensitySum += intensityData[j];
                    likelihoodSum += likelihoodData[j];
                }
            }

            // Push the total intensity and likelihood for the current 10-year gap
            totalIntensity.push(intensitySum);
            totalLikelihood.push(likelihoodSum);
        }

        console.log('Total Intensity for Each 10-Year Gap:', totalIntensity);
        console.log('Total Likelihood for Each 10-Year Gap:', totalLikelihood);

        // Create the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: totalIntensity.map((_, index) => `${lowestYear + index * 10} - ${lowestYear + index * 10 + 9}`),
                datasets: [
                    {
                        label: 'Total Intensity',
                        data: totalIntensity,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Total Likelihood',
                        data: totalLikelihood,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 2,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    zoom: {
                        zoom: {
                            wheel: {
                                enabled: true,
                            },
                            pinch: {
                                enabled: true
                            },
                            mode: 'xy'
                        }
                    }
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Year Range'
                        },
                        ticks: {
                            maxTicksLimit: 10 // Limit the number of ticks shown on x-axis
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }
                }
            }
        });
    }

    // Initialize the chart
    createChart();

   </script>
</body>
</html>
