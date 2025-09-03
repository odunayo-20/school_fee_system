<?php

namespace App\Livewire\Admin\FeePayment;

use Livewire\Component;
use App\Models\FeePayment;

class Index extends Component
{

    public $feePayment;
    public $feePaymentStatus, $status;

    public function render()
    {
        $feePayments = FeePayment::get();
        return view('livewire.admin.fee-payment.index', compact('feePayments'));
    }


     public function deleteFeePayment($feePayment)
    {
        // dd($fee_structure);
        $this->feePayment = $feePayment;
    }
    public function destroyFeePayment()
    {
        FeePayment::findOrFail($this->feePayment)->delete();
        session()->flash('success', 'Fee Structure Successfully Deleted');
        $this->dispatch('close-modal');
    }

    public function editFeePaymentStatus(FeePayment $feePaymentStatus)
    {

        $this->feePaymentStatus = $feePaymentStatus;
        $this->status = $feePaymentStatus->status ;

    }



    public function updateFeePaymentStatus()
    {
        // $this->validate([
        //     'name' => 'required|string',
        //     'slug' => 'required|string',
        // ]);

        $this->feePaymentStatus->update([
            'status' => $this->status,

        ]);
        session()->flash('success',  'Fee Payment Status Successfully Updated');
        $this->dispatch('close-modal');
    }
}
