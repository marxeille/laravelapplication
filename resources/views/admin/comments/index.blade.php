@extends('layouts.admin')
@section('content')
    <h1>Comments</h1>

    @if(count($comments) > 0)
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Post</th>
        <th>User</th>
        <th>Body</th>
        <th>Replies</th>
        <th>Approve</th>
        <th>Delete</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
      @foreach($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td><a href="{{route('home.post',$comment->post_id)}}">{{$comment->post->title}}</a> </td>
        <td>{{$comment->author}}</td>
        <td>{{str_limit($comment->body,2)}}</td>
        <td><a href="{{route('admin.comment.replies.show',$comment->id)}}">View replies</a></td>
        <td>
            @if($comment->is_active == 1)
                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}

                    <input name="is_active" type="hidden" value="0" id="comment_id">

                    <div class="form-group">
                        {!! Form::submit('Un-Approve',['class'=>'btn btn-danger','id'=>'updateComment']) !!}
                    </div>


                {!! Form::close() !!}
                @else
                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}

                <input name="is_active" type="hidden" value="1" id="comment_id">

                <div class="form-group">
                    {!! Form::submit('Approve',['class'=>'btn btn-success','id'=>'updateComment']) !!}
                </div>


                {!! Form::close() !!}
            @endif



        </td>

        <td>

          {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
          {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])  !!}
          {!! Form::close() !!}

        </td>
        <td>{{$comment->created_at->diffforHumans()}}</td>
        <td>{{$comment->updated_at->diffforHumans()}}</td>
      </tr>
      @endforeach
    </tbody>
    </table>
        {{$comments->links()}}
        @else
        <h2 class="text-center">No comment</h2>
    @endif
@endsection

@section('script')
    <script type="text/javascript">
        $("document").ready(function() {

        });
    </script>
@endsection