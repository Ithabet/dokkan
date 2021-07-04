@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>المستخدمين</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('persons/users/new') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i>                          مستخدم جديد
                        </a>
                    </div>
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="dataTable table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>إسم المستخدم</th>
                            <th>إسم الدخول</th>
                            <th>رقم الهاتف</th>
                            <th>الصلاحيات</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach(json_decode($user->role) as $role)
                                        <span class="label label-info">{{ __($role) }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('persons/users/edit/'.$user->id) }}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ url('persons/users/delete/'.$user->id) }}" onclick="confirm('هل انت متأكد من حذف المستخدم ؟')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i>
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