<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeartTrack AI</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/css/landing.css') }}">
</head>
<body>
<header class="header">
    <img src="{{ asset('build/img/logo.png') }}" alt="HeartTrack AI Logo" class="logo">

    <nav class="nav-links">
        <a href="{{ route('landing') }}">Home</a>
        <a href="#about">About Us</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="#features">Features</a>
    </nav>

    <div class="auth-buttons">
        <a href="{{ route('register') }}" class="btn">Register</a>
        <a href="{{ route('login') }}" class="btn">Login</a>
    </div>
</header>


    <section class="hero" id="home">
        <h1>HeartTrack AI</h1>
        <p class="subtitle">HeartTrack AI – Real-time Heart Monitoring for a Healthier You! 🧠📈</p>
        <p class="description">
            The HeartTrack AI Project is a smart heart rate monitoring system that uses Artificial Intelligence (AI) and the Internet of Things (IoT) 
            to provide real-time heart health tracking. It empowers users to take control of their health without relying on hospitals or doctors.
        </p>
        <a href="/register" class="btn primary-btn">Register</a>
    </section>

    <section class="users">
        <h2>Our Users</h2>
        <p>We have been helping thousands of users track their heart health with confidence!</p>
    </section>

    <section class="how-it-works">
        <h2>How it Works</h2>
        <div class="steps">
            <div class="step">
                <h3>❤️ User Wears Device</h3>
                <p>The HeartTrack AI wearable continuously measures heart rate using advanced sensors.</p>
            </div>
            <div class="step">
                <h3>🤖 AI Analyzes Heart Rate Data</h3>
                <p>The device processes heart rate patterns, detects anomalies, and ensures accurate readings.</p>
            </div>
            <div class="step">
                <h3>📊 IoT Sensors Send Data to Dashboard</h3>
                <p>Real-time heart rate data is sent to the cloud for easy tracking.</p>
            </div>
            <div class="step">
                <h3>📈 Dashboard Displays Heart Health Reports</h3>
                <p>Users can monitor trends, receive alerts, and gain insights into their heart condition.</p>
            </div>
        </div>
    </section>
    <section class="features" id="features">
    <h2>Why Choose HeartTrack AI?</h2>
    <div class="features-list">
        <div class="feature">
            <h3>🧠 AI-Driven Insights</h3>
            <p>Go beyond basic tracking — understand patterns and receive actionable health advice tailored to you.</p>
        </div>
        <div class="feature">
            <h3>🔐 Private & Secure</h3>
            <p>All your health data is protected with advanced encryption. You stay in control of your personal information.</p>
        </div>
        <div class="feature">
            <h3>🌐 Accessible Anywhere</h3>
            <p>Access your dashboard across all your devices — whether you're at home, at work, or on the go.</p>
        </div>
        <div class="feature">
            <h3>🙌 Easy to Use</h3>
            <p>No technical skills needed. Just wear your device and let HeartTrack AI do the rest.</p>
        </div>
    </div>
</section>
<section class="about-us" id="about">
    <h2>About Us</h2>
    <p>
        At HeartTrack AI, we're reimagining healthcare through technology. Born from the need to make heart monitoring smarter and more accessible, our team of engineers, health experts, and visionaries created a solution that bridges wearable tech with artificial intelligence.
    </p>
    <p>
        Our mission is to empower individuals to take control of their heart health anytime, anywhere — with real-time insights and preventative care powered by data. From early detection to peace of mind, HeartTrack AI is here to support your wellness journey.
    </p>
</section>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} HeartTrack AI. All rights reserved.</p>
        <p>Empowering you to take control of your heart health 💓</p>
    </footer>

    <!-- Optional JS -->
    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>
