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


    // Livewire property
    public $amount = null;


    public function mount()
    {
        $this->sessions = ExternalSession::where('status', 0)->get();
        $this->terms = ExternalTerm::where('status', 0)->get();
        $this->classes = ExternalClass::orderBy('name')->get();
        // $this->fee_structures = FeePayment::get();


    }

    public function updatedSelectedClass($value)
    {
        $this->students = ExternalStudent::where('class_id', $value)->get();
    }

    // public function updatedSelectedTerm($value)
    // {
    //     $this->fee_structures = FeeStructure::where('term_id', $value)->get();
    // }
    // public function updatedSelectedSession($value)
    // {
    //     $this->fee_structures = FeeStructure::where('session_id', $value)->get();
    // }

    // Listener
    public function updatedFeeStructure($id)
    {
        if ($id) {
            $fee = FeeStructure::find($id);
            $this->amount = $fee?->amount ?? null;
        }
    }

    public function updatedSelectedTerm($value)
    {
        $this->loadFeeStructures();
    }

    public function updatedSelectedSession($value)
    {
        $this->loadFeeStructures();
    }

    protected function loadFeeStructures()
    {
        if ($this->selectedTerm && $this->selectedSession && $this->selectedClass) {
            $this->fee_structures = FeeStructure::where('term_id', $this->selectedTerm)
                ->where('session_id', $this->selectedSession)
                ->where('class_id', $this->selectedClass)
                ->get();


            // if(!is_null($this->fee_structures)){

            // }
        }
        //  else {
        //     $this->fee_structures = collect();
        // }
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
        ]);

        // Save logic goes here...
        // dd($this->all());

        $structure = FeeStructure::find($this->fee_structure);

        FeePayment::create([
            'session_id'     => $this->selectedSession,
            'term_id'        => $this->selectedTerm,
            'class_id'       => $this->selectedClass,
            'student_id'     => $this->selectedStudent,
            'fee_structure_id' => $this->fee_structure,
            // 'amount'         => $this->amount,
            'payment_method'    => $this->payment_method,
            'amount_paid' => $this->amount_paid,
            // 'description' => $this->description,
            'expected_amount' => $structure->amount ?? 0,
            'balance' => max(0, ($structure->amount ?? 0) - $this->amount_paid),
            'payment_reference'    => $this->payment_reference,
        ]);

        session()->flash('success', 'Fee record saved successfully!');
        $this->reset([
            'selectedSession',
            'selectedTerm',
            'selectedClass',
            'selectedStudent',
            'fee_structure',
            'amount_paid',

        ]);
    }

    public function render()
    {
        return view('livewire.admin.fee-payment.create');
    }
}
