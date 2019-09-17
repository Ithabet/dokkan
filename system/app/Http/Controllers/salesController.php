<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class salesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('sales.sales');
    }
    public function newSales(){
        return view('sales.POS');
    }
    public function savePurchase(){

    }
}
