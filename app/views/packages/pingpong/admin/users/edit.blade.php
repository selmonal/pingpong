@extends('admin::layouts.master')

@section('content-header')	
	<h1>
		Засах
		&middot;
		<small>{{ link_to_route('admin.users.index', 'Буцах') }}</small>
	</h1>
@stop

@section('content')
	<div>
		@include('admin::users.form', array('model' => $user) + compact('role'))
	</div>

@stop