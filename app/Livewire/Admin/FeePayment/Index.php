<?php

namespace App\Livewire\Admin\FeePayment;

use Livewire\Component;
use App\Models\FeePayment;

class Index extends Component
{
    public function render()
    {
        $feePayments = FeePayment::get();
        return view('livewire.admin.fee-payment.index', compact('feePayments'));
    }
}
