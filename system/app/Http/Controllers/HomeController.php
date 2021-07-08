<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::where('user_id',auth()->user()->id)->where('created_at',Carbon::today()->format('Y-m-d'))->get();
        $expenses = Expenses::where('user_id',auth()->user()->id)->where('created_at',Carbon::today()->format('Y-m-d'))->get();
        $total_sales = Sales::where('user_id',auth()->user()->id)->where('created_at',Carbon::today()->format('Y-m-d'))->get()->sum('paid');
        return view('home',compact('sales','expenses','total_sales'));
    }
}
