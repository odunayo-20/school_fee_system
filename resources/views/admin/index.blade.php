@extends('Layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="py-4 container-fluid">
        <div class="row">
            <div class="mb-4 col-xl-3 col-sm-6 mb-xl-0">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">Total Collections</p>
                                    <h5 class="font-weight-bolder">
                                        ₦{{ number_format(\App\Models\FeePayment::sum('amount_paid'), 2) }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-sm text-success font-weight-bolder">
                                            ₦{{ number_format(\App\Models\FeePayment::whereDate('created_at', today())->sum('amount_paid'), 2) }}
                                        </span>
                                        today
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-primary shadow-primary rounded-circle">
                                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-xl-3 col-sm-6 mb-xl-0">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">Total Students</p>
                                    <h5 class="font-weight-bolder">
                                        {{ \App\Models\ExternalStudent::count() }}
                                    </h5>
                                    <p class="mb-0">
                                        <span
                                            class="text-sm text-success font-weight-bolder">{{ \App\Models\ExternalStudent::whereDate('created_at', today())->count() }}</span>
                                        new today
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-info shadow-info rounded-circle">
                                    <i class="text-lg ni ni-paper-diploma opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-xl-3 col-sm-6 mb-xl-0">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">Fee Types</p>
                                    <h5 class="font-weight-bolder">
                                        {{ \App\Models\FeeType::where('status', 0)->count() }}
                                    </h5>
                                    <p class="mb-0">
                                        <span
                                            class="text-sm text-success font-weight-bolder">{{ \App\Models\FeeStructure::where('status', 0)->count() }}</span>
                                        active structures
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-success shadow-success rounded-circle">
                                    <i class="text-lg ni ni-collection opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">Today's Payments</p>
                                    <h5 class="font-weight-bolder">
                                        {{ \App\Models\FeePayment::whereDate('created_at', today())->count() }}
                                    </h5>
                                    <p class="mb-0">
                                        <span
                                            class="text-sm text-success font-weight-bolder">{{ \App\Models\FeePayment::where('payment_method', 'online')->whereDate('created_at', today())->count() }}</span>
                                        online payments
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-warning shadow-warning rounded-circle">
                                    <i class="text-lg ni ni-credit-card opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="mb-4 col-lg-7 mb-lg-0">
                <div class="card z-index-2 h-100">
                    <div class="pt-3 pb-0 bg-transparent card-header">
                        <h6 class="text-capitalize">Fee Payment Overview</h6>
                        <p class="mb-0 text-sm">
                            <i class="fa fa-arrow-up text-success"></i>
                            @php
                                $previousMonth = \App\Models\FeePayment::whereMonth(
                                    'created_at',
                                    now()->subMonth()->month,
                                )->sum('amount_paid');
                                $currentMonth = \App\Models\FeePayment::whereMonth('created_at', now()->month)->sum(
                                    'amount_paid',
                                );
                                $percentageChange =
                                    $previousMonth > 0
                                        ? (($currentMonth - $previousMonth) / $previousMonth) * 100
                                        : 100;
                            @endphp
                            <span class="font-weight-bold">{{ number_format($percentageChange, 1) }}%
                                {{ $percentageChange >= 0 ? 'more' : 'less' }}</span> than last month
                        </p>
                    </div>
                    <div class="p-3 card-body">
                        <div class="chart">
                            <canvas id="fee-payments-chart" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="pt-3 pb-0 bg-transparent card-header">
                        <h6 class="text-capitalize">Payment Methods Distribution</h6>
                        <p class="mb-0 text-sm">This Month's Payment Methods</p>
                    </div>
                    <div class="p-3 card-body">
                        <div class="chart">
                            <canvas id="payment-methods-chart" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="bottom-0 carousel-caption d-none d-md-block text-start start-0 ms-5">
                    <div class="mb-3 text-center bg-white icon icon-shape icon-sm border-radius-md">
                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="mb-1 text-white">Get started with Argon</h5>
                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                </div>
            </div>
            <div class="carousel-item h-100"
                style="background-image: url('../assets/img/carousel-2.jpg');
    background-size: cover;">
                <div class="bottom-0 carousel-caption d-none d-md-block text-start start-0 ms-5">
                    <div class="mb-3 text-center bg-white icon icon-shape icon-sm border-radius-md">
                        <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="mb-1 text-white">Faster way to create web pages</h5>
                    <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.
                    </p>
                </div>
            </div>
            <div class="carousel-item h-100"
                style="background-image: url('../assets/img/carousel-3.jpg');
    background-size: cover;">
                <div class="bottom-0 carousel-caption d-none d-md-block text-start start-0 ms-5">
                    <div class="mb-3 text-center bg-white icon icon-shape icon-sm border-radius-md">
                        <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="mb-1 text-white">Share with us your design tips!</h5>
                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                </div>
            </div>
        </div>
        <button class="w-5 carousel-control-prev me-3" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="w-5 carousel-control-next me-3" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    </div>
    </div>


    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Fee Payments Line Chart
                @php
                    $months = collect(range(5, 0))->map(function ($month) {
                        $date = now()->subMonths($month);
                        return [
                            'month' => $date->format('M'),
                            'total' => \App\Models\FeePayment::whereYear('created_at', $date->year)->whereMonth('created_at', $date->month)->sum('amount_paid'),
                        ];
                    });
                @endphp

                new Chart(document.getElementById('fee-payments-chart'), {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($months->pluck('month')) !!},
                        datasets: [{
                            label: 'Fee Collections',
                            data: {!! json_encode($months->pluck('total')) !!},
                            fill: true,
                            borderColor: '#5e72e4',
                            backgroundColor: 'rgba(94, 114, 228, 0.1)',
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    borderDash: [2],
                                    borderDashOffset: [2],
                                    drawBorder: false,
                                    zeroLineColor: 'rgba(0,0,0,0)',
                                    drawTicks: false
                                },
                                ticks: {
                                    callback: function(value) {
                                        return '₦' + (value / 1000).toFixed(0) + 'k';
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false
                                }
                            }
                        }
                    }
                });

                // Payment Methods Doughnut Chart
                @php
                    $paymentMethods = \App\Models\FeePayment::whereMonth('created_at', now()->month)->selectRaw('payment_method, sum(amount_paid) as total')->groupBy('payment_method')->get();
                @endphp

                new Chart(document.getElementById('payment-methods-chart'), {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($paymentMethods->pluck('payment_method')) !!},
                        datasets: [{
                            data: {!! json_encode($paymentMethods->pluck('total')) !!},
                            backgroundColor: [
                                '#5e72e4',
                                '#2dce89',
                                '#fb6340',
                                '#11cdef'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        cutout: '60%',
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
