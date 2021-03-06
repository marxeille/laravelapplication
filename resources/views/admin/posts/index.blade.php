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
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th>Photos</th>
            <th>User</th>
            <th>Comments</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th><i class="fa fa-edit fa-fw"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{route('home.post',$post->id)}}">{{$post->title}}</a></td>
                <td>{{str_limit($post->body,2)}}</td>
                <td>{{$post->category ? $post->category->name : 'Belong to nothing'}}</td>
                <td><img height="100px" width="100px" src="{{$post->photo ? $post->photo->path :'No user photo'}}"></td>
                <td>{{$post->user->name}}</td>
                <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td>{{$post->updated_at->diffForhumans()}}</td>
                <td><a href="{{route('admin.posts.edit',$post->id)}}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $posts->links() !!}
@endsection

