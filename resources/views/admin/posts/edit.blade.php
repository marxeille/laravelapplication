@extends('layouts.admin')
@section('content')
    <h2>Edit Post: {{$post->title}}</h2>
    <div class="col-md-3">
        <img src="{{$post->photo?$post->photo->path:'/images/noavatar.jpg'}}" alt="" class="img-responsive img-rounded">
    </div>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    <div class="col-md-9">
    {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true],$post) !!}

    {{--<input name="_token" type="hidden" value="{{csrf_token()}}">--}}
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','File') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Content') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Submit',['class'=>'btn btn-primary col-sm-6']) !!}
    </div>



    {!! Form::close() !!}

    {!! Form::model($post,['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
    {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])  !!}
    {!! Form::close() !!}
    </div>
@endsection