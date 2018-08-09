@extends('layouts.admin')

@section('content')
@if($photos)

    <form action ="/delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}

        <div class="form-group">
            <select name="checkBoxArray" class="form-control">
                <option value="delete">Delete</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn-primary">
        </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Borrar</th>
                <th>Id</th>
                <th>Imagen</th>
            </tr>
        </thead>

        @foreach($photos as $photo)
            <tr>
                <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>

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
@endif
    @stop
    </form>
