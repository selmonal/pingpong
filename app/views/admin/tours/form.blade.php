@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.tours.update', $model->id]]) }}
@else
{{ Form::open(['files' => true, 'route' => 'admin.tours.store']) }}
@endif
	<div class="form-group">
		{{ Form::label('name', 'Нэр:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		{{ $errors->first('name', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('tour_category_id', 'Ангилал:') }}
		{{ Form::select('tour_category_id', $categories, null, ['class' => 'form-control']) }}
		{{ $errors->first('tour_category_id', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('start_date', 'Үргэлжлэх хугацаа:') }}
		<div class="row">
			<div class="col-lg-6">
				{{ Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'Эхлэх огноо']) }}
				{{ $errors->first('start_date', '<div class="text-danger">:message</div>') }}
			</div>
			<div class="col-lg-6">
				{{ Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'Дуусах огноо']) }}
				{{ $errors->first('end_date', '<div class="text-danger">:message</div>') }}
			</div>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('price', 'Үнэ:') }}
		{{ Form::number('price', null, ['class' => 'form-control']) }}
		{{ $errors->first('price', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('like_count', 'Таалагдсан тоо:') }}
		{{ Form::number('like_count', null, ['class' => 'form-control']) }}
		{{ $errors->first('like_count', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('image', 'Зураг:') }}
		{{ Form::file('image', ['class' => 'form-control']) }}
		{{ $errors->first('image', '<div class="text-danger">:message</div>') }}
	</div>
	@if(isset($model))
	<div class="form-group">
		@if($model->image)
		<img class="img-responsive" src="{{ asset('images/articles/' . $model->image) }}">
		@endif
	</div>
	@endif
	<div class="form-group">
		{{ Form::label('description', 'Тайлбар:') }}
		{{ Form::textarea('description', null, ['class' => 'form-control custom-ckeditor', 'id' => 'description']) }}
		{{ $errors->first('description', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('itinerary', 'Аялалын хөтөлбөр /Itinerary/:') }}
		{{ Form::textarea('itinerary', null, ['class' => 'form-control custom-ckeditor', 'id' => 'itinerary']) }}
		{{ $errors->first('itinerary', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('summary', 'Хураангуй:') }}
		{{ Form::textarea('summary', null, ['class' => 'form-control custom-ckeditor', 'id' => 'summary']) }}
		{{ $errors->first('summary', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::label('media', 'Медиа:') }}
		{{ Form::textarea('media', null, ['class' => 'form-control custom-ckeditor', 'id' => 'media']) }}
		{{ $errors->first('media', '<div class="text-danger">:message</div>') }}
	</div>
	<div class="form-group">
		{{ Form::submit(isset($model) ? 'Шинэчлэх' : 'Хадгалах', ['class' => 'btn btn-primary']) }}
	</div>
{{ Form::close() }}

@section('script')
	
	{{ script('vendor/ckeditor/ckeditor.js') }}
	{{ script('vendor/ckfinder/ckfinder.js') }}
	
	<script type="text/javascript">
		CKEDITOR.editorConfig = function( config ) {
			var prefix = '/{{ option("ckfinder.prefix") }}';

		   config.filebrowserBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html';
		   config.filebrowserImageBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html?type=Images';
		   config.filebrowserFlashBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html?type=Flash';
		   config.filebrowserUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
		   config.filebrowserImageUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
		   config.filebrowserFlashUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
		};

		var textareas = document.getElementsByClassName('custom-ckeditor');
		for(var i in textareas) {
			var editor = CKEDITOR.replace( textareas[i].id );
			var prefix = '/{{ option("ckfinder.prefix") }}';
			CKFinder.setupCKEditor( editor, prefix + '/vendor/ckfinder/') ;
		}
	</script>
@stop