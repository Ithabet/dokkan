@extends('layouts.app')

@section('content')

    @php
        $roles = (json_decode(auth()->user()->role))?json_decode(auth()->user()->role) :[];
    @endphp
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>المبيعات</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('sales/pos') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>         جديد
                        </a>
                    </div>
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
                        @foreach($sales as $sale)
                            <tr>
                                <td><a target="_blank" href="{{ URL::to('sales/print/receipt/'.$sale->id) }}">{{ $sale->user_id }}#{{ $sale->id }}</a></td>
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
                                    <a href="{{url('sales/delete/'.$sale->id)}}" onclick="return confirm('هل انت متأكد من عملية الحذف ؟')" class="btn btn-danger btn-xs">
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
                                    {{ $sales->links() }}
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