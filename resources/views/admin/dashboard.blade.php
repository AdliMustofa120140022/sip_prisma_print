<x-app-layout>
    <x-slot name="title">dashboard</x-slot>

    <x-slot name="metas">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </x-slot>


    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 col-lg-4 p-3">
                        <div class="card card-profile  h-100">
                            <div class="rounded rounded-3 px-4 py-1 border position-  aspect-square ">
                                <div class="d-flex gap-3">
                                    <i
                                        class="fa-regular fa-file-lines fs-1 text-white  p-3 rounded rounded-3 bg-gradient-faded-info"></i>
                                    <span class="px-1 text-bold text-xl">Pesanan</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <span class="px-2 text-bold text-4xl">{{ $countTransaksi }}</span>

                                    <a href="{{ route('admin.pesanan.index') }}"
                                        class="d-flex  align-items-center gap-3 border-top">
                                        <span class="text-bold">Kelola data</span>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 p-3">
                        <div class="card card-profile  h-100">
                            <div class="rounded rounded-3 px-4 py-1 border position-  aspect-square ">
                                <div class="d-flex gap-3">
                                    <i
                                        class="fa-regular fa-credit-card fs-1 text-white  p-3 rounded rounded-3 bg-gradient-faded-info"></i>
                                    <span class="px-1 text-bold text-xl">Metode Pembayaran</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <span class="px-2 text-bold text-4xl" style="color: transparent">0</span>

                                    <a href="{{ route('admin.payment-metode.index') }}"
                                        class="d-flex  align-items-center gap-3 border-top">
                                        <span class="text-bold">Kelola data</span>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 p-3">
                        <div class="card card-profile  h-100">
                            <div class="rounded rounded-3 px-4 py-1 border position-  aspect-square ">
                                <div class="d-flex gap-3">
                                    <i
                                        class="fa-solid fa-user fs-1 text-white  p-3 rounded rounded-3 bg-gradient-faded-info"></i>
                                    <span class="px-1 text-bold text-xl">User</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <span class="px-2 text-bold text-4xl">{{ $countuser }}</span>

                                    <a href="{{ route('admin.user.index') }}"
                                        class="d-flex  align-items-center gap-3 border-top">
                                        <span class="text-bold">Kelola data</span>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="row">
                        <div class="col-5">
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
                                                    {{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </form>

                                </div>
                            </div>
                            <canvas id="myBarChart" width="100" height="50"></canvas>
                        </div>
                        <div class="col-5">
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
                                                    {{ $year == $selectedYearCorunt ? 'selected' : '' }}>
                                                    {{ $year }}</option>
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

    <x-slot name="scripts">
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
        </script>
    </x-slot>
</x-app-layout>
