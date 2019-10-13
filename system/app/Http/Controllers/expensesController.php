<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class expensesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('expenses.expenses');
    }

    public function saveExpenses(){

    }

}
