@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-body">
                  <h2>{{ $post->title }}</h2>
                  <p>{{ $post->body }}</p>
                </div>

            </div>

          @guest
            <h2>Debes estar registrado para comentar</h2>
            <a class="btn btn-primary" href="{{ route('register') }}">Registrarse</a>
          @else
            <h4>Déjanos tu comentario</h4>

            @if($errors->isNotEmpty())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </div>
            @endif

            <div class="card mb-5">
              <div class="card-body">
                <form action="{{ route('comment.store', $post) }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <textarea name="message" rows="8" cols="80" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

              </div>
            </div>

          @endif

            <h3 class="mt-5">Comentarios</h3>

            @if($comments->isNotEmpty())

              @foreach($comments as $comment)
                <div class="card my-3">
                  <div class="card-header">{{ $comment->user->name }}</div>
                  <div class="card-body">
                    <p> {{ $comment->message }} </p>
                    @php($date = new \Carbon\Carbon($comment->created_at))
                    <small>Comentado el {{ $date->format('d-m-Y') }}</small>
                  </div>
                </div>
              @endforeach

            @else
              <div class="card my-2">
                <div class="card-body">
                  <p> Sin comentarios </p>
                </div>
              </div>

          @endif
        </div>
    </div>
</div>
@endsection
