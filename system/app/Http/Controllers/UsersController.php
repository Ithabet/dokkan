<?php

namespace App\Http\Controllers;

use App\Pos;
use App\User;
use Illuminate\Database\Eloquent\Model;
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
        $poss = Pos::all();
        return view('persons.newUser',compact('poss'));
    }
    public function editUser($id){
        $poss = Pos::all();
        $user = User::find($id);
        return view('persons.editUser',compact('poss','user'));
    }
    public function saveUser(Request $request,$id=null){
        if($id){
            $user = User::find($id);
        }else{
            $user = new User;
            $user->email = $request->email;
        }
        $user->name = $request->username;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->pos_id = $request->pos_id;
        $user->role = json_encode($request->role);

        if(isset($request->password))
            $user->password = bcrypt($request->password);

        $user->save();
        return back();
    }


}
