@extends('layouts.admin')

@section('content')

    <h1>Users list</h1>



     <table class="table table-striped">

         <thead>
           <tr>
               <th>Id</th>
               <th>Photo</th>
               <th>Name</th>
             <th>E-mail</th>
               <th>Role</th>
             <th>Status</th>
               <th>Fecha de creación</th>

           </tr>
         </thead>

         @if($users)

         @foreach($users as $user)
         <body>
           <tr>
               <td>{{$user->id}}</td>
               <td><img height="50" width="50" src="{{$user->photo ? $user->photo->file : "No user photo"}}"></td>
               <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
             <td>{{$user->email}}</td>
               <td>{{$user->role->name}}</td>
             {{--<td>@if($user->is_active==1)--}}
                     {{--Activo--}}
                     {{--@else--}}
                     {{--Inactivo--}}
                 {{--@endif--}}
             {{--</td>--}}
               <td>{{$user->is_active == 1 ?'Activo':'Inactivo'}}</td>
               <td>{{$user->created_at->format('d M Y').' ('.$user->created_at->diffForHumans().')'}}</td>
           </tr>
         </body>
             @endforeach

             @endif
       </table>



    @stop