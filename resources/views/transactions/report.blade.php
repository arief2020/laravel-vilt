<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Transaction Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Staff</th>
                <th>Transaction Date</th>
                <th>Transaction Type</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>{{ $transaction->transaction_type }}</td>
                    <td>{{ $transaction->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
