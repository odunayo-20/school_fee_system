<div class="container">
    <div class="mb-3 row">
        <div class="col-md-6">
            <input type="text" wire:model.live="search" class="form-control" placeholder="Search by student name...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Session</th>
                    <th>Term</th>
                    <th>Fee Type</th>
                    <th>Expected</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Date</th>
                    <th>Receipt</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $index => $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->student->first_name }} {{ $payment->student->last_name }}</td>
                        <td>{{ $payment->class->name }}</td>
                        <td>{{ $payment->session_name }}</td>
                        <td>{{ $payment->term->name }}</td>
                        <td>{{ $payment->feeStructure->feeType->name }}</td>
                        <td>{{ number_format($payment->expected_amount, 2) }}</td>
                        <td>{{ number_format($payment->amount_paid, 2) }}</td>
                        <td>{{ number_format($payment->balance, 2) }}</td>
                        <td>{{ $payment->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.fee-payment.receipt', $payment->id) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                PDF
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">No payment records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $payments->links() }}
    </div>
</div>
