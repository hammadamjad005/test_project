@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User
                        <a class="btn btn-danger float-right" href="{{ url('/add-user') }}">Create User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                   @if(hasRole('Admin'||'Super-Admin'))
                                   
                                   @if(hasPermission('user-delete'))
                                   <th width="280px">Action</th>
                                   @endif
                                   
                                   @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                        @if (!$loop->last)
                                        ,
                                        @endif
                                        @endforeach

                                    </td>
                                    @if (hasRole('Admin'||'Super-Admin'))
                                    @if(hasPermission('user-delete'))
                                    <td>
                                        
                                        <form action="{{ url('/delete-user', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                    @endif
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div>

                    </div>







                    @endsection