@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container-fluid">

    <h3 class="fw-bold">Dashboard Admin</h3>
    <p class="text-muted">Selamat datang kembali, {{ auth()->user()->name }}</p>

    <div class="row g-4 mt-3">
        <div class="col-md-3">
            <div class="dashboard-card">
                <i class="bi bi-person-gear"></i>
                <h6>Teknisi</h6>
                <h3>{{ $total_teknisi }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <i class="bi bi-people"></i>
                <h6>Pelanggan</h6>
                <h3>{{ $total_pelanggan }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <i class="bi bi-pc-display"></i>
                <h6>Servis Aktif</h6>
                <h3>{{ $servis_aktif }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <i class="bi bi-cash-stack"></i>
                <h6>Pendapatan</h6>
                <h3>Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <div class="col-md-8">
            <div class="dashboard-card p-4">
                <h5 class="fw-bold mb-3">Tren Pendapatan</h5>
                <div style="position: relative; height:300px;">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card p-4">
                <h5 class="fw-bold mb-3">Status Servis</h5>
                <div style="position: relative; height:300px;">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');

    const blueGradient = ctxRevenue.createLinearGradient(0, 0, 0, 300);
    blueGradient.addColorStop(0, 'rgba(13, 202, 240, 0.4)');
    blueGradient.addColorStop(1, 'rgba(13, 202, 240, 0.0)'); 

    new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: JSON.parse('@json($bulan_pendapatan)'),
            datasets: [{
                label: 'Pendapatan',
                data: JSON.parse('@json($nominal_pendapatan)'),
                borderColor: '#0dcaf0',
                backgroundColor: blueGradient,
                borderWidth: 3,
                fill: true, 
                tension: 0.3, 
                pointBackgroundColor: '#fff', 
                pointBorderColor: '#0dcaf0', 
                pointBorderWidth: 3,
                pointRadius: 6, 
                pointHoverRadius: 8, 
                pointHoverBackgroundColor: '#0dcaf0',
                pointHoverBorderColor: '#fff',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let value = context.raw || 0;
                            return ' ' + context.dataset.label + ': Rp ' + value.toLocaleString('id-ID');
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
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

   
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Proses', 'Selesai', 'Batal'],
            datasets: [{
                data: JSON.parse('@json($status_counts)'),
                backgroundColor: ['#6c757d', '#0dcaf0', '#198754', '#dc3545'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || 0;
                            return ' Status ' + label + ': ' + value + ' Servis';
                        }
                    }
                }
            }
        }
    });
</script>

@endsection