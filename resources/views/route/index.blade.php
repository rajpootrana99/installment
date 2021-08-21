@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Routes</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Routes</a></li>
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
                        <div class="card-title mt-4">Routes
                            <a href="" data-toggle="modal" data-target="#addRoute" id="addRouteButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Route </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Route Name</th>
                                    <th>Area Name</th>
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
    <div class="modal fade" id="addRoute" tabindex="-1" role="dialog" aria-labelledby="addRouteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addRouteLabel">Route</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addRouteForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Route Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Route Name" id="name">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="area_id" class="col-form-label text-right">Select Area</label>
                                    <select class="select2 mb-3 select2-multiple" name="area_id[]" id="area_id" style="width: 100%; height:36px;" data-placeholder="Select Areas" multiple="multiple">

                                    </select>
                                    <span class="text-danger error-text area_id_error"></span>
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

    <div class="modal fade" id="editRoute" tabindex="-1" role="dialog" aria-labelledby="editRouteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editRouteLabel">Route</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editRouteForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="route_id" name="route_id">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Area Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Name" id="edit_name">
                                    <span class="text-danger error-text name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="area_id" class="col-form-label text-right">Select Area</label>
                                    <select class="select2 mb-3 select2-multiple" name="area_id[]" id="edit_area_id" style="width: 100%; height:36px;" data-placeholder="Select Areas" multiple="multiple">

                                    </select>
                                    <span class="text-danger error-text area_id_update_error"></span>
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

    <div class="modal fade" id="deleteRoute" tabindex="-1" role="dialog" aria-labelledby="deleteRouteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteRouteLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteRouteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="route_id" name="route_id">
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

            fetchRoutes();

            function fetchRoutes()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchRoutes",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.routes, function (key, item) {
                            var area = item.areas;
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.areas+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '#addRouteButton', function (e) {
                e.preventDefault();
                $('#addRoute').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: 'get',
                    url: 'route/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addRoute').modal('hide');
                        }
                        else {
                            var area_id = $('#area_id');
                            $('#area_id').children().remove().end()
                            $.each(response.areas, function (area) {
                                area_id.append($("<option />").val(response.areas[area].id).text(response.areas[area].name));
                            });
                        }
                    }
                });
            })

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var route_id = $(this).val();
                $('#deleteRoute').modal('show');
                $('#route_id').val(route_id)
            });

            $(document).on('submit', '#deleteRouteForm', function (e) {
                e.preventDefault();
                var route_id = $('#route_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'route/'+route_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteRoute').modal('hide');
                        }
                        else {
                            $('#deleteRoute').modal('hide');
                            fetchRoutes();
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var route_id = $(this).val();
                $('#editRoute').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'route/'+route_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editRoute').modal('hide');
                        }
                        else {
                            var area_id = $('#edit_area_id');
                            $('#edit_area_id').children().remove().end()
                            $.each(response.areas, function (area) {
                                area_id.append($("<option />").val(response.areas[area].id).text(response.areas[area].name));
                            });
                            $('#route_id').val(response.route.id);
                            $('#edit_name').val(response.route.name);
                            var options = new Array();
                            $.each(response.route.areas, function (key, area) {
                                options[key] = area.id;
                            });
                            $('#edit_area_id').val(options);
                        }
                    }
                });
            });

            $(document).on('submit', '#editRouteForm', function (e) {
                e.preventDefault();
                var route_id = $('#route_id').val();
                let EditFormData = new FormData($('#editRouteForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "route/"+route_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editRoute').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editRouteForm')[0].reset();
                            $('#editRoute').modal('hide');
                            fetchRoutes();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editRoute').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addRouteForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addRouteForm')[0]);
                $.ajax({
                    type: "post",
                    url: "route",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addRoute').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addRouteForm')[0].reset();
                            $('#addRoute').modal('hide')
                            fetchRoutes()
                        }
                    },
                    error: function (error){
                        $('#addRoute').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
