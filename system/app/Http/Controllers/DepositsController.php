<?php

namespace App\Http\Controllers;

use App\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits= Deposit::all();
        return view('deposits/index',compact('deposits'));
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

        $deposit=new Deposit;
        $deposit->name=$request->name;
        $deposit->amount=$request->amount;
        $deposit->date=$request->date;
        $deposit->user_id=Auth::User()->id;
        $deposit->save();
        $request->session()->flash('successmessage', 'تم اضافة الايداع بنجاح');
        return redirect('/deposits');
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
        $deposit= Deposit::find($id);
        return view('deposits/edit',compact('deposit'));
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

        $deposit=Deposit::find($id);
        $deposit->name=$request->name;
        $deposit->amount=$request->amount;
        $deposit->date=$request->date;
        $deposit->save();
        $request->session()->flash('successmessage', 'تم تعديل الايداع بنجاح');
        return redirect('/deposits');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposit=Deposit::find($id)->delete();
        session()->flash('successmessage', 'تم حذف الايداع بنجاح');
        return redirect('/deposits');
    }
}
