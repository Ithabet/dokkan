<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('purchases.purchases');
    }
    public function newPurchase(){
        return view('purchases.newPurchase');
    }
    public function savePurchase(){

    }
}
