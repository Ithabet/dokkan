@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>نقاط البيع</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('poss/new') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>         نقطة جديدة
                        </a>
                    </div>
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>اسم النقطة</th>
                            <th>عنوان النقطة</th>
                            <th>اجمالي المبيعات</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($poss as $pos)
                            <tr>
                                <td><a href="{{ URL::to('poss/'.$pos->id) }}">{{ $pos->name }}</a></td>
                                <td>{{ $pos->address }}</td>
                                <td>make function to collect sells</td>
                                <td>
                                    <a href="{{ URL::to('poss/edit/'.$pos->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ URL::to('poss/delete/'.$pos->id) }}" class="btn btn-danger btn-xs">
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