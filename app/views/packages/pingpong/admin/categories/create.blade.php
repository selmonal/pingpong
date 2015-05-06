@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Шинээр нэмэх
		&middot;
		<small>{{ link_to_route('admin.categories.index', 'Буцах') }}</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin::categories.form')
	</div>

@stop