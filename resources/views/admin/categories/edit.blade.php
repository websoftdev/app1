@extends('layouts.admin')

@section('content')

    <h2>Categorias</h2>

    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">

            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name', null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>



@stop