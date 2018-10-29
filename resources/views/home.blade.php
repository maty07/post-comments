@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @foreach($posts as $post)
            <div class="card my-4">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                  <small>Publicado el {{ $post->created_at->format('d-m-Y') }}</small>
                  <p>{{ str_limit($post->body, 200) }}</p>
                  <a class="btn btn-sm btn-primary float-right" href="{{ route('posts.show', $post) }}">Leer  más</a>
                </div>
            </div>
          @endforeach
          {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
