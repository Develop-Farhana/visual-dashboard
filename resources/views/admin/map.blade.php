@extends('admin.main')
@section('style')

@endsection
    
        
    @section('content')
    <div style="width: 50%; margin: auto;">
        <canvas id="myPieChart"></canvas>
    </div>
    @endsection
    
@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            axios.get('/total-counts')
                .then(function (response) {
                    const counts = response.data;

                    // Extract data for the pie chart
                    const data = {
                        labels: ['Countries', 'Cities', 'Regions'],
                        datasets: [{
                            data: [counts.totalCountries, counts.totalCities, counts.totalRegions],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }]
                    };

                    // Get the context of the canvas element we want to select
                    const ctx = document.getElementById('myPieChart').getContext('2d');

                    // Initialize Chart.js
                    new Chart(ctx, {
                        type: 'pie',
                        data: data,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Total Counts: Countries, Cities, Regions'
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    });
                })
                .catch(function (error) {
                    console.error('Error fetching total counts:', error);
                });
        });
    </script>
@endsection
