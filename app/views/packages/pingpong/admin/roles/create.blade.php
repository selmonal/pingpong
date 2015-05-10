@extends('admin::layouts.master')

@section('content-header')
	
	<h1>
		Шинээр нэмэх
		&middot;
		<small>{{ link_to_route('admin.roles.index', 'Буцах') }}</small>
	</h1>
	
@stop

@section('content')

	<div>
		@include('admin::roles.form')
	</div>

@stop