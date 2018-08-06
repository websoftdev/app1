@extends('layouts.admin')


@section('content')

    <h2>Comentarios</h2>

    @if(count($comments)>0)



    <table class = "table">

        <thead>
            <tr>
                <th>author</th>
                <th>email</th>
                <th>body</th>
                <th>Post</th>
                <th>Aprovacion</th>
            </tr>
        </thead>

        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">Ir a post</a></td>


                <td>

                    @if($comment->is_active == 1)

                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Descartar', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}

                    @else

                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                        <input type="hidden" name="is_active" value="1">
                        {!! Form::submit('Aceptar', ['class'=>'btn btn-success']) !!}
                        {!! Form::close() !!}

                    @endif


                </td>

                <td>

                    {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                    {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}


                </td>


            </tr>
        @endforeach

    </table>

        @else

        <h1 class="text-center">No comments</h1>
    @endif

@stop