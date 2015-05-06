@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Аялал ангилалууд ({{ $categories->getTotal() }})
		&middot;
		<small>{{ link_to_route('admin.tour_categories.create', 'Шинээр нэмэх') }}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>#</th>
			<th>Нэр</th>
			<th>Холбоос</th>
			<th>Тайлбар</th>
			<th>Үүссэн огноо</th>
			<th class="text-center"></th>
		</thead>
		<tbody>
			@foreach ($categories as $category)
			<tr>
				<td>{{ $no }}</td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->slug }}</td>
				<td>{{ $category->description }}</td>
				<td>{{ $category->created_at }}</td>
				<td class="text-center">
					<a href="{{ route('admin.tour_categories.edit', $category->id) }}">Засах</a>
					&middot;
					@include('admin::partials.modal', ['data' => $category, 'name' => 'tour_categories'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ pagination_links($categories) }}
	</div>
@stop