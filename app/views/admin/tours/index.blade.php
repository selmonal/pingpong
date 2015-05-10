@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Аялалын жагсаалт ({{ $tours->getTotal() }})
		&middot;
		<small>{{ link_to_route('admin.tours.create', 'Шинээр нэмэх') }}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>#</th>
			<th>Нэр</th>
			<th>Эхлэх огноо</th>
			<th>Дуусах огноо</th>
			<th>Ангилал</th>
			<th>Үүссэн огноо</th>
			<th class="text-center"></th>
		</thead>
		<tbody>
			@foreach ($tours as $tour)
			<tr>
				<td>{{ $no }}</td>
				<td>
					<a class="fa fa-globe user-url" href="{{ $tour->present()->userUrl }}" target="_blank"></a>
					{{ $tour->name }}
				</td>
				<td>{{ $tour->start_date }}</td>
				<td>{{ $tour->end_date }}</td>
				<td>{{ $tour->category->name }}</td>
				<td>{{ $tour->created_at }}</td>
				<td class="text-center">
					<a href="{{ route('admin.tours.edit', $tour->id) }}">Засах</a>
					&middot;
					@include('admin::partials.modal', ['data' => $tour, 'name' => 'tours'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ pagination_links($tours) }}
	</div>
@stop