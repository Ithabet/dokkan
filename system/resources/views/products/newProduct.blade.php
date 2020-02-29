@extends('layouts.app')

@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <div class="row">

        <div class="col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    <header>منتج جديد</header>
                </div>
                <form action="{{ URL::to('products/new') }}" method="post">
                    {{ csrf_field() }}
                <div class="card-body row">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <label>التصنيف</label>
                            <select class="form-control  select2" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-6">
                    <label>نوع المنتج</label>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <select class="form-control  " name="type">
                                <option value="m">خام</option>
                                <option value="f">تام</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="name" autofocus type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">اسم المنتج</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="code"  type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">كود المنتج</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="sell_price"  type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">سعر البيع</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="purchase_price"  type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">سعر التكلفة</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="quantity"  type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">الكمية المتاحة</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="alert_quantity"  type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">كمية التنبيه</label>
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