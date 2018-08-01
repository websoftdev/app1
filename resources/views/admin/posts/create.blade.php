@extends('layouts.admin')


@section('content')

    <h1>Crear un post</h1>
<div class="row">
    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('title','Titulo') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('category_id','Categoria') !!}
        {!! Form::select('category_id',[''=>'Elegir categoria']+$categories, null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Foto') !!}
        {!! Form::file('photo_id') !!}
    </div>


    <div class="form-group">
        {!! Form::label('body','Contenido') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}
</div>

    <div class="row">
        @include('includes.errors')
    </div>

@stop

