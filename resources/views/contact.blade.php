<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/contact.css') }}">
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
    <div class="contact-section">
        <h1>Contact Us</h1>
        <form>
            <label>Name</label>
            <input type="text" required>
            <label>Email</label>
            <input type="email" required>
            <label>Message</label>
            <textarea rows="4" required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
