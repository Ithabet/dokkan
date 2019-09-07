@extends('layouts.app')

@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>عملية شراء جديدة</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('purchases') }}" class="btn btn-danger">
                            <i class="fa fa-pan"></i>         الغاء
                        </a>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="card-body " id="bar-parent">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3"><label>اسم المورد</label></div>
                                    <div class="col-sm-9">
                                            <select class="form-control  select2">
                                                <option value="">-- إختر مورد --</option>
                                                <option value="pm">جمال عبد الحميد</option>
                                                <option value="psv">النصر للتوزيع</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3"><label>تاريخ العملية</label></div>
                                    <div class="col-sm-9">
                                        <input class="mdl-textfield__input" type="text" value="{{ date('Y-m-d') }}" id="date" data-dtp="dtp_JFOV1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" list="products">
                                        <datalist id="products">
                                            <option label="زيت عافية" value="1"></option>
                                            <option value="2">زيت كريستال</option>
                                            <option value="كرتونة سجايركرتونة سجاير"></option>
                                            <option value="علبة سجاير"></option>
                                            <option value="بتنجان"></option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
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