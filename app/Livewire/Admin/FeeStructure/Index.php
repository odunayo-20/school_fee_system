<?php

namespace App\Livewire\Admin\FeeStructure;

use App\Models\FeeStructure;
use Livewire\Component;

class Index extends Component
{

    public $fee_structure;




    public function render()
    {
        // $fee_structures = $this->fee_structures;
        $fee_structures = FeeStructure::with(['feeType', 'term', 'session', 'class'])->get();
        return view('livewire.admin.fee-structure.index', compact('fee_structures'));
    }




    public function deleteFeeStructure($fee_structure)
    {
        // dd($fee_structure);
        $this->fee_structure = $fee_structure;
    }
    public function destroyFeeStructure()
    {
        FeeStructure::findOrFail($this->fee_structure)->delete();
        session()->flash('success', 'Fee Structure Successfully Deleted');
        $this->dispatch('close-modal');
    }
}
