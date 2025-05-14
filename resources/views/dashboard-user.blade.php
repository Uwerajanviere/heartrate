@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4" style="color: #333;">Welcome to Your Dashboard</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow rounded p-3" style="background-color: #ffe6e6;">
                <h5 class="text-center">Current Heart Rate</h5>
                <canvas id="heartRateChart" height="180"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow rounded p-3" style="background-color: #ffe6e6;">
                <h5 class="text-center">Health Tips</h5>
                <ul>
                    <li>Stay hydrated and eat balanced meals.</li>
                    <li>Get 30 minutes of moderate exercise daily.</li>
                    <li>Use HeartTrack AI daily for accurate monitoring.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('heartRateChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM'],
            datasets: [{
                label: 'Heart Rate (bpm)',
                data: [72, 78, 75, 80, 77],
                borderColor: '#ff4d4d',
                backgroundColor: 'rgba(255,77,77,0.2)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    min: 60,
                    max: 100
                }
            }
        }
    });
</script>
@endsection
