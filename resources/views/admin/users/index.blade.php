@extends('layouts.admin')
@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif


<h2>Users</h2>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Permission</th>
            <th>Active</th>
            <th>Created at</th>
            <th><i class="fa fa-edit fa-fw"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td><img height="50px" width="50px" src="{{$user->photo ? $user->photo->path :'No user photo'}}"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
            <td>{{$user->created_at->diffForhumans()}}</td>
            <td><a href="{{route('admin.users.edit',$user->id)}}">Edit</a></td>
          </tr>
        @endforeach
        </tbody>
    </table>
@endsection

