<div class="col-md-8 col-md-offset-2">
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body']) !!}
</div>
<div class="form-group">
    {!! Form::label('excerpt', 'Excerpt:') !!}
    {!! Form::text('excerpt', null, ['class' => 'form-control truncate', 'id' => 'excerpt']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Publish on:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-2 col-md-offset-10">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
</div>