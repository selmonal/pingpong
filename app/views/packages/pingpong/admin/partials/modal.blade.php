<a data-toggle="modal" href="#modal-delete-{{ $data->id }}">
  Устгах
</a>
<div id="modal-delete-{{ $data->id }}" class="modal text-left fade">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['method' => 'DELETE', 'route' => ["admin.$name.destroy", $data->id]])}}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1 class="modal-title">Өгөгдөр устгах</h1>
      </div>
      <div class="modal-body">
        <p>
          Та устгахдаа итгэлтэй байна уу?
        </p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Тийм</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Үгүй</button>
      </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->