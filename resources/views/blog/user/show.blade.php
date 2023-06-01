@extends('layout.main')
@section('content')
    @include('layout.adminnav')
    <div class="container">
        <div class="col-md-12">
            <h1>{{ $post->title }}</h1>
            <span>Submitted in {{ date('F j, Y, g:i a', strtotime($post->created_at)) }}</span>
            <p class="lead">
                {{ $post->body }}
            </p>
        </div>
    </div>
@stop
