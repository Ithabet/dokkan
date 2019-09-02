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
                    <header>التصنيفات</header>
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>اسم التصنيف</th>
                            <th>عدد المنتجات</th>
                            <th>اجمالي المبيعات</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="{{ URL::to('poss/') }}">مواد غذائية</a></td>
                            <td>115</td>
                            <td>23052</td>
                            <td>
                                <a href="edit_professor.html" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o "></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    <header>تصنيف جديد</header>
                </div>
                <form action="{{ URL::to('products/categories/new') }}" method="post">
                    {{ csrf_field() }}
                <div class="card-body row">
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="customerName" autofocus type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">اسم التصنيف</label>
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