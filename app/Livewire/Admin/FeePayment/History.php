<?php

namespace App\Livewire\Admin\FeePayment;

use Livewire\Component;
use App\Models\FeePayment;
use App\Models\ExternalTerm;
use Livewire\WithPagination;
use App\Models\ExternalSession;
use App\Models\ExternalStudent;
use App\Exports\FeePaymentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class History extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public $filter_start, $filter_end, $filter_term, $filter_session, $filter_student;
    public $sessions, $terms, $students;
    public $receiptPayment;

    protected $listeners = ['closeReceipt' => 'closeReceipt'];

    public function mount()
    {
        $this->sessions = ExternalSession::all();
        $this->terms = ExternalTerm::all();
        $this->students = ExternalStudent::all();
    }

    public function getFilteredPaymentsProperty()
    {
        return FeePayment::with(['student', 'term', 'class', 'feeStructure.feeType'])
            ->when($this->filter_start, fn($q) => $q->whereDate('created_at', '>=', $this->filter_start))
            ->when($this->filter_end, fn($q) => $q->whereDate('created_at', '<=', $this->filter_end))
            ->when($this->filter_term, fn($q) => $q->where('term_id', $this->filter_term))
            // ->when($this->filter_session, fn($q) => $q->where('session_id', $this->filter_session))
            ->when($this->filter_student, fn($q) => $q->where('student_id', $this->filter_student))
            ->latest()
            ->get();
    }

    public function render()
    {
        $payments = FeePayment::with(['student', 'term', 'class', 'feeStructure.feeType'])
            ->when(
                $this->search,
                fn($q) =>
                $q->whereHas(
                    'student',
                    fn($q2) =>
                    $q2->where('firstname', 'like', "%{$this->search}%")
                        ->orWhere('lastname', 'like', "%{$this->search}%")
                )
            )
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.fee-payment.history', [
            'payments' => $payments
        ])->extends('layouts.app')->section('content');
    }




    public function export($type)
    {
        $filename = 'fee_payments_' . now()->format('Y-m-d') . ".{$type}";

        if ($type === 'xlsx') {
            return Excel::download(new FeePaymentsExport($this->filteredPayments), $filename);
        } elseif ($type === 'pdf') {
            $pdf = PDF::loadView('exports.fee-payments-pdf', [
                'payments' => $this->filteredPayments
            ]);
            return response()->streamDownload(fn() => print($pdf->output()), $filename);
        }
    }

    public function openReceipt($paymentId)
    {
        $this->receiptPayment = FeePayment::with(['student', 'term', 'class', 'feeStructure.feeType'])->findOrFail($paymentId);
        $this->dispatch('show-receipt-modal');
    }
    public function Receipt($paymentId)
    {
        $filename = 'fee_payments_' . now()->format('Y-m-d') . ".pdf";

        $payment = FeePayment::with(['student', 'term', 'class', 'feeStructure.feeType', 'academicYear'])->findOrFail($paymentId);

        // Calculate total previously paid amount
        $totalPreviouslyPaid = FeePayment::where('student_id', $payment->student_id)
            ->where('fee_structure_id', $payment->fee_structure_id)
            ->where('created_at', '<', $payment->created_at)
            ->sum('amount_paid');

        // Calculate remaining balance
        $totalAmount = $payment->feeStructure->amount;
        $currentPaid = $payment->amount_paid;
        $remainingBalance = max(0, $totalAmount - ($totalPreviouslyPaid + $currentPaid));

        $pdf = PDF::loadView('exports.payment-receipt', [
            'payment' => $payment,
            'totalPreviouslyPaid' => $totalPreviouslyPaid,
            'remainingBalance' => $remainingBalance
        ]);

        return response()->streamDownload(fn() => print($pdf->output()), $filename);
    }


    public function closeReceipt()
    {
        $this->receiptPayment = null;
    }
}
