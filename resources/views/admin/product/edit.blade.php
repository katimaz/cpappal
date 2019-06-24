@extends('layouts.content')

@section('css')
<style>
    @media only screen and (min-width: 575px)  {
        .separate{
            position: absolute;
            bottom: 0;
            right: 0;
        }
    }
</style>
@stop

@section('js')

@stop

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>
        <p class="mb-4"></p>

        <form method="POST" action="{{route('product.update')}}">
            @csrf
            <div class="form-group row">
                <input type="hidden" class="form-control" name="id" value="{{$product->id}}">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <select class="selectpicker show-tick form-control" data-size="5" data-style="droplist-style" data-live-search="true" title="Choose one of the category..." name="category_id">
                        @foreach($categories as $category)
                            @if($product->category_id == $category->id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="name" id="name" placeholder="Enter Product Name" value="{{$product->name}}" required>
                    <label for="name" class="input-label">Product Name</label>
                </div>
                <div class="col-sm-5">
                    <input type="number" class="input-material form-control" id="price" name="price" placeholder="Enter Price" value="{{$product->price}}" required>
                    <label for="price" class="input-label">Price</label>
                </div>
                <div class="col-sm-2 mb-2 mb-sm-0 separate">
                    <div class="custom-control custom-checkbox">
                        @if(is_null($product->sale_check))
                            <input type="checkbox" class="custom-control-input" id="sale_check" name="sale_check" value="Y">
                        @else
                            <input type="checkbox" class="custom-control-input" id="sale_check" name="sale_check" value="{{$product->sale_check}}" checked>
                        @endif
                        <label class="custom-control-label" for="sale_check">Sale Check</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="model_no" name="model_no" placeholder="Enter Model Number" value="{{$product->model_no}}">
                    <label for="model_no" class="input-label">Model No</label>
                </div>
                <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="number" class="input-material form-control" id="maintenance_period" name="maintenance_period" placeholder="Enter Maintenance Period (Month)" value="{{$product->maintenance_period}}">
                    <label for="maintenance_period" class="input-label">Maintenance Period (Month)</label>
                </div>
                <div class="col-sm-2 mb-2 mb-sm-0 separate">
                    <div class="custom-control custom-checkbox">
                        @if(is_null($product->device_check))
                            <input type="checkbox" class="custom-control-input" id="device_check" name="device_check" value="Y">
                        @else
                            <input type="checkbox" class="custom-control-input" id="device_check" name="device_check" value="{{$product->device_check}}" checked>
                        @endif
                        <label class="custom-control-label" for="device_check">Device Check</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Edit
            </button>
        </form>
    </div>
@endsection
