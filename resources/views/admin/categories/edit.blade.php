@extends('layouts.admin')
@section('content')
    <h2>Edit Category</h2>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif

    {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category],'files'=>true,$category]) !!}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {{--<button type="submit" name="submit">Submit</button>--}}
            {!! Form::submit('Submit',['class'=>'btn btn-primary col-md-6']) !!}
        </div>



    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
    {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])  !!}
    {!! Form::close() !!}
@endsection