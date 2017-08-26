@extends('layouts.admin')
@section('content')
    <h2>Create Post</h2>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
{!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
    </div>
    <div class="form-group">
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        {{--<button type="submit" name="submit">Submit</button>--}}
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
    </div>



{!! Form::close() !!}
@endsection