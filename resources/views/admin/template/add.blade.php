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

        $('#same_address_check').click(function() {
            if ($(this).is(':checked')) {
                $('#customer_delivery_address').val($('#customer_address').val());
                $('#customer_delivery_address').prop('readonly', true);
            }else{
                $('#customer_delivery_address').prop('readonly', false);
            }
        });

        $('#customer-select').on('changed.bs.select', function (e) {
            $('#customer_name').val($(this).find("option:selected").attr('customer_name'));
            $('#customer_phone').val($(this).find("option:selected").attr('customer_phone'));
            $('#customer_address').val($(this).find("option:selected").attr('customer_address'));
            $('#customer_delivery_address').val($(this).find("option:selected").attr('customer_delivery_address'));
            $('#customer_remark').val($(this).find("option:selected").attr('customer_remark'));
            $('#country-select').selectpicker('val',$(this).find("option:selected").attr('customer_country_name'));
        });

        var x = 1;
        $(document).on('click', '.insert_sub_product', function(e) {
            $(this).next('a').show();
            var add_sub_product = $('#add_sub_product').clone().attr('id',"add_sub_product"+x);
            add_sub_product.removeClass('non-display');

            var product_id = $(this).closest('div.form-group').prev().prev().find('div').first().find('input').last().val()

            add_sub_product.find('#ui_sub_product_id').attr('value',product_id);
            add_sub_product.find('#sub_product_name').next().attr('for','sub_product_name'+x);
            add_sub_product.find('#sub_product_name').attr('id', 'sub_product_name'+x);

            add_sub_product.find('#sub_product_model_no').next().attr('for','sub_product_model_no'+x);
            add_sub_product.find('#sub_product_model_no').attr('id', 'sub_product_model_no'+x);

            add_sub_product.find('#sub_product_price').next().attr('for','sub_product_price'+x);
            add_sub_product.find('#sub_product_price').attr('id', 'sub_product_price'+x);

            add_sub_product.find('#sub_product_id').next().attr('for','sub_product_id'+x);
            add_sub_product.find('#sub_product_id').attr('id', 'sub_product_id'+x);

            add_sub_product.find('#sub_product_quantity').next().attr('for','sub_product_quantity'+x);
            add_sub_product.find('#sub_product_quantity').attr('id', 'sub_product_quantity'+x);

            add_sub_product.find('#sub_product_total_price').next().attr('for','sub_product_total_price'+x);
            add_sub_product.find('#sub_product_total_price').attr('id', 'sub_product_total_price'+x);

            add_sub_product.find('#sub_product_serial_no').next().attr('for','sub_product_serial_no'+x);
            add_sub_product.find('#sub_product_serial_no').attr('id', 'sub_product_serial_no'+x);

            add_sub_product.find('#sub_product_remark').next().attr('for','sub_product_remark'+x);
            add_sub_product.find('#sub_product_remark').attr('id', 'sub_product_remark'+x);
            x++;

            $(this).closest('div.add_product').after(add_sub_product);

            var clone = $("#product-select").clone().attr('id','sub-product-select').addClass('sub-product-select').removeClass('product-select').prop('required',true);

            var formDiv = document.createElement('div');
            formDiv.className = 'form-group row';
            var innerDiv = document.createElement('div');
            innerDiv.className = 'col-sm-2 mb-3 mb-sm-0';
            formDiv.appendChild(innerDiv);
            var secondinnerDiv = document.createElement('div');
            secondinnerDiv.className = 'col-sm-10 mb-3 mb-sm-0';
            formDiv.appendChild(secondinnerDiv);

            $(this).closest('div.add_product').after(formDiv);
            $(this).closest('div.add_product').next('div').find('.col-sm-10').append(clone);

            $('.sub-product-select').selectpicker("render");
        });

        var i = 1;
        $("#add").click(function () {
            $('#minus').show();
            var add_product = $('#add_product').clone().attr('id',"add_product"+i);

            add_product.find('#minus_sub_product').hide();
            add_product.find('#ui_product_id').attr('value',i+1);

            add_product.find('#product_name').val('');
            add_product.find('#product_name').next().attr('for','product_name'+i);
            add_product.find('#product_name').attr('id', 'product_name'+i);

            add_product.find('#product_model_no').val('');
            add_product.find('#product_model_no').next().attr('for','product_model_no'+i);
            add_product.find('#product_model_no').attr('id', 'product_model_no'+i);

            add_product.find('#product_price').val('');
            add_product.find('#product_price').next().attr('for','product_price'+i);
            add_product.find('#product_price').attr('id', 'product_price'+i);

            add_product.find('#product_id').val('');
            add_product.find('#product_id').next().attr('for','product_id'+i);
            add_product.find('#product_id').attr('id', 'product_id'+i);

            add_product.find('#product_quantity').val('1');
            add_product.find('#product_quantity').next().attr('for','product_quantity'+i);
            add_product.find('#product_quantity').attr('id', 'product_quantity'+i);


            add_product.find('#product_total_price').val('');
            add_product.find('#product_total_price').next().attr('for','product_total_price'+i);
            add_product.find('#product_total_price').attr('id', 'product_total_price'+i);

            add_product.find('#product_serial_no').val('');
            add_product.find('#product_serial_no').next().attr('for','product_serial_no'+i);
            add_product.find('#product_serial_no').attr('id', 'product_serial_no'+i);

            add_product.find('#product_remark').val('');
            add_product.find('#product_remark').next().attr('for','product_remark'+i);
            add_product.find('#product_remark').attr('id', 'product_remark'+i);

            add_product.insertAfter('#minus');

            var clone = $("#product-select").clone();

            var formDiv = document.createElement('div');
            formDiv.className = 'form-group row';
            var innerDiv = document.createElement('div');
            innerDiv.className = 'col-sm-12 mb-3 mb-sm-0';
            formDiv.appendChild(innerDiv);

            $('#minus').after(formDiv);
            $('#minus').next('div').find('.col-sm-12').append(clone);

            $('.product-select').selectpicker("render");
            i = i + 1;
        });

        $(document).on('change', '.product-select', function(e) {
            input_element = '';
            for(j = 0 ;j < 4;j++){
                if(j==0){
                    input_element =$(this).closest('div.form-group').next("div").find('input:text').first();
                }else{
                    input_element = input_element.closest('div.col-sm-4').next("div").find('input').first();
                }
                input_element.val($(this).find("option:selected").attr(input_element.attr("name").substr(0,input_element.attr("name").length-2)));

                if(j == 3){
                    $(this).closest('div.form-group').next("div").find("div.form-group").first().next("div").find("div.col-sm-6").next().find('input').first().val($(this).find("option:selected").attr(input_element.attr("name").substr(0,input_element.attr("name").length-2)));
                    $('#sum_total_price').text('$ '+sum_price());
                    $('#order_total_price').val(sum_price());
                }
            }
        });

        $(document).on('change', '.sub-product-select', function(e) {
            input_element = '';
            for(k = 0 ;k < 4;k++){
                if(k==0){
                    input_element =$(this).closest('div.form-group').next("div").find('input:text').first();
                }else if(k==3){
                    input_element = input_element.closest('div.col-sm-3').next("div").find('input').first();
                }else{
                    input_element = input_element.closest('div.col-sm-4').next("div").find('input').first();
                }
                input_element.val($(this).find("option:selected").attr(input_element.attr("name").substr(4,input_element.attr("name").length-6)));
                if(k == 3){
                    $(this).closest('div.form-group').next("div").find("div.form-group").first().next("div").find("div.col-5").next().find('input').first().val($(this).find("option:selected").attr(input_element.attr("name").substr(4,input_element.attr("name").length-6)));
                    $('#sum_total_price').text('$ '+sum_price());
                    $('#order_total_price').val(sum_price());
                }
            }
        });

        $(document).on('keypress keyup blur', ".product-price", function(event) {
//            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 45 || event.which > 57)) {
                event.preventDefault();
            }
            if($(this).attr('id').indexOf('product_quantity') != "-1"){
                price = $(this).closest('div.form-group').prev().find('div').last().find('input').first().val();
                quantity = $(this).val().replace(/[^\d].+/, "")
                $(this).closest('div').next("div").find('input').first().val(price*quantity);
            }

            if($(this).attr('id').indexOf('product_price') != "-1"){
                quantity = $(this).closest('div.form-group').next().find('div').find('input').first().val();
                price = $(this).val().replace(/[^\d].+/, "")
                $(this).closest('div.form-group').next().find('div').last().find('input').first().val(price*quantity);
            }
            $('#sum_total_price').text('$ '+sum_price());
            $('#order_total_price').val(sum_price());
        });

        $(document).on('keypress keyup blur', ".total-price", function(event) {
//            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 45 || event.which > 57)) {
                event.preventDefault();
            }

            $('#sum_total_price').text('$ '+sum_price());
            $('#order_total_price').val(sum_price());
        });

        $('#minus').click(function() {
            i--;
            $(this).next('div').remove();
            $(this).next('div').remove();

            var subproduct = true;
            while(subproduct){
                if(typeof $(this).next('div').find('div.col-sm-2').attr('class') === "undefined"){
                    subproduct = false;
                }else{
                    $(this).next('div').remove();
                    $(this).next('div').remove();
                }
            }
            if(i==1){
                $('#minus').hide();
            }
        });

        $(document).on('click', '.minus_sub_product', function(e) {
            $(this).closest('div.form-group').parent().next().remove();
            $(this).closest('div.form-group').parent().next().remove();
            if(typeof $(this).closest('div.form-group').parent().next().find('div.col-sm-2').attr('class') === "undefined"){
                $(this).hide();
            }
        });

        function sum_price(){
            var sum = 0;
            $('.total-price').each(function() {
                sum += Number($(this).val());
            });
            return sum.toFixed(2);
        }
    </script>
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
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <select id="product-select" class="product-select select selectpicker show-tick form-control" data-size="5" data-style="droplist-style" data-live-search="true" data-show-subtext="true" required>
                        <option value="" selected disabled hidden>Choose one of the product...</option>
                           @foreach($products as $product)
                            <option product_id="{{$product->id}}" product_name="{{$product->name}}" product_model_no="{{$product->model_no}}" product_price="{{$product->price}}" value="{{$product->id}}" data-subtext="{{$product->category_name}}">{{$product->name}}</option>
                        @endforeach
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
