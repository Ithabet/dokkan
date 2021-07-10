@extends('layouts.app')

@section('EXTCSS')
    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <div class="row">

        <div class="col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    <header>الإعدادات </header>
                </div>
                <form action="{{ URL::to('settings') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="card-body row">

                        <div class="col-sm-12">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class="mdl-textfield__input" name="co_name" value="{{ (isset($settings['co_name'])) ? $settings['co_name'] : ''  }}" autofocus type="text" id="">
                                <label class="mdl-textfield__label">اسم الشركة </label>
                            </div>
                        </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="co_phone" value="{{ (isset($settings['co_phone'])) ? $settings['co_phone'] : ''  }}" autofocus type="text" id="">
                            <label class="mdl-textfield__label">رقم التليفون  </label>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class="mdl-textfield__input" name="co_address" value="{{ (isset($settings['co_address'])) ? $settings['co_address'] : ''  }}" autofocus type="text" >
                            <label class="mdl-textfield__label">العنوان   </label>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <label class="">شعار الشركه    </label>
                            <input class="mdl-textfield__input" name="logo" autofocus type="file" >

                        </div>
                    </div>
                    <div class="col-sm-6">
                        @if(isset($settings['logo']))
                                <img src="{{url('assets/img/logo/'.$settings['logo'])}}" class="img-responsive" width="150">
                        @else
                                <img src="{{url('assets/img/logo/dokkan_logo.png')}}" class="img-responsive" width="150">
                        @endif
                    </div>



                    <div class="col-lg-12 p-t-20 text-center">
                        <button type="submit" class="btn btn-lg btn-success pull-left">حفظ</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
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