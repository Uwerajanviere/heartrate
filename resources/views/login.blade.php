<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/login.css') }}">
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
    <div class="login-section">
        <h1>Login</h1>
        <form>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
