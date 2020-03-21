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
                    <header>تقرير المبيعات لفتره </header>

                </div>
                <form action="{{ url('reports/sales') }}" method="POST">
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
                        <header>  تقارير المبيعات لفتره من {{ $request->from." الي ". $request->to }}    </header>
                    @else
                        <header>  تقارير المبيعات للشهر الحالي     </header>
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
                            <th>اسم العميل</th>
                            <th>قيمة العملية</th>
                            <th>المدفوع</th>
                            <th>المتبقي</th>
                            <th>الحالة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td><a href="#">{{ $sale->user_id }}#{{ $sale->id }}</a></td>
                                <td>
                                    @if($sale->order_type == 0)
                                        <label class="label label-default">صالة</label>
                                    @elseif($sale->order_type == 1)
                                        <label class="label  label-info">نيك أواي</label>
                                    @else
                                            <label class="label  label-primary">ديليفري</label>
                                    @endif
                                </td>
                                <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->total }}</td>
                                <td>{{ $sale->paid }}</td>
                                <td>{{ $sale->total - $sale->paid }}</td>
                                <td>
                                    @if($sale->status)
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
                                <th colspan="5"> <b>اجمالي المبيعات</b></th>
                                <th><b>{{ $sales->sum('paid') }}</b></th>
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