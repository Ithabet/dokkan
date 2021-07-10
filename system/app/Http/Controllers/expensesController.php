<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class expensesController extends Controller
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
            $expences=Expenses::where('pos_id',Auth::user()->pos_id)->orderByDesc('id')->get();
        }
        else {
            $expences=Expenses::orderByDesc('id')->get();
        }
        return view('expenses.expenses',compact('expences'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'paied_to' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        if (isset($errors)) {
            return redirect('/expenses')->withInput();
        }

        $expense=new Expenses;
        $expense->pos_id = Auth::user()->pos_id;
        $expense->name=$request->name;
        $expense->paied_to=$request->paied_to;
        $expense->amount=$request->amount;
        $expense->date=$request->date;
        $expense->user_id=Auth::User()->id;
        $expense->save();
        $request->session()->flash('successmessage', 'تم اضافة المصروف بنجاح');
        return redirect('/expenses');

    }
    public function edit($id){
            $expense=Expenses::find($id);
            return view('expenses.edit',compact('expense'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'paied_to' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        if (isset($errors)) {
            return redirect('/expenses')->withInput();
        }

        $expense=Expenses::find($id);
        $expense->name=$request->name;
        $expense->paied_to=$request->paied_to;
        $expense->amount=$request->amount;
        $expense->date=$request->date;
        $expense->user_id=Auth::User()->id;
        $expense->save();
        $request->session()->flash('successmessage', 'تم تعديل المصروف بنجاح');
        return redirect('/expenses');

    }

    public function destroy($id)
    {
        $section = Expenses::find($id)->delete();
        session()->flash('successmessage', 'تم حذف المصروف بنجاح');
        return redirect('/expenses');

    }

}
