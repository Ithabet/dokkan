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
                    <header>تعديل مستخدم</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('persons/users') }}"  class="btn btn-danger">
                            <i class="fa fa-ban"></i> الغاء
                        </a>
                    </div>
                </div>
                <form action="{{ URL::to('persons/users/save/'.$user->id) }}" method="post">
                    {{ csrf_field() }}
                <div class="card-body row">
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" value="{{ $user->email }}" required name="email" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">اسم الدخول</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="password" type="password" id="txtFirstName">
                            <label class="mdl-textfield__label">كلمة المرور</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" value="{{ $user->username }}" required name="username" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">اسم المستخدم</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input"value="{{ $user->phone }}" required name="phone" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">رقم الهاتف</label>
                        </div>
                    </div>
                    <div class="col-sm-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <label>الصلاحيات</label>
                            @php
                                $roles = (json_decode($user->role))?json_decode($user->role) :[];
                            @endphp
                            <select class="form-control  select2" required multiple name="role[]">

                                <optgroup @if(in_array('customers',$roles)||in_array('users',$roles)) selected  @endif label="الاشخاص">
                                    <option @if(in_array('customers',$roles)) selected  @endif value="customers">العملاء</option>
                                    <option @if(in_array('users',$roles)) selected  @endif value="users">المستخدمين</option>
                                </optgroup>
                                <option @if(in_array('poss',$roles)) selected  @endif value="poss">نقاط البيع</option>
                                <optgroup @if(in_array('categories',$roles)||in_array('products',$roles)) selected  @endif label="المنتجات">
                                    <option @if(in_array('categories',$roles)) selected  @endif value="categories">التصنيفات</option>
                                    <option @if(in_array('products',$roles)) selected  @endif value="products">المنتجات</option>
                                </optgroup>
                                <optgroup @if(in_array('pos',$roles)||in_array('editSale',$roles)||in_array('deleteSale',$roles)) selected  @endif label="المبيعات">
                                    <option @if(in_array('pos',$roles)) selected  @endif value="pos">بيع جديد</option>
                                    <option @if(in_array('editSale',$roles)) selected  @endif value="editSale">تعديل المبيعات</option>
                                    <option @if(in_array('deleteSale',$roles)) selected  @endif value="deleteSale">حذف المبيعات</option>
                                </optgroup>
                                <option @if(in_array('expenses',$roles)) selected  @endif value="expenses">المصروفات</option>
                                <optgroup @if(in_array('withdrawals',$roles)||in_array('deposits',$roles)) selected  @endif label="التعاملات النقدية">
                                    <option @if(in_array('withdrawals',$roles)) selected  @endif value="withdrawals">سحب</option>
                                    <option @if(in_array('deposits',$roles)) selected  @endif value="deposits">ايداع</option>
                                </optgroup>
                                <optgroup @if(in_array('reports-sales',$roles)||in_array('reports-expenses',$roles)||in_array('reports-cash',$roles)) selected  @endif label="التقارير">
                                    <option @if(in_array('reports-sales',$roles)) selected  @endif value="reports-sales">تقارير المبيعات</option>
                                    <option @if(in_array('reports-expenses',$roles)) selected  @endif value="reports-expenses">تقارير المبيعات</option>
                                    <option @if(in_array('reports-cash',$roles)) selected  @endif value="reports-cash">تقارير النقدية</option>
                                </optgroup>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <label>نقطة البيع</label>
                            <select class="form-control  select2" required name="pos_id">
                                @foreach($poss as $pos)
                                        <option @if($pos->id == $user->pos_id) selected @endif value="{{ $pos->id }}">{{ $pos->name }}</option>
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