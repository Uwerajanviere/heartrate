<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/about.css') }}">
</head>
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
<body>
    <div class="about-section">
        <h1>About Us</h1>
        <p>HeartTrack AI empowers individuals with real-time heart health insights using smart technology. Our mission is to blend AI, IoT, and health data to protect and inform lives around the world.</p>
    </div>
</body>
</html>
