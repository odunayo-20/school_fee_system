<!DOCTYPE html>
<html>
<head>
    <title>Fee Payment Receipt</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        td, th { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Payment Receipt</h2>
        <p>{{ $student->first_name }} {{ $student->last_name }} - {{ $student->admission_no }}</p>
    </div>

    <div class="details">
        <strong>Session:</strong> {{ $payment->session_name }}<br>
        <strong>Term:</strong> {{ $payment->term->name }}<br>
        <strong>Class:</strong> {{ $payment->class->name }}<br>
        <strong>Date:</strong> {{ $payment->created_at->format('d M Y') }}<br>
    </div>

    <table>
        <tr>
            <th>Fee Type</th>
            <th>Expected</th>
            <th>Paid</th>
            <th>Balance</th>
        </tr>
        <tr>
            <td>{{ $structure->feeType->name }}</td>
            <td>{{ number_format($payment->expected_amount, 2) }}</td>
            <td>{{ number_format($payment->amount_paid, 2) }}</td>
            <td>{{ number_format($payment->balance, 2) }}</td>
        </tr>
    </table>

    <p><strong>Description:</strong> {{ $payment->description }}</p>

    <p>Thank you for your payment!</p>
</body>
</html>
