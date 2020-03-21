@extends('layouts.app')
@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@stop
@section('content')
    <div class="row">
        <div class="col-sm-6 ">
            <div class="card-box">
                <div class="card-head">
                    <header>تقرير النقدية  لفتره </header>

                </div>
                <form action="{{ url('reports/cash') }}" method="POST">
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

        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    <header>اجمالي النقدية   </header>
                </div>
                <div class="card-body " id="bar-parent">
                    <div class="state-overview">
                        <div class="row">

                            <div class="col-sm-12 text-center">
                                <div class="overview-panel  deepPink-bgcolor">
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="5">
                                            {{ ($sales->sum('paid')+$deposits->sum('amount')) - ($purchases->sum('paid')+$expenses->sum('amount')+$withdrawals->sum('amount')) }}

                                        </p>
                                        <p> اجمالي النقدية </p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    <header>اجمالي الايرادات   </header>
                </div>
                <div class="card-body " id="bar-parent">
                    <div class="state-overview">
                        <div class="row">

                                    <div class="col-sm-6">
                                        <div class="overview-panel purple">
                                            <div class="value white">
                                                <p class="sbold addr-font-h3" data-counter="counterup" data-value="5">{{ $sales->sum('paid') }}</p>
                                                <p> اجمالي المبيعات </p>
                                            </div>
                                            <div class="symbol">
                                                <i class="fa fa-file usr-clr"></i>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="overview-panel green">
                                            <div class="value white">
                                                <p class="sbold addr-font-h3" data-counter="counterup" data-value="5">{{ $deposits->sum('amount') }}</p>
                                                <p> اجمالي الايداعات </p>
                                            </div>
                                            <div class="symbol">
                                                <i class="fa fa-file usr-clr"></i>
                                            </div>

                                        </div>

                                    </div>
                            <div class="col-sm-12">
                                <div class="overview-panel blue">
                                    <div class="value white">
                                        <p class="sbold addr-font-h3" data-counter="counterup" data-value="5">{{ $sales->sum('paid')+$deposits->sum('amount') }}</p>
                                        <p> اجمالي الايرادات </p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    <header>اجمالي النفقات   </header>
                </div>
                <div class="card-body " id="bar-parent">
                    <div class="state-overview">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="overview-panel purple">
                                    <div class="value white">
                                        <p class="sbold addr-font-h3" data-counter="counterup" data-value="5">{{ $purchases->sum('paid') }}</p>
                                        <p> اجمالي المشتريات </p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="overview-panel green">
                                    <div class="value white">
                                        <p class="sbold addr-font-h3" data-counter="counterup" data-value="5">{{ $expenses->sum('amount') }}</p>
                                        <p> اجمالي المصروفات </p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="overview-panel orange">
                                    <div class="value white">
                                        <p class="sbold addr-font-h3" data-counter="counterup" data-value="5">{{ $withdrawals->sum('amount') }}</p>
                                        <p> اجمالي مسحوبات </p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="overview-panel blue">
                                    <div class="value white">
                                        <p class="sbold addr-font-h3" data-counter="counterup" data-value="5">{{ $purchases->sum('paid')+$expenses->sum('amount')+$withdrawals->sum('amount') }}</p>
                                        <p> اجمالي النفقات </p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    @if(isset($request->from) and isset($request->to))
                        <header>  تقارير المبيعات  لفتره من {{ $request->from." الي ". $request->to }}    </header>
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
                    <table class=" dataTable table table-hover table-striped" style="width:100%">
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
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    @if(isset($request->from) and isset($request->to))
                        <header>  تقارير الايداعات  لفتره من {{ $request->from." الي ". $request->to }}    </header>
                    @else
                        <header>  تقارير الايداعات للشهر الحالي     </header>
                    @endif
                        {{--                    <div class="btn-group pull-left">--}}
{{--                        <a href="#" class="btn btn-info">--}}
{{--                            <i class="fa fa-plus"></i>         بحث بالشهر--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>المبلغ </th>
                            <th>التاريخ </th>
                            <th>المستخدم </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($deposits))
                            @foreach($deposits as $deposit)
                                <tr>

                                    <td>{{ $deposit->name }}</td>
                                    <td>{{ $deposit->amount }}</td>
                                    <td>{{ $deposit->date }}</td>
                                    <td>{{ $deposit->user->name }}</td>

                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                        <tfoot>
                        <tr>
                            <th > <b>اجمالي الايداعات</b></th>
                            <th><b>{{ $deposits->sum('amount') }}</b></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    @if(isset($request->from) and isset($request->to))
                        <header>  تقارير المشتريات  لفتره من {{ $request->from." الي ". $request->to }}    </header>
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
                    <table class="dataTable table table-hover table-striped" style="width:100%">
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


        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    @if(isset($request->from) and isset($request->to))
                        <header>  تقارير المصروفات   لفتره من {{ $request->from." الي ". $request->to }}    </header>
                    @else
                        <header>  تقارير المصروفات للشهر الحالي     </header>
                    @endif
                    {{--                    <div class="btn-group pull-left">--}}
                    {{--                        <a href="#" class="btn btn-info">--}}
                    {{--                            <i class="fa fa-plus"></i>         بحث بالشهر--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>جهة الصرف</th>
                            <th>التاريخ</th>
                            <th>عنوان المصروف</th>
                            <th>المبلغ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($expenses))
                            @foreach($expenses as $expense)
                                <tr>

                                    <td><a href="#">{{ $expense->paied_to }}</a></td>
                                    <td>{{ $expense->date }}</td>
                                    <td>{{ $expense->name }}</td>
                                    <td>{{ $expense->amount }}</td>

                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3">اجمالي المصروفات </th>
                            <th>{{ $expenses->sum('amount') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    @if(isset($request->from) and isset($request->to))
                        <header>  تقارير المسحوبات   لفتره من {{ $request->from." الي ". $request->to }}    </header>
                    @else
                        <header>  تقارير المسحوبات للشهر الحالي     </header>
                    @endif
                    {{--                    <div class="btn-group pull-left">--}}
                    {{--                        <a href="#" class="btn btn-info">--}}
                    {{--                            <i class="fa fa-plus"></i>         بحث بالشهر--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>المبلغ </th>
                            <th>التاريخ </th>
                            <th>المستخدم </th>
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

                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3">اجمالي المسحوبات </th>
                            <th>{{ $withdrawals->sum('amount') }}</th>
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