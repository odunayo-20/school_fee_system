<?php
namespace App\Livewire\Admin\FeePayment;

use Livewire\Component;
use App\Models\FeePayment;
use App\Models\ExternalStudent;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function render()
    {
        $payments = FeePayment::with(['student', 'term', 'class', 'feeStructure.feeType'])
            ->when($this->search, fn($q) =>
                $q->whereHas('student', fn($q2) =>
                    $q2->where('first_name', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                )
            )
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.fee-payment.history', [
            'payments' => $payments
        ])->extends('layouts.app')->section('content');
    }
}
