<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Features</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/features.css') }}">
</head>
<body>
<header class="header">
    <img src="{{ asset('build/img/logo.png') }}" alt="HeartTrack AI Logo" class="logo">

    <nav class="nav-links">
        <a href="{{ route('landing') }}">Home</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('features') }}">Features</a>
    </nav>

    <div class="auth-buttons">
        <a href="{{ route('register') }}" class="btn">Register</a>
        <a href="{{ route('login') }}" class="btn">Login</a>
    </div>
</header>
    <div class="features-section">
        <h1>Our Features</h1>
        <ul>
            <li>💓 Real-time heart rate monitoring</li>
            <li>📊 Smart data analysis with AI</li>
            <li>📱 IoT-powered wearable support</li>
            <li>🔔 Instant health notifications</li>
            <li>🧠 Personalized recommendations</li>
        </ul>
    </div>
</body>
</html>
