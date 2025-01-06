<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>print - Percetakan Prima Printing</title>
    <x-utils.metas-x-demo />
    {{-- <x-utils.meta-seo /> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row" id="printableArea">
                        <div class=" col-md-11">
                            <div class="card-title row justify-content-end">
                                <div class="col-6">
                                    <h6 class="font-weight-bold mt-3 ms-3">Tansaksi Bulanan (Rupiah)</h6>
                                </div>
                                <div class="col-6">
                                    <form action="" method="GET" class="">
                                        <label for="year">Select Year:</label>
                                        <select class="form-control" name="year" id="year"
                                            onchange="this.form.submit()">
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}"
                                                    {{ $year == $selectedYear ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>

                                </div>
                            </div>
                            <canvas id="myBarChart" width="100" height="50"></canvas>
                        </div>
                        <div class="col-md-11">
                            <div class="card-title row justify-content-end">
                                <div class="col-6">
                                    <h6 class="font-weight-bold mt-3 ms-3">Tansaksi Bulanan (Count)</h6>
                                </div>
                                <div class="col-6">
                                    <form action="" method="GET" class="">
                                        <label for="year-c">Select Year:</label>
                                        <select class="form-control" name="year-c" id="year-c"
                                            onchange="this.form.submit()">
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}"
                                                    {{ $year == $selectedYear ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>

                                </div>
                            </div>
                            <canvas id="myBarChartCount" width="100" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const ctx = document.getElementById('myBarChart').getContext('2d');
        const myBarChart = new Chart(ctx, {
            type: 'line', // Set the chart type to 'bar'
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

        const ctxCount = document.getElementById('myBarChartCount').getContext('2d');
        const myBarChartCount = new Chart(ctxCount, {
            type: 'bar', // Set the chart type to 'bar'
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Total Transactions (Count)',
                    data: @json(array_values($monthlyDataCount)),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light blue bars
                    borderColor: 'rgba(54, 162, 235, 1)', // Blue border
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true, // Ensure the y-axis starts at zero
                        ticks: {
                            min: Math.min(...
                                @json(array_values($monthlyDataCount))), // Set the minimum to the lowest value in your data
                            stepSize: 1 // Optional: Set step size if you want specific increments
                        }
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

        // add fung to print on loading
        window.onload = function() {
            window.print();
            window.onafterprint = function() {
                window.location.href = "{{ route('admin.dashboard') }}";
            }
        }
    </script>
</body>

</html>
