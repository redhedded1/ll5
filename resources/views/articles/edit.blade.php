@extends('layouts.app')

@section('content')
    <h1>Edit: {!! $article->title !!}</h1>
    <hr>
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
    @include('partials._form', ['submitButton' => 'Update Article'] )
    {!! Form::close() !!}
    @include('errors._form')
@stop