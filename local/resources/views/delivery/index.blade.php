@extends('layout.main')

@section('title') @lang('app.delivery_staff') @endsection

@section('content')

<section id="basic-input">
<div class="row">
<div class="col-md-12">
<div class="card">

<div class="row" id="table-head">
<div class="col-12">
<div class="card">
<div class="card-content">

<div class="card-body"><h4 class="card-title">@lang('app.delivery_staff') <a href="{{ Asset($link.'add') }}" class="btn btn-primary" style="float: right">@lang('app.add_new')</a></h4> </div>
<div class="table-responsive">
<table class="table mb-0">
<thead >
<tr>
<th>@lang('app.name')</th>
<th>@lang('app.phone')</th>
<th>@lang('app.password')</th>
<th>Per Delivery Charge</th>
<th>Per KM</th>
<th>@lang('app.status')</th>
<th class="text-right">@lang('app.option')</th>
</tr>
</thead>
<tbody>

@foreach($data as $row)
<tr>
<td width="15%">{{ $row->name }}</td>
<td width="15%">{{ $row->phone }}</td>
<td width="15%">{{ $row->shw_password }}</td>
<td width="10%">{{ Auth::user()->currency.$row->charge }}</td>
<td width="10%">{{ Auth::user()->currency.$row->per_km }}</td>
<td width="15%">

@if($row->status == 0)

<div class="chip chip-success mr-1">
<div class="chip-body">
<span class="chip-text">@lang('app.active')</span>
</div>
</div>

@else

<div class="chip chip-danger mr-1">
<div class="chip-body">
<span class="chip-text">@lang('app.disbale')</span>
</div>
</div>

@endif	

</td>
<td width="20%" class="text-right">

<a class="btn btn-icon btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="@lang('app.edit')" href="{{ Asset($link.$row->id.'/edit') }}"><i class="feather icon-edit"></i></a>

<a type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="@lang('app.delete')" onclick="confirmAlert('{{ Asset($link.'delete/'.$row->id) }}')"><i class="feather icon-trash-2"></i></a>

</td>
</tr>
@endforeach

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection