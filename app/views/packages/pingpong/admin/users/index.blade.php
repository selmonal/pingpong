@extends('admin::layouts.master')

@section('content-header')
	<h1>
		{{{ $title or 'Хэрэглэгчид' }}} ({{ $users->getTotal() }})
		&middot;
		<small>{{ link_to_route('admin.users.create', 'Шинээр нэмэх') }}</small>
	</h1>
@stop

@section('content')

	@if(isset($search))
		@include('admin::users.search-form')
	@endif

	<table class="table">
		<thead>
			<th>#</th>
			<th>Нэр</th>
			<th>Хэрэглэгчийн нэр</th>
			<th>И-мэйл</th>
			<th>Үүссэн огноо</th>
			<th class="text-center"></th>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{ $no }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->created_at }}</td>
				<td class="text-center">
					<a href="{{ route('admin.users.edit', $user->id) }}">Засах</a>
					&middot;
					@include('admin::partials.modal', ['data' => $user, 'name' => 'users'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ pagination_links($users) }}
	</div>
@stop