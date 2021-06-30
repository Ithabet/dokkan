@extends('layouts.app')

@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <div class="row">
        <div class="col-sm-8">
            <div class="card card-box">
                <div class="card-head">
                    <header>التصنيفات</header>
                </div>
                <div class="card-body " id="bar-parent">
                    <table class="table table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>اسم التصنيف</th>
                            <th>عدد المنتجات</th>
                            <th>اجمالي المبيعات</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
{{--                            <td><a href="{{ URL::to('products/category/'.$category->id) }}">{{ $category->name }}</a></td>--}}
                            <td><a href="#">{{ $category->name }}</a></td>
                            <td>function collect number of products</td>
                            <td>function collect sum of sells</td>
                            <td>
                                <a href="{{ URL::to('products/categories/edit/'.$category->id) }}" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ URL::to('products/categories/delete/'.$category->id) }}" onclick="return confirm('هل تريد الحذف ؟')" class="btn btn-danger btn-xs">
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
        @if(isset($edit))
            <div class="col-sm-4">
                <div class="card card-box">
                    <div class="card-head">
                        <header>تعديل التصنيف </header>
                    </div>
                    <form action="{{ URL::to('products/categories/update/'.$editcategory->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" name="name" value="{{ $editcategory->name }}" autofocus type="text" id="txtFirstName">
                                    <label class="mdl-textfield__label">اسم التصنيف</label>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" class="btn btn-lg btn-success pull-left">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="col-sm-4">
                <div class="card card-box">
                    <div class="card-head">
                        <header>تصنيف جديد</header>
                    </div>
                    <form action="{{ URL::to('products/categories/new') }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" name="name" autofocus type="text" id="txtFirstName">
                                    <label class="mdl-textfield__label">اسم التصنيف</label>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" class="btn btn-lg btn-success pull-left">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

    </div>

@stop

@section('EXTJS')

    <script src="{{ asset('assets/plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/pages/select2/select2-init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/material-select/getmdl-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js') }}"></script>


@stop