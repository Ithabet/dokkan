@extends('layouts.app')

@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@stop

@section('content')

    <div class="row">
        <div class="col-sm-5">
            <div class="card-box">
                <div class="card-head">
                    <header>إضافة مصروفات</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('expenses') }}"  class="btn btn-danger">
                            <i class="fa fa-ban"></i> الغاء
                        </a>
                    </div>
                </div>
                <form action="{{ url('expenses/new') }}" method="POST">
                    {{ csrf_field() }}
                <div class="card-body row">
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="name" value="{{ old('name') }}" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">عنوان المصروف</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="paied_to" value="{{ old('paied_to') }}" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">جهة الصرف</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="amount" value="{{ old('amount') }}" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">المبلغ</label>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" type="text" name="date" value="{{ old('date') }}" value="{{ date('Y-m-d') }}" id="date" data-dtp="dtp_JFOV1">
                            <label class="mdl-textfield__label">التاريخ</label>
                        </div>
                    </div>
                    <div class="col-lg-12 p-t-20 text-center">
                        <button type="submit" class="btn btn-lg btn-success pull-left">حفظ</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-7 col-sm-7">
            <div class="card card-box">
                <div class="card-head">
                    <header>المصروفات</header>

                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>جهة الصرف</th>
                            <th>التاريخ</th>
                            <th>عنوان المصروف</th>
                            <th>المبلغ</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($expences))
                            @foreach($expences as $expense)
                        <tr>

                            <td><a href="{{ URL::to('purchase/') }}">{{ $expense->paied_to }}</a></td>
                            <td>{{ $expense->date }}</td>
                            <td>{{ $expense->name }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>
                                <a href="{{ url('/expenses/edit/'.$expense->id) }}" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ url('/expenses/delete/'.$expense->id) }}" onclick="return confirm('هل انت متأكد من عملية الحذف ؟')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('EXTJS')
    <!-- Data Table -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/table/table_data.js') }}"></script>

    <script src="{{ asset('assets/plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/pages/select2/select2-init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/material-select/getmdl-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js') }}"></script>


@stop