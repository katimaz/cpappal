@extends('layouts.content')

@section('js')

@stop

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{__('ordertype.edit.title')}}</h1>
        <p class="mb-4"></p>
        <form method="POST" action="{{route('ordertype.update')}}">
            @csrf
            <div class="form-group row">
                <input type="hidden" class="form-control" name="id" value="{{$ordertype->id}}">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="name" id="name" placeholder="Enter Name" value="{{$ordertype->name}}" required>
                    <label for="name" class="input-label">{{__('ordertype.name')}}</label>
                </div>
                <div class="col-sm-6">
                    @if($ordertype->value =="S")
                        <input type="text" class="input-material form-control" id="code" name="code" placeholder="Enter Code" value="{{$ordertype->value}}" required disabled>
                    @else
                        <input type="text" class="input-material form-control" id="code" name="code" placeholder="Enter Code" value="{{$ordertype->value}}" required>
                    @endif
                    <label for="code" class="input-label">{{__('ordertype.code')}}</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                {{__('ordertype.edit')}}
            </button>
        </form>
    </div>
@endsection
