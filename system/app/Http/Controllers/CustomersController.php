<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $customers = Customer::all();
        return view('persons.customers',compact('customers'));
    }
    public function newCustomer(){
        return view('persons.newCustomer');
    }
    public function customer(Customer $customer){
        
        return view('persons.customer',compact('customer'));
    }
    public function saveCustomer(Request $request){
        $rules = [
            'name'  => 'required',
            'phone' => 'required',
            'credit'=> 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم العميل',
            'phone.required'    =>'يجب اضافة هاتف العميل',
            'credit.required'   =>' يجب ملئ خانة الرصيد ( 0 القيمة الافتراضية)'
        ];
        $this->validate($request,$rules,$messages);
        $customer = new Customer();
        $customer->name     = $request->name;
        $customer->phone    = $request->phone;
        $customer->balance  = $request->credit;
        $customer->address  = $request->address;
        $customer->save();
        //// Opening Transaction ////
//        $transaction = new Transaction();
//        $transaction->balance = $request->credit;
//        $transaction->amount  = 0;
//        $transaction->trans_type  = 'opening';
//        $transaction->customer_id = $customer->id;
//        $transaction->save();

        return redirect('persons/customers');
    }

    public function saveCustomerAjax(Request $request){
        $rules = [
            'name'  => 'required',
            'phone' => 'required',
            'credit'=> 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم العميل',
            'phone.required'    =>'يجب اضافة هاتف العميل',
            'credit.required'   =>' يجب ملئ خانة الرصيد ( 0 القيمة الافتراضية)'
        ];
        $this->validate($request,$rules,$messages);
        $customer = new Customer();
        $customer->name     = $request->name;
        $customer->phone    = $request->phone;
        $customer->balance  = $request->credit;
        $customer->address  = $request->address;
        $customer->save();
        //// Opening Transaction ////
//        $transaction = new Transaction();
//        $transaction->balance = $request->credit;
//        $transaction->amount  = 0;
//        $transaction->trans_type  = 'opening';
//        $transaction->customer_id = $customer->id;
//        $transaction->save();

        return response()->json($customer);
    }

    public function edit($id){
        $customer=Customer::find($id);
        return view('persons.editCustomer',compact('customer'));
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'name'  => 'required',
            'phone' => 'required'
        ];
        $messages = [
            'name.required'     => 'يجب اضافة اسم العميل',
            'phone.required'    =>'يجب اضافة هاتف العميل'
        ];
        $this->validate($request,$rules,$messages);
        $customer = Customer::find($id);
        $customer->name     = $request->name;
        $customer->phone    = $request->phone;
        $customer->balance  = $request->credit;
        $customer->address  = $request->address;
        $customer->save();
        $request->session()->flash('successmessage', 'تم تعديل بيانات العميل بنجاح ');
        return redirect('/persons/customers');
    }

    public function destroy($id)
    {
        $section = Customer::find($id)->delete();
        session()->flash('successmessage', 'تم حذف العميل بنجاح ');
        return redirect('/persons/customers');

    }
}
