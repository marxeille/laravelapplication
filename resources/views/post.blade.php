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
                by <a href="">{{$post->user->name}}</a>
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
            @if(count($comments)>0)
            <!-- Comment -->
                @foreach($comments as $comment)

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
                            @if(count($comment->replies) >0)
                                @foreach($comment->replies as $reply)

                                    <div class="media" style="margin-top: 30px;">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" height="64px" width="64px" src="{{$reply->photo}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->author}}
                                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                            </h4>
                                            {{$reply->body}}
                                        </div>
                                    </div>
                            @endforeach
                        @endif
                        <!-- End Nested Comment -->
                            <div class="comment-reply-container">
                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                <div class="comment-reply">
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
                        </div>

                    </div>

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

@section('script')
    <script>
            $(".comment-reply-container .toggle-reply").click(function(){

                $(this).next().slideToggle("slow");

            });
    </script>
@endsection