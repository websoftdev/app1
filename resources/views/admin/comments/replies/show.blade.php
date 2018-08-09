@extends('layouts.admin')


@section('content')

    <h2>Replicas</h2>

    @if(count($replies)>0)



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

            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">Ir a replicas</a></td>


                    <td>

                        @if($reply->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Descartar', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Aceptar', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}

                        @endif


                    </td>

                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
                        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}


                    </td>


                </tr>
            @endforeach

        </table>

    @else

        <h1 class="text-center">No replies</h1>
    @endif

@stop