<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Category;
use App\Sales;
use App\SalesItem;
use Illuminate\Support\Facades\Auth;

class salesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sales = Sales::paginate(2);
        return view('sales.sales',compact('sales'));
    }
    public function pos(){
        $customers = Customer::all();
        $products = Product::all();
        $categories = Category::all();
        return view('sales.POS',compact('customers','products','categories'));
    }
    public function saveSales(Request $request){
        $sales = new Sales();
        $sales->user_id = Auth::user()->id;
        $sales->customer_id = $request->customer_id;
        $sales->order_type = $request->order_type;
        $sales->table_number = $request->table_number;
        $sales->total = $request->total;
        $sales->paid = $request->paid;
        $sales->created_at = $request->receipt_date;
        if($request->total > $request->paid)
            $sales->status = 0;
        else
            $sales->status = 1;
        $sales->save();

        foreach ($request->product_id as $index=>$product_id){
            $sales_item = new SalesItem();
            $sales_item->sales_id = $sales->id;
            $sales_item->product_id = $product_id;
            $sales_item->product_price = $request->product_price[$index];
            $sales_item->product_quantity = $request->product_quantity[$index];
            $sales_item->save();
        }
        return redirect('sales/print/receipt/'.$sales->id);

    }
    public function receipt(Sales $sale){
        return view('sales.print',compact('sale'));
    }
}
