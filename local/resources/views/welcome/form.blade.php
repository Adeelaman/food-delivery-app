<div class="card-content">
<div class="card-body">

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail6">@lang('app.image')</label>
<input type="file" name="img" class="form-control" @if(!$data->id) required="required" @endif>
</div>

<div class="form-group col-md-6">
<label for="inputEmail6">Title</label>
{!! Form::text('title',null,['id' => 'code','class' => 'form-control'])!!}
</div>

<div class="form-group col-md-6">
<label for="inputEmail6">Description</label>
{!! Form::text('text',null,['id' => 'code','class' => 'form-control'])!!}
</div>

<div class="form-group col-md-6">
<label for="inputEmail6">@lang('app.sort_no')</label>
{!! Form::number('sort_no',null,['id' => 'code','class' => 'form-control'])!!}
</div>

<div class="form-group col-md-6">
<label for="inputEmail6">@lang('app.status')</label>
<select name="status" class="form-control">
<option value="0" @if($data->type == 0) selected @endif>Enable</option>
<option value="1" @if($data->type == 1) selected @endif>Disbaled</option>
</select>
</div>

</div>

<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">@lang('app.save')</button>

</div>
</div>