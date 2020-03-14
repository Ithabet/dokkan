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
                <td>اسم المورد</td><td>تاريخ العملية</td>
            </tr>
            <tr>
                <td>{{ $purchase->supplier->name }}</td>

                <td>{{ $purchase->created_at->format('Y-m-d') }}</td>
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
            @foreach($purchase->items as $i=>$item)
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
                <td><b> {{ $purchase->total }} </b></td>
            </tr>
        </table>
    </center>
</body>
