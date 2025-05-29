<!-- resources/views/history.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History</title>
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
            max-width: 700px;
            margin: 0 auto;
        }
        h2 {
            color: #0f172a;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #f1f5f9;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Heart Rate History</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Average</th>
                    <th>Max</th>
                    <th>Min</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>May 27</td>
                    <td>76 bpm</td>
                    <td>88 bpm</td>
                    <td>69 bpm</td>
                </tr>
                <tr>
                    <td>May 28</td>
                    <td>74 bpm</td>
                    <td>86 bpm</td>
                    <td>68 bpm</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
