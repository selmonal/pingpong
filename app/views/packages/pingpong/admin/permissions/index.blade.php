@extends('admin::layouts.master')

@section('content-header')
	
	<h1>
		Эрхүүд ({{ $permissions->getTotal() }})
		&middot;
		<small>{{ link_to_route('admin.permissions.create', 'Шинээр нэмэх') }}</small>
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
			@foreach ($permissions as $permission)
			<tr>
				<td>{{ $no }}</td>
				<td>{{ $permission->name }}</td>
				<td>{{ $permission->slug }}</td>
				<td>{{ $permission->description }}</td>
				<td>{{ $permission->created_at }}</td>
				<td class="text-center">
					<a href="{{ route('admin.permissions.edit', $permission->id) }}">Засах</a>
					&middot;
					@include('admin::partials.modal', ['data' => $permission, 'name' => 'permissions'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ pagination_links($permissions) }}
	</div>
@stop