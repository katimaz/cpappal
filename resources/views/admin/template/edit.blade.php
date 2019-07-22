@extends('layouts.content')

@section('css')
    @parent
    <link href="{{ asset('vendor/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
    <style>
        .droplist-style {
            color: #6e707e !important;
            background-color: #fff !important;
            background-clip: padding-box !important;
            border: 1px solid #d1d3e2 !important;
            border-radius: 0.35rem !important;
        }

        .non-display {
            display: none;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/bootstrap-select/bootstrap-select.min.js')}}" defer></script>
    <script>
        var x = {{count($orderSubProducts)+1}}
        var i = {{count($orders)}}
        var y = {{count($orders)}}
    </script>
    <script src="{{ asset('js/order.js')}}"></script>
@stop

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Template</h1>
        <p class="mb-4"></p>

        <form method="POST" action="{{route('template.update')}}">
            @csrf
            <h1 class="h4 mb-2 text-gray-600">Template</h1>
            <p class="mb-4"></p>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" name="template_name" id="template_name"
                           placeholder="Enter Template Name" value="{{$orders[0]->template_name}}" required>
                    <label for="template_name" class="input-label">Template Name</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="input-material form-control" id="template_remark" name="template_remark"
                           placeholder="Enter Template Remark" value="{{$orders[0]->template_remark}}" required>
                    <label for="template_remark" class="input-label">Template Remark</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <select id="invoice-type-select" class="selectpicker show-tick form-control" data-size="5"
                            data-style="droplist-style" title="Choose one of the invoice type..." name="invoice_type">
                        @foreach($order_types as $order_type)
                            @if($orders[0]->order_type == $order_type->value)
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
                    <select id="customer-select" class="selectpicker show-tick form-control" data-size="5"
                            data-style="droplist-style" data-live-search="true" title="Choose one of the customer..."
                            name="customer_id">
                        @foreach($customers as $customer)
                            @if($customer->id == $orders[0]->customer_id)
                                <option customer_country_name="{{$customer->country_name}}"
                                        customer_name="{{$customer->name}}" customer_address="{{$customer->address}}"
                                        customer_delivery_address="{{$customer->delivery_address}}"
                                        customer_phone="{{$customer->phone}}" customer_remark="{{$customer->remark}}"
                                        value="{{$customer->id}}" selected>{{$customer->name}}</option>
                            @else
                                <option customer_country_name="{{$customer->country_name}}"
                                        customer_name="{{$customer->name}}" customer_address="{{$customer->address}}"
                                        customer_delivery_address="{{$customer->delivery_address}}"
                                        customer_phone="{{$customer->phone}}" customer_remark="{{$customer->remark}}"
                                        value="{{$customer->id}}">{{$customer->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select id="country-select" class="selectpicker show-tick form-control" data-size="5"
                            data-style="droplist-style" data-live-search="true" title="Choose one of the country..."
                            name="customer_country_name">
                        @foreach($countries as $country)
                            @if($country->name == $orders[0]->customer_country_name)
                                <option value="{{$country->name}}" selected>{{$country->name}}</option>
                            @else
                                <option value="{{$country->name}}">{{$country->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="hidden" name="order_id" value="{{$orders[0]->ordersid}}">
                    <input type="text" class="input-material form-control" name="customer_name" id="customer_name"
                           placeholder="Enter Name" value="{{$orders[0]->customer_name}}">
                    <label for="customer_name" class="input-label">Customer Name</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="input-material form-control" id="customer_phone" name="customer_phone"
                           placeholder="Enter Phone" value="{{$orders[0]->customer_phone}}">
                    <label for="customer_phone" class="input-label">Customer Phone</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="input-material form-control" id="customer_address" name="customer_address"
                       placeholder="Enter Address" value="{{$orders[0]->customer_address}}">
                <label for="customer_address" class="input-label">Customer Address</label>
            </div>
            <div class="form-group" style="margin-bottom: 0rem">
                <input type="text" class="input-material form-control" id="customer_delivery_address"
                       name="customer_delivery_address" value="{{$orders[0]->customer_delivery_address}}"
                       placeholder="Enter Delivery Address">
                <label for="customer_delivery_address" class="input-label">Customer Delivery Address</label>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="same_address_check">
                    <label class="custom-control-label" for="same_address_check">Same as address</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="input-material form-control" id="customer_remark" name="customer_remark"
                       value="{{$orders[0]->customer_remark}}" placeholder="Enter Remark">
                <label for="customer_remark" class="input-label">Customer Remark</label>
            </div>
            <br/>
            <h1 class="h4 mb-2 text-gray-600">Products</h1>
            <p class="mb-4"></p>
            <a id="add" style="margin-bottom: 20px;color: white;cursor: pointer" class="btn btn-xs btn-primary"><i
                        class="fas fa-fw fa-plus-circle"></i></a>
            <a id="minus" style="margin-bottom: 20px;color: white;cursor: pointer;display:none;"
               class="btn btn-xs btn-danger"><i class="fas fa-fw fa-minus-circle"></i></a>
            @php
                $i = count($orders)-1
            @endphp
            @foreach($orders as $order)
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select id="category-select" class="category-select select selectpicker show-tick form-control"
                                data-size="5" data-style="droplist-style" data-live-search="true"
                                data-show-subtext="true">
                            <option value="" selected disabled hidden>Choose one of the category...</option>
                            @foreach($categories as $category)
                                @if($category->id == $order->product_category_id)
                                    <option category_id="{{$category->id}}" value="{{$category->id}}"
                                            selected>{{$category->name}}</option>
                                @else
                                    <option category_id="{{$category->id}}"
                                            value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select id="product-select" class="product-select select selectpicker show-tick form-control"
                                data-size="5" data-style="droplist-style" data-live-search="true"
                                data-show-subtext="true">
                            <option value="" selected disabled hidden>Choose one of the product...</option>
                            @foreach($products as $product)
                                @if($order->product_category_id == $product->product_category_id)
                                    @if($product->id == $order->product_id)
                                        <option product_id="{{$product->id}}" product_name="{{$product->name}}"
                                                product_model_no="{{$product->model_no}}"
                                                product_price="{{$product->price}}" value="{{$product->id}}"
                                                data-subtext="{{$product->category_name}}"
                                                selected>{{$product->name}}</option>
                                    @else
                                        <option product_id="{{$product->id}}" product_name="{{$product->name}}"
                                                product_model_no="{{$product->model_no}}"
                                                product_price="{{$product->price}}" value="{{$product->id}}"
                                                data-subtext="{{$product->category_name}}">{{$product->name}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="add_product{{$i==1?$i:''}}" class="add_product">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0" style="display: none">
                            <input type="text" class="input-material form-control" id="product_id" name="product_id[]"
                                   value="{{$order->product_id}}">
                            <!--product_id must be first one-->
                            <input type="text" class="input-material form-control" id="ui_product_id"
                                   name="ui_product_id[]" value="{{$i}}">

                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" class="input-material form-control" id="product_name{{$i==1?$i:''}}"
                                   name="product_name[]" placeholder="Enter Product Name"
                                   value="{{$order->product_name}}" required>
                            <label for="product_name{{$i==1?$i:''}}" class="input-label">Product Name</label>
                            <input type="hidden" id="order_productsid" name="order_productsid[]"
                                   value="{{$order->order_productsid}}">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" class="input-material form-control" id="product_model_no{{$i==1?$i:''}}"
                                   name="product_model_no[]" placeholder="Enter Model Number"
                                   value="{{$order->product_model_no}}">
                            <label for="product_model_no{{$i==1?$i:''}}" class="input-label">Product Model Name</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="input-material form-control product-price"
                                   id="product_price{{$i==1?$i:''}}" name="product_price[]" placeholder="Enter Price"
                                   value="{{$order->product_price}}" required>
                            <label for="product_price{{$i==1?$i:''}}" class="input-label">Product Price</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="input-material form-control product-price" min="1"
                                   id="product_quantity{{$i==1?$i:''}}" name="product_quantity[]"
                                   placeholder="Enter Quantity Name" value="{{$order->product_quantity}}" required>
                            <label for="quantity{{$i==1?$i:''}}" class="input-label">Quantity</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="input-material form-control total-price"
                                   id="product_total_price{{$i==1?$i:''}}" name="product_total_price[]"
                                   placeholder="Enter Total Price" value="{{$order->product_total_price}}">
                            <label for="product_total_price{{$i==1?$i:''}}" class="input-label">Product Total
                                Price</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="input-material form-control" id="product_serial_no{{$i==1?$i:''}}"
                                   name="product_serial_no[]" placeholder="Enter Product Serial Number"
                                   value="{{$order->product_serial_no}}">
                            <label for="product_serial_no{{$i==1?$i:''}}" class="input-label">Product Serial
                                Number</label>
                        </div>
                        <div class="col-sm-5 mb-3 mb-sm-0">
                            <input type="text" class="input-material form-control" id="product_remark{{$i==1?$i:''}}"
                                   name="product_remark[]" placeholder="Enter Product Remark"
                                   value="{{$order->product_remark}}">
                            <label for="product_remark{{$i==1?$i:''}}" class="input-label">Product Remark</label>
                        </div>
                        <div class="col-sm-1">
                            <a id="insert_sub_product" style="margin-bottom: 20px;color: white;cursor: pointer"
                               class="insert_sub_product btn btn-xs btn-primary"><i
                                        class="fas fa-fw fa-plus-circle"></i></a>
                            <a id="minus_sub_product"
                               style="margin-bottom: 20px;color: white;cursor: pointer;display:none;"
                               class="minus_sub_product btn btn-xs btn-danger" value="0"><i
                                        class="fas fa-fw fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>

                @php
                    $y = count($orderSubProducts);
                @endphp

                {{--@foreach($orderSubProducts as $orderSubProduct)--}}
                {{--@if($orderSubProduct->order_product_id == $order->order_productsid)--}}
                {{--@php--}}
                {{--$y++;--}}
                {{--@endphp--}}
                {{--@endif--}}
                {{--@endforeach--}}

                @foreach($orderSubProducts as $orderSubProduct)
                    @if($orderSubProduct->order_product_id == $order->order_productsid)
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0"></div>
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <select id="sub-category-select"
                                        class="sub-category-select select selectpicker show-tick form-control"
                                        data-size="5" data-style="droplist-style" data-live-search="true"
                                        data-show-subtext="true">
                                    <option value="" selected disabled hidden>Choose one of the category...</option>
                                    @foreach($categories as $category)
                                        @if($category->id == $orderSubProduct->sub_product_category_id)
                                            <option category_id="{{$category->id}}" value="{{$category->id}}"
                                                    selected>{{$category->name}}</option>
                                        @else
                                            <option category_id="{{$category->id}}"
                                                    value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <select id="sub-product-select"
                                        class="sub-product-select select selectpicker show-tick form-control"
                                        data-size="5" data-style="droplist-style" data-live-search="true"
                                        data-show-subtext="true">
                                    <option value="" selected disabled hidden>Choose one of the product...</option>
                                    @foreach($products as $product)
                                        @if($product->id == $orderSubProduct->sub_product_id)
                                            <option product_id="{{$product->id}}" product_name="{{$product->name}}"
                                                    product_model_no="{{$product->model_no}}"
                                                    product_price="{{$product->price}}" value="{{$product->id}}"
                                                    data-subtext="{{$product->category_name}}"
                                                    selected>{{$product->name}}</option>
                                        @else
                                            <option product_id="{{$product->id}}" product_name="{{$product->name}}"
                                                    product_model_no="{{$product->model_no}}"
                                                    product_price="{{$product->price}}" value="{{$product->id}}"
                                                    data-subtext="{{$product->category_name}}">{{$product->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="add_sub_product{{$y}}">
                            <div class="form-group row">
                                <div class="col-2 col-sm-2 mb-3 mb-sm-0"></div>
                                <div class="col-4 col-sm-4 mb-3 mb-sm-0" style="display: none">
                                    <input type="text" class="input-material form-control" id="sub_product_id"
                                           name="sub_product_id[]" value="{{$orderSubProduct->sub_product_id}}">
                                    <!--sub_product_id must be first one-->
                                    <input type="text" class="input-material form-control" id="ui_sub_product_id"
                                           name="ui_sub_product_id[]" value="{{$i}}">
                                </div>
                                <div class="col-4 col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="input-material form-control" id="sub_product_name{{$y}}"
                                           name="sub_product_name[]" placeholder="Enter Product Name"
                                           value="{{$orderSubProduct->sub_product_name}}" required>
                                    <label for="sub_product_name{{$y}}" class="input-label">Sub Product Name</label>
                                    <input type="hidden" id="sub_product_db_id" name="sub_product_db_id[]"
                                           value="{{$orderSubProduct->id}}">
                                </div>
                                <div class="col-3 col-sm-3 mb-3 mb-sm-0">
                                    <input type="text" class="input-material form-control"
                                           id="sub_product_model_no{{$y}}" name="sub_product_model_no[]"
                                           placeholder="Enter Model Number"
                                           value="{{$orderSubProduct->sub_product_model_no}}">
                                    <label for="sub_product_model_no{{$y}}" class="input-label">Sub Product Model
                                        Name</label>
                                </div>
                                <div class="col-3 col-sm-3">
                                    <input type="text" class="input-material form-control product-price"
                                           id="sub_product_price{{$y}}" name="sub_product_price[]"
                                           placeholder="Enter Price" value="{{$orderSubProduct->sub_product_price}}"
                                           required>
                                    <label for="sub_product_price{{$y}}" class="input-label">Sub Product Price</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                                </div>
                                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                                    <input type="text" class="input-material form-control product-price" min="1"
                                           id="sub_product_quantity{{$y}}" name="sub_product_quantity[]"
                                           placeholder="Enter Quantity Name"
                                           value="{{$orderSubProduct->sub_product_quantity}}" required>
                                    <label for="sub_product_quantity{{$y}}" class="input-label">Quantity</label>
                                </div>
                                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                                    <input type="text" class="input-material form-control total-price"
                                           id="sub_product_total_price{{$y}}" name="sub_product_total_price[]"
                                           placeholder="Enter Total Price"
                                           value="{{$orderSubProduct->sub_product_total_price}}">
                                    <label for="sub_product_total_price{{$y}}" class="input-label">Sub Product Total
                                        Price</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                                </div>
                                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                                    <input type="text" class="input-material form-control"
                                           id="sub_product_serial_no{{$y}}" name="sub_product_serial_no[]"
                                           placeholder="Enter Product Serial Number"
                                           value="{{$orderSubProduct->sub_product_serial_no}}">
                                    <label for="sub_product_serial_no{{$y}}" class="input-label">Sub Product Serial
                                        Number</label>
                                </div>
                                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                                    <input type="text" class="input-material form-control" id="sub_product_remark{{$y}}"
                                           name="sub_product_remark[]" placeholder="Enter Product Remark"
                                           value="{{$orderSubProduct->sub_product_remark}}">
                                    <label for="sub_product_remark{{$y}}" class="input-label">Sub Product Remark</label>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $y--;
                    @endphp
                @endforeach
                @php
                    $i++;
                @endphp
            @endforeach

            <hr/>
            <a class="rounded"
               style="display: inline;right: 4rem;bottom: 1rem;width: 15rem;position: fixed;height: 2.75rem;text-align: center;color: #fff;line-height: 46px;">
                <label class="input-material form-control" id="sum_total_price"
                       style="color: red;">$ {{$orders[0]->total_price}}</label>
                <input type="hidden" class="input-material form-control" id="order_total_price" name="order_total_price"
                       value="{{$orders[0]->total_price}}">
            </a>
            <button type="submit" class="btn btn-primary btn-block">
                Edit
            </button>
        </form>
        <div id="add_sub_product" class="non-display">
            <div class="form-group row">
                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                </div>
                <div class="col-4 col-sm-4 mb-3 mb-sm-0" style="display: none">
                    <input type="text" class="input-material form-control" id="sub_product_id" name="sub_product_id[]">
                    <!--sub_product_id must be first one-->
                    <input type="text" class="input-material form-control" id="ui_sub_product_id"
                           name="ui_sub_product_id[]">
                </div>
                <div class="col-4 col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_name"
                           name="sub_product_name[]" placeholder="Enter Product Name" required>
                    <label for="sub_product_name" class="input-label">Sub Product Name</label>
                    <input type="hidden" id="sub_product_db_id" name="sub_product_db_id[]" value="">
                </div>
                <div class="col-3 col-sm-3 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_model_no"
                           name="sub_product_model_no[]" placeholder="Enter Model Number">
                    <label for="sub_product_model_no" class="input-label">Sub Product Model Name</label>
                </div>
                <div class="col-3 col-sm-3">
                    <input type="text" class="input-material form-control product-price" id="sub_product_price"
                           name="sub_product_price[]" placeholder="Enter Price" required>
                    <label for="sub_product_price" class="input-label">Sub Product Price</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control product-price" min="1"
                           id="sub_product_quantity" name="sub_product_quantity[]" placeholder="Enter Quantity Name"
                           value="1" required>
                    <label for="sub_product_quantity" class="input-label">Quantity</label>
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control total-price" id="sub_product_total_price"
                           name="sub_product_total_price[]" placeholder="Enter Total Price">
                    <label for="sub_product_total_price" class="input-label">Sub Product Total Price</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2 col-sm-2 mb-3 mb-sm-0">
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_serial_no"
                           name="sub_product_serial_no[]" placeholder="Enter Product Serial Number">
                    <label for="sub_product_serial_no" class="input-label">Sub Product Serial Number</label>
                </div>
                <div class="col-5 col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="input-material form-control" id="sub_product_remark"
                           name="sub_product_remark[]" placeholder="Enter Product Remark">
                    <label for="sub_product_remark" class="input-label">Sub Product Remark</label>
                </div>
            </div>
        </div>
    </div>
@endsection