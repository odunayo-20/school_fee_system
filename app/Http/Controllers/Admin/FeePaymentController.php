<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeePayment;
use App\Models\FeeStructure;
use Illuminate\Http\Request;
use App\Models\ExternalStudent;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class FeePaymentController extends Controller
{
     public $perPage = 10;
    public function index(){

        $feePayments = FeePayment::paginate($this->perPage);

        return view('admin.fee_payment.index', compact('feePayments'));
    }


    public function create(){

        $students = ExternalStudent::get();

        // dd($students);
        $payment_structures  = FeeStructure::where('status', 0)->get();
        return view('admin.fee_payment.create', compact(['payment_structures', 'students']));
    }


    public function store(Request $request){
        // dd($request->all());


        $request->validate([
            'class' => 'required',
            'session' => 'required',
            'term' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'feeType' => 'required',
        ]);

        $feePayment = FeePayment::create([
            'class_id' => $request->class,
            'session_id' => $request->session,
            'term_id' => $request->term,
            'fee_type_id' => $request->feeType,
            'amount' => $request->amount,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);

        return redirect(route('admin.feePayment'));

    }

    public function downloadReceipt(FeePayment $payment)
    {
        $pdf = Pdf::loadView('admin.pdf.fee-receipt', [
            'payment' => $payment,
            'student' => $payment->student,
            'structure' => $payment->feeStructure,
        ]);

        return $pdf->stream('receipt_' . $payment->student->firstname . '.pdf');
    }

}
