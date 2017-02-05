@extends('layouts.app')

@section('content')
    <header class="intro-header" style="background-image: url('/img/create.png')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Larablog</h1>
                        <hr class="small">
                        <span class="subheading">Create New Article</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="container">

<h1>Write a New Article</h1>
<hr>
{!! Form::model($article = new \App\Article, ['action' => 'ArticlesController@store', 'files' => true]) !!}
@include('partials._form', ['submitButton' => 'Add Article'])
{!! Form::close() !!}
@include('errors._form')
@stop
</div>