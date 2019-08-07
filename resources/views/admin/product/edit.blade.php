@extends('layouts.content')

@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/datepicker/datepicker.min.css')}}" rel="stylesheet">
<style>
    @media only screen and (min-width: 575px)  {
        .separate{
            position: absolute;
            bottom: 0;
            right: 0;
        }
    }

    table.dataTable tbody>tr.selected,
    table.dataTable tbody>tr>.selected {
        background-color: #A2D3F6;
    }

    div.datepicker-container { z-index: 1100 !important; }

</style>
@stop

@section('js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}" defer></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" defer></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js" defer></script>
    <script src="{{ asset('vendor/datatables/dataTables.editor.js')}}" defer></script>
    <script src="{{ asset('vendor/datepicker/datepicker.min.js')}}" ></script>

    <script>
        var editor; // use a global for the submit and return data rendering in the examples

        $(document).ready(function(){

            var dataSet = [
                ["2011-04-25", "Tiger Nixon", "$320,800", "5421"],
                ["Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750"],
                ["Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000"],
                ["Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060"],
                ["Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700"],
                ["Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000"],
                ["Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500"],
                ["Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900"],
                ["Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500"],
                ["Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600"],
                ["Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", "$90,560"],
                ["Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013/03/03", "$342,000"],
                ["Charde Marshall", "Regional Director", "San Francisco", "6741", "2008/10/16", "$470,600"],
                ["Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012/12/18", "$313,500"],
                ["Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010/03/17", "$385,750"],
                ["Michael Silva", "Marketing Designer", "London", "1581", "2012/11/27", "$198,500"],
                ["Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010/06/09", "$725,000"],
                ["Gloria Little", "Systems Administrator", "New York", "1721", "2009/04/10", "$237,500"],
                ["Bradley Greer", "Software Engineer", "London", "2558", "2012/10/13", "$132,000"],
                ["Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012/09/26", "$217,500"],
                ["Jenette Caldwell", "Development Lead", "New York", "1937", "2011/09/03", "$345,000"],
                ["Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009/06/25", "$675,000"],
                ["Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011/12/12", "$106,450"],
                ["Doris Wilder", "Sales Assistant", "Sidney", "3023", "2010/09/20", "$85,600"],
                ["Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009/10/09", "$1,200,000"],
                ["Gavin Joyce", "Developer", "Edinburgh", "8822", "2010/12/22", "$92,575"],
                ["Jennifer Chang", "Regional Director", "Singapore", "9239", "2010/11/14", "$357,650"],
                ["Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011/06/07", "$206,850"],
                ["Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010/03/11", "$850,000"],
                ["Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011/08/14", "$163,000"],
                ["Michelle House", "Integration Specialist", "Sidney", "2769", "2011/06/02", "$95,400"],
                ["Suki Burks", "Developer", "London", "6832", "2009/10/22", "$114,500"],
                ["Prescott Bartlett", "Technical Author", "London", "3606", "2011/05/07", "$145,000"],
                ["Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008/10/26", "$235,500"],
                ["Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011/03/09", "$324,050"],
                ["Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675"]
            ];

            var columnDefs = [{
                title: "Purchase Date",
                id: "purchase_date"
            }, {
                title: "Company Name",
                id: "company_name"
            }, {
                title: "Price",
                id: "price"
            }, {
                title: "Quantity",
                id: "quantity"
            }];

            $('#dataTable').DataTable({
                "searching": false,
                data: dataSet,
                columns: columnDefs,
                dom: 'Bfrtip',        // Needs button container
                select: 'single',
                responsive: true,
                altEditor: true,     // Enable altEditor
                buttons: [
                    {
                        text: 'Add',
                        name: 'add'        // do not change name
                    },
                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Edit',
                        name: 'edit'        // do not change name
                    },
                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Delete',
                        name: 'delete'      // do not change name
                    }]
            });
        });

    </script>
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
        <br/>
        <div class="container">
            <table class="dataTable table table-striped" id="dataTable"></table>
        </div>
    </div>
@endsection
