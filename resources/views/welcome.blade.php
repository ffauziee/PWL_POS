@extends('layouts.template')

@section('content')
<div class="container-fluid px-4">
    <!-- Dashboard Header -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-chart-line mr-2"></i> Dashboard Penjualan
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <!-- Sales Summary Cards -->
                    <div class="row">
                        <!-- Sales Today Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body position-relative p-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="text-muted text-uppercase mb-2">Pendapatan Hari Ini</h6>
                                            <h3 class="display-6 mb-0 text-primary font-weight-bold">{{ 'Rp ' . number_format($todayIncome, 0, ',', '.') }}</h3>
                                        </div>
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-hand-holding-usd fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="#" class="text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Income Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body position-relative p-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="text-muted text-uppercase mb-2">Pendapatan Bulan Ini</h6>
                                            <h3 class="display-6 mb-0 text-success font-weight-bold">{{ 'Rp ' . number_format($monthlyIncome, 0, ',', '.') }}</h3>
                                        </div>
                                        <div class="bg-success bg-opacity-10 rounded-circle p-3 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-calendar-check fa-2x text-success"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="#" class="text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- All-time Income Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body position-relative p-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="text-muted text-uppercase mb-2">Total Pendapatan</h6>
                                            <h3 class="display-6 mb-0 text-warning font-weight-bold">{{ 'Rp ' . number_format($allIncome, 0, ',', '.') }}</h3>
                                        </div>
                                        <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-chart-bar fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="#" class="text-decoration-none">
                                            <small>Lihat Detail <i class="fas fa-arrow-right ms-1"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-gradient-secondary text-white d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="fas fa-chart-area me-2"></i> Grafik Pendapatan 30 Hari Terakhir</h5>
                                    <div>
                                        <select class="form-select form-select-sm" id="chartPeriod">
                                            <option value="30">30 Hari</option>
                                            <option value="90">90 Hari</option>
                                            <option value="365">1 Tahun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <canvas id="todaySalesChart" height="280"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    .bg-gradient-secondary {
        background: linear-gradient(45deg, #6c757d, #495057);
    }
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .bg-opacity-10 {
        opacity: 0.1;
    }
    .rounded-circle {
        width: 64px;
        height: 64px;
    }
    .display-6 {
        font-size: 1.5rem;
        font-weight: 600;
    }
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart setup
        const ctx = document.getElementById('todaySalesChart').getContext('2d');
        const chartData = {!! json_encode($chartMonthly) !!};
        
        const labels = chartData.map(item => item.date);
        const data = chartData.map(item => item.total);
        
        // Define gradient for area under the line
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(75, 192, 192, 0.6)');
        gradient.addColorStop(1, 'rgba(75, 192, 192, 0.0)');
        
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan Harian',
                    data: data,
                    backgroundColor: gradient,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            boxWidth: 15,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 15,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return 'Pendapatan: Rp ' + context.parsed.y.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            },
                            padding: 10
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 15,
                            padding: 10
                        }
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });
        
        // Period selector functionality
        document.getElementById('chartPeriod').addEventListener('change', function() {
            // This would normally be handled by the backend
            // For demonstration purposes only
            alert('Pilihan periode berubah: ' + this.value + ' hari. Dalam implementasi sebenarnya, data akan dimuat ulang.');
        });
        
        // Add animation to cards
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.animation = `fadeInUp 0.3s ease forwards ${index * 0.1}s`;
            card.style.opacity = '0';
        });
    });
    
    // Animation keyframes
    document.head.insertAdjacentHTML('beforeend', `
        <style>
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translate3d(0, 20px, 0);
                }
                to {
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                }
            }
        </style>
    `);
</script>
@endpush