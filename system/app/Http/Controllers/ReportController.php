<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Expenses;
use App\Purchase;
use App\Sales;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sales(Request $request){
        if(isset($request->from) and isset($request->to)){
            $sales = Sales::whereBetween('created_at',[$request->from,$request->to])->get();
        }
        else {

            $sales = Sales::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)->get();
        }
        return view('reports.sales',compact('sales','request'));
    }

    public function purchases(Request $request){
        if(isset($request->from) and isset($request->to)) {
            $purchases = Purchase::whereBetween('created_at',[$request->from,$request->to])->get();
        }
        else {

            $purchases = Purchase::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)->get();
        }
        return view('reports.purchases',compact('purchases','request'));
    }


    public function expenses(Request $request){
        if(isset($request->from) and isset($request->to)) {
            $expenses = Expenses::whereBetween('date',[$request->from,$request->to])->get();
        }
        else {

            $expenses = Expenses::whereYear('date', Carbon::now()->year)
                ->whereMonth('date', Carbon::now()->month)->get();
        }
        return view('reports.expenses',compact('expenses','request'));
    }

    public function cash(Request $request){
        if(isset($request->from) and isset($request->to)) {
            $sales = Sales::whereBetween('created_at',[$request->from,$request->to])->get();
            $deposits=Deposit::whereBetween('date',[$request->from,$request->to])->get();
            $purchases=Purchase::whereBetween('created_at',[$request->from,$request->to])->get();
            $expenses = Expenses::whereBetween('date',[$request->from,$request->to])->get();
            $withdrawals = Withdrawal::whereBetween('date',[$request->from,$request->to])->get();
        }
        else {

            $sales = Sales::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)->get();

            $deposits = Deposit::whereYear('date', Carbon::now()->year)
                ->whereMonth('date', Carbon::now()->month)->get();

            $purchases = Purchase::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)->get();

            $expenses = Expenses::whereYear('date', Carbon::now()->year)
                ->whereMonth('date', Carbon::now()->month)->get();

            $withdrawals=Withdrawal::whereYear('date', Carbon::now()->year)
                ->whereMonth('date', Carbon::now()->month)->get();
        }

        return view('reports.cash',compact('sales','deposits','purchases','expenses','withdrawals','request'));
    }
}
