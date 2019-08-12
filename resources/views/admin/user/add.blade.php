@extends('layouts.content')

@section('js')

@stop

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Create User</h1>
        <p class="mb-4"></p>

        <form class="user" method="POST" action="{{route('user.create')}}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="name" id="name" placeholder="Enter Name" required>
                    <label for="name" class="input-label">Name</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="input-material form-control" id="email" name="email" placeholder="Enter Email" required>
                    <label for="code" class="input-label">Email</label>
                </div>
                <div class="col-sm-4">
                    <input type="password" class="input-material form-control" id="password" name="password" placeholder="Enter password" required>
                    <label for="password" class="input-label">Password</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Create
            </button>
        </form>
    </div>
@endsection
