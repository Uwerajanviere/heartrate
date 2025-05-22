<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HeartTrack AI Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
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
            padding: 30px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        h5 {
            color: #333;
        }
        footer {
            margin-top: 40px;
            padding: 20px 0;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 sidebar d-flex flex-column align-items-start p-3">
            <h4 class="fw-bold text-danger mb-4"><a class="nav-link mb-2" href="#">HeartTrack AI</a></h4>
            <a class="nav-link active mb-2" href="#"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link mb-2" href="#"><i class="fas fa-heartbeat"></i> Heart Rate</a>
            <a class="nav-link mb-2" href="#"><i class="fas fa-history"></i> History</a>
            <a class="nav-link mb-2" href="#"><i class="fas fa-lightbulb"></i> Tips</a>
            <a class="nav-link mb-2" href="#"><i class="fas fa-cog"></i> Settings</a>
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
            <h2 class="fw-bold mb-4">Welcome to Your Dashboard</h2>

            <!-- Row 1 -->
            <div class="row mb-4">
                <div class="col-md-6 mb-4">
                    <div class="card p-4">
                        <h5 class="text-center mb-3"><i class="fas fa-chart-line text-danger"></i> Heart Rate Today</h5>
                        <canvas id="heartRateChart" height="180"></canvas>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card p-4">
                        <h5 class="text-center mb-3"><i class="fas fa-notes-medical text-primary"></i> Health Tips</h5>
                        <ul>
                            <li>Stay hydrated and eat balanced meals.</li>
                            <li>Get 30 minutes of exercise daily.</li>
                            <li>Track your heart rate daily.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row mb-4">
                <div class="col-md-6 mb-4">
                    <div class="card p-4">
                        <h5 class="text-center mb-3"><i class="fas fa-calendar-week text-success"></i> Weekly Summary</h5>
                        <ul>
                            <li>Average Heart Rate: 76 bpm</li>
                            <li>Max Heart Rate: 88 bpm</li>
                            <li>Min Heart Rate: 69 bpm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card p-4">
                        <h5 class="text-center mb-3"><i class="fas fa-stethoscope text-info"></i> Recommendations</h5>
                        <ul>
                            <li>Check blood pressure weekly.</li>
                            <li>Try breathing exercises.</li>
                            <li>Consult a doctor for irregularities.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Row 3: Quick Actions -->
            <div class="card p-4 text-center mb-5">
                <h5 class="mb-4"><i class="fas fa-bolt text-warning"></i> Quick Actions</h5>
                <button class="btn btn-outline-primary m-2"><i class="fas fa-download"></i> Export Report</button>
                <button class="btn btn-outline-success m-2"><i class="fas fa-sync-alt"></i> Sync Device</button>
                <button class="btn btn-outline-danger m-2"><i class="fas fa-bell"></i> View Alerts</button>
            </div>

            <!-- Footer -->
            <footer>
                &copy; 2025 HeartTrack AI | <a href="#">Privacy</a> | <a href="#">Terms</a> | <a href="#">Support</a>
            </footer>
        </main>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
