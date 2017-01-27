@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{ $article->title }}</h1>
    <article>
        {!! $article->body !!}
    </article>
        <div class="panel">
        <a href="{{ url('/articles') }}">Back to Articles</a>
        </div>
        <div class="panel">
        @if(Auth::user()->name && Auth::id() === $article->user_id)
            <a href="{{ url('/articles' . $article->id . '/edit') }}">Edit Article</a>
        @endif
        </div>
    </div>
@stop