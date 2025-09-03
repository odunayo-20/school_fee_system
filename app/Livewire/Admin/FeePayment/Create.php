<?php

namespace App\Livewire\Admin\FeePayment;

use Livewire\Component;
use App\Models\FeePayment;
use App\Models\ExternalTerm;
use App\Models\FeeStructure;
use App\Models\ExternalClass;
use App\Models\ExternalSession;
use App\Models\ExternalStudent;

class Create extends Component
{
    public $sessions, $terms, $classes, $students = [];
    public $selectedSession, $selectedTerm, $selectedClass, $selectedStudent;
    public $fee_structures = [];
    public $fee_structure, $description, $amount_paid, $status = false, $payment_method, $payment_data, $payment_reference;
    public $remainingBalance = 0;
    public $isFullyCleared = null;

    // Livewire property
    public $amount = null;


    public function mount()
    {
        $this->sessions = ExternalSession::where('status', 'active')->get();
        $this->terms = ExternalTerm::where('status', 0)->get();
        $this->classes = ExternalClass::orderBy('name')->get();
        // $this->fee_structures = FeePayment::get();


    }



    public function updatedSelectedTerm($value)
    {
        $this->loadFeeStructures();
        $this->calculateRemainingBalance();

    }
    public function updatedSelectedStudent($value)
    {
        $this->calculateRemainingBalance();

    }

    public function updatedSelectedSession($value)
    {
        $this->loadFeeStructures();
        $this->calculateRemainingBalance();

    }


     public function updatedSelectedClass($value)
    {
        $this->students = ExternalStudent::where('current_class', $value)->get();
        $this->loadFeeStructures();
        $this->calculateRemainingBalance();
    }

public function updatedFeeStructure($id)
{
    if ($id) {
        $fee = FeeStructure::find($id);
        $this->amount = $fee?->amount ?? null;
    } else {
        $this->amount = null;
    }
    $this->calculateRemainingBalance();
}


public function updatedAmountPaid($value)
{
    $this->calculateRemainingBalance();
}


protected function calculateRemainingBalance()
{
    if (!$this->selectedStudent || !$this->selectedSession || !$this->selectedTerm || !$this->selectedClass || !$this->fee_structure) {
        $this->remainingBalance = 0;
        return;
    }

    $structure = FeeStructure::find($this->fee_structure);
    $totalAmount = $structure->amount ?? 0;



    $totalPaid = FeePayment::where('student_id', $this->selectedStudent)
    ->where('session_id', $this->selectedSession)
    ->where('term_id', $this->selectedTerm)
    ->where('class_id', $this->selectedClass)
    ->where('fee_structure_id', $this->fee_structure)
    ->sum('amount_paid');

$totalPaid = (float) $totalPaid;
$amountPaid = (float) $this->amount_paid;

$this->remainingBalance = max(0, $totalAmount - ($totalPaid + $amountPaid));

}



    protected function loadFeeStructures()
    {
        if ($this->selectedTerm && $this->selectedSession && $this->selectedClass) {
            $this->fee_structures = FeeStructure::where('term_id', $this->selectedTerm)
                ->where('session_id', $this->selectedSession)
                ->where('class_id', $this->selectedClass)
                ->get();


            } else {
                $this->fee_structures = collect();
            }
            $this->calculateRemainingBalance();
        }

    // public function updatedSelectedFee_structure($value){

    // }

