@extends('layouts.app')
@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@stop
@section('content')
    <div class="row">
        <div class="col-sm-8 ">
            <div class="card-box">
                <div class="card-head">
                    <header>تقرير المشتريات لفتره </header>

                </div>
                <form action="{{ url('reports/purchases') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body row">

                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class="mdl-textfield__input" type="text" name="from" required value="{{ old('date') }}" value="{{ date('Y-m-d') }}" id="date-start" data-dtp="dtp_JFOV1">
                                <label class="mdl-textfield__label">من </label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class="mdl-textfield__input" type="text" name="to" required value="{{ old('date') }}" value="{{ date('Y-m-d') }}" id="date-end" data-dtp="dtp_JFOV1">
                                <label class="mdl-textfield__label">الي </label>
                            </div>
                        </div>
                        <div class="col-lg-12 p-t-20 text-center">
                            <button type="submit" class="btn btn-lg btn-success pull-left">عرض التقرير</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    @if(isset($request->from) and isset($request->to))
                        <header>  تقارير المشتريات لفتره من {{ $request->from." الي ". $request->to }}    </header>
                    @else
                        <header>  تقارير المشتريات للشهر الحالي     </header>
                    @endif
                        {{--                    <div class="btn-group pull-left">--}}
{{--                        <a href="#" class="btn btn-info">--}}
{{--                            <i class="fa fa-plus"></i>         بحث بالشهر--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>كود العملية</th>
                            <th>نوع العمليه</th>
                            <th>التاريخ</th>
                            <th>اسم المورد</th>
                            <th>قيمة العملية</th>
                            <th>المدفوع</th>
                            <th>المتبقي</th>
                            <th>الحالة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchases as $purchase)
                            <tr>
                                <td><a href="#">{{ $purchase->user_id }}#{{ $purchase->id }}</a></td>

                                <td>{{ $purchase->created_at->format('Y-m-d') }}</td>
                                <td>{{ $purchase->supplier->name }}</td>
                                <td>{{ $purchase->total }}</td>
                                <td>{{ $purchase->paid }}</td>
                                <td>{{ $purchase->total - $purchase->paid }}</td>
                                <td>
                                    @if($purchase->status)
                                        <label class="label label-rouded label-success">مدفوع</label>
                                    @else
                                        <label class="label label-rouded label-warning">غير مدفوع</label>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5"> <b>اجمالي المشتريات</b></th>
                                <th><b>{{ $purchases->sum('paid') }}</b></th>
                            </tr>
                        </tfoot>

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