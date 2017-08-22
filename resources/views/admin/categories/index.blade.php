@extends('layouts.admin')
@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif


    <h2>Posts</h2>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th><i class="fa fa-edit fa-fw"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
               {{-- <td>{{$category->created_at->diffForhumans()}}</td>
                <td>{{$category->updated_at->diffForhumans()}}</td>--}}
                <td><a href="{{route('admin.categories.edit',$category->id)}}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>

@endsection

