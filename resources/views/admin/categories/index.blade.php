@extends('layouts.admin')

@section('content')

    <h2>Categorias</h2>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">

            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name', null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
         {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>


    <div class="col-sm-6">


    @if(count($categories)>0)

        <table class="table table-striped">

            <thead>

                <tr>
                    <th>Eliminar</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha de creación</th>
                </tr>

            </thead>


                        @foreach($categories as $category)
                                <tr>

                                    <div class="form-group">
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
                                        <td>{!! Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}</td>
                                        {!! Form::close() !!}
                                    </div>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('cat.edit',$category->id)}}">{{$category->name}}</a></td>
                                    <td>{{$category->created_at}}</td>
                                </tr>
                        @endforeach

        </table>
    @endif

    </div>

@stop