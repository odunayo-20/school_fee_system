<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fee Payments Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>

<style>
    body {
        font-family: Arial, sans-serif;
        height: 100%;
    }

    .pdf-table1 {
        width: 100%;
        border-collapse: collapse;
        font-size: 10px;
        /* height: 400px; */
        /* margin-top: 20px; */
    }

    .pdf-table1 th,
    .pdf-table1 td {
        border: 1px solid black;
        padding: 4px;
        text-align: center;
        font-size: 10px;
    }

    .pdf-table1 th {
        background-color: #f2f2f2;
    }

    .details-table {
        border: none;
        width: 100%;
        font-size: 12px;
    }

    .details-table th,
    .details-table td {
        border: none;
    }

    .school-details {
        text-align: center;
        font-size: 12px;
        line-height: 1;
    }

    .affective-table {
        width: 100%;
        border: 1px solid;
        font-size: 10px;
    }

    .key-table {
        width: 100%;
        border: 1px solid;
        font-size: 10px;
    }

    .affective-table th {
        border: 1px solid;
        text-align: center;
    }

    .affective-table td {
        border: 1px solid;
        text-align: center;
    }

    .side {
        width: 100%;
        /* margin-top: 10px;
        margin-bottom: 10px; */
        height: 300px;
        display: block;
    }

    .side1 {
        width: 40%;
        float: left;
        margin-right: 15px;
    }

    .side2 {
        width: 55%;
        float: right;
    }

    .text {
        font-size: 12px;
    }

    .signatures {
        /* background: red; */
        width: 100%;

    }


    .signature-box {
        width: 50%;
    }

    .signature-line {
        /* border-top: 1px solid black;
        width: 100%; */
    }


    .performance {
        font-size: 10px;
    }

    .performance p {
        width: 30%;
        float: left;
    }

    .text {
        display: block;
        width: 100%
    }

    .text p {
        display: inline;
        padding-left: 12px;
        padding-right: 14px;
    }

    .text h3 {
        display: block;
        font-size: 12px;
        line-height: 2;
    }
</style>
</head>
<body>
    <div class="school-details" style="font-size:bold; text-transform: uppercase;">
        <h2 style="text-align: center;">Ogo-Oluwa Group of Schools, Emure</h2>

        <p>Behind Energy Filling Station Emure Ile Junction, Owo L.G.A, ONDO STATE </p>
        <p>ogooluwagse@gmail.com, 09060036867, 08060180552, 08136089968</p>
        <p>Motto: Education For Better Future</p>
        {{-- <p style="font-size:bold; text-transform: capitalize;">{{ $semester->name }} Report</p> --}}

    </div>
    <h2>Fee Payments Report</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
                <th>Class</th>
                <th>Academic Year</th>
                <th>Term</th>
                <th>Fee Type</th>
                <th>Expected</th>
                <th>Paid</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $index => $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->student->firstname }} {{ $payment->student->lastname }}</td>
                    <td>{{ $payment->class->name ?? '-' }}</td>
                    <td>{{ $payment->academicYear->year ?? $payment->session_name ?? '-' }} {{ $payment->academicYear->term->name ?? '-' }}</td>
                    <td>{{ $payment->term->name ?? '-' }}</td>
                    <td>{{ $payment->feeStructure->feeType->name ?? '-' }}</td>
                    <td>N{{ number_format($payment->expected_amount, 2) }}</td>
                    <td>N{{ number_format($payment->amount_paid, 2) }}</td>
                    <td>N{{ number_format($payment->balance, 2) }}</td>
                    <td>{{ $payment->status ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
