<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeeType;
use App\Models\ExternalTerm;
use App\Models\FeeStructure;
use Illuminate\Http\Request;
use App\Models\ExternalClass;
use App\Models\ExternalSession;
use App\Http\Controllers\Controller;
use App\Models\ExternalClassSection;

class FeeStructureController extends Controller
{

     public $perPage = 10;
    public function index(){

        $fee_structures = FeeStructure::with('feeType')->get();
// dd($fee_structures->feeType);
       return view('admin.fee_structure.index', compact('fee_structures'));
    }


    public function create(){
        $classSections = ExternalClassSection::get();

        // dd($)
        $feeTypes = FeeType::where('status', 0)->get();
        $sessions = ExternalSession::where('status', 'active')->get();
        $terms = ExternalTerm::where('status', 0)->get();
        return view('admin.fee_structure.create', compact(['classSections', 'feeTypes', 'sessions', 'terms']));
    }


    public function store(Request $request){
        // dd($request->all());


        $request->validate([
            'class_section' => 'required',
            'academic_year' => 'required',
            'term' => 'required',
            'amount' => 'required|numeric|max_digits:10',
            'description' => 'required',
            'feeType' => 'required',
        ]);

        $feeStructure = FeeStructure::create([
            'class_section_id' => $request->class_section,
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
        $classSections = ExternalClassSection::get();

        // dd($)
        $feeTypes = FeeType::where('status', 0)->get();
        $sessions = ExternalSession::where('status', 'active')->get();
        $terms = ExternalTerm::where('status', 0)->get();
        // dd($fee_structure);
        return view('admin.fee_structure.edit', compact(['fee_structure', 'classSections', 'feeTypes', 'sessions', 'terms']));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $fee_structure = FeeStructure::findOrFail($id);
        $request->validate([
            'class_section' => 'required',
            'academic_year' => 'required',
            'term' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'feeType' => 'required',
        ]);

        $fee_structure->update([
            'class_section_id' => $request->class_section,
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
