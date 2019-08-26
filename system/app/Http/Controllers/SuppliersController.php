<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('persons.suppliers');
    }
    public function newSupplier(){
        return view('persons.newSupplier');
    }
}
