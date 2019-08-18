@extends('layouts.content')

@section('js')

@stop

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{__('country.edit.title')}}</h1>
        <p class="mb-4"></p>
        <form method="POST" action="{{route('country.update')}}">
            @csrf
            <div class="form-group row">
                <input type="hidden" class="form-control" name="id" value="{{$country->id}}">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="name" id="name" placeholder="Enter Country Name" value="{{$country->name}}" required>
                    <label for="name" class="input-label">{{__('country.name')}}</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                {{__('country.edit')}}
            </button>
        </form>
    </div>
@endsection
