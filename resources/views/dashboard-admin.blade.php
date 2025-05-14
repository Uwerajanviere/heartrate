@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4" style="color: #333;">Admin Dashboard</h2>

    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card shadow rounded p-3" style="background-color: #ffe6e6;">
                <h5>Total Users</h5>
                <h3>1,250</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow rounded p-3" style="background-color: #ffe6e6;">
                <h5>Avg Heart Rate</h5>
                <h3>76 bpm</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow rounded p-3" style="background-color: #ffe6e6;">
                <h5>Alerts Today</h5>
                <h3>12</h3>
            </div>
        </div>
    </div>

    <div class="card shadow rounded p-4 mb-5" style="background-color: #fff0f0;">
        <h5 class="mb-3">User Monitoring Overview</h5>
        <canvas id="adminChart" height="200"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('adminChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                label: 'Active Users',
                data: [200, 240, 180, 220, 210],
                backgroundColor: '#ff6666'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
