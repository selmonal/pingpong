@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.tour_categories.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'admin.tour_categories.store']) }}
@endif
	<div class="form-group">
		{{ Form::label('name', 'Нэр:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		{{ $errors->first('name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('slug', 'Холбоос:') }}
		{{ Form::text('slug', null, ['class' => 'form-control']) }}
		{{ $errors->first('slug', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('description', 'Тайлбар:') }}
		{{ Form::textarea('description', null, ['class' => 'form-control']) }}
		{{ $errors->first('description', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::submit(isset($model) ? 'Шинэчлэх' : 'Хадгалах', ['class' => 'btn btn-primary']) }}
	</div>
{{ Form::close() }}