@extends('layouts.app')

@section('content')
<div class="container">

    @if($errors->isNotEmpty())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
          {!! Form::open(['route' => 'posts.store']) !!}
              @include('posts.partials.form')
          {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
