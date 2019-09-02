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
}
