@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Файл ({{ count($files) }})
	</h1>
@stop
@section('content')

	<table class="table">
		<thead>
			<th>#</th>
			<th>Нэр</th>
			<th>Зам</th>
			<th>Тайлбар</th>
			<th class="text-center"></th>
		</thead>
		<tbody>
			@foreach ($files as $file)
			<tr>
				<td>{{ $no }}</td>
				<td>{{ $file['name'] }}</td>
				<td>{{ $file['path'] }}</td>
				<td>{{ $file['description'] }}</td>
				<td class="text-center">
					<a href="{{ route('admin.settings.file_editor.edit', urlencode($file['path'])) }}">Засах</a>
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>
@stop