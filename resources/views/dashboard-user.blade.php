<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HeartTrack AI - User Dashboard</title>
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
        .activity-card {
            background: linear-gradient(45deg, #4d79ff, #80a3ff);
            color: white;
        }
        .health-card {
            background: linear-gradient(45deg, #28a745, #5cb85c);
            color: white;
        }
        .dashboard-section {
            display: none;
        }
        .dashboard-section.active {
            display: block;
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
        .notification-item {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .notification-item:hover {
            background-color: #f8f9fa;
        }
        
        .notification-item.unread {
            background-color: #fff5f5;
        }
        
        .notification-item.read {
            background-color: white;
            opacity: 0.7;
        }
        
        .notification-item .notification-time {
            font-size: 0.8em;
            color: #6c757d;
        }
        
        .search-highlight {
            background-color: #fff3cd;
            padding: 2px;
            border-radius: 2px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white text-center mb-4">
            <i class="fas fa-heartbeat text-danger me-2"></i>
            HeartTrack
        </h4>
        <a href="#dashboard" class="active" data-section="dashboard">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="#heart-rate" data-section="heart-rate">
            <i class="fas fa-heartbeat me-2"></i> Heart Rate
        </a>
        <a href="#history" data-section="history">
            <i class="fas fa-history me-2"></i> History
        </a>
        <a href="#tips" data-section="tips">
            <i class="fas fa-lightbulb me-2"></i> Health Tips
        </a>
        <a href="#settings" data-section="settings">
            <i class="fas fa-gear me-2"></i> Settings
        </a>
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
                <i class="fas fa-user me-2"></i>
                Welcome, {{ Auth::user()->name }}
            </span>
            <div class="d-flex align-items-center">
                <div class="position-relative me-3">
                    <i class="fas fa-bell fa-lg" id="notificationBell"></i>
                    <span class="notification-badge" id="notificationCount">3</span>
                    <div class="notification-dropdown" id="notificationDropdown" style="display: none; position: absolute; right: 0; top: 100%; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); min-width: 300px; z-index: 1000;">
                        <div class="p-3 border-bottom">
                            <h6 class="mb-0">Notifications</h6>
                        </div>
                        <div class="notification-list" style="max-height: 300px; overflow-y: auto;">
                            <!-- Notifications will be added here dynamically -->
                        </div>
                    </div>
                </div>
                <form class="d-flex" role="search" id="searchForm">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search" id="searchInput">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <!-- Dashboard Section -->
        <div id="dashboard" class="dashboard-section active">
            <h2 class="fw-bold mb-4">Dashboard</h2>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card stat-card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Current Heart Rate</h6>
                                <h3 class="mb-0">76 bpm</h3>
                            </div>
                            <i class="fas fa-heartbeat fa-2x"></i>
                        </div>
                        <small class="mt-2">Normal Range</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card activity-card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Daily Activity</h6>
                                <h3 class="mb-0">8,500</h3>
                            </div>
                            <i class="fas fa-walking fa-2x"></i>
                        </div>
                        <small class="mt-2">Steps Today</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card health-card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Health Score</h6>
                                <h3 class="mb-0">85%</h3>
                            </div>
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                        <small class="mt-2">Good</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card p-4">
                        <h5 class="mb-3">Heart Rate Today</h5>
                        <canvas id="heartRateChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="mb-3">Activity Distribution</h5>
                        <canvas id="activityChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Heart Rate Section -->
        <div id="heart-rate" class="dashboard-section">
            <h2 class="fw-bold mb-4">Heart Rate Monitoring</h2>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">24-Hour Heart Rate</h5>
                        <canvas id="detailedHeartRateChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Heart Rate Zones</h5>
                        <canvas id="heartRateZonesChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-4">
                        <h5 class="mb-3">Recent Measurements</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Heart Rate</th>
                                        <th>Status</th>
                                        <th>Activity</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10:30 AM</td>
                                        <td>76 bpm</td>
                                        <td><span class="badge bg-success">Normal</span></td>
                                        <td>Resting</td>
                                        <td>After breakfast</td>
                                    </tr>
                                    <tr>
                                        <td>11:45 AM</td>
                                        <td>120 bpm</td>
                                        <td><span class="badge bg-warning">High</span></td>
                                        <td>Exercise</td>
                                        <td>During workout</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- History Section -->
        <div id="history" class="dashboard-section">
            <h2 class="fw-bold mb-4">History</h2>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Weekly Summary</h5>
                        <canvas id="weeklySummaryChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Monthly Trends</h5>
                        <canvas id="monthlyTrendsChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="card p-4">
                <h5 class="mb-3">Activity History</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Activity</th>
                                <th>Duration</th>
                                <th>Avg Heart Rate</th>
                                <th>Calories</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2024-03-19</td>
                                <td>Morning Run</td>
                                <td>30 min</td>
                                <td>145 bpm</td>
                                <td>320</td>
                            </tr>
                            <tr>
                                <td>2024-03-18</td>
                                <td>Yoga</td>
                                <td>45 min</td>
                                <td>85 bpm</td>
                                <td>180</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Health Tips Section -->
        <div id="tips" class="dashboard-section">
            <h2 class="fw-bold mb-4">Health Tips</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-heartbeat text-danger me-2"></i>Heart Health</h5>
                            <p class="card-text">Maintain a healthy heart rate during exercise. Your target heart rate zone is 120-150 bpm for moderate exercise.</p>
                            <button class="btn btn-outline-danger">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-walking text-primary me-2"></i>Daily Activity</h5>
                            <p class="card-text">Aim for at least 10,000 steps per day. Regular walking helps maintain a healthy heart rate.</p>
                            <button class="btn btn-outline-danger">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-bed text-success me-2"></i>Sleep Quality</h5>
                            <p class="card-text">Get 7-9 hours of sleep each night. Good sleep helps regulate your heart rate and overall health.</p>
                            <button class="btn btn-outline-danger">Learn More</button>
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
                        <h5 class="mb-3">Profile Settings</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="mb-3">Notification Settings</h5>
                        <form>
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Heart Rate Alerts</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Daily Summary</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Health Tips</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Preferences</button>
                        </form>
                    </div>
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

                // Scroll to top when changing sections
                window.scrollTo(0, 0);
            });
        });

        // Heart Rate Chart
        const heartRateCtx = document.getElementById('heartRateChart').getContext('2d');
        new Chart(heartRateCtx, {
            type: 'line',
            data: {
                labels: ['6AM', '9AM', '12PM', '3PM', '6PM', '9PM'],
                datasets: [{
                    label: 'Heart Rate',
                    data: [65, 75, 72, 78, 82, 70],
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
                }
            }
        });

        // Activity Chart
        const activityCtx = document.getElementById('activityChart').getContext('2d');
        new Chart(activityCtx, {
            type: 'doughnut',
            data: {
                labels: ['Walking', 'Running', 'Resting'],
                datasets: [{
                    data: [45, 30, 25],
                    backgroundColor: ['#4d79ff', '#ff4d4d', '#28a745']
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

        // Detailed Heart Rate Chart
        const detailedHeartRateCtx = document.getElementById('detailedHeartRateChart').getContext('2d');
        new Chart(detailedHeartRateCtx, {
            type: 'line',
            data: {
                labels: Array.from({length: 24}, (_, i) => `${i}:00`),
                datasets: [{
                    label: 'Heart Rate',
                    data: Array.from({length: 24}, () => Math.floor(Math.random() * 40) + 60),
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
                }
            }
        });

        // Heart Rate Zones Chart
        const heartRateZonesCtx = document.getElementById('heartRateZonesChart').getContext('2d');
        new Chart(heartRateZonesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Rest', 'Light', 'Moderate', 'Intense'],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ['#28a745', '#4d79ff', '#ffa64d', '#ff4d4d']
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

        // Weekly Summary Chart
        const weeklySummaryCtx = document.getElementById('weeklySummaryChart').getContext('2d');
        new Chart(weeklySummaryCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Average Heart Rate',
                    data: [72, 75, 70, 78, 76, 74, 71],
                    backgroundColor: '#4d79ff'
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

        // Monthly Trends Chart
        const monthlyTrendsCtx = document.getElementById('monthlyTrendsChart').getContext('2d');
        new Chart(monthlyTrendsCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Activity Level',
                    data: [75, 82, 78, 85],
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
                }
            }
        });

        // Enhanced Notification System
        const notifications = [
            { 
                id: 1,
                type: 'info',
                message: 'Time for your daily check-in',
                time: '2 minutes ago',
                read: false
            },
            { 
                id: 2,
                type: 'warning',
                message: 'Your heart rate was elevated during your last workout',
                time: '15 minutes ago',
                read: false
            },
            { 
                id: 3,
                type: 'success',
                message: 'You\'ve reached your daily step goal!',
                time: '1 hour ago',
                read: false
            }
        ];

        function updateNotificationCount() {
            const unreadCount = notifications.filter(n => !n.read).length;
            const badge = document.getElementById('notificationCount');
            badge.textContent = unreadCount;
            badge.style.display = unreadCount > 0 ? 'block' : 'none';
        }

        function renderNotifications() {
            const container = document.querySelector('.notification-list');
            container.innerHTML = notifications.map(notification => `
                <div class="notification-item ${notification.read ? 'read' : 'unread'}" data-id="${notification.id}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <strong>${notification.type.toUpperCase()}</strong>
                            <p class="mb-0">${notification.message}</p>
                        </div>
                        <small class="notification-time">${notification.time}</small>
                    </div>
                </div>
            `).join('');

            // Add click handlers to notification items
            document.querySelectorAll('.notification-item').forEach(item => {
                item.addEventListener('click', function() {
                    const id = parseInt(this.dataset.id);
                    const notification = notifications.find(n => n.id === id);
                    if (notification && !notification.read) {
                        notification.read = true;
                        this.classList.remove('unread');
                        this.classList.add('read');
                        updateNotificationCount();
                    }
                });
            });
        }

        // Toggle notification dropdown
        document.getElementById('notificationBell').addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            renderNotifications();
        });

        // Close notification dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('notificationDropdown');
            const bell = document.getElementById('notificationBell');
            if (!dropdown.contains(e.target) && !bell.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });

        // Enhanced Search Functionality
        function highlightText(text, searchTerm) {
            if (!searchTerm) return text;
            const regex = new RegExp(`(${searchTerm})`, 'gi');
            return text.replace(regex, '<span class="search-highlight">$1</span>');
        }

        function performSearch(searchTerm) {
            if (!searchTerm) {
                // Reset all tables to show all rows
                document.querySelectorAll('table tbody tr').forEach(row => {
                    row.style.display = '';
                    row.innerHTML = row.getAttribute('data-original-html') || row.innerHTML;
                });
                return;
            }

            document.querySelectorAll('table tbody tr').forEach(row => {
                // Store original HTML if not already stored
                if (!row.hasAttribute('data-original-html')) {
                    row.setAttribute('data-original-html', row.innerHTML);
                }

                const cells = Array.from(row.cells);
                const rowText = cells.map(cell => cell.textContent).join(' ').toLowerCase();
                
                if (rowText.includes(searchTerm.toLowerCase())) {
                    row.style.display = '';
                    // Highlight matching text in each cell
                    cells.forEach(cell => {
                        const originalText = cell.textContent;
                        cell.innerHTML = highlightText(originalText, searchTerm);
                    });
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Search form submission
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = document.getElementById('searchInput').value.trim();
            performSearch(searchTerm);
        });

        // Real-time search as user types
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = this.value.trim();
            performSearch(searchTerm);
        });

        // Make all buttons functional
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.textContent.trim();
                
                if (action === 'Learn More') {
                    const tipTitle = this.closest('.card-body').querySelector('.card-title').textContent;
                    const tipContent = {
                        'Heart Health': 'Your heart rate zones are:\n- Rest: 60-100 bpm\n- Light: 100-120 bpm\n- Moderate: 120-150 bpm\n- Intense: 150-170 bpm\n\nTips:\n1. Stay hydrated\n2. Warm up before exercise\n3. Monitor your heart rate during workouts',
                        'Daily Activity': 'Daily Activity Guidelines:\n\n1. 10,000 steps per day\n2. 30 minutes of moderate exercise\n3. Take breaks every hour\n4. Stay active throughout the day\n\nBenefits:\n- Improved heart health\n- Better sleep\n- Increased energy levels',
                        'Sleep Quality': 'Sleep Guidelines:\n\n1. 7-9 hours of sleep per night\n2. Consistent sleep schedule\n3. Avoid screens before bed\n4. Keep bedroom cool and dark\n\nBenefits:\n- Better heart rate recovery\n- Improved mood\n- Enhanced focus'
                    };
                    alert(tipContent[tipTitle] || 'Loading more information...');
                } else if (action === 'Save Changes' || action === 'Save Preferences') {
                    const form = this.closest('form');
                    const formData = new FormData(form);
                    const changes = {};
                    formData.forEach((value, key) => {
                        changes[key] = value;
                    });
                    console.log('Saving changes:', changes);
                    alert('Settings saved successfully!');
                }
            });
        });

        // Make stat cards clickable
        document.querySelectorAll('.stat-card, .activity-card, .health-card').forEach(card => {
            card.style.cursor = 'pointer';
            card.addEventListener('click', function() {
                const title = this.querySelector('h6').textContent;
                const value = this.querySelector('h3').textContent;
                const details = {
                    'Current Heart Rate': 'Your heart rate is within normal range (60-100 bpm).\nLast updated: 2 minutes ago',
                    'Daily Activity': 'You\'ve completed 8,500 steps today.\nGoal: 10,000 steps\nRemaining: 1,500 steps',
                    'Health Score': 'Your health score is based on:\n- Heart rate consistency\n- Daily activity\n- Sleep quality\n- Exercise regularity'
                };
                alert(`${title}: ${value}\n\n${details[title]}`);
            });
        });

        // Make table rows clickable
        document.querySelectorAll('table tbody tr').forEach(row => {
            row.style.cursor = 'pointer';
            row.addEventListener('click', function() {
                const cells = Array.from(this.cells);
                const details = cells.map(cell => cell.textContent.trim()).join('\n');
                alert('Details:\n\n' + details);
            });
        });

        // Make charts interactive
        function makeChartInteractive(chartId, title) {
            const canvas = document.getElementById(chartId);
            canvas.style.cursor = 'pointer';
            canvas.addEventListener('click', function() {
                alert(`Viewing detailed ${title}\nClick on data points to see more information.`);
            });
        }

        // Apply interactivity to all charts
        makeChartInteractive('heartRateChart', 'Heart Rate Today');
        makeChartInteractive('activityChart', 'Activity Distribution');
        makeChartInteractive('detailedHeartRateChart', '24-Hour Heart Rate');
        makeChartInteractive('heartRateZonesChart', 'Heart Rate Zones');
        makeChartInteractive('weeklySummaryChart', 'Weekly Summary');
        makeChartInteractive('monthlyTrendsChart', 'Monthly Trends');

        // Initialize notifications
        updateNotificationCount();
        renderNotifications();
    </script>
</body>
</html>
