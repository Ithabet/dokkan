@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>المشتريات</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('purchases/new') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>         جديد
                        </a>
                    </div>
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>كود العملية</th>
                            <th>التاريخ</th>
                            <th>اسم المورد</th>
                            <th>قيمة العملية</th>
                            <th>المدفوع</th>
                            <th>المتبقي</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><a href="{{ URL::to('purchase/') }}">18458</a></td>
                                <td>18/09/2019</td>
                                <td>محمود الجمال</td>
                                <td>14520</td>
                                <td>12000</td>
                                <td>2520</td>
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