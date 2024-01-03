@extends('layouts.app')




@section('content')


<div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <h4>Create Permission</h4>
                </div>
                <div class="card-body">
                    <form action="/store-permission" method="POST" >
                        @csrf

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection