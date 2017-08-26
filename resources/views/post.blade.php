@extends('layouts.blog-post')
@section('content')
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">{{$post->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{$post->photo->path}}" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{$post->body}}</p>
            <hr>

            <!-- Blog Comments -->
            @if(Auth::check())
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store','files'=>true]) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                        {!! Form::label('body','Comment') !!}
                        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                    </div>
                <div class="form-group">
                        {{--<button type="submit" name="submit">Submit</button>--}}
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            @endif
            <hr>

            <!-- Posted Comments -->
            @if(count($post->comments)>0)
            <!-- Comment -->
            @foreach($post->comments as $comment)
                @if($comment->is_active == 1)
                <div class="media">
                <a class="pull-left" href="#">
                    <img width="64px" height="64px" class="media-object" src="{{$post->user->photo?$post->user->photo->path:'/images/noavatar.jpg'}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForhumans()}}</small>
                    </h4>
                    {{$comment->body}}
                <!-- Nested Comment -->
                @

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>


                <!-- End Nested Comment -->


                <!--Repiles Form-->
                {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@CreateReply']) !!}
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <div class="form-group">
                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>



                {!! Form::close() !!}
                </div>

            </div>
                @endif
            @endforeach
            @endif
            <!-- Comment -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4" style="float: right">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->
@endsection