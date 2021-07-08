@extends('layouts.app')

@section('content')
    @php
        $roles = (json_decode(auth()->user()->role))?json_decode(auth()->user()->role) :[];
    @endphp
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>{{ $customer->name}}</header>
                </div>
                <div class="card-body " id="bar-parent">
                    <div class="state-overview">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="overview-panel purple">
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $customer->sales->count() }}">{{ $customer->sales->count() }}</p>
                                        <p>عملية بيع</p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="overview-panel blue-bgcolor">
                                    <div class="symbol">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $customer->sales->sum('total') }}">{{ $customer->sales->sum('total') }}</p>
                                        <p>المبيعات</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="overview-panel deepPink-bgcolor">
                                    <div class="symbol">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $customer->sales->sum('paid') }}">{{ $customer->sales->sum('paid') }}</p>
                                        <p>المدفوع</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="overview-panel orange">
                                    <div class="symbol">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $customer->sales->sum('amount')-$customer->sales->sum('paid') }}">
                                            {{ $customer->sales->sum('total')-$customer->sales->sum('paid') }}</p>
                                        <p>المتبقي</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>المبيعات</header>
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
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer->sales as $sale)
                            <tr>
                                <td><a href="{{ URL::to('sales/') }}">{{ $sale->user_id }}#{{ $sale->id }}</a></td>
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
                                <td>
                                    @if(in_array('editSale',$roles))
                                        <a href="{{url('sales/edit/'.$sale->id)}}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endif
                                    @if(in_array('deleteSale',$roles))
                                        <a href="{{url('sales/delete/'.$sale->id)}}" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o "></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="9">
                            </td>
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

@stop