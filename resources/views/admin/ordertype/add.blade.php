@extends('layouts.content')

@section('js')

@stop

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Create Order Type</h1>
        <p class="mb-4"></p>

        <form class="user" method="POST" action="{{route('ordertype.create')}}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="name" id="name" placeholder="Enter Name" required>
                    <label for="name" class="input-label">Name</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="input-material form-control" id="code" name="code" placeholder="Enter Code" required>
                    <label for="code" class="input-label">Code</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Create
            </button>
        </form>
    </div>
@endsection
