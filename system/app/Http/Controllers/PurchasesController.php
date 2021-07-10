<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Purchase;
use App\PurchasesItem;
use Auth;

class PurchasesController extends Controller
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
            $purchases = Purchase::where('pos_id',Auth::user()->pos_id)->orderByDesc('id')->paginate(15);
        }
        else {
            $purchases = Purchase::orderByDesc('id')->paginate(15);
        }
        return view('purchases.purchases',compact('purchases'));
    }
    public function newPurchase(){
        $suppliers = Supplier::all();
        return view('purchases.newPurchase',compact('suppliers'));
    }
    public function savePurchase(Request $request){
        $purchase = new Purchase();
        $purchase->user_id = Auth::user()->id;
        $purchase->pos_id = Auth::user()->pos_id;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->total = $request->total;
        $purchase->paid = $request->paid;
        $purchase->created_at = $request->receipt_date;
        if($request->total > $request->paid)
            $purchase->status = 0;
        else
            $purchase->status = 1;
        $purchase->save();

        foreach ($request->product_id as $index=>$product_id){
            $purchase_item = new PurchasesItem();
            $purchase_item->purchase_id = $purchase->id;
            $purchase_item->product_id = $product_id;
            $purchase_item->product_price = $request->product_price[$index];
            $purchase_item->product_quantity = $request->product_quantity[$index];
            $purchase_item->save();
        }
        return redirect('purchase/print/receipt/'.$purchase->id);

    }
    public function receipt(Purchase $purchase){
        return view('purchases.print',compact('purchase'));
    }
}
