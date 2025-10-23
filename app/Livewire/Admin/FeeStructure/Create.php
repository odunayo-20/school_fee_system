<?php

namespace App\Livewire\Admin\FeeStructure;

use App\Models\ExternalClass;
use App\Models\ExternalClassSection;
use App\Models\ExternalSession;
use App\Models\ExternalTerm;
use App\Models\FeeStructure;
use App\Models\FeeType;
use Livewire\Component;

class Create extends Component
{
    public $class_section, $session, $term, $amount, $description, $feeType, $status;

    public $classes;
    public $feeTypes;
    public $sessions;
    public $terms;

    public function mount()
    {
        $this->classes = ExternalClassSection::get();

        // dd($this->)
        $this->feeTypes = FeeType::where('status', 0)->get();
        $this->sessions = ExternalSession::where('status', 0)->get();
        $this->terms = ExternalTerm::where('status', 0)->get();
    }


    public function store()
    {
        dd($this->all());


        $this->validate([
            'class_section' => 'required',
            'session' => 'required',
            'term' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'feeType' => 'required',
        ]);

        $feeStructure = FeeStructure::create([
            'class_section_id' => $this->class_section,
            'session_id' => $this->session,
            'term_id' => $this->term,
            'fee_type_id' => $this->feeType,
            'amount' => $this->amount,
            'description' => $this->description,
            'status' => $this->status == true ? 1 : 0,
        ]);
    }
    public function render()
    {
        return view('livewire.admin.fee-structure.create');
    }
}
