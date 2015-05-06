@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.users.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'admin.users.store']) }}
@endif
	<div class="form-group">
		{{ Form::label('name', 'Нэр:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		{{ $errors->first('name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('username', 'Нэвтрэх нэр:') }}
		{{ Form::text('username', null, ['class' => 'form-control']) }}
		{{ $errors->first('username', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('email', 'И-мэйл:') }}
		{{ Form::email('email', null, ['class' => 'form-control']) }}
		{{ $errors->first('email', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Нууц үг:') }}
		{{ Form::password('password', ['class' => 'form-control']) }}
		{{ $errors->first('password', '<div class="text-danger">:message</div>') }}
	</div>
	<!-- <div class="form-group">
		{{ Form::label('gender', 'Хүйс:') }}
		{{ Form::select('gender', ['Male' => 'Laki-laki', 'Female' => 'Perempuan'], null, ['class' => 'form-control']) }}
		{{ $errors->first('gender', '<div class="text-danger">:message</div>') }}
	</div> -->
	<div class="form-group">
		{{ Form::label('role', 'Хэрэгдэгчийн төрөл:') }}
		{{ Form::select('role', $roles, isset($role) ? $role : null, ['class' => 'form-control']) }}
		{{ $errors->first('role', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::submit(isset($model) ? 'Шинэчлэх' : 'Хадгалах', ['class' => 'btn btn-primary']) }}
	</div>
{{ Form::close() }}