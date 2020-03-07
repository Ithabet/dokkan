<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Dokkan point of sale web application" />
    <title></title>
    <style>
        table{
            border-collapse:  collapse;
            border-style: dashed;
        }
        td{
            border-style: dashed;
        }
    </style>
</head>
<body>
    <center>
        <table  style="border-collapse: collapse;" border = "1" cellpadding = "10">
            <tr>
                <td>اسم العميل</td><td>نوع الطلب</td><td>رقم الطاولة</td><td>تاريخ العملية</td>
            </tr>
            <tr>
                <td>{{ $sale->customer->name }}</td>

                <td>
                    @if($sale->order_type == 0)
                        صالة
                    @elseif($sale->order_type == 1)
                        نيك أواي
                    @else
                        ديليفري
                    @endif
                </td>

                <td>{{ $sale->table_number }}</td>

                <td>{{ $sale->created_at->format('Y-m-d') }}</td>
            </tr>
        </table>
        <br>
        <table style="border-collapse:  collapse;"  border = "1" cellpadding = "7">
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
        </table>
    </center>
</body>
