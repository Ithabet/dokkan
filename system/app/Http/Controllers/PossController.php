<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pos;
class PossController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $poss = Pos::all();
        return view('poss.poss',compact('poss'));
    }
    public function newPos(){
        return view('poss.newPos');
    }
    public function savePos(Request $request){
        $rules = [
            'name'  => 'required',
            'address' => 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم نقطة البيع',
            'address.required'    =>'يجب اضافة عنوان نقطة البيع'
        ];
        $this->validate($request,$rules,$messages);
        $pos = new Pos();
        $pos->name = $request->name;
        $pos->address = $request->address;
        $pos->save();
        $request->session()->flash('successmessage', 'تم إضافة نقطه البيع بنجاح ');
        return redirect('poss');
    }

    public function edit($id)
    {
        $pos= Pos::find($id);
        return view('poss.editPos',compact('pos'));
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'name'  => 'required',
            'address' => 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم نقطة البيع',
            'address.required'    =>'يجب اضافة عنوان نقطة البيع'
        ];
        $this->validate($request,$rules,$messages);
        $pos = Pos::find($id);
        $pos->name = $request->name;
        $pos->address = $request->address;
        $pos->save();
        $request->session()->flash('successmessage', 'تم تعديل نقطه البيع بنجاح ');
        return redirect('poss');
    }

    public function destroy($id)
    {
        $pos = Pos::find($id)->delete();
        session()->flash('successmessage', 'تم حذف نقطه البيع بنجاح ');
        return redirect('poss');

    }
}
