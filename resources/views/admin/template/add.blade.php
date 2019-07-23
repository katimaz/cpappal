@extends('layouts.content')

@section('css')
    @parent
    <link href="{{ asset('vendor/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
    <style>
        .droplist-style{
            color: #6e707e !important;
            background-color: #fff !important;
            background-clip: padding-box !important;
            border: 1px solid #d1d3e2 !important;
            border-radius: 0.35rem !important;
        }
        .non-display{
            display:none;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/bootstrap-select/bootstrap-select.min.js')}}" defer></script>
    <script>
        var x = 1;
        var i = 1;
        var y = 1;
    </script>
    <script src="{{ asset('js/order.js')}}"></script>
@stop

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Create Template</h1>
        <p class="mb-4"></p>

        <form method="POST" action="{{route('template.create')}}">
            @csrf
            <h1 class="h4 mb-2 text-gray-600">Template</h1>
            <p class="mb-4"></p>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="template_name" id="template_name" placeholder="Enter Template Name" required>
                    <label for="template_name" class="input-label">Template Name</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="input-material form-control" id="template_remark" name="template_remark" placeholder="Enter Template Remark" required>
                    <label for="template_remark" class="input-label">Template Remark</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <select id="invoice-type-select" class="selectpicker show-tick form-control" data-size="5" data-style="droplist-style" title="Choose one of the invoice type..." name="invoice_type">
                        @foreach($order_types as $order_type)
                            @if($order_type->value == "S")
                                <option value="{{$order_type->value}}" selected>{{$order_type->name}}</option>
                            @else
                                <option value="{{$order_type->value}}">{{$order_type->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <br/>
            <h1 class="h4 mb-2 text-gray-600">Customer</h1>
            <p class="mb-4"></p>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select id="customer-select"class="selectpicker show-tick form-control" data-size="5" data-style="droplist-style" data-live-search="true" title="Choose one of the customer..." name="customer_id">
                        @foreach($customers as $customer)
                            <option customer_country_name="{{$customer->country_name}}" customer_name="{{$customer->name}}" customer_address="{{$customer->address}}" customer_delivery_address="{{$customer->delivery_address}}" customer_phone="{{$customer->phone}}" customer_remark="{{$customer->remark}}" value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select id="country-select"class="selectpicker show-tick form-control" data-size="5" data-style="droplist-style" data-live-search="true" title="Choose one of the country..." name="customer_country_name">
                        @foreach($countries as $country)
                            <option value="{{$country->name}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="customer_name" id="customer_name" placeholder="Enter Name">
                    <label for="customer_name" class="input-label">Customer Name</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="input-material form-control" id="customer_phone" name="customer_phone" placeholder="Enter Phone">
                    <label for="customer_phone" class="input-label">Customer Phone</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="input-material form-control" id="customer_address" name="customer_address" placeholder="Enter Address">
                <label for="customer_address" class="input-label">Customer Address</label>
            </div>
            <div class="form-group" style="margin-bottom: 0rem">
                <input type="text" class="input-material form-control" id="customer_delivery_address" name="customer_delivery_address" placeholder="Enter Delivery Address">
                <label for="customer_delivery_address" class="input-label">Customer Delivery Address</label>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="same_address_check">
                    <label class="custom-control-label" for="same_address_check">Same as address</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="input-material form-control" id="customer_remark" name="customer_remark" placeholder="Enter Remark">
                <label for="customer_remark" class="input-label">Customer Remark</label>
            </div>
            <br/>
            <h1 class="h4 mb-2 text-gray-600">Products</h1>
            <p class="mb-4"></p>
            <a id="add" style="margin-bottom: 20px;color: white;cursor: pointer" class="btn btn-xs btn-primary"><i class="fas fa-fw fa-plus-circle"></i></a>
            <a id="minus" style="margin-bottom: 20px;color: white;cursor: pointer;display:none;" class="btn btn-xs btn-danger"><i class="fas fa-fw fa-minus-circle"></i></a>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select id="category-select" class="category-select select selectpicker show-tick form-control" data-size="5" data-style="droplist-style" data-live-search="true" data-show-subtext="true" required>
                        <option value="" selected disabled hidden>Choose one of the category...</option>
                        @foreach($categories as $category)
                            <option category_id="{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select id="product-select" class="product-select select selectpicker show-tick form-control" data-size="5" data-style="droplist-style" data-live-search="true" data-show-subtext="true" required>
                        <option value="" selected disabled hidden>Choose one of the product...</option>
                    </select>
                </div>
            </div>
            <div id="add_product" class="add_product">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0" style="display: none">
                        <input type="text" class="input-material form-control" id="product_id" name="product_id[]">
                        <!--product_id must be first one-->
                        <input type="text" class="input-material form-control" id="ui_product_id" name="ui_product_id[]" value="1">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="input-material form-control" id="product_name" name="product_name[]" placeholder="Enter Product Name" required>
                        <label for="product_name" class="input-label">Product Name</label>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="input-material form-control" id="product_model_no" name="product_model_no[]" placeholder="Enter Model Number">
                        <label for="product_model_no" class="input-label">Product Model Name</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="input-material form-control product-price" id="product_price" name="product_price[]" placeholder="Enter Price" required>
                        <label for="product_price" class="input-label">Product Price</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="input-material form-control product-price" min="1" id="product_quantity" name="product_quantity[]" placeholder="Enter Quantity Name" value="1" required>
                        <label for="quantity" class="input-label">Quantity</label>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="input-material form-control total-price" id="product_total_price" name="product_total_price[]" placeholder="Enter Total Price">
                        <label for="product_total_price" class="input-label">Product Total Price</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        <input type="text" class="input-material form-control" id="product_serial_no" name="product_serial_no[]" placeholder="Enter Product Serial Number">
                        <label for="product_serial_no" class="input-label">Product Serial Number</label>
                    </div>
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        <input type="text" class="input-material form-control" id="product_remark" name="product_remark[]" placeholder="Enter Product Remark">
                        <label for="product_remark" class="input-label">Product Remark</label>
                    </div>
                    <div class="col-sm-2">
                        <a id="insert_sub_product" style="margin-bottom: 20px;color: white;cursor: pointer" class="insert_sub_product btn btn-xs btn-primary"><i class="fas fa-fw fa-plus-circle"></i></a>
                        <a id="minus_sub_product" style="margin-bottom: 20px;color: white;cursor: pointer;display:none;" class="minus_sub_product btn btn-xs btn-danger"><i class="fas fa-fw fa-minus-circle"></i></a>
                    </div>
                </div>
            </div>
            <hr/>
            <a class="rounded" style="display: inline;right: 4rem;bottom: 1rem;width: 15rem;position: fixed;height: 2.75rem;text-align: center;color: #fff;line-height: 46px;">
                <label class="input-material form-control" id="sum_total_price" style="color: red;">$ 0</label>
                <input type="hidden" class="input-material form-control" id="order_total_price" name="order_total_price">
            </a>
            <button type="submit" class="btn btn-primary btn-block">
                Create
            </button>
        </form>
        <div id="add_sub_product" class="non-display">
            <div class="form-group row">
                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                </div>
                <div class="col-4 col-sm-4 mb-3 mb-sm-0" style="display: none">
                    <input type="text" class="input-material form-control" id="sub_product_id" name="sub_product_id[]">
                    <!--sub_product_id must be first one-->
                    <input type="text" class="input-material form-control" id="ui_sub_product_id" name="ui_sub_product_id[]">
                </div>
                <div class="col-4 col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_name" name="sub_product_name[]" placeholder="Enter Product Name" required>
                    <label for="sub_product_name" class="input-label">Sub Product Name</label>
                </div>
                <div class="col-3 col-sm-3 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_model_no" name="sub_product_model_no[]" placeholder="Enter Model Number">
                    <label for="sub_product_model_no" class="input-label">Sub Product Model Name</label>
                </div>
                <div class="col-3 col-sm-3">
                    <input type="text" class="input-material form-control product-price" id="sub_product_price" name="sub_product_price[]" placeholder="Enter Price" required>
                    <label for="sub_product_price" class="input-label">Sub Product Price</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control product-price" min="1" id="sub_product_quantity" name="sub_product_quantity[]" placeholder="Enter Quantity Name" value="1" required>
                    <label for="sub_product_quantity" class="input-label">Quantity</label>
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control total-price" id="sub_product_total_price" name="sub_product_total_price[]" placeholder="Enter Total Price">
                    <label for="sub_product_total_price" class="input-label">Sub Product Total Price</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_serial_no" name="sub_product_serial_no[]" placeholder="Enter Product Serial Number">
                    <label for="sub_product_serial_no" class="input-label">Sub Product Serial Number</label>
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_remark" name="sub_product_remark[]" placeholder="Enter Product Remark">
                    <label for="sub_product_remark" class="input-label">Sub Product Remark</label>
                </div>
            </div>
        </div>
    </div>
@endsection
