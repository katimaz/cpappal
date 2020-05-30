@extends('layouts.content')

@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@stop

@section('js')
    @parent
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}" defer></script>

    <script>
        $(document).ready(function(){
            var locale = "{{ Session::get('locale')}}"
            if(locale == 'cn'){
                $langUrl = '/vendor/datatables/lang/chinese.json';
            }else{
                $langUrl = '/vendor/datatables/lang/english.json';
            }

            var table = $('#dataTable').DataTable({
                "scrollX": true,
                "ajax": "customer/getCustomers",
                "language": {
                    "url": $langUrl
                },
                "order": [] ,
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "address" },
                    { "data": "phone" },
                    { "data": "remark" },
                    { "data": "updated_by" },
                    { "data": "updated_at" },
                    {
                        "targets": -1,
                        "data": null,
                        "defaultContent": "<a style='margin: 2px' href='' class='btn btn-xs btn-primary edit'><i class='fas fa-fw fa-edit edit'></i></a><a style='margin: 2px' href id='' data-toggle='modal' data-target='#destoryModal' class='btn btn-xs btn-danger delete'><i class='fas fa-fw fa-trash'></i></a>"
                    }
                ]
            });

            $('#dataTable tbody').on('click', 'a.edit', function () {
                var data = table.row($(this).parents('tr')).data();
                $(this).attr("href", 'customer/edit/' + data['id']);
                $("a.edit").click();
            });

            $('#dataTable tbody').on('click', 'a.delete', function () {
                var data = table.row($(this).parents('tr')).data();
                $(this).attr("href", 'customer/edit/' + data['id']);
                $('#customer_id').val(data['id']);
            });

        });
    </script>
@stop

@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{__('customer.title')}}</h6>
                        </div>
                        <div class="card-body">
                            <a style="margin-bottom: 20px" href="{{route('customer.add')}}" class="btn btn-xs btn-success"><i class="fas fa-fw fa-plus-circle"></i></a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('customer.name')}}</th>
                                        <th>{{__('customer.address')}}</th>
                                        <th>{{__('customer.phone')}}</th>
                                        <th>{{__('customer.remark')}}</th>
                                        <th>{{__('customer.updated.by')}}</th>
                                        <th>{{__('customer.updated.time')}}</th>
                                        <th>{{__('customer.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('customer.name')}}</th>
                                        <th>{{__('customer.address')}}</th>
                                        <th>{{__('customer.phone')}}</th>
                                        <th>{{__('customer.remark')}}</th>
                                        <th>{{__('customer.updated.by')}}</th>
                                        <th>{{__('customer.updated.time')}}</th>
                                        <th>{{__('customer.action')}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="destoryModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__('customer.delete.title')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{__('customer.delete.description')}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('customer.close')}}</button>
                                <form method="post" action="{{route('customer.destroy')}}" class="inline">
                                    @csrf
                                    <input type="hidden" id="customer_id" name="id">
                                    <button type="submit" class="btn btn-danger">{{__('customer.yes')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
