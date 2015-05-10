@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Санал хүсэлт
		&middot;
		<small>{{ link_to_route('admin.feedbacks.index', 'Буцах') }}</small>
	</h1>
@stop
@section('content')
	<div class="box-body no-padding">
		<div class="mailbox-read-info">
       		<h3>{{ $feedback->name }}</h3>
       		<span class="mailbox-read-time">{{ $feedback->created_at->diffForHumans() }}</span>
       		<h5>
       			{{ $feedback->email}}
       			<a title="Хариу илгээх" href="mailto:{{ $feedback->email }}"><i class="fa fa-reply"></i></a>
       		</h5>
       	</div>
	</div>
    <hr/>
    <div class="mailbox-read-message">{{ $feedback->message }}</div>

@stop