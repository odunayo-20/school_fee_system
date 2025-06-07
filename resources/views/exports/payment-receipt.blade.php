<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fees Receipt</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: #000000;
            line-height: 1.4;
            font-size: 14px;
        }

        .receipt-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 2px solid #2563eb;
            padding: 0;
        }

        .receipt-header {
            background-color:  rgb(59, 15, 129);
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .school-logo {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid #ffffff;
        }

        .school-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .school-address {
            font-size: 12px;
            opacity: 0.9;
        }

        .receipt-title {
            background-color: #000000;
            color: #ffffff;
            padding: 12px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .receipt-body {
            padding: 16px;
        }

        .student-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 5px solid #2563eb;
            margin-bottom: 10px;
        }

        .info-row {
            display: table;
            width: 100%;
            margin-bottom: 8px;
        }

        .info-label {
            display: table-cell;
            font-weight: bold;
            color: #333333;
            width: 40%;
            padding-right: 10px;
        }

        .info-value {
            display: table-cell;
            color: #000000;
            font-weight: normal;
        }

        .amount-highlight {
            background-color: #4b6fbe;
            /* background-color: #10b981; */
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin: 15px 0;
            /* border: 2px solid #059669; */
            border: 2px solid #3633e0;
        }

        .amount-text {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .amount-value {
            font-size: 28px;
            font-weight: bold;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #000000;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 5px;
        }

        .payment-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            border: 2px solid #000000;
        }

        .payment-table th {
            background-color: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            color: #000000;
            border: 1px solid #000000;
            font-size: 12px;
            text-transform: uppercase;
        }

        .payment-table td {
            padding: 12px;
            border: 1px solid #000000;
            color: #000000;
        }

        .payment-summary {
            margin: 20px 0;
        }

        .summary-row {
            display: table;
            width: 100%;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            padding: 10px;
            border-left: 3px solid #2563eb;
        }

        .summary-label {
            display: table-cell;
            font-weight: bold;
            color: #333333;
            width: 60%;
        }

        .summary-value {
            display: table-cell;
            color: #000000;
            font-weight: bold;
            text-align: right;
        }

        .signature-section {
            margin: 30px 0 20px;
            display: table;
            width: 100%;
        }

        .signature-box {
            display: table-cell;
            text-align: center;
            width: 50%;
            padding: 0 20px;
        }

        .signature-line {
            height: 50px;
            border-bottom: 2px solid #000000;
            margin-bottom: 8px;
        }

        .signature-label {
            font-size: 12px;
            color: #333333;
            font-weight: bold;
        }

        .receipt-footer {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
            color: #333333;
            font-size: 12px;
            border-top: 2px solid #2563eb;
        }

        .contact-info {
            margin-bottom: 10px;
            font-weight: bold;
            color: #000000;
        }

        .stamp-area {
            margin: 10px 0;
            padding: 15px;
            border: 2px dashed #666666;
            color: #666666;
            font-style: italic;
            font-size: 12px;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 80px;
            font-weight: bold;
            color: rgba(16, 185, 129, 0.1);
            pointer-events: none;
            z-index: -1;
        }

        /* Print specific styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white;
            }

            .receipt-container {
                margin: 0;
                border: 2px solid #000000;
                max-width: none;
                width: 100%;
            }

            .watermark {
                color: rgba(0, 0, 0, 0.1) !important;
            }
        }

        /* Ensure compatibility with older browsers and PDF generators */
        .flex-row {
            display: block;
            overflow: hidden;
        }

        .flex-col {
            float: left;
            width: 50%;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="watermark" style="text-transform: capitalize;">{{ $payment->status }}</div>

        <div class="receipt-header">
            {{-- <div class="school-logo">LA</div> --}}
            <div class="school-name">Ogo-Oluwa Group of Schools, Emure</div>
            <div class="school-address">
                <p>Behind Energy Filling Station Emure Ile Junction, Owo L.G.A, ONDO STATE </p>
                <p>ogooluwagse@gmail.com, 09060036867, 08060180552, 08136089968</p>
                <p>Motto: Education For Better Future</p>
            </div>
        </div>

        <div class="receipt-title">SCHOOL FEES RECEIPT</div>

        <div class="receipt-body">
            <div class="student-info">
                <div class="info-row">
                    <div class="info-label">Pupil's Name:</div>
                    <div class="info-value">{{ $payment->student->first_name }} {{ $payment->student->last_name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Grade:</div>
                    <div class="info-value">Grade 7A</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Admission No:</div>
                    <div class="info-value">{{ $payment->student->register_number }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Date:</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($payment->created_at)->format('F d, Y');
 }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Session:</div>
                    <div class="info-value">{{ $payment->session->name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Term:</div>
                    <div class="info-value">{{ $payment->term->name }}</div>
                </div>
            </div>
   <div class="amount-highlight">
                <div class="amount-text">Amount Paid</div>
                <div class="amount-value">N{{ number_format($payment->amount_paid, 2) }}</div>
            </div>

            <div class="payment-details">
                <div class="section-title">Payment Breakdown</div>
                <table class="payment-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount (N)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $payment->feeStructure->feeType->name }}</td>
                            <td>N{{ number_format($payment->feeStructure->amount, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="payment-summary">
                <div class="summary-row">
                    <div class="summary-label">Payment Method:</div>
                    <div class="summary-value">{{ $payment->payment_method }}</div>
                </div>
                <div class="summary-row">
                    <div class="summary-label">Outstanding Balance:</div>
                    <div class="summary-value">N{{ number_format($payment->balance, 2) }}</div>
                </div>
            </div>

            <div class="signature-section">
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-label">Authorized Signature</div>
                </div>
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-label">Parent/Guardian Signature</div>
                </div>
            </div>
        </div>

        <div class="receipt-footer">
            <div class="contact-info">
                www.ogooluwaschools.com.ng
            </div>
            <div class="stamp-area">SCHOOL STAMP HERE</div>
            <div>&copy; 2025 Ogo-Oluwa Group of Schools. All rights reserved.</div>
        </div>
    </div>


</body>

</html>
