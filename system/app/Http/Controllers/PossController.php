<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PossController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('poss.poss');
    }
    public function newPos(){
        return view('poss.newPos');
    }
}
