@extends('layouts.app')

@section('content')
    <header class="intro-header" style="background-image: url('/img/blog-header.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Larablog</h1>
                        <hr class="small">
                        <span class="subheading">A Blog built on Laravel Framework v5.3</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
    @include('vendor.flash.message')
    @if(Request::url() === route('articlesTagged', basename(Request::url())))
        <h1>Articles Tagged: {{ basename(Request::url()) }}</h1>
    @endif
        <hr />
    @foreach ($articles as $article)
            <article>
            <h2>
                <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
            </h2>
                <div class="body">
                    <p>{{ $article->excerpt }}</p>
                </div>
                @if ( Request::url() === route('unpublished'))
		            <?php $publish = Carbon\Carbon::now()->addDays(Carbon\Carbon::now()->diffInDays($article->published_at))->diffForHumans(); ?>
                @else
		            <?php $diff = Carbon\Carbon::today()->diffInDays($article->published_at);  ?>
                    @if ( $diff === 0)
			            <?php $publish = 'Today' ?>
                    @else
			            <?php $publish = $article->published_at->diffForHumans(); ?>
                    @endif
                @endif
                <p class="small">by {{ $article->user->name . ' ' . $publish }} </p>
        </article>
    @endforeach
    </div>
    <div class="text-center">
        {{ $articles->links() }}
    </div>
@stop