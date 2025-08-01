<div class="card-content">
<div class="card-body">

@include('language.header')
<div class="tab-content">
@foreach(DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get() as $l)
<div class="tab-pane" id="tabs_{{ $l->id }}" aria-labelledby="home-tab" role="tabpanel">

<input type="hidden" name="lid[]" value="{{ $l->id }}">

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6">@lang('app.name')</label>
{!! Form::text('l_name[]',$data->getSData($data->s_data,$l->id,'l_name'),['id' => 'code','class' => 'form-control'])!!}
</div>
</div>


</div>
@endforeach

<div class="tab-pane active" id="tabs_0" aria-labelledby="home-tab" role="tabpanel">
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6">@lang('app.name')</label>
{!! Form::text('name',null,['id' => 'code','class' => 'form-control','required'])!!}
</div>

<div class="form-group col-md-6">
<label for="inputEmail6">@lang('app.phone')</label>
{!! Form::number('phone',null,['id' => 'code','class' => 'form-control'])!!}
</div>
</div>

<div class="row">

<div class="form-group col-md-3">
<label for="inputEmail6">Per Delivery Charge</label>
{!! Form::number('charge',null,['id' => 'code','class' => 'form-control','step' => '0.1'])!!}
</div>

<div class="form-group col-md-3">
<label for="inputEmail6">Per KM Charge</label>
{!! Form::number('per_km',null,['id' => 'code','class' => 'form-control','step' => '0.1'])!!}
</div>

<div class="form-group col-md-6">
@if(!$data->id)
<label for="inputEmail6">@lang('app.password')</label>
<input type="password" name="password" class="form-control" required="required">
@else
<label for="inputEmail6">@lang('app.change_password')</label>
<input type="password" name="password" class="form-control">
@endif
</div>

<div class="col-xl-6">
<fieldset class="form-group">
<label for="basicInput">@lang('app.status')</label>
<select name="status" class="form-control">
<option value="0" @if($data->status == 0) selected @endif>@lang('app.active')</option>
<option value="1" @if($data->status == 1) selected @endif>@lang('app.disbale')</option>
</select>
</fieldset>
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">@lang('app.save')</button>


</div>
</div>