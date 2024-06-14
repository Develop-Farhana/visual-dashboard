@extends('admin.main')

@section('style')
<style>
    #myChartContainer {
        width: 80%;
        margin: auto;
    }
    .chart-card {
        background-color: #ffffff; /* White background */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        padding: 20px; /* Padding inside the card */
        margin-bottom: 20px; /* Optional margin bottom for spacing */
    }
</style>
@endsection

@section('content')
<div class="chart-card">
    <div id="myChartContainer">
        <canvas id="myChart"></canvas>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    async function fetchChartData() {
        try {
            // Replace '/chart-data' with your actual endpoint to fetch chart data
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
@endsection
