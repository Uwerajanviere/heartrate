<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - HeartTrack AI</title>
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
            width: 250px;
            transition: all 0.3s;
        }
        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
        }
        .sidebar a:hover {
            background-color: #495057;
            padding-left: 25px;
        }
        .sidebar a.active {
            background-color: #dc3545;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }
        .navbar {
            margin-left: 250px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .stat-card {
            background: linear-gradient(45deg, #ff4d4d, #ff8080);
            color: white;
        }
        .alert-card {
            background: linear-gradient(45deg, #ff8080, #ffb3b3);
            color: white;
        }
        .user-card {
            background: linear-gradient(45deg, #4d79ff, #80a3ff);
            color: white;
        }
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            padding: 3px 6px;
            border-radius: 50%;
            background: #dc3545;
            color: white;
            font-size: 0.7em;
        }
        .dashboard-section {
            display: none;
        }
        .dashboard-section.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white text-center mb-4">
            <i class="fas fa-heartbeat text-danger me-2"></i>
            HeartTrack Admin
        </h4>
        <a href="#dashboard" class="active" data-section="dashboard"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="#users" data-section="users"><i class="fas fa-users me-2"></i> Users Management</a>
        <a href="#heart-rate" data-section="heart-rate"><i class="fas fa-heartbeat me-2"></i> Heart Rate Data</a>
        <a href="#alerts" data-section="alerts"><i class="fas fa-bell me-2"></i> Alerts & Notifications</a>
        <a href="#analytics" data-section="analytics"><i class="fas fa-chart-line me-2"></i> Analytics</a>
        <a href="#settings" data-section="settings"><i class="fas fa-gear me-2"></i> Settings</a>
        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-danger w-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light px-4">
        <div class="container-fluid">
            <span class="navbar-brand">
                <i class="fas fa-user-shield me-2"></i>
                Welcome, Admin
            </span>
            <div class="d-flex align-items-center">
                <div class="position-relative me-3">
                    <i class="fas fa-bell fa-lg"></i>
                    <span class="notification-badge">3</span>
                </div>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <!-- Dashboard Section -->
        <div id="dashboard" class="dashboard-section active">
            <h2 class="fw-bold mb-4">Admin Dashboard</h2>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card stat-card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Total Users</h6>
                                <h3 class="mb-0">1,250</h3>
                            </div>
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <small class="mt-2">↑ 12% from last month</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card alert-card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Active Alerts</h6>
                                <h3 class="mb-0">12</h3>
                            </div>
                            <i class="fas fa-bell fa-2x"></i>
                        </div>
                        <small class="mt-2">3 require immediate attention</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card user-card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Avg Heart Rate</h6>
                                <h3 class="mb-0">76 bpm</h3>
                            </div>
                            <i class="fas fa-heartbeat fa-2x"></i>
                        </div>
                        <small class="mt-2">Within normal range</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">System Health</h6>
                                <h3 class="mb-0">98%</h3>
                            </div>
                            <i class="fas fa-server fa-2x"></i>
                        </div>
                        <small class="mt-2">All systems operational</small>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card p-4">
                        <h5 class="mb-3">User Activity Overview</h5>
                        <canvas id="userActivityChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="mb-3">Alert Distribution</h5>
                        <canvas id="alertDistributionChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="table-container">
                <h5 class="mb-3">Recent Activity</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Activity</th>
                                <th>Heart Rate</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>Exercise</td>
                                <td>145 bpm</td>
                                <td><span class="badge bg-warning">High</span></td>
                                <td>2 mins ago</td>
                                <td><button class="btn btn-sm btn-outline-danger">View</button></td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>Resting</td>
                                <td>72 bpm</td>
                                <td><span class="badge bg-success">Normal</span></td>
                                <td>5 mins ago</td>
                                <td><button class="btn btn-sm btn-outline-danger">View</button></td>
                            </tr>
                            <tr>
                                <td>Mike Johnson</td>
                                <td>Sleeping</td>
                                <td>65 bpm</td>
                                <td><span class="badge bg-success">Normal</span></td>
                                <td>10 mins ago</td>
                                <td><button class="btn btn-sm btn-outline-danger">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Users Management Section -->
        <div id="users" class="dashboard-section">
            <h2 class="fw-bold mb-4">Users Management</h2>
            <div class="card p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">User List</h5>
                    <button class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add New User</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Last Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>2 mins ago</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td><span class="badge bg-warning">Inactive</span></td>
                                <td>5 days ago</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Heart Rate Data Section -->
        <div id="heart-rate" class="dashboard-section">
            <h2 class="fw-bold mb-4">Heart Rate Data</h2>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Average Heart Rates</h5>
                        <canvas id="avgHeartRateChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Heart Rate Distribution</h5>
                        <canvas id="heartRateDistributionChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Heart Rate Trends by Age Group</h5>
                        <canvas id="ageGroupHeartRateChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Activity vs Heart Rate</h5>
                        <canvas id="activityHeartRateChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="card p-4">
                <h5 class="mb-3">Recent Heart Rate Records</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Heart Rate</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>76 bpm</td>
                                <td><span class="badge bg-success">Normal</span></td>
                                <td>2 mins ago</td>
                                <td><button class="btn btn-sm btn-outline-primary">View Details</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Alerts Section -->
        <div id="alerts" class="dashboard-section">
            <h2 class="fw-bold mb-4">Alerts & Notifications</h2>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card alert-card p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Critical Alerts</h6>
                                <h3 class="mb-0">3</h3>
                            </div>
                            <i class="fas fa-exclamation-triangle fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Warnings</h6>
                                <h3 class="mb-0">5</h3>
                            </div>
                            <i class="fas fa-bell fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Notifications</h6>
                                <h3 class="mb-0">8</h3>
                            </div>
                            <i class="fas fa-info-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-4">
                <h5 class="mb-3">Recent Alerts</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Message</th>
                                <th>User</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge bg-danger">Critical</span></td>
                                <td>High heart rate detected</td>
                                <td>John Doe</td>
                                <td>5 mins ago</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-2">View</button>
                                    <button class="btn btn-sm btn-outline-success">Resolve</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Analytics Section -->
        <div id="analytics" class="dashboard-section">
            <h2 class="fw-bold mb-4">Analytics</h2>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">User Growth</h5>
                        <canvas id="userGrowthChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Activity Trends</h5>
                        <canvas id="activityTrendsChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-4">
                        <h5 class="mb-3">Performance Metrics</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Metric</th>
                                        <th>Current</th>
                                        <th>Previous</th>
                                        <th>Change</th>
                                        <th>Trend</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Active Users</td>
                                        <td>1,250</td>
                                        <td>1,100</td>
                                        <td>+13.6%</td>
                                        <td><i class="fas fa-arrow-up text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Avg. Heart Rate</td>
                                        <td>76 bpm</td>
                                        <td>78 bpm</td>
                                        <td>-2.6%</td>
                                        <td><i class="fas fa-arrow-down text-success"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div id="settings" class="dashboard-section">
            <h2 class="fw-bold mb-4">Settings</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">System Settings</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Alert Thresholds</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">High</span>
                                    <input type="number" class="form-control" value="100">
                                    <span class="input-group-text">bpm</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Low</span>
                                    <input type="number" class="form-control" value="60">
                                    <span class="input-group-text">bpm</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Notification Settings</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Email Notifications</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">SMS Notifications</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Push Notifications</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">User Preferences</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Display Settings</label>
                                <select class="form-select mb-3">
                                    <option>Light Theme</option>
                                    <option>Dark Theme</option>
                                    <option>System Default</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data Refresh Rate</label>
                                <select class="form-select mb-3">
                                    <option>Real-time</option>
                                    <option>Every 5 minutes</option>
                                    <option>Every 15 minutes</option>
                                    <option>Every 30 minutes</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Preferences</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="userName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-select" id="userRole" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userStatus" class="form-label">Status</label>
                            <select class="form-select" id="userStatus" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveUserBtn">Save User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Navigation
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = this.getAttribute('data-section');
                
                // Update active states
                document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
                this.classList.add('active');
                
                // Show selected section
                document.querySelectorAll('.dashboard-section').forEach(section => {
                    section.classList.remove('active');
                });
                document.getElementById(sectionId).classList.add('active');
            });
        });

        // Make all buttons functional
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.textContent.trim();
                const row = this.closest('tr');
                
                if (action === 'View' || action === 'View Details') {
                    // Show modal with details
                    const user = row.cells[0].textContent;
                    const activity = row.cells[1].textContent;
                    const heartRate = row.cells[2].textContent;
                    const status = row.cells[3].textContent;
                    
                    alert(`Details for ${user}:\nActivity: ${activity}\nHeart Rate: ${heartRate}\nStatus: ${status}`);
                } else if (action === 'Edit') {
                    // Show edit form
                    const userId = row.cells[0].textContent;
                    const userName = row.cells[1].textContent;
                    const userEmail = row.cells[2].textContent;
                    
                    const newName = prompt('Edit name:', userName);
                    const newEmail = prompt('Edit email:', userEmail);
                    
                    if (newName && newEmail) {
                        row.cells[1].textContent = newName;
                        row.cells[2].textContent = newEmail;
                        alert('User updated successfully!');
                    }
                } else if (action === 'Delete') {
                    // Confirm deletion
                    if (confirm('Are you sure you want to delete this user?')) {
                        row.remove();
                        alert('User deleted successfully!');
                    }
                } else if (action === 'Resolve') {
                    // Resolve alert
                    const statusCell = row.cells[4];
                    statusCell.innerHTML = '<span class="badge bg-success">Resolved</span>';
                    this.disabled = true;
                    alert('Alert resolved successfully!');
                }
            });
        });

        // Make search functional
        const searchForm = document.querySelector('form[role="search"]');
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = this.querySelector('input').value.toLowerCase();
            
            // Search in all tables
            document.querySelectorAll('table tbody tr').forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Make notification bell clickable
        document.querySelector('.fa-bell').parentElement.addEventListener('click', function() {
            alert('You have 3 new notifications:\n1. High heart rate alert\n2. System update available\n3. New user registration');
        });

        // Make settings forms functional
        document.querySelectorAll('form').forEach(form => {
            if (form.getAttribute('role') !== 'search') {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Settings saved successfully!');
                });
            }
        });

        // Make select dropdowns functional
        document.querySelectorAll('select').forEach(select => {
            select.addEventListener('change', function() {
                alert(`${this.previousElementSibling.textContent} updated to: ${this.value}`);
            });
        });

        // Make checkboxes functional
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const setting = this.nextElementSibling.textContent;
                const status = this.checked ? 'enabled' : 'disabled';
                alert(`${setting} ${status}`);
            });
        });

        // Charts initialization
        // User Activity Chart
        const userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
        new Chart(userActivityCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Active Users',
                    data: [200, 240, 180, 220, 210, 190, 230],
                    borderColor: '#ff4d4d',
                    backgroundColor: 'rgba(255,77,77,0.1)',
                    tension: 0.4,
                    fill: true
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
                        beginAtZero: true
                    }
                }
            }
        });

        // Alert Distribution Chart
        const alertDistributionCtx = document.getElementById('alertDistributionChart').getContext('2d');
        new Chart(alertDistributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['High Heart Rate', 'Irregular Rhythm', 'Low Heart Rate'],
                datasets: [{
                    data: [45, 30, 25],
                    backgroundColor: ['#ff4d4d', '#ffa64d', '#4d79ff']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // User Growth Chart
        const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'New Users',
                    data: [100, 150, 200, 250, 300, 350],
                    borderColor: '#4d79ff',
                    backgroundColor: 'rgba(77,121,255,0.1)',
                    tension: 0.4,
                    fill: true
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

        // Activity Trends Chart
        const activityTrendsCtx = document.getElementById('activityTrendsChart').getContext('2d');
        new Chart(activityTrendsCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Active Sessions',
                    data: [120, 150, 180, 90, 160, 200, 140],
                    backgroundColor: '#ff4d4d'
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

        // Add click handlers for stat cards
        document.querySelectorAll('.stat-card, .alert-card, .user-card').forEach(card => {
            card.style.cursor = 'pointer';
            card.addEventListener('click', function() {
                const title = this.querySelector('h6').textContent;
                const value = this.querySelector('h3').textContent;
                alert(`${title}: ${value}\nClick OK to view detailed statistics.`);
            });
        });

        // Initialize Bootstrap Modal
        const addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));

        // Add User Button Click Handler
        document.querySelector('.btn-primary').addEventListener('click', function() {
            addUserModal.show();
        });

        // Save User Button Click Handler
        document.getElementById('saveUserBtn').addEventListener('click', function() {
            const form = document.getElementById('addUserForm');
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            const role = document.getElementById('userRole').value;
            const status = document.getElementById('userStatus').value;

            if (name && email) {
                // Create new table row
                const tbody = document.querySelector('#users .table tbody');
                const newRow = document.createElement('tr');
                const userId = tbody.children.length + 1;

                newRow.innerHTML = `
                    <td>${userId}</td>
                    <td>${name}</td>
                    <td>${email}</td>
                    <td><span class="badge bg-${status === 'active' ? 'success' : 'warning'}">${status}</span></td>
                    <td>Just now</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                `;

                // Add the new row to the table
                tbody.appendChild(newRow);

                // Reset form and close modal
                form.reset();
                addUserModal.hide();

                // Show success message
                alert('User added successfully!');

                // Update total users count
                const totalUsersElement = document.querySelector('.stat-card h3');
                const currentTotal = parseInt(totalUsersElement.textContent.replace(/,/g, ''));
                totalUsersElement.textContent = (currentTotal + 1).toLocaleString();
            } else {
                alert('Please fill in all required fields');
            }
        });

        // Heart Rate Charts
        const avgHeartRateCtx = document.getElementById('avgHeartRateChart').getContext('2d');
        new Chart(avgHeartRateCtx, {
            type: 'line',
            data: {
                labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '24:00'],
                datasets: [{
                    label: 'Average Heart Rate',
                    data: [65, 68, 72, 75, 78, 74, 70],
                    borderColor: '#ff4d4d',
                    backgroundColor: 'rgba(255,77,77,0.1)',
                    tension: 0.4,
                    fill: true
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
                        beginAtZero: false,
                        min: 50,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Heart Rate (bpm)'
                        }
                    }
                }
            }
        });

        const heartRateDistributionCtx = document.getElementById('heartRateDistributionChart').getContext('2d');
        new Chart(heartRateDistributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Normal (60-100)', 'High (>100)', 'Low (<60)'],
                datasets: [{
                    data: [75, 15, 10],
                    backgroundColor: ['#28a745', '#dc3545', '#ffc107']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        const ageGroupHeartRateCtx = document.getElementById('ageGroupHeartRateChart').getContext('2d');
        new Chart(ageGroupHeartRateCtx, {
            type: 'bar',
            data: {
                labels: ['18-25', '26-35', '36-45', '46-55', '56-65', '65+'],
                datasets: [{
                    label: 'Average Heart Rate',
                    data: [72, 75, 78, 76, 74, 70],
                    backgroundColor: '#4d79ff'
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
                        beginAtZero: false,
                        min: 60,
                        max: 90,
                        title: {
                            display: true,
                            text: 'Heart Rate (bpm)'
                        }
                    }
                }
            }
        });

        const activityHeartRateCtx = document.getElementById('activityHeartRateChart').getContext('2d');
        new Chart(activityHeartRateCtx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Resting',
                    data: [
                        {x: 0, y: 65},
                        {x: 1, y: 68},
                        {x: 2, y: 70},
                        {x: 3, y: 72},
                        {x: 4, y: 71}
                    ],
                    backgroundColor: '#28a745'
                }, {
                    label: 'Exercise',
                    data: [
                        {x: 0, y: 120},
                        {x: 1, y: 135},
                        {x: 2, y: 145},
                        {x: 3, y: 130},
                        {x: 4, y: 125}
                    ],
                    backgroundColor: '#dc3545'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time (hours)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Heart Rate (bpm)'
                        }
                    }
                }
            }
        });

        // Add click handlers for heart rate charts
        document.querySelectorAll('#heart-rate .card').forEach(card => {
            card.style.cursor = 'pointer';
            card.addEventListener('click', function() {
                const title = this.querySelector('h5').textContent;
                alert(`Viewing detailed ${title}\nClick OK to see more information.`);
            });
        });
    </script>
</body>
</html>
