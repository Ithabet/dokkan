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
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12"><label>اسم العميل</label></div>
                                    <div class="col-sm-12">
                                            <select id="CustomerID" name="customer_id" onchange="get_customer_data(this)" class="form-control  select2">
{{--                                                <option value="0">عميل افتراضي</option>--}}
                                                @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12"><label>تاريخ العملية</label></div>
                                    <div class="col-sm-12">
                                        <input id="receiptDate" class="mdl-textfield__input" type="text" value="{{ date('Y-m-d') }}" id="date" data-dtp="dtp_JFOV1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <select id="orderType" class="form-control  select2">
                                    <option value="0">صالة</option>
{{--                                    <option value="1">تيك اواي</option>--}}
                                    <option value="2">ديليفري</option>
                                </select>
{{--                                <select id="TableID" class="form-control  select2">--}}
{{--                                    <option value="0">-- رقم الطاولة --</option>--}}
{{--                                    <option value="1">طاولة 1</option>--}}
{{--                                    <option value="2">طاولة 2</option>--}}
{{--                                </select>--}}
                            </div>

                        </div>
                        <hr />
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        المنتج / باركود
                                        <input type="text" dir="rtl" class="form-control" id="products">
                                        <input type="hidden" id="selected_product_id" value="">
                                        <input type="hidden" id="selected_product_price" value="">
                                        <input type="hidden" id="selected_product_name" value="">

                                    </div>
                                    <div class="col-sm-4" hidden>
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
                                    <div class="col-sm-3" hidden>
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
                                السعر
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
                                    <button type="button" id="ConfirmSale" data-toggle="modal" data-target="#ConfirmSalePopUp" class="btn-confirm-sale btn btn-lg btn-block btn-success">تنفيذ</button>
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
                <hr>
                <div id="pagination-area">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#prev" data-type="prev" class="btn-pagination btn btn-success btn-block" >
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#next" data-type="next" class="btn-pagination btn btn-success btn-block" >
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ConfirmSalePopUp" tabindex="-1" role="dialog" aria-labelledby="ConfirmSalePopUpTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <form action="{{ URL::to('sales/new') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <label id="ConfirmSalePopUpTitle">تـأكيد الفاتورة</label>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="final-recipt" >

                                    <input hidden id="f_receipt_customer" name="customer_id" value="" />
                                    <input hidden id="f_receipt_date" name="receipt_date" value="" />
                                    <input hidden id="f_receipt_type" name="order_type" value="" />
                                    <input hidden id="f_receipt_table_number" name="table_number" value="" />

                                    <table class="table">
                                        <tr>
                                            <td>اسم العميل</td>
                                            <td id="final_receipt_customer_name"></td>
                                            <td>تاريخ العملية</td>
                                            <td id="final_receipt_date"></td>
                                        </tr>
                                        <tr>
                                            <td>نوع الطلب</td>
                                            <td id="final_receipt_type"></td>
{{--                                            <td>رقم الطاولة</td>--}}
{{--                                            <td id="final_receipt_table_number"></td>--}}
                                        </tr>
                                        <tr>
                                            <td>رقم الهاتف </td>
                                            <td><input type="text" id="sale_phone" name="sale_phone" value="" class="form-control"></td>
                                       </tr>
                                        <tr>
                                            <td>العنوان </td>
                                            <td colspan="3">
                                                <textarea name="sale_address" id="sale_address" class="form-control" ></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table table-striped" hidden>
                                        <thead>
                                            <th></th>
                                            <th>اسم الصنف</th>
                                            <th>كمية</th>
                                            <th>سعر</th>
                                            <th>اجمالي</th>
                                        </thead>
                                        <tbody id="finalReceiptTable">

                                        </tbody>
                                    </table>

                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>اجمالي</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="f_receipt_total"  autofocus type="text" readonly name="total" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>المدفوع</label>
                                </div>
                                <div class="col-sm-4">
                                    <input id="f_receipt_paid" value="0"  autofocus type="text" name="paid" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-success" value="" id="auto_fill_paid"></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>المتبقي</label>
                                </div>
                                <div class="col-sm-6">
                                    <label id="_receipt_recent"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                            <button type="button" class="btn btn-primary">تأكيد</button>
                            <button type="submit" class="btn btn-primary">تأكيد + طباعة</button>
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

            $(document).on('click','.btn-confirm-sale',function () {
                var FinalProductsList = [];
                var TableRows = "";
                var Row = '';
                var receipt_total = 0;
                $('.product').each(function(i){
                    var ProductID = $(this).data('id');
                    var ProductName =$('.ProductName[data-id="'+ProductID+'"]').data('name');
                    var ProductQuantity = $('.quantity[data-id="'+ProductID+'"]').val();
                    var ProductPrice = $('.price[data-id="'+ProductID+'"]').val();
                    FinalProductsList[ProductID] = [];
                    FinalProductsList[ProductID]['ID'] = ProductID;
                    FinalProductsList[ProductID]['Name'] = ProductName;
                    FinalProductsList[ProductID]['Quantity'] = parseFloat(ProductQuantity);
                    FinalProductsList[ProductID]['Price'] = parseFloat(ProductPrice);
                    FinalProductsList[ProductID]['Total'] = parseFloat(ProductPrice*ProductQuantity);
                    Row = '<tr><td><input hidden type="text" name="product_id[]" value="'+ProductID+'" >' +
                        i+1+'</td><td>'+ProductName+'</td>' +
                        '<td><input hidden type="text" name="product_quantity[]" value="'+ProductQuantity+'" >'
                        +ProductQuantity+'</td>'+
                            '<td><input hidden type="text" name="product_price[]" value="'+ProductPrice+'" >'
                        +ProductPrice+'</td><td>'+ProductPrice*ProductQuantity+'</td></tr>';
                    receipt_total += parseFloat(ProductPrice*ProductQuantity);
                    TableRows += Row;
                    
                });
                var customerID      = $('#CustomerID').val();
                var customerName    = $('#CustomerID').children('option[value="'+customerID+'"]').text();
                var receiptDate     = $('#receiptDate').val();
                var orderTypeID     = $('#orderType').val();
                var orderType       = $('#orderType').children('option[value="'+orderTypeID+'"]').text();
                var TableNumber     = $('#TableID').val();
                $('#final_receipt_customer_name').html(customerName);
                $('#final_receipt_date').html(receiptDate);
                $('#final_receipt_type').html(orderType);
                $('#final_receipt_table_number').html(TableNumber);
                $('#finalReceiptTable').html(TableRows);

                $('#f_receipt_customer').val(customerID);
                $('#f_receipt_date').val(receiptDate);
                $('#f_receipt_type').val(orderTypeID);
                $('#f_receipt_table_number').val(TableNumber);
                $('#f_receipt_total').val(receipt_total);
                $('#f_receipt_recent').text(receipt_total);
                $('#auto_fill_paid').val(receipt_total);
                $('#auto_fill_paid').html(receipt_total);
            });
            $(document).on('click','#auto_fill_paid',function(){
                var receipt_total = $(this).val();
                $('#f_receipt_paid').val(receipt_total);
                $('#f_receipt_recent').text(0);
            });
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

            var init_number_per_page = 15;
            var init_category = 0;
            $(document).on('click','.btn-pagination',function(){
                var action = $(this).attr('data-url');
                if(action){
                action = action.split('?');
                action = action[1];
                
                    page = '?'+action;
                    load_products(' ',init_number_per_page,'',page);
                }
               
                
            });
            function load_products(keywords,number_per_page,category,page){
                if(!keywords){
                    keywords = '';
                }
                if(!page){
                    page = '';
                }
                if(!category){
                    category = 0;
                }
                $(document).find('input[name="category"]').each(function(){
                        if($(this).parent('label').hasClass('is-checked')){
                            category = $(this).val();
                        }
                    });
                if(!number_per_page){
                    number_per_page = 15;
                }
                $.ajax( {
                        url: "{{ URL::to('products/getAjaxProducts') }}"+page,
                        type: "post",
                        data: {
                            keywords: keywords,
                            category: category,
                            number_per_page:number_per_page
                        },
                        success: function( data ) {
                            var products = data.data;
                            var next_page = data.next_page_url;
                            var prev_page = data.prev_page_url;
                            var html = "";
                            $.each(products,function(i,v){
                                html += '<a href="#newProduct" data-id="'+v.id+'" data-value="'+v.value+'" data-price="'+v.sell_price+'" '+
                                'class="btn-product btn btn-info btn-circle m-b-10">'+v.value+'</a> ';   
                                console.log(v);
                            });
                            $("#ajax_products").html(html);

                               $(document).find('.btn-pagination').each(function(){
                                    var action_type = $(this).data('type');
                                    
                                        if(action_type =='prev'){
                                        console.log(prev_page)
                                        $(this).attr('data-url',prev_page) ;
                                        }
                                        if(action_type =='next'){
                                        $(this).attr('data-url',next_page) ;
                                        console.log(next_page)
                                        }
                                    
                               });
                               
                            console.log(data);   
                        }
                    } );
            }    
            load_products(' ',init_number_per_page,init_category,'');
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
                load_products(keywords,init_number_per_page,'','');
            });
            $(document).on('change','input[name="category"]',function(){
                   var keywords = $('#SearchByName').val();
                   
                         var   category = $(this).val();
                         console.log(category);
                       
                   load_products(keywords,init_number_per_page,category,'');
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
                minLength: 4,
                autoFocus:true,
                focus: function( event, ui ) {
                    $('#selected_product_id').val(ui.item.id);
                    $('#selected_product_price').val(ui.item.sell_price);
                    $('#selected_product_name').val(ui.item.value);

                    var newProductId = $('#selected_product_id').val();
                    console.log($(this));
                    var newProductName = $('#selected_product_name').val();
                    var price = parseFloat($('#selected_product_price').val());
                    var quantity = parseInt($('#selected_product_quantity').val());
                    newProduct(newProductId,newProductName,price,quantity);
                    $('#selected_product_quantity').val(1)
                    $(this).val('');
                    $('.ui-widget-content').hide();
                    return false;
                }

            } );
            $('#products').keypress(function(event) {
                event.preventDefault();
                return false;
            });
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
                            '<input type="hidden" value="'+newProductId+'" class="ProductID" name="productID[]"><label class="ProductName" data-id="'+newProductId+'" data-name="'+newProductName+'">'+newProductName+'</label>' +
                            '</div>' +
                            '<div class="col-sm-2">' +
                            '<input type="number" data-id="'+newProductId+'"  name="productQuantity[]" class="form-control input-sm text-center quantity " value="'+quantity+'" min="1">\n' +
                            '</div>' +
                            '<div class="col-sm-2"><input name="productPrice[]" type="text" data-id="'+newProductId+'" value="'+price+'" class="form-control text-center input-sm price " > </div>' +
                            '<div class="col-sm-2"><span class="total total_'+newProductId+'">'+product_total+' </span>' +
                            '<input type="hidden" value="'+newProductId+'" class="ProductTotal" name="productTotal[]"></div>' +
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
        function get_customer_data(id)
        {
            var customer = id.value;
            $.ajax( {
                url: "{{ URL::to('persons/customers/customerjsonsearch') }}",
                type: "post",
                data: {
                    id: customer
                },
                success: function( data ) {
                    console.log(data.address);
                    $('#sale_address').val(data.address);
                    $('#sale_phone').val(data.phone);
                }
            } );
        }
    </script>


@stop