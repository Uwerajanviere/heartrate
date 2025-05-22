<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            position: fixed;
            width: 220px;
        }
        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .navbar {
            margin-left: 220px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card {
            background-color: #ffe6e6;
        }
        .overview-card {
            background-color: #fff0f0;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white text-center mb-4"><a class="nav-link mb-2" href="{{ route('landing') }}">HeartTrack Admin</a></h4>
        <a href="#"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="#"><i class="fas fa-users me-2"></i> Users</a>
        <a href="#"><i class="fas fa-heartbeat me-2"></i> Heart Rates</a>
        <a href="#"><i class="fas fa-bell me-2"></i> Alerts</a>
        <a href="#"><i class="fas fa-gear me-2"></i> Settings</a>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="nav-link btn btn-link text-danger p-0" style="text-align: left;">
        <i class="fas fa-sign-out-alt"></i> Logout
    </button>
</form>

    </div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light px-4">
        <div class="container-fluid">
            <span class="navbar-brand">Welcome, Admin</span>
            <form class="d-flex ms-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <h2 class="fw-bold mb-4">Admin Dashboard</h2>

        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card shadow rounded p-3">
                    <h5>Total Users</h5>
                    <h3>1,250</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow rounded p-3">
                    <h5>Avg Heart Rate</h5>
                    <h3>76 bpm</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow rounded p-3">
                    <h5>Alerts Today</h5>
                    <h3>12</h3>
                </div>
            </div>
        </div>

        <div class="card shadow rounded p-4 mb-5 overview-card">
            <h5 class="mb-3">User Monitoring Overview</h5>
            <canvas id="adminChart" height="200"></canvas>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
