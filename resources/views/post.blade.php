@extends('layouts.blog-post')

@section('content')

    <h2>Posts</h2>

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->format('d/m/Y')}} ({{$post->created_at->diffForHumans()}})</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    {{$post->body}}
    <hr>

    @if(Session::has('mensaje'))
        {{session('mensaje')}}
    @endif


    <!-- Blog Comments -->

    @if(Auth::check())

        djsid


    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
       {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

        <input type="hidden" name="post_id" value = {{$post->id}}>

        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Crear', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    @endif

    <hr>

    <!-- Posted Comments -->

    @if(count($comments) > 0)

    <!-- Comment -->

    @foreach($comments as $comment)

    <div class="media">
        <a class="pull-left" href="#">
            <img height ="50" width = "50" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at}}</small>
            </h4>
            <p>{{$comment->body}}</p>


            <div class="comment-reply-container">

                    <button class="toggle-reply btn btn-primary pull-right">Responder</button>

                    <div class="comment-reply">
                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                        <input type="hidden" name="comment_id" value = {{$comment->id}}>

                        <div class="form-group">
                            {!! Form::label('body', 'Replica')!!}
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Responder',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
            </div>

            @if(count($comment->replies)>0)

                @foreach($comment->replies as $reply)

                    @if($reply->is_active==1)


            <!-- Nested Comment -->
            <div class="nested-comment media">
                <a class="pull-left" href="#">
                    <img height="50" class="media-object" src="{{$reply->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at}}</small>
                    </h4>
                    {{$reply->body}}
                </div>


            </div>
            <!-- End Nested Comment -->
              @endif
             @endforeach
            @endif




        </div>
    </div>

    @endforeach

    @endif


    @section('side-bar')

        <ul class="list-unstyled">
            @foreach($categories as $category)
                <li><a href="#">{{$category->name}}</a></li>

            @endforeach
        </ul>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".toggle-reply").click(function(){
                $(".comment-reply").slideToggle();
           });
        });
    </script>
    @stop
