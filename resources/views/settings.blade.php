<!-- resources/views/settings.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            color: #0f766e;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Settings</h2>
        <form>
            <label><input type="checkbox" checked> Enable Notifications</label>
            <label><input type="checkbox"> Dark Mode</label>
            <label><input type="checkbox"> Show Weekly Summary</label>
        </form>
    </div>
</body>
</html>
