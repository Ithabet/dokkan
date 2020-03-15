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
                    <header>إضافة مسحوبات </header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('withdrawals') }}"  class="btn btn-danger">
                            <i class="fa fa-ban"></i> الغاء
                        </a>
                    </div>
                </div>
                <form action="{{ url('withdrawals/new') }}" method="POST">
                    {{ csrf_field() }}
                <div class="card-body row">
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="name" value="{{ old('name') }}" type="text" id="txtFirstName">
                            <label class="mdl-textfield__label">عنوان المسحوب</label>
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
                    <header>المسحوبات</header>

                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>المبلغ </th>
                            <th>التاريخ </th>
                            <th>المستخدم </th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($withdrawals))
                            @foreach($withdrawals as $withdrawal)
                        <tr>

                            <td>{{ $withdrawal->name }}</td>
                            <td>{{ $withdrawal->amount }}</td>
                            <td>{{ $withdrawal->date }}</td>
                            <td>{{ $withdrawal->user->name }}</td>
                            <td>
                                <a href="{{ url('/withdrawals/edit/'.$withdrawal->id) }}" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ url('/withdrawals/delete/'.$withdrawal->id) }}" onclick="confirm('هل انت متأكد من الحذف ؟')" class="btn btn-danger btn-xs">
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