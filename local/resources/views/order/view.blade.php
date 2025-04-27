<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@lang('app.view_order_detail')</title>
</head>
<body>

<style type="text/css">
td
{
	padding:10px 10px !important;
}

@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }


}

</style>

<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;

     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<br>
<a style="padding: 10px 20px;border:1px solid gray;border-radius: 10px;" onclick="printDiv('printableArea')">Print Receipt</a>

<div id="printableArea">

<style type="text/css">
td
{
  padding:10px 10px;
}
</style>

<h1 align="center">@lang('app.view_order_no') #{{ $data->id }}</h1>
<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr>
<td width="40%"><b>@lang('app.view_store')</b></td>
<td width="60%">{{ $data->store }}</td>
</tr>

<tr>
<td width="40%"><b>@lang('app.view_user')</b></td>
<td width="60%">{{ $data->name }}</td>
</tr>

<tr>
<td width="40%"><b>@lang('app.view_phone')</b></td>
<td width="60%">{{ $data->name }}</td>
</tr>

<tr>
<td width="40%"><b>@lang('app.view_address')</b></td>
<td width="60%">{{ $data->address }}</td>
</tr>

<tr>
<td width="40%"><b>@lang('app.view_order_date')</b></td>
<td width="60%">{{ date('d-M-Y h:i:A',strtotime($data->created_at)) }}</td>
</tr>

@if($data->odate == 2)

<tr>
<td width="40%"><b>Delivery Date</b></td>
<td width="60%">{{ date('d-M-Y',strtotime($data->order_date)) }} | {{ $data->order_time }}</td>
</tr>

@endif

</table>

<br><br>
<b style="margin-left: 20%;">@lang('app.view_order_items')</b>
<br><br>
<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr>
<td width="15%"><b>@lang('app.view_s_no')</b></td>
<td width="30%"><b>@lang('app.view_item')</b></td>
<td width="15%"><b>@lang('app.view_price')</b></td>
<td width="20%"><b>@lang('app.view_qty')</b></td>
<td width="20%"><b>@lang('app.view_total')</b></td>
</tr>
@php($i = 0)
@php($total = [])
@foreach($item->getItem($data->id) as $row)
@php($i++)
@php($total[] = $row['price'] * $row['qty'])
<tr>
<td width="15%">{{ $i }}</td>
<td width="30%">{{ $row['item'] }}</td>
<td width="15%">{{ $c.$row['price'] }}</td>
<td width="20%">{{ $row['qty'] }}</td>
<td width="20%">{{ $c.$row['price'] * $row['qty'] }}</td>
</tr>
@php($a = 0)
@foreach($row['addon'] as $addon)
@php($a++)
@php($total[] = $addon->price * 1)
<tr>
<td width="15%">{{ $a }}</td>
<td width="30%">{{ $addon->addon }}</td>
<td width="15%">{{ $c.$addon->price }}</td>
<td width="20%">1</td>
<td width="20%">{{ $c.$addon->price * 1 }}</td>
</tr>
@endforeach

@endforeach

<tr>
<td width="15%">&nbsp;</td>
<td width="30%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="20%"><b>@lang('app.view_sub_total')</b></td>
<td width="20%">{{ $c.array_sum($total) }}</td>
</tr>

@if($data->discount > 0)
<tr>
<td width="15%">&nbsp;</td>
<td width="30%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="20%"><b>@lang('app.view_discount')</b></td>
<td width="20%">{{ $c.$data->discount }}</td>
</tr>
@endif

@if($data->tax_value > 0)
<tr>
<td width="15%">&nbsp;</td>
<td width="30%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="20%"><b>{{ $data->tax_name }}</b></td>
<td width="20%">{{ $c.$data->tax_value }}</td>
</tr>
@endif

@if($data->d_charges > 0)
<tr>
<td width="15%">&nbsp;</td>
<td width="30%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="20%"><b>@lang('app.view_delivery')</b></td>
<td width="20%">{{ $c.$data->d_charges }}</td>
</tr>
@endif

@if($data->tip > 0)
<tr>
<td width="15%">&nbsp;</td>
<td width="30%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="20%"><b>Tip For Rider</b></td>
<td width="20%">{{ $c.$data->tip }}</td>
</tr>
@endif

<tr>
<td width="15%">&nbsp;</td>
<td width="30%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="20%"><b>@lang('app.view_grand_total')</b></td>
<td width="20%">{{ $c.$data->total }}</td>
</tr>

<tr>
<td width="15%">&nbsp;</td>
<td width="30%">&nbsp;</td>
<td width="15%">&nbsp;</td>
<td width="20%"><b>Payment Method</b></td>
<td width="20%">

@if($data->payment_method == 1)

Cash on Delivery

@elseif($data->payment_method == 2 || $data->payment_method == 3)

Online Paid

@endif

@if($data->total == $data->ecash)
Paid with eCash
@else
<p>eCash Paid {{ $data->ecash }}</p>
<p>Payable Balance {{ ($data->total - $data->ecash) + $data->tip }}</p>
@endif

</td>
</tr>

</table>
</div>

</body>
</html>