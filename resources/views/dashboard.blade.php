<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salon Analytics Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Chart 1: Customer Visits Line Chart -->
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <canvas id="visitsChart"></canvas>
                </div>

                <!-- Chart 2: Revenue Bar Chart -->
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <canvas id="revenueChart"></canvas>
                </div>

                <!-- Chart 3: Customer Satisfaction Pie Chart -->
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <canvas id="satisfactionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample Data for Customer Visits Line Chart
        const visitsChartCtx = document.getElementById('visitsChart').getContext('2d');
        const visitsChart = new Chart(visitsChartCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
                datasets: [{
                    label: 'Customer Visits',
                    data: [40, 50, 65, 70, 55],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Visits'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Weeks'
                        }
                    }
                }
            }
        });

        // Sample Data for Revenue Bar Chart
        const revenueChartCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueChartCtx, {
            type: 'bar',
            data: {
                labels: ['Haircuts', 'Coloring', 'Facials', 'Nails', 'Waxing'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [1200, 1900, 300, 700, 500],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Revenue ($)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Services'
                        }
                    }
                }
            }
        });

        // Sample Data for Customer Satisfaction Pie Chart
        const satisfactionChartCtx = document.getElementById('satisfactionChart').getContext('2d');
        const satisfactionChart = new Chart(satisfactionChartCtx, {
            type: 'pie',
            data: {
                labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied'],
                datasets: [{
                    label: 'Customer Satisfaction',
                    data: [40, 30, 15, 10, 5],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                }
            }
        });
    </script>
</x-app-layout>
