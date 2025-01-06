<x-app-layout>
    <x-slot name="title">dashboard</x-slot>

    <x-slot name="metas">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </x-slot>


    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @if (Auth::user()->role == 'admin')
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
                                            class="fa-solid fa-rotate-left fs-1 text-white  p-3 rounded rounded-3 bg-gradient-faded-info"></i>
                                        <span class="px-1 text-bold text-xl">Pesanan Retur</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <span class="px-2 text-bold text-4xl">{{ $transaksiRetur }}</span>

                                        <a href="{{ route('admin.return.index') }}"
                                            class="d-flex  align-items-center gap-3 border-top">
                                            <span class="text-bold">Kelola data</span>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif (Auth::user()->role == 'super_admin')
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
                    @endif
                </div>

                <div class="card mb-4">
                    <div class="row" id="printableArea">
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
                    <div class="card-footer">
                        <a href="{{ route('admin.print.chart') }}" class="btn btn-primary">Print</a>
                        {{-- <button class="btn btn-primary"
                            onclick="printContent('{{ route('admin.print.chart') }}')">Print</button> --}}
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

            // function printContent(route) {
            //     console.log(route);

            //     fetch(route, {
            //             headers: {
            //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //             }
            //         })
            //         .then(response => response.text())
            //         .then(html => {
            //             // console.log(html);

            //             // Create a temporary container to parse the HTML
            //             const tempContainer = document.createElement('div');
            //             tempContainer.innerHTML = html;

            //             // Process all canvas elements in the fetched HTML
            //             // const canvasElements = tempContainer.querySelectorAll('canvas');
            //             // canvasElements.forEach(canvas => {
            //             //     const chartImage = new Image();
            //             //     chartImage.src = canvas.toDataURL('image/png'); // Convert canvas to image
            //             //     chartImage.style.display = 'block';
            //             //     chartImage.style.margin = '0 auto';

            //             //     // Replace canvas with the image
            //             //     canvas.parentNode.replaceChild(chartImage, canvas);
            //             // });

            //             // Create an iframe for printing
            //             const iframe = document.createElement('iframe');
            //             iframe.style.display = 'none';
            //             document.body.appendChild(iframe);
            //             const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

            //             iframeDoc.open();
            //             iframeDoc.write(tempContainer.innerHTML); // Write the HTML content

            //             console.log(iframeDoc);



            //             // Append required scripts to the iframe for rendering JavaScript
            //             // const scripts = tempContainer.querySelectorAll('script');
            //             // scripts.forEach(script => {
            //             //     const newScript = iframeDoc.createElement('script');
            //             //     if (script.src) {
            //             //         // For external scripts
            //             //         newScript.src = script.src;
            //             //     } else {
            //             //         // For inline scripts
            //             //         newScript.textContent = script.innerHTML;
            //             //     }

            //             //     console.log(newScript);

            //             //     console.log(iframeDoc);
            //             //     iframeDoc.body.appendChild(newScript);
            //             // });

            //             iframeDoc.close();

            //             iframe.onload = () => {
            //                 setTimeout(() => {
            //                     iframe.contentWindow.focus();
            //                     iframe.contentWindow.print();
            //                     document.body.removeChild(iframe);
            //                 }, 1000); // Delay to ensure scripts are executed before printing
            //             };
            //         });
            // }
        </script>
    </x-slot>
</x-app-layout>
