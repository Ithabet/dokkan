<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Dokkan point of sale web application" />
    <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <title>فاتورة رقم {{ $sale->id }}</title>
    <style>
        table{
            /*border-collapse:  collapse;*/
            border: none;
            width: 20%
        }
        td{
            /*border-style: dashed;*/
        }
    </style>
</head>
<body >
    <center>
        <div id="print_div">
        <table  style="border-collapse: collapse; " cellpadding = "3">
            <tr>
                <td colspan="2" style="text-align: center">
                    @if(isset($settings['logo']))
                        <img src="{{url('assets/img/logo/'.$settings['logo'])}}" class="img-responsive" width="120">
                    @else
                        <img src="{{url('assets/img/logo/dokkan_logo.png')}}" class="img-responsive" width="120">
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; font-size: 20px;"> <b>{{ (isset($settings['co_name'])) ? $settings['co_name'] : 'دكان'}}</b></td>
            </tr>

            <tr>
                <td>اسم العميل</td>
                <td>{{ $sale->customer->name }}</td>

            </tr>
            <tr>
                <td>رقم الطلب</td>
                <td>{{ $sale->id }} </td>

            </tr>
            <tr>
                <td>نوع الطلب</td>

                <td>
                    @if($sale->order_type == 0)
                        صالة
                    @elseif($sale->order_type == 1)
                        نيك أواي
                    @else
                        ديليفري
                    @endif
                </td>
            </tr>
            <tr>

                <td>تاريخ العملية</td>
                <td>{{ $sale->created_at->format('Y-m-d') }}</td>
            </tr>
        </table>
        <br>
        <table style="border-collapse:  collapse; "  border = "1" cellpadding = "5">
            <tr>
                <td> م </td>
                <td> اسم </td>
                <td> سعر </td>
                <td> كمية </td>
                <td> اجمالي </td>
            </tr>
            @foreach($sale->items as $i=>$item)
            <tr>
                <td> {{$i+1}} </td>
                <td> {{ $item->product->name }} </td>
                <td> {{ $item->product_price }} </td>
                <td> {{ $item->product_quantity }} </td>
                <td> {{ $item->product_price*$item->product_quantity }} </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4"><b>اجمالي</b></td>
                <td><b> {{ $sale->total }} </b></td>
            </tr>
            <tr>
                <td colspan="4"><b>المدفوع </b></td>
                <td><b> {{ $sale->paid }} </b></td>
            </tr>
            <tr>
                <td colspan="4"><b>المتبقي </b></td>
                <td><b> {{ $sale->total - $sale->paid }} </b></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center; border: none; font-size: 14px;"> نشكركم علي اختياركم {{ $settings['co_name'] }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center; font-size: 14px; border: none;"> {{ (isset($settings['co_phone'])) ? $settings['co_phone'] : '0123456789'}}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center; font-size: 14px; border: none;"> {{ (isset($settings['co_address'])) ? $settings['co_address'] : 'المقطم - القاهرة '}}</td>
            </tr>
        </table>
        </div>
        <button type="button" id="print" onclick="PrintElem('print_div')" class="btn btn-info btn-lg " ><i class="fa fa-print"></i> طباعة </button>
        <a href="{{url('sales/pos')}}"  class="btn btn-success btn-lg" ><i class="fa fa-cart-plus"></i> العوده الي المبيعات </a>
    </center>

</body>
<script >

    function PrintElem(elem) {
        var mywindow = window.open('', 'PRINT', 'height=800,width=1000');

        mywindow.document.write('<html dir="rtl"><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body ><center>');
        mywindow.document.write('<style> table{ border: none;' +
            '} </style>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</center></body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        setTimeout(function (){
            mywindow.close();
        },3000)


        return true;
    }
</script>