    public function submit()
    {
        $this->validate([
            'selectedSession' => 'required',
            'selectedTerm' => 'required',
            'selectedClass' => 'required',
            'selectedStudent' => 'required',
            'fee_structure' => 'nullable|exists:fee_structures,id',
            'amount_paid' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
            'payment_reference' => 'nullable|string',
        ]);

        $structure = FeeStructure::find($this->fee_structure);
        $totalExpected = $structure->amount ?? 0;

        $totalPaid = FeePayment::where('student_id', $this->selectedStudent)
            ->where('session_id', $this->selectedSession)
            ->where('term_id', $this->selectedTerm)
            ->where('class_id', $this->selectedClass)
            ->where('fee_structure_id', $this->fee_structure)
            ->sum('amount_paid');

        // If student already fully paid, don't submit
        if ($totalPaid >= $totalExpected) {
            $this->addError('amount_paid', 'This student has already fully cleared this fee.');
            $this->reset('amount_paid');
            return; // Stop here, no new payment record created


        }

        // Optional: Prevent overpayment
        if (($totalPaid + $this->amount_paid) > $totalExpected) {
            $this->addError('amount_paid', 'Payment amount exceeds remaining balance.');
            $this->reset('amount_paid');
            return;

        }

        // dd($this->all());

        FeePayment::create([
            'session_id'          => $this->selectedSession,
            'term_id'             => $this->selectedTerm,
            'class_id'            => $this->selectedClass,
            'student_id'          => $this->selectedStudent,
            'fee_structure_id'    => $this->fee_structure,
            'payment_method'      => $this->payment_method,
            'amount_paid'         => $this->amount_paid,
            'expected_amount'     => $totalExpected,
            'balance'             => max(0, $totalExpected - ($totalPaid + $this->amount_paid)),
            'payment_reference'   => $this->payment_reference,
        ]);

        session()->flash('success', 'Fee Payment is Made Successfully!');

        $this->reset([
            'selectedSession',
            'selectedTerm',
            'selectedClass',
            'selectedStudent',
            'fee_structure',
            'amount_paid',
            'payment_method',
            'payment_reference',
        ]);
    }

    // public function submit()
    // {
    //     $this->validate([
    //         'selectedSession' => 'required',
    //         'selectedTerm' => 'required',
    //         'selectedClass' => 'required',
    //         'selectedStudent' => 'required',
    //         'fee_structure' => 'nullable|exists:fee_structures,id',
    //         'amount_paid' => 'required|numeric|min:1',
    //     ]);

    //     // Save logic goes here...
    //     // dd($this->all());

    //     $structure = FeeStructure::find($this->fee_structure);

    //     FeePayment::create([
    //         'session_id'     => $this->selectedSession,
    //         'term_id'        => $this->selectedTerm,
    //         'class_id'       => $this->selectedClass,
    //         'student_id'     => $this->selectedStudent,
    //         'fee_structure_id' => $this->fee_structure,
    //         // 'amount'         => $this->amount,
    //         'payment_method'    => $this->payment_method,
    //         'amount_paid' => $this->amount_paid,
    //         // 'description' => $this->description,
    //         'expected_amount' => $structure->amount ?? 0,
    //         'balance' => max(0, ($structure->amount ?? 0) - $this->amount_paid),
    //         'payment_reference'    => $this->payment_reference,
    //     ]);

    //     if ($this->amount_paid > ($this->amount ?? 0)) {
    //         $this->addError('amount_paid', 'Payment amount cannot exceed total fee amount.');
    //         return;
    //     }

    //     session()->flash('success', 'Fee record saved successfully!');
    //     $this->reset([
    //         'selectedSession',
    //         'selectedTerm',
    //         'selectedClass',
    //         'selectedStudent',
    //         'fee_structure',
    //         'amount_paid',

    //     ]);
    // }

    public function getIsFullyClearedProperty()
    {
        if (!$this->selectedStudent || !$this->fee_structure || !$this->selectedSession || !$this->selectedTerm || !$this->selectedClass) {
            return false; // Not enough data to check
        }

        $structure = FeeStructure::find($this->fee_structure);
        $totalExpected = $structure->amount ?? 0;

        $totalPaid = FeePayment::where('student_id', $this->selectedStudent)
            ->where('session_id', $this->selectedSession)
            ->where('term_id', $this->selectedTerm)
            ->where('class_id', $this->selectedClass)
            ->where('fee_structure_id', $this->fee_structure)
            ->sum('amount_paid');

        return $totalPaid >= $totalExpected;
    }



    public function render()
    {
        // dd($this->isFullyCleared);
        return view('livewire.admin.fee-payment.create');
    }
}
