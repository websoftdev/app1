@extends('layouts.admin')

@section('content')

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Borrar</th>
                <th>Id</th>
                <th>Imagen</th>
            </tr>
        </thead>

        @foreach($photos as $photo)
            <tr>
                <div class="form-group">
                    {!! Form::open(['method'=>'DELETE', 'action'=>['MediaController@destroy', $photo->id]]) !!}
                        <td>{!! Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}</td>
                    {!! Form::close() !!}
                </div>
                <td>{{$photo->id}}</td>
                <td><img height="100" width="100" src="{{$photo->file}}" class="img-responsive"></td>
                {{--<td>{{$photo->created_at}}</td>--}}
            </tr>
        @endforeach

    </table>

    @stop