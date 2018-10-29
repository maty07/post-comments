<div class="form-group">
  {{ Form::label('title', 'Ingrese titulo') }}
  {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
  {{ Form::label('body', 'Contenido del post') }}
  {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>
{{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
