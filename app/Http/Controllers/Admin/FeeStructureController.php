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

        $fee_structures = FeeStructure::with('feeType')->get();
// dd($fee_structures->feeType);
       return view('admin.fee_structure.index', compact('fee_structures'));
    }


    public function create(){
        $classes = ExternalClass::get();

        // dd($)
        $feeTypes = FeeType::where('status', 0)->get();
        $sessions = ExternalSession::where('status', 'active')->get();
        $terms = ExternalTerm::where('status', 0)->get();
        return view('admin.fee_structure.create', compact(['classes', 'feeTypes', 'sessions', 'terms']));
    }


    public function store(Request $request){
        // dd($request->all());


        $request->validate([
            'class' => 'required',
            'academic_year' => 'required',
            'term' => 'required',
            'amount' => 'required|numeric|max_digits:10',
            'description' => 'required',
            'feeType' => 'required',
        ]);

        $feeStructure = FeeStructure::create([
            'class_id' => $request->class,
            'session_id' => $request->academic_year,
            'term_id' => $request->term,
            'fee_type_id' => $request->feeType,
            'amount' => $request->amount,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);

        return redirect(route('admin.feeStructure'));

    }



    public function edit($id){
        $fee_structure = FeeStructure::findOrFail($id);
        $classes = ExternalClass::get();

        // dd($)
        $feeTypes = FeeType::where('status', 0)->get();
        $sessions = ExternalSession::where('status', 'active')->get();
        $terms = ExternalTerm::where('status', 0)->get();
        // dd($fee_structure);
        return view('admin.fee_structure.edit', compact(['fee_structure', 'classes', 'feeTypes', 'sessions', 'terms']));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $fee_structure = FeeStructure::findOrFail($id);
        $request->validate([
            'class' => 'required',
            'academic_year' => 'required',
            'term' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'feeType' => 'required',
        ]);

        $fee_structure->update([
            'class_id' => $request->class,
            'session_id' => $request->academic_year,
            'term_id' => $request->term,
            'fee_type_id' => $request->feeType,
            'amount' => $request->amount,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);
        session()->flash('success', 'Fee Structure Successfully Updated');
        return redirect(route('admin.feeStructure'));
    }

    public function destroy($id){
        $fee_structure = FeeStructure::findOrFail($id);
        $fee_structure->delete();
        return redirect()->back();
    }

}
