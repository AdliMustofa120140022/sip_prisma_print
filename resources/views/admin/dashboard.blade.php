<x-app-layout>
    <x-slot name="title">dashboard</x-slot>

    <x-slot name="metas">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form action="" method="GET">
                    <label for="year">Select Year:</label>
                    <select name="year" id="year" onchange="this.form.submit()">
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                {{ $year }}</option>
                        @endforeach
                    </select>
                </form>

                <canvas id="myBarChart" width="400" height="200"></canvas>

                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const ctx = document.getElementById('myBarChart').getContext('2d');
            const myBarChart = new Chart(ctx, {
                type: 'bar', // Set the chart type to 'bar'
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                        'October', 'November', 'December'
                    ],
                    datasets: [{
                        label: 'Total Transactions (Rp)',
                        data: @json(array_values($monthlyData)),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light blue bars
                        borderColor: 'rgba(54, 162, 235, 1)', // Blue border
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true, // Ensure the y-axis starts at zero
                        }
                    },
                    responsive: true, // Makes the chart responsive
                    plugins: {
                        legend: {
                            display: true, // Show the legend
                            position: 'top' // Position of the legend
                        }
                    }
                }
            });
        </script>
    </x-slot>
</x-app-layout>
