@extends('layouts.admin')
@section('content')
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Path</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @if($photos)
    @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td><img width="100px" height="100px" src="{{$photo->path}}" alt=""></td>
        <td>{{$photo->created_at->diffForHumans()}}</td>
        <td>{{$photo->updated_at->diffForHumans()}}</td>
        <td>
            {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger'])  !!}
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    {{$photos->links()}}
@endsection