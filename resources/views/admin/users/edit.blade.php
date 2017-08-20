@extends('layouts.admin')
@section('content')
    <h2>Edit User</h2>
    <div class="col-md-3">
        <img src="{{$user->photo?$user->photo->path:'/images/noavatar.jpg'}}" alt="" class="img-responsive img-rounded">
    </div>

    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    <div class="col-md-9">
    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true],$user) !!}

    {{--<input name="_token" type="hidden" value="{{csrf_token()}}">--}}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active','Status') !!}
        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','File') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit',['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

        {!! Form::close() !!}


        {!! Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
        {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])  !!}
        {!! Form::close() !!}


    </div>
@endsection