<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::where('status',true)->get();
        return view('products.products',compact('products'));
    }
    public function newCategory(){
        $categories = Category::all();
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
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        $request->session()->flash('successmessage', 'تم ضافة  التصنيف بنجاح ');
        return redirect('products/categories');

    }

    public function newProduct(){
        $categories = Category::all();
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
        $request->session()->flash('successmessage', 'تم ضافة  المنتج بنجاح ');
        return redirect('products/new');
    }

    public function editProduct($id)
    {
        $product=Product::find($id);
        $categories = Category::all();
        return view('products.editProduct',compact('product','categories'));
    }

    public function updateProduct(Request $request,$id){
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
        $product = Product::find($id);
        $product->name              = $request->name;
        $product->type              = $request->type;
        $product->category_id       = $request->category_id;
        $product->code              = $request->code;
        $product->sell_price        = $request->sell_price;
        $product->purchase_price        = $request->purchase_price;
        $product->quantity          = $request->quantity;
        $product->alert_quantity    = $request->alert_quantity;
        $product->save();
        $request->session()->flash('successmessage', 'تم تعديل  المنتج بنجاح ');
        return redirect('products');
    }

    public function deleteProduct($id)
    {
        $product= Product::find($id);
        $product->status = false;
        $product->save();
        session()->flash('successmessage', 'تم حذف المنتج بنجاح ');
        return redirect('products');
    }

    public function jsonsearch(Request $request)
    {
        $products = Product::select(['id','code','purchase_price as price','sell_price','name as value'])->where('status',true)->where('code','like','%'.$request->keywords.'%')
                        ->orWhere('name','like','%'.$request->keywords.'%')->where('status',true)->get();
        return response()->json($products);

    }

    public function getAjaxProducts(Request $request){   

        if($request->category){
            $products = Product::select(['id','code','purchase_price','sell_price','name as value'])
                ->where('status',true)
            ->where('category_id','=',$request->category)
            ->where('name','like','%'.$request->keywords.'%')->paginate($request->number_per_page);
            return response()->json($products);
        }
            $products = Product::select(['id','code','purchase_price','sell_price','name as value'])->where('status',true)->where('code','like','%'.$request->keywords.'%')
                            ->orWhere('name','like','%'.$request->keywords.'%')->where('status',true)->paginate($request->number_per_page);
            return response()->json($products);
    }

    public function getAjaxPProducts(Request $request){

        $products = Product::select(['id','code','purchase_price','sell_price','name as value'])->where('status',true)->where('type','=','m')->where('code','like','%'.$request->keywords.'%')
            ->orWhere('name','like','%'.$request->keywords.'%')
            ->where('type','=','m')->paginate($request->number_per_page);
        return response()->json($products);
    }

    public function editCategory($id)
    {
        $categories = Category::all();
        $editcategory = Category::find($id);
        $edit=true;
        return view('products.newCategory',compact('categories','editcategory','edit'));
    }

    public function updateCategory(Request $request,$id)
    {
        $rules = [
            'name'  => 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم التصنيف'
        ];
        $this->validate($request,$rules,$messages);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        $request->session()->flash('successmessage', 'تم تعديل التصنيف بنجاح ');
        return redirect('products/categories');
    }

    public function  deleteCategory($id)
    {
        $category = Category::find($id)->delete();
        session()->flash('successmessage', 'تم حذف التصنيف بنجاح ');
        return redirect('products/categories');
    }


    public function customerJsonSearch(Request $request)
    {
        $customer = Customer::find($request->id);
        return response()->json($customer);

    }


}
