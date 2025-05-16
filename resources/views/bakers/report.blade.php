<!DOCTYPE html>
<html>
<head>
    <title>Bakers Report</title>
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 16px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .card-header {
            background: #0d6efd;
            color: #fff;
            padding: 20px;
        }
        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }
        .card-body {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        thead {
            background: #e7f1ff;
        }
        th, td {
            padding: 12px 10px;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        th {
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #f4f8fb;
        }
        .text-center {
            text-align: center;
        }
        .text-muted {
            color: #888;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Bakers Report</h2>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Idade</th>
                        <th>Email</th>
                        <th>Cargo</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($bakers as $index => $baker)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $baker->name }}</td>
                            <td>{{ $baker->idade }}</td>
                            <td>{{ $baker->email }}</td>
                            <td>{{ $baker->cargo }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No bakers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
