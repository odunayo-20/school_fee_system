@section('title', 'Payment History')
<div class="container py-4">

    {{-- Search and Filters --}}
    <div class="mb-3 row">
        <div class="col-md-6">
            <input type="text" wire:model.debounce.500ms="search" class="form-control"
                placeholder="Search by student name...">
        </div>
        <div class="col-md-6 text-end">
            <button wire:click="export('pdf')" class="btn btn-sm btn-danger me-2">
                <i class="fas fa-file-pdf"></i> Export PDF
            </button>
            <button wire:click="export('xlsx')" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-md-3">
            <label>Start Date</label>
            <input type="date" wire:model.live="filter_start" class="form-control">
        </div>
        <div class="col-md-3">
            <label>End Date</label>
            <input type="date" wire:model.live="filter_end" class="form-control">
        </div>
        <div class="col-md-2">
            <label>Term</label>
            <select wire:model.live="filter_term" class="form-select">
                <option value="">All Terms</option>
                @foreach ($terms as $term)
                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="col-md-2">
            <label>Session</label>
            <select wire:model.live="filter_session" class="form-select">
                <option value="">All Sessions</option>
                @foreach ($sessions as $session)
                    <option value="{{ $session->id }}">{{ $session->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="col-md-2">
            <label>Student</label>
            <select wire:model.live="filter_student" class="form-select">
                <option value="">All Students</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->lastname }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Payments Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-light">
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
                    <th>Date</th>
                    <th>Receipt</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $index => $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->student->firstname ?? 'N/A' }} {{ $payment->student->lastname ?? 'N/A' }}</td>
                        <td>{{ $payment->class->name ?? 'N/A' }}</td>
                        {{-- <td>{{ $payment->session->name }}</td> --}}
                        <td>{{ $payment->academicYear->year ?? 'N/A' }} {{ $payment->academicYear->term->name ?? 'N/A' }}</td>
                        <td>{{ $payment->feeStructure->term->name ?? 'N/A' }}</td>
                        <td>{{ $payment->feeStructure->feeType->name ?? 'N/A' }}</td>
                        <td>{{ number_format($payment->expected_amount, 2) }}</td>
                        <td>{{ number_format($payment->amount_paid, 2) }}</td>
                        <td class="{{ $payment->balance > 0 ? 'text-danger fw-bold' : 'text-success' }}">
                            {{ number_format($payment->balance, 2) }}
                        </td>
                        <td>{{ $payment->created_at->format('d M Y') }}</td>
                        {{-- <td>
                            <button class="btn btn-sm btn-outline-primary"
                                wire:click="openReceipt({{ $payment->id }})">
                                Preview
                            </button>
                        </td> --}}
                        <td>
                            <button class="btn btn-sm btn-outline-primary" wire:click="Receipt({{ $payment->id }})">
                                Receipt
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">No payment records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $payments->links() }}
    </div>

    {{-- Receipt Modal --}}
    <div wire:ignore.self class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @if ($receiptPayment)
                    <div class="modal-header">
                        <h5 class="modal-title">Receipt for {{ $receiptPayment->student->firstname }}
                            {{ $receiptPayment->student->lastname }}</h5>
                        <button type="button" class="btn-close" wire:click="closeReceipt" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Class:</strong> {{ $receiptPayment->class->name }}</p>
                        {{-- <p><strong>Session:</strong> {{ $receiptPayment->session->name }}</p> --}}
                        <p><strong>Term:</strong> {{ $receiptPayment->term->name }}</p>
                        <p><strong>Fee Type:</strong> {{ $receiptPayment->feeStructure->feeType->name }}</p>
                        <p><strong>Expected:</strong> ₦{{ number_format($receiptPayment->expected_amount, 2) }}</p>
                        <p><strong>Paid:</strong> ₦{{ number_format($receiptPayment->amount_paid, 2) }}</p>
                        <p><strong>Balance:</strong> ₦{{ number_format($receiptPayment->balance, 2) }}</p>
                        <p><strong>Date:</strong> {{ $receiptPayment->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}

@section('scripts')
    <script>
        Livewire.on('show-receipt-modal', () => {
            const modal = new bootstrap.Modal(document.getElementById('receiptModal'));
            modal.show();
        });
    </script>

@endsection
