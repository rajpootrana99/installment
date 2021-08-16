@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Warehouses</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Warehouses</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-4">Warehouses
                            <a href="" data-toggle="modal" data-target="#addWarehouse" id="addWarehouseButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Warehouse </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
                                    <th width="3%"><i class="fa fa-edit"></i></th>
                                    <th width="3%"><i class="fa fa-trash"></i></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addWarehouse" tabindex="-1" role="dialog" aria-labelledby="addWarehouseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addWarehouseLabel">Warehouse</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addWarehouseForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Warehouse Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Name" id="name">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div>

    <div class="modal fade" id="editWarehouse" tabindex="-1" role="dialog" aria-labelledby="editWarehouseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editWarehouseLabel">Warehouse</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editWarehouseForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="warehouse_id" name="warehouse_id">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Warehouse Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Name" id="edit_name">
                                    <span class="text-danger error-text name_update_error"></span>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div>

    <div class="modal fade" id="deleteWarehouse" tabindex="-1" role="dialog" aria-labelledby="deleteWarehouseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteWarehouseLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteWarehouseForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="warehouse_id" name="warehouse_id">
                            <p class="mb-4">Are you sure want to delete?</p>
                        </div><!--end row-->
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div>

    <script>
        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            fetchWarehouses();

            function fetchWarehouses()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchWarehouses",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.warehouses, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var warehouse_id = $(this).val();
                $('#deleteWarehouse').modal('show');
                $('#warehouse_id').val(warehouse_id)
            });

            $(document).on('submit', '#deleteWarehouseForm', function (e) {
                e.preventDefault();
                var warehouse_id = $('#warehouse_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'warehouse/'+warehouse_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteWarehouse').modal('hide');
                        }
                        else {
                            fetchWarehouses();
                            $('#deleteWarehouse').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var warehouse_id = $(this).val();
                $('#editWarehouse').modal('show');
                $.ajax({
                    type: "GET",
                    url: 'warehouse/'+warehouse_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                            $('#editWarehouse').modal('hide');
                        }
                        else {
                            $('#warehouse_id').val(response.warehouse.id);
                            $('#edit_name').val(response.warehouse.name);
                        }
                    }
                });
            });

            $(document).on('submit', '#editWarehouseForm', function (e) {
                e.preventDefault();
                var warehouse_id = $('#warehouse_id').val();
                let EditFormData = new FormData($('#editWarehouseForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "warehouse/"+warehouse_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editWarehouse').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editWarehouseForm')[0].reset();
                            $('#editWarehouse').modal('hide');
                            fetchWarehouses();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editWarehouse').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addWarehouseForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addWarehouseForm')[0]);
                $.ajax({
                    type: "post",
                    url: "warehouse",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addWarehouse').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addWarehouseForm')[0].reset();
                            $('#addWarehouse').modal('hide')
                            fetchWarehouses()
                        }
                    },
                    error: function (error){
                        $('#addWarehouse').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
