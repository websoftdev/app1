@extends('layouts.admin')


@section('content')

    <h1>Índice de publicaciones</h1>


    @if(count($posts))

        <table class="table table-striped">

            <thead>
            <tr>
                <th>Borrar</th>
                <th>Usuario</th>
                <th>category id</th>
                <th>photo id</th>
                <th>title</th>
                <th>body</th>
                <th>created at</th>
                <th>updated_at</th>

            </tr>
            </thead>

        @foreach($posts as $post)
                <tr>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id]]) !!}
                      <td>{!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}</td>
                    {!! Form::close() !!}
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category_id ? $post->category->name : "No category"}}</td>
                    <td><img height="50" width="50" src="{{$post->photo_id ? $post->photo->file  : "/images/x.jpg"}}"></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>

                </tr>


        @endforeach
        @else
        <div class="alert alert-warning">
            <h2>No hay posts por el momento</h2>
        </div>
    @endif

        </table>

@stop

