<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeType;
use Illuminate\Http\Request;

class FeeTypeController extends Controller
{
    public function index(){

        $fee_types = FeeType::get();
        return view('admin.fee_type.index', compact('fee_types'));
    }
}
