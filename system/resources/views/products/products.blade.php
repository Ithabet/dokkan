@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>المنتجات</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('products/new') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>         منتج جديد
                        </a>
                    </div>
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            <th>التصنيف</th>
                            <th>كود المنتج</th>
                            <th>سعر البيع</th>
                            <th>سعر الشراء</th>
                            <th>الكمية المتاحة</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><a href="{{ URL::to('product/'.$product->id) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->sell_price }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->quantity }}</td>

                                <td>
                                    <a href="{{ URL::to('products/edit/'.$product->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ URL::to('products/delete/'.$product->id) }}" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o "></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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

@stop