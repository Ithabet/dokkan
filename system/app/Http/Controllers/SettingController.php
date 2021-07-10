<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings_all = Setting::all();
        $settings=[];
        foreach ($settings_all as $setting)
        {
            $settings[$setting->name] = $setting->value;
        }

        return view('settings.index',compact('settings'));
    }

    public function update(Request $request)
    {


        $rules = [
            'co_name' => 'required',
            'co_phone' => 'required',
            'co_address' => 'required',
            'logo' => 'required|mimes:jpeg,png|max:5000',
        ];
        $messages = [
            'co_name.required'     => 'يجب اضافة اسم الشركة ',
            'co_phone.required'     => 'يجب اضافة هاتف الشركه',
            'co_address.required'     => 'يجب اضافة عنوان الشركة',
            'logo.mimes'     => 'نوع الملف المرفوع غير متطابق ',
        ];

        $this->validate($request,$rules,$messages);
        $fileName = time().'.'.$request->file('logo')->extension();
        $request->file('logo')->move('assets/img/logo', $fileName);

        Setting::truncate();

        foreach ($request->all() as $key => $value)
        {
            if($key!='_token' and $key!='logo')
            {
                $setting = new Setting;
                $setting->name =$key;
                $setting->value =$value;
                $setting->save();
            }
            elseif($key=='logo')
            {
                $setting = new Setting;
                $setting->name =$key;
                $setting->value =$fileName;
                $setting->save();
            }

        }

        $request->session()->flash('successmessage', 'تم تعديل الاعدادات بنجاح ');
        return redirect('settings');
    }
}
