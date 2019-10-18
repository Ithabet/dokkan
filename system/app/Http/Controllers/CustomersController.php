<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('persons.customers');
    }
    public function newCustomer(){
        return view('persons.newCustomer');
    }
    public function customer(Request $customer){
        return view('persons.customer');
    }
}
