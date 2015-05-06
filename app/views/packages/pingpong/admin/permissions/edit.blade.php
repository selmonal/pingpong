@extends('admin::layouts.master')

@section('content-header')
	
	<h1>
		Засах
		&middot;
		<small>{{ link_to_route('admin.permissions.index', 'Буцах') }}</small>
	</h1>
	
@stop

@section('content')
	
	<div>
		@include('admin::permissions.form', array('model' => $permission))
	</div>

@stop