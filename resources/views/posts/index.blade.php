@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Fecha Publicación</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                    <tr>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->user->name }}</td>
                      <td>{{ $post->created_at }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
