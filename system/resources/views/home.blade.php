@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>إحصائيات اليوم </header>
                </div>
                <div class="card-body " id="bar-parent">
                    <div class="state-overview">
                        <div class="row">
                            <div class="col-sm-3">
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
                            <div class="col-sm-3">
                                <div class="overview-panel green">
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="3">3</p>
                                        <p>عملية شراء</p>
                                    </div>
                                    <div class="symbol">
                                        <i class="fa fa-file usr-clr"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-3">
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
                            <div class="col-sm-3">
                                <div class="overview-panel deepPink-bgcolor">
                                    <div class="symbol">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="0">0</p>
                                        <p>المصروفات</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="overview-panel orange">
                                    <div class="symbol">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="14">15220</p>
                                        <p>النقدية</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
