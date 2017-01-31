@extends('layouts.app')

@section('content')
<div class="container">
<h1>Write a New Article</h1>
<hr>
{!! Form::model([$article = new \App\Article, 'action' => 'ArticlesController@store']) !!}
@include('partials._form', ['submitButton' => 'Add Article'])
{!! Form::close() !!}
@include('errors._form')
@stop
</div>