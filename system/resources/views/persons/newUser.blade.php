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
                                <input class="mdl-textfield__input" required name="email" type="text" id="txtFirstName">
                                <label class="mdl-textfield__label">اسم الدخول</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class="mdl-textfield__input" required name="password" type="password" id="txtFirstName">
                                <label class="mdl-textfield__label">كلمة المرور</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class="mdl-textfield__input" required name="username" type="text" id="txtFirstName">
                                <label class="mdl-textfield__label">اسم المستخدم</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class="mdl-textfield__input" required name="phone" type="text" id="txtFirstName">
                                <label class="mdl-textfield__label">رقم الهاتف</label>
                            </div>
                        </div>
                        <div class="col-sm-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>الصلاحيات</label>

                                <select class="form-control  select2" required multiple name="role[]">
                                    <optgroup label="الاشخاص">
                                        <option value="customers">العملاء</option>
                                        <option value="users">المستخدمين</option>
                                    </optgroup>
                                    <option value="poss">نقاط البيع</option>
                                    <optgroup label="المنتجات">
                                        <option value="categories">التصنيفات</option>
                                        <option value="products">المنتجات</option>
                                    </optgroup>
                                    <optgroup label="المبيعات">
                                        <option value="pos">بيع جديد</option>
                                        <option value="editSale">تعديل المبيعات</option>
                                        <option value="deleteSale">حذف المبيعات</option>
                                    </optgroup>
                                    <option value="expenses">المصروفات</option>
                                    <optgroup label="التعاملات النقدية">
                                        <option value="withdrawals">سحب</option>
                                        <option value="deposits">ايداع</option>
                                    </optgroup>
                                    <optgroup label="التقارير">
                                        <option value="reports-sales">تقارير المبيعات</option>
                                        <option value="reports-expenses">تقارير المبيعات</option>
                                        <option value="reports-cash">تقارير النقدية</option>
                                    </optgroup>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>نقطة البيع</label>
                                <select class="form-control  select2" required name="pos_id">
                                    @foreach($poss as $pos)
                                        <option value="{{ $pos->id }}">{{ $pos->name }}</option>
                                    @endforeach
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