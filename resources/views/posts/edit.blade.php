@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          @if($errors->any())
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </div>
          @endif


          {!! Form::model($post, ['route' => ['posts.update', $post->id],
            'method' => 'PUT']) !!}
            @include('posts.partials.form')
          {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
