@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Шинээр нэмэх
		&middot;
		<small>{{ link_to_route('admin.tours.index', 'Буцах') }}</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin.tours.form')
	</div>

@stop