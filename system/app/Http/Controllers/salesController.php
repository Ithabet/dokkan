<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Category;
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
        $products = Product::all();
        $categories = Category::all();
        return view('sales.POS',compact('customers','products','categories'));
    }
    public function savePurchase(){

    }
}
