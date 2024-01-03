@extends('layouts.app')




@section('content')

<div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <h4>Create User</h4>
                </div>
                <div class="card-body">
                    <form action="/store-user" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <strong>Role:</strong>
                                <select name="roles[]" class="form-control" required multiple>
                                    
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection