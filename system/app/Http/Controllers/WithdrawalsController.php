<?php

namespace App\Http\Controllers;

use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = (json_decode(auth()->user()->role))?json_decode(auth()->user()->role) :[];
        if(in_array('users',$roles))
        {
            $withdrawals= Withdrawal::where('pos_id',Auth::user()->pos_id)->orderByDesc('id')->get();
        }
        else {
            $withdrawals= Withdrawal::orderByDesc('id')->get();
        }
        return view('withdrawals/index',compact('withdrawals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        if (isset($errors)) {
            return redirect('/withdrawals')->withInput();
        }

        $withdrawal=new Withdrawal;
        $withdrawal->pos_id = Auth::user()->pos_id;
        $withdrawal->name=$request->name;
        $withdrawal->amount=$request->amount;
        $withdrawal->date=$request->date;
        $withdrawal->user_id=Auth::User()->id;
        $withdrawal->save();
        $request->session()->flash('successmessage', 'تم اضافة المسحوب بنجاح');
        return redirect('/withdrawals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $withdrawal= Withdrawal::find($id);
        return view('withdrawals/edit',compact('withdrawal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        if (isset($errors)) {
            return redirect('/withdrawals')->withInput();
        }

        $withdrawal= Withdrawal::find($id);
        $withdrawal->name=$request->name;
        $withdrawal->amount=$request->amount;
        $withdrawal->date=$request->date;
        $withdrawal->save();
        $request->session()->flash('successmessage', 'تم تعديل المسحوب بنجاح');
        return redirect('/withdrawals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $withdrawal= Withdrawal::find($id)->delete();
        session()->flash('successmessage', 'تم حذف المسحوب بنجاح');
        return redirect('/withdrawals');
    }
}
