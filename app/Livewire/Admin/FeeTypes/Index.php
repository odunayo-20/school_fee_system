<?php

namespace App\Livewire\Admin\FeeTypes;

use App\Models\FeeType;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
     use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public $fee_types;


    // public function mount()
    // {
    //     $this->fee_types = FeeType::get();

    //     // dd($this->fee_types);
    // }

    public $name, $slug, $fee_type, $status;

 public $perPage = 10;

    public function storeFeeType()
    {
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
        ]);

        FeeType::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('success', 'Fee Type Successfully Created');
        $this->reset();

        $this->dispatch('close-modal');
    }

    public function editFeeType(FeeType $fee_type)
    {

        $this->fee_type = $fee_type;
        $this->name = $fee_type->name;
        $this->slug = $fee_type->slug;
        $this->status = $fee_type->status == '1' ? true : false;

    }



    public function updateFeeType()
    {
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
        ]);

        $this->fee_type->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',

        ]);
        session()->flash('success',  'Fee Type Successfully Updated');
        $this->dispatch('close-modal');
    }

    public function deleteFeeType($fee_type)
    {
        // dd($fee_type);
        $this->fee_type = $fee_type;
    }
    public function destroyFeeType()
    {
        FeeType::findOrFail($this->fee_type)->delete();
        session()->flash('success', 'Fee Type Successfully Deleted');
        $this->dispatch('close-modal');
    }




    public function render()
    {
        $fee_types = FeeType::paginate($this->perPage);
        return view('livewire.admin.fee-types.index', compact('fee_types'));
    }
}
