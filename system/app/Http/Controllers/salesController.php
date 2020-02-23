<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
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
    public function pos(){
        $customers = Customer::all();
        return view('sales.POS',compact('customers'));
    }
    public function savePurchase(){

    }
}
