@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Articles</h1>
    @if(Request::url() === route('articlesTagged', basename(Request::url())))
        <h1>Tagged: {{ basename(Request::url()) }}</h1>
    @endif
        <hr />
    @foreach ($articles as $article)
            <article>
            <h2>
                <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
                <p class="small">by {{ $article->user->name }}</p>
                @if ( Request::url() === route('unpublished'))
                    <p class="small">{{ Carbon\Carbon::now()->addDays(Carbon\Carbon::now()->diffInDays($article->published_at))->diffForHumans() }} </p>
                @else
		            <?php $diff = Carbon\Carbon::today()->diffInDays($article->published_at);  ?>
                    @if ( $diff === 0)
                        <p class="small">Today</p>
                    @else
                        <p class="small">{{ $article->published_at->diffForHumans() }}</p>
                    @endif
                @endif
            </h2>
            <div class="body">
                {{ $article->excerpt }}
            </div>
        </article>
    @endforeach
    </div>
@stop