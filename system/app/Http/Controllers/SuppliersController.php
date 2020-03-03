<?php

namespace App\Http\Controllers;
use App\Supplier;
use App\STransaction;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
        $suppliers = Supplier::all();
       
        return view('persons.suppliers' ,compact('suppliers'));
    }
    public function newSupplier(){
        return view('persons.newSupplier');
    }
    public function saveSupplier(Request $request){
        $rules = [
            'name'  => 'required',
            'phone' => 'required',
            'credit'=> 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم المورد',
            'phone.required'    =>'يجب اضافة هاتف االمورد',
            'credit.required'   =>'يجب ملئ خانة الرصيد ( 0 القيمة الافتراضية )'
        ];
        $this->validate($request,$rules,$messages);
        $supplier = new Supplier();
        $supplier->name     = $request->name;
        $supplier->phone    = $request->phone;
        $supplier->save();
        //// Opening Transaction ////
        $transaction = new STransaction();
        $transaction->balance = $request->credit;
        $transaction->amount  = 0;
        $transaction->trans_type  = 'opening';
        $transaction->supplier_id = $supplier->id;
        $transaction->save();

        return redirect('persons/suppliers');
    }

    public function edit($id){
        $supplier=Supplier::find($id);
        return view('persons.editSupplier',compact('supplier'));
    }

    public  function update(Request $request,$id){
        $rules = [
            'name'  => 'required',
            'phone' => 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم المورد',
            'phone.required'    =>'يجب اضافة هاتف االمورد',

        ];

        $this->validate($request,$rules,$messages);

        $supplier =Supplier::find($id);
        $supplier->name     = $request->name;
        $supplier->phone    = $request->phone;
        $supplier->save();


        return redirect('persons/suppliers');
    }

    public function destroy($id)
    {
        $section = Supplier::find($id)->delete();
        session()->flash('successmessage', 'تم حذف المورد  بنجاح ');
        return redirect('/persons/suppliers');

    }
}

