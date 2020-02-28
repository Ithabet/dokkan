@extends('layouts.app')

@section('EXTCSS')

    <link href="{{ URL::to('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

@stop

@section('content')
    <div class="row">
        <div class="col-md-7 col-sm-7">
            <div class="card card-box">
                <div class="card-head">
                    <header>عملية بيع جديدة</header>
                    <div class="btn-group pull-left">
                        <a href="{{ URL::to('sales') }}" class="btn btn-danger">
                            <i class="fa fa-pan"></i>         الغاء
                        </a>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="card-body " id="bar-parent">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-5"><label>اسم العميل</label></div>
                                    <div class="col-sm-7">
                                            <select class="form-control  select2">
                                                <option value="0">-- عميل عشوائي --</option>
                                                @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-6"><label>تاريخ العملية</label></div>
                                    <div class="col-sm-6">
                                        <input class="mdl-textfield__input" type="text" value="{{ date('Y-m-d') }}" id="date" data-dtp="dtp_JFOV1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control  select2">
                                    <option value="">-- رقم الطاولة --</option>
                                    <option value="1">طاولة 1</option>
                                    <option value="2">طاولة 2</option>
                                    <option value="0">تيك اواي 2</option>
                                </select>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        المنتج / باركود
                                        <input type="text" dir="rtl" class="form-control" id="products">
                                        <input type="hidden" id="selected_product_id" value="">
                                        <input type="hidden" id="selected_product_price" value="">

                                    </div>
                                    <div class="col-sm-3">
                                        الكمية
                                        <div class="input-group spinner">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" data-dir="up" type="button">
                                                    <span class="fa fa-plus"></span>
                                                </button>
                                            </span>
                                            <input type="number" id="selected_product_quantity" class="form-control text-center" value="1" min="1">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" data-dir="dwn" type="button">
                                                    <span class="fa fa-minus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        أضف الى القائمة
                                        <div class="input-group">
                                            <button type="button" id="addToListBtn" class="btn btn-block btn-success">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-4">
                                اسم المنتج
                            </div>
                            <div class="col-sm-2">
                                الكمية
                            </div>
                            <div class="col-sm-2">
                                سعر الوحدة
                            </div>
                            <div class="col-sm-2">
                                اجمالي
                            </div>
                            <div class="col-sm-2">
                                حذف
                            </div>
                        </div><hr />
                        <div id="productsList" >

                        </div>

                        <div id="totals" style="display: none" >
                            <hr />
                            <div class="row">
                                <div class="col-sm-8 text-right">
                                    الاجمالي
                                </div>

                                <div class="col-sm-2">
                                    <span id="grossTotal"></span>
                                </div>
                                <div class="col-sm-2">

                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-lg btn-block btn-success">تنفيذ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 col-sm-5">
            <div class="card card-box">
                <div class="card-head">
                    <header>المنتجات</header>
                    <div class="btn-group pull-left">
                    <input type="text" id="SearchByName" placeholder="بحث بإسم المنتج" dir="rtl" class="form-control" >
                    </div>
                </div>
                <div class="card-body " id="bar-parent">
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="mdl-radio mdl-js-radio" for="all">
                                <input type="radio" id="all" name="category"
                                    class="mdl-radio__button" value="0" checked>
                                <span class="mdl-radio__label">الكل</span>
                            </label>
                            @foreach($categories as $category)
                            <label class="mdl-radio mdl-js-radio" for="option{{ $category->id }}">
                                <input type="radio" id="option{{ $category->id }}" name="category"
                                    class="mdl-radio__button" value="{{ $category->id }}" >
                                <span class="mdl-radio__label">{{ $category->name }}</span>
                            </label>
                            @endforeach
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="ajax_products">
                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><a href=""><a></div>
                        <div class="col-sm-6"></div>
                    </div>
                </div>
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
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-migrate.min.js') }}"></script>
    <script>
        $(function(){
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            
            var productsList = [];

            $(document).on('click','.remove',function () {
                var product_id = $(this).data('id');
                function checkCurrentProduct(productId) {
                    return productId == product_id;
                }
                var productIndex = productsList.findIndex(checkProduct);
                productsList.splice(productIndex,1);
                $('.row.product_'+product_id).remove();
                reCalculate();
            });

            function load_products(keywords,number_per_page){
                if(!keywords){
                    keywords = ' ';
                }
                if(!number_per_page){
                    number_per_page = 15;
                }
                $.ajax( {
                        url: "{{ URL::to('products/getAjaxProducts') }}",
                        type: "post",
                        data: {
                            keywords: keywords,
                            number_per_page:number_per_page
                        },
                        success: function( data ) {
                            var products = data.data;
                            var next_page = data.next_page_url;
                            var html = "";
                            $.each(products,function(i,v){
                                html += '<a href="#newProduct" data-id="'+v.id+'" data-value="'+v.value+'" data-price="'+v.price+'" '+
                                'class="btn-product btn btn-info btn-circle m-b-10">'+v.value+'</a>';   
                                console.log(v);
                            });
                               $("#ajax_products").html(html);
                            console.log(data);   
                        }
                    } );
            }    
            load_products(' ',4);
            $(document).on('click','.btn-product',function(){
                console.log($(this).data());
                var newProductId = $(this).data().id;
                var newProductName = $(this).data('value');
                var price = parseFloat($(this).data('price'));
                var quantity = 1;
                $('#selected_product_id').val(newProductId);
                newProduct(newProductId,newProductName,price,quantity);
            });
            $('#SearchByName').keyup(function() {
                var keywords = $(this).val();
                load_products(keywords,4);
            });
            $( "#products" ).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        url: "{{ URL::to('products/JSON-search') }}",
                        type: "post",
                        data: {
                            keywords: request.term
                        },
                        success: function( data ) {
                            console.log(data);
                            response( data );
                        }
                    } );
                },
                minLength: 2,
                select: function( event, ui ) {
                    $('#selected_product_id').val(ui.item.id);
                    $('#selected_product_price').val(ui.item.price);
                }
            } );
            function checkProduct(productId){
                var newProductId = $('#selected_product_id').val();
                return productId == newProductId;
            }
            function reCalculate(){
                var products_count = $('.product').length;
                if(products_count) $('#totals').show(); else $('#totals').hide();

                $('.product').each(function (i) {
                    var product_id =$(this).data('id');
                    var quantity = parseInt($('.quantity[data-id="'+product_id+'"').val());
                    var price    = parseFloat($('.price[data-id="'+product_id+'"').val());
                    var total    = (quantity*price).toFixed(2);
                    $('.total_'+product_id).text(total);
                    var grossTotal = 0;
                    $('.total').each(function () {
                        var subTotal = parseFloat($(this).html());
                        grossTotal += parseFloat(subTotal);
                        subTotal = 0;
                    });
                    grossTotal = grossTotal.toFixed(2);
                $('#grossTotal').html(grossTotal);
                });
            }
            $(document).on('focus','.price',function(){
                $(this).select();
            });
            $(document).on('change','.quantity,.price',function () {
                reCalculate();
            });
            function newProduct(newProductId,newProductName,price,quantity){
                
                var product_total = quantity*price;
                if(newProductId)
                {
                    var productIndex = productsList.findIndex(checkProduct);
                    if(productIndex != -1){
                        $('.quantity[data-id="'+newProductId+'"').val(parseInt($('.quantity[data-id="'+newProductId+'"').val())+quantity);
                        reCalculate();
                    }else{
                        productsList.push(newProductId);
                        $('#productsList').append('<div data-id="'+newProductId+'" class="row product product_'+newProductId+'">' +
                            '<div class="col-sm-4">' +
                            '<input type="hidden" value="'+newProductId+'" name="productID[]"><label>'+newProductName+'</label>' +
                            '</div>' +
                            '<div class="col-sm-2">' +
                            '<input type="number" data-id="'+newProductId+'" name="productQuantity[]" class="form-control input-sm text-center quantity " value="'+quantity+'" min="1">\n' +
                            '</div>' +
                            '<div class="col-sm-2"><input type="text" data-id="'+newProductId+'" value="'+price+'" class="form-control text-center input-sm price " > </div>' +
                            '<div class="col-sm-2"><span class="total total_'+newProductId+'">'+product_total+' </span></div>' +
                            '<div class="col-sm-2"><button data-id="'+newProductId+'" type="button" class="btn btn-sm btn-danger btn-block remove"><span class="fa fa-remove"></span></button></div>' +
                            '</div>' );
                    }
                }
                reCalculate();
                }
            $('#addToListBtn').on('click',function () {
                var newProductId = $('#selected_product_id').val();
                var newProductName = $('#products').val();
                var price = parseFloat($('#selected_product_price').val());
                var quantity = parseInt($('#selected_product_quantity').val());
                newProduct(newProductId,newProductName,price,quantity);
                $('#selected_product_quantity').val(1)
            });
        });

    </script>


@stop