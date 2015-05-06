@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Хэрэглэгчийн төрөлүүд ({{ $roles->getTotal() }})
		&middot;
		<small>{{ link_to_route('admin.roles.create', 'Шинээр нэмэх') }}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>#</th>
			<th>Нэр</th>
			<th>Холбоос</th>
			<th>Тайлбар</th>
			<th>Эрхүүд</th>
			<th>Үүссэн огноо</th>
			<th class="text-center"></th>
		</thead>
		<tbody>
			@foreach ($roles as $role)
			<tr>
				<td>{{ $no }}</td>
				<td>{{ $role->name }}</td>
				<td>{{ $role->slug }}</td>
				<td>{{ $role->description }}</td>
				<td>
					@foreach($role->permissions as $permission)
						&bullet; {{ $permission->name }}<br>
					@endforeach
				</td>
				<td>{{ $role->created_at }}</td>
				<td class="text-center">
					<a href="{{ route('admin.roles.edit', $role->id) }}">Засах</a>
					&middot;
					@include('admin::partials.modal', ['data' => $role, 'name' => 'roles'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ pagination_links($roles) }}
	</div>
@stop