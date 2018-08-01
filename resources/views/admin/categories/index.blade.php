@extends('layouts.admin')

@section('content')

    <h2>Categorias</h2>

    <div class="col-sm-6">



    </div>


    <div class="col-sm-6">


    @if(count($categories)>0)

        <table class="table table-striped">

            <thead>

                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha de creación</th>
                </tr>

            </thead>


                        @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                </tr>
                        @endforeach

        </table>
    @endif

    </div>

@stop