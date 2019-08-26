@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>العملاء</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('persons/customers/new') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>                          عميل جديد
                        </a>
                    </div>
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>إسم العميل</th>
                            <th>رقم الهاتف</th>
                            <th>عدد الفواتير</th>
                            <th>اجمالي المبيعات</th>
                            <th>الرصيد </th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ URL::to('persons/customer/') }}">محمد عبدالله الهادي</a></td>
                                <td>01055225522</td>
                                <td>3</td>
                                <td>1500</td>
                                <td>0</td>
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