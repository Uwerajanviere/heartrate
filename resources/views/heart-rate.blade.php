<!-- resources/views/heart-rate.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heart Rate Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
        }
        .sidebar .nav-link.active {
            background-color: #ff4d4d;
            color: #fff;
        }
        .sidebar .nav-link i {
            margin-right: 8px;
        }
        .main-content {
            padding: 40px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }
        h2 {
            color: #dc3545;
        }
        .stat {
            font-size: 1.2rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar d-flex flex-column align-items-start p-3">
            <h4 class="fw-bold text-danger mb-4"><a class="nav-link mb-2" href="#">HeartTrack AI</a></h4>

            <a class="nav-link mb-2" href="{{ route('user') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a class="nav-link mb-2 active" href="{{ route('heart-rate') }}">
                <i class="fas fa-heartbeat"></i> Heart Rate
            </a>
            <a class="nav-link mb-2" href="{{ route('owner.projects') }}">
                <i class="fas fa-history"></i> History
            </a>
            <a class="nav-link mb-2" href="{{ route('tips') }}">
                <i class="fas fa-lightbulb"></i> Tips
            </a>
            <a class="nav-link mb-2" href="{{ route('settings') }}">
                <i class="fas fa-cog"></i> Settings
            </a>
            <hr>
            <a class="nav-link mb-2" href="#"><i class="fas fa-user"></i> Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-danger p-0" style="text-align: left;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 main-content">
            <div class="text-center mb-5">
                <h2>Daily Heart Rate Monitor</h2>
                <p class="text-muted">Tracking your heart rate for better health insights</p>
            </div>

            <!-- Stats Summary -->
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card p-3 text-center">
                        <h5>Average Rate</h5>
                        <p class="stat text-success">75 bpm</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-3 text-center">
                        <h5>Highest Rate</h5>
                        <p class="stat text-danger">92 bpm</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-3 text-center">
                        <h5>Lowest Rate</h5>
                        <p class="stat text-primary">68 bpm</p>
                    </div>
                </div>
            </div>

            <!-- Heart Rate Chart -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title text-center">Heart Rate Over Time</h5>
                    <canvas id="heartRateChart" height="120"></canvas>
                </div>
            </div>

            <!-- Activity Log -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Heart Rate Log</h5>
                    <ul class="list-group">
                        <li class="list-group-item">8:00 AM – 72 bpm (Resting)</li>
                        <li class="list-group-item">10:00 AM – 76 bpm (Light walking)</li>
                        <li class="list-group-item">12:00 PM – 74 bpm (After lunch)</li>
                        <li class="list-group-item">2:00 PM – 78 bpm (Focused work)</li>
                        <li class="list-group-item">4:00 PM – 75 bpm (Mild activity)</li>
                        <li class="list-group-item">6:00 PM – 82 bpm (Evening workout)</li>
                        <li class="list-group-item">9:00 PM – 68 bpm (Relaxing)</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Chart Script -->
<script>
    const ctx = document.getElementById('heartRateChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM', '6 PM', '9 PM'],
            datasets: [{
                label: 'Heart Rate (bpm)',
                data: [72, 76, 74, 78, 75, 82, 68],
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                borderColor: '#dc3545',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointRadius: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 60,
                    suggestedMax: 100
                }
            }
        }
    });
</script>
</body>
</html>
