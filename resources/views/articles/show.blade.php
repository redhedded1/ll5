@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{ $article->title }}</h1>
        <h4>by {{ $article->user->name }}</h4>
        <h5>on {{ $article->published_at->toFormattedDateString() }}</h5>
    <article>
        {!! $article->body !!}
    </article>
        <div class="panel">
        <a href="{{ url('/articles') }}">Back to Articles</a>
        </div>
        @if(Auth::user() && Auth::id() === $article->user_id)
        <div class="panel">
            <a href="{{ url(route('articles.edit', ['article' => $article] )) }}">Edit Article</a>
        </div>
        <div class="panel">
            <a href="{{ url(route('articles.destroy', ['article' => $article])) }}">Delete Article</a>
        </div>
        @endif
    </div>
@stop