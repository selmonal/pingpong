@extends('admin::layouts.master')

@section('content-header')
	<h1>
		Засах
		&middot;
		<small>{{ link_to_route('admin.settings.file_editor.index', 'Буцах') }}</small>
	</h1>
@stop
@section('content')
<div class="form-group">
	{{ Form::textarea('content', $content, ['id' => 'code-editor'])}}		
</div>
<div class="form-group">
	{{ Form::button('Хадгалах', ['class' => 'btn btn-primary btn-update'])}}
</div>
@stop

@section('script')
<link href="{{ admin_asset('adminlte/css/codemirror/codemirror.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ admin_asset('adminlte/js/plugins/codemirror/codemirror.js') }}" type="text/javascript" ></script>
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById('code-editor'), {
  		lineNumbers: true,
	  	mode: "text/html",
	  	matchBrackets: true,
	  	theme: '.cm-s-3024-day',
	  	height: '800'
  });
  editor.setSize(null, 700);

  $(document).ready(function() {
  	$('.btn-update').click(function() {
  		$.ajax({
  			type: 'POST',
  			data: { '_method' : 'PUT', 'content': editor.getValue() },
  			url: '{{ route('admin.settings.file_editor.update', urlencode($file['path'])) }}',
  			success: function() {
  				alert('Амжилттай хадгалагдлаа.');
  			},
  			error: function() {
  				alert('Хадгалахад алдаа гарлаа');
  			}
  		})
  	})
  });

</script>
@stop