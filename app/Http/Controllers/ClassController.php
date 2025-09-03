<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\ExternalClass;

class ClassController extends Controller
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public function index()
    {

        $classes = ExternalClass::paginate(3);
        return view('admin.class.index', compact('classes'));
    }
}
