@extends('layouts.app')

@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header>مستخدم جديد</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('persons/users') }}"  class="btn btn-danger">
                            <i class="fa fa-ban"></i> الغاء
                        </a>
                    </div>
                </div>
                <form action="{{ URL::to('persons/users/new') }}" method="post">
                    {{ csrf_field() }}
                <div class="card-body row">
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="customerName" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">اسم الدخول</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="customerPhone" type="password" id="txtFirstName">
                            <label class="mdl-textfield__label">كلمة المرور</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="customerName" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">اسم المستخدم</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="customerPhone" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">رقم الهاتف</label>
                        </div>
                    </div>
                    <div class="col-sm-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <label>الصلاحيات</label>
                            <select class="form-control  select2">
                                <optgroup label="الادارة العامة">
                                    <option value="sa">مدير النظام</option>
                                    <option value="gm">مدير عام</option>
                                    <option value="sv">مشرف عام</option>
                                </optgroup>
                                <optgroup label="إدارة المبيعات">
                                    <option value="sm">مدير المبيعات</option>
                                    <option value="ssv">مشرف مبيعات</option>
                                    <option value="sm" selected>بائع</option>
                                </optgroup>
                                <optgroup label="إدارة المشتريات">
                                    <option value="pm">مدير المشتريات</option>
                                    <option value="psv">مشرف مشتريات</option>
                                </optgroup>

                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <label>نقطة البيع</label>
                            <select class="form-control  select2">
                                    <option value="pm">مدينتي</option>
                                    <option value="psv">الشروق</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-12 p-t-20 text-center">
                        <button type="submit" class="btn btn-lg btn-success pull-left">حفظ</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('EXTJS')

    <script src="{{ asset('assets/plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/pages/select2/select2-init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/material-select/getmdl-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js') }}"></script>


@stop