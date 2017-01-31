@extends('layouts.app')

@section('content')

    <div class="container">

    <h1>{{ $article->title }}</h1>
        <h4>by {{ $article->user->name }}</h4>
        <h5>on {{ $article->published_at->toFormattedDateString() }}</h5>
    <article>
        {!! $article->body !!}
    </article>
        @unless ($article->tags->isEmpty())
            <h5>Tags:</h5>
        <ul>
            @foreach ($article->tags as $tag)
                <li>{!! link_to_action('TagsController@showTaggedArticles', $tag->name, $tag->name) !!}</li>
            @endforeach
        </ul>
        @endunless
        <div class="panel">
        <a href="{{ url('/articles') }}">Back to Articles</a>
        </div>
        @if(Auth::user() && Auth::id() === $article->user_id)
        <div class="panel">
            <a class="btn btn-default" href="{{ url(route('articles.edit', ['article' => $article] )) }}">Edit Article</a>

            {{ Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->id], 'class' => 'pull-right']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'name' => 'delete_article']) }}
            {{ Form::close() }}
        </div>
        @endif
        @include('partials.deleteModal')
    </div>

@stop