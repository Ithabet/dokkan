<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('products.products');
    }
    public function newCategory(){
        return view('products.newCategory');
    }

    public function saveCategory(){

    }
    public function newProduct(){
        return view('products.newProduct');
    }
    public function jsonsearch(Request $request)
    {
        $productsArr = array(
        ['id'=>'1','value'=>'سكرزز','price'=>'20'],['id'=>'2','value'=>'ززيت','price'=>'37.5']
        );
        return response()->json($productsArr);

    }
}
