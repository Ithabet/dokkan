@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>محمد عبدالله الهادي</header>
                </div>
                <div class="card-body " id="bar-parent">
                    <div class="state-overview">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="overview-panel purple">
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="3">3</p>
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
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="3421">3421</p>
                                        <p>اجمالي المبيعات</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="overview-panel deepPink-bgcolor">
                                    <div class="symbol">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="0">0</p>
                                        <p>متبقي عليه</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="overview-panel orange">
                                    <div class="symbol">
                                        <i class="fa fa-heartbeat"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="14">14</p>
                                        <p>TODAY'S OPT</p>
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
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>كود العملية</th>
                            <th>التاريخ</th>
                            <th>قيمة العملية</th>
                            <th>المدفوع</th>
                            <th>المتبقي</th>
                            <th>الحالة</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td><a href="{{ URL::to('sales/') }}">18458</a></td>
                            <td>18/09/2019</td>
                            <td>14520</td>
                            <td>12000</td>
                            <td>0</td>
                            <td><label class="label label-rouded label-success">مدفوع</label></td>
                            <td>
                                <a href="edit_professor.html" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o "></i>
                                </button>
                            </td>
                        </tr>
                        <tr>

                            <td><a href="{{ URL::to('sales/') }}">18458</a></td>
                            <td>18/09/2019</td>
                            <td>14520</td>
                            <td>12000</td>
                            <td>2520</td>
                            <td><label class="label label-rouded label-warning">غير مدفوع</label></td>
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