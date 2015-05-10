@extends('admin::layouts.master')

@section('content-header')
	@if( ! isOnPages())
	<h1>
		Мэдээ мэдээлэл ({{ $articles->getTotal() }})
		&middot;
		<small>{{ link_to_route('admin.articles.create', 'Шинээр нэмэх') }}</small>
	</h1>
	@else
	<h1>
		Хуудас ({{ $articles->getTotal() }})
		&middot;
		<small>{{ link_to_route('admin.pages.create', 'Шинээр нэмэх') }}</small>
	</h1>
	@endif
@stop

@section('content')

	<table class="table">
		<thead>
			<th>#</th>
			<th>Гарчиг</th>
			<th>Нийтэлсэн</th>
			@if( ! isOnPages())
			<th>Ангилал</th>
			@endif
			<th>Үүссэн огноо</th>
			<th class="text-center"></th>
		</thead>
		<tbody>
			@foreach ($articles as $article)
			<tr>
				<td>{{ $no }}</td>
				<td>
					<a href="{{ url((isOnPages() ? 'pages' : 'articles'). '/' . $article->slug . '.html') }}" target="_blank" class="fa fa-globe user-url"></a>
					{{ $article->title }}					
				</td>
				<td>{{ $article->user->name }}</td>
				@if( ! isOnPages())
				<td>{{ $article->category ? $article->category->name : null }}</td>
				@endif
				<td>{{ $article->created_at }}</td>
				<td class="text-center">
					@if(isOnPages())
						<a href="{{ route('admin.pages.edit', $article->id) }}">Edit</a>
						&middot;
						@include('admin::partials.modal', ['data' => $article, 'name' => 'pages'])
					@else
						<a href="{{ route('admin.articles.edit', $article->id) }}">Edit</a>
						&middot;
						@include('admin::partials.modal', ['data' => $article, 'name' => 'articles'])
					@endif
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ pagination_links($articles) }}
	</div>
@stop