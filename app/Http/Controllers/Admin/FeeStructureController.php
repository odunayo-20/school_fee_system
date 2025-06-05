<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeeType;
use App\Models\ExternalTerm;
use App\Models\FeeStructure;
use Illuminate\Http\Request;
use App\Models\ExternalClass;
use App\Models\ExternalSession;
use App\Http\Controllers\Controller;

class FeeStructureController extends Controller
{
    public function index(){

        $fee_structures = FeeStructure::get();
        return view('admin.fee_structure.index', compact('fee_structures'));
    }


    public function create(){
        $classes = ExternalClass::get();

        // dd($)
        $feeTypes = FeeType::where('status', 0)->get();
        $sessions = ExternalSession::where('status', 0)->get();
        $terms = ExternalTerm::where('status', 0)->get();
        return view('admin.fee_structure.create', compact(['classes', 'feeTypes', 'sessions', 'terms']));
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

        $feeStructure = FeeStructure::create([
            'class_id' => $request->class,
            'session_id' => $request->session,
            'term_id' => $request->term,
            'fee_type_id' => $request->feeType,
            'amount' => $request->amount,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);

        return redirect(route('admin.feeStructure'));

    }
}
