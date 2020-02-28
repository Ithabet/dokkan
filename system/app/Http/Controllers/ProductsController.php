<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Product;
class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::all();
        return view('products.products',compact('products'));
    }
    public function newCategory(){
        $categories = category::all();
        return view('products.newCategory',compact('categories'));
    }

    public function saveCategory(Request $request){
        $rules = [
            'name'  => 'required'   
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم التصنيف'
        ];
        $this->validate($request,$rules,$messages);
        $category = new category();
        $category->name = $request->name;
        $category->save();
        return redirect('products/categories');

    }
    public function newProduct(){
        $categories = category::all();
        return view('products.newProduct',compact('categories'));
    }
    public function saveProduct(Request $request){
        $rules = [
            'name'      => 'required',
            'code'      => 'required',
            'quantity'  => 'required'   
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم المنتج',
            'code.required'     => 'يجب اضافة كود المنتج',
            'quantity.required' => 'يجب اضافة كمية المنتج',
        ];
        $this->validate($request,$rules,$messages);
        $product = new Product();
        $product->name              = $request->name;
        $product->type              = $request->type;
        $product->category_id       = $request->category_id;
        $product->code              = $request->code;
        $product->sell_price        = $request->sell_price;
        $product->purchase_price        = $request->purchase_price;
        $product->quantity          = $request->quantity;
        $product->alert_quantity    = $request->alert_quantity;
        $product->save();
        return redirect('products/new');
    }
    public function jsonsearch(Request $request)
    {
        $products = Product::select(['id','code','purchase_price as price','name as value'])->where('code','like','%'.$request->keywords.'%')
                        ->orWhere('name','like','%'.$request->keywords.'%')->get();
        return response()->json($products);

    }
    public function getAjaxProducts(Request $request){   
            $products = Product::select(['id','code','purchase_price as price','name as value'])->where('code','like','%'.$request->keywords.'%')
                            ->orWhere('name','like','%'.$request->keywords.'%')->paginate($request->number_per_page);
            return response()->json($products);
    }

}
