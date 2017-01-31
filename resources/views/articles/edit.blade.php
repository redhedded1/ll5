@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Edit: {!! $article->title !!}</h1>
    <hr>
    </div>
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
    @include('partials._form', ['submitButton' => 'Update Article'] )
    {!! Form::close() !!}
    @include('errors._form')
@stop