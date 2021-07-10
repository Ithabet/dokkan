<?php

namespace App\Http\Controllers;

use App\Setting;
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
        $roles = (json_decode(auth()->user()->role))?json_decode(auth()->user()->role) :[];
        if(in_array('users',$roles))
        {
            $sales = Sales::orderByDesc('id')->paginate(25);
        }
        else {
            $sales = Sales::where('pos_id',Auth::user()->pos_id)->orderByDesc('id')->paginate(25);
        }

        return view('sales.sales',compact('sales'));
    }
    public function pos(){
        $customers = Customer::all();
        $products = Product::where('status',true)->get();
        $categories = Category::all();
        return view('sales.POS',compact('customers','products','categories'));
    }
    public function saveSales(Request $request){
        $sales = new Sales();
        $sales->user_id = Auth::user()->id;
        $sales->pos_id = Auth::user()->pos_id;
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

        $sales->address=$request->sale_address;
        $sales->phone=$request->sale_phone;
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
        $settings_all = Setting::all();
        $settings=[];
        foreach ($settings_all as $setting)
        {
            $settings[$setting->name] = $setting->value;
        }
        return view('sales.print',compact('sale','settings'));
    }

    public function editSale($id)
    {
        $sale = Sales::find($id);
        $customers = Customer::all();
        $products = Product::where('status',true)->get();
        $categories = Category::all();
        return view('sales.editSale',compact('sale','customers','products','categories'));
    }

    public function updateSales(Request $request,$id){
        $sales = Sales::find($id);
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

        $sales->address=$request->sale_address;
        $sales->phone=$request->sale_phone;
        $sales->save();

        $deleteSaleItems= SalesItem::where('sales_id',$sales->id)->delete();
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
    public function deleteSale($id){
        $sales = Sales::find($id)->delete();
        return back();
    }
}
