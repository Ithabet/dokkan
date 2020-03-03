<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users=User::all();
        return view('persons.users',compact('users'));
    }
    public function newUser(){
        return view('persons.newUser');
    }
}
