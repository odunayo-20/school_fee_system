<?php

namespace App\Http\Controllers;

use App\Models\ExternalClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){

        $classes = ExternalClass::get();
        return view('admin.class.index', compact('classes'));
    }
}
