@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Санал хүсэлт ({{ $feedbacks->getTotal() }})
	</h1>
@stop
@section('content')
	
	<ul class="nav nav-pills">
		<li role="presentation" class="{{ Input::get('only') == "checked" || Input::get('only') == "unchecked" ? '' : 'active' }}"><a href="{{ route('admin.feedbacks.index') }}">Бүгд</a></li>
		<li role="presentation" class="{{ Input::get('only') == "unchecked" ? 'active' : '' }}"><a href="{{ route('admin.feedbacks.index', ['only' => 'unchecked']) }}">Шалгаагүй</a></li>
		<li role="presentation" class="{{ Input::get('only') == "checked"? 'active' : '' }}"><a href="{{ route('admin.feedbacks.index', ['only' => 'checked']) }}">Шалгасан</a></li>
	</ul>

	<table class="table">
		<thead>
			<th>#</th>
			<th>Нэр</th>
			<th>И-мэйл</th>
			<th>Үүссэн огноо</th>
			<th class="text-center"></th>
		</thead>
		<tbody>
			@foreach ($feedbacks as $feedback)
			<tr class="row-{{ $feedback->checked? 'checked' : 'unchecked' }}">
				<td>{{ $no }}</td>
				<td>{{ $feedback->name }}</td>
				<td>{{ $feedback->email }}</td>
				<td>{{ $feedback->created_at->diffForHumans() }}</td>
				<td class="text-center">
					<a href="{{ route('admin.feedbacks.show', $feedback->id) }}">Шалгах</a>
					&middot;
					@include('admin::partials.modal', ['data' => $feedback, 'name' => 'feedbacks'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ pagination_links($feedbacks) }}
	</div>
@stop