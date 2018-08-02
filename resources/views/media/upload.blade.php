@extends('layouts.admin')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css"></link>
@stop


@section('content')

   <h2>Creacion de media</h2>

   {!! Form::open(['method'=>'POST', 'action'=>'MediaController@store','class'=>'dropzone']) !!}
   {!! Form::close() !!}

@stop

@section('scripts')


@stop