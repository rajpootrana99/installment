@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Areas</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Areas</a></li>
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
                        <div class="card-title mt-4">Areas
                            <a href="" data-toggle="modal" data-target="#addArea" id="addAreaButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Area </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Area Name</th>
                                    <th>City Name</th>
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
    <div class="modal fade" id="addArea" tabindex="-1" role="dialog" aria-labelledby="addAreaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addAreaLabel">Area</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addAreaForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="city_id" class="col-form-label text-right">Select City</label>
                                    <select name="city_id" id="city_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text city_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Area Name</label>
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

    <div class="modal fade" id="editArea" tabindex="-1" role="dialog" aria-labelledby="editAreaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editAreaLabel">Area</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editAreaForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="area_id" name="area_id">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="city_id" class="col-form-label text-right">Select City</label>
                                    <select name="city_id" id="edit_city_id" class="form-control edit_city_id">

                                    </select>
                                    <span class="text-danger error-text city_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Area Name</label>
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

    <div class="modal fade" id="deleteArea" tabindex="-1" role="dialog" aria-labelledby="deleteAreaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteAreaLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteAreaForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="area_id" name="area_id">
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

            fetchAreas();

            function fetchAreas()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchAreas",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.areas, function (key, item) {
                            console.log(response.sites);
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.city.name+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '#addAreaButton', function (e) {
                e.preventDefault();
                $('#addArea').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: 'get',
                    url: 'area/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addArea').modal('hide');
                        }
                        else {
                            var city_id = $('#city_id');
                            $('#city_id').children().remove().end()
                            $.each(response.cities, function (city) {
                                city_id.append($("<option />").val(response.cities[city].id).text(response.cities[city].name));
                            });
                        }
                    }
                });
            })

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var area_id = $(this).val();
                $('#deleteArea').modal('show');
                $('#area_id').val(area_id)
            });

            $(document).on('submit', '#deleteAreaForm', function (e) {
                e.preventDefault();
                var area_id = $('#area_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'area/'+area_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteArea').modal('hide');
                        }
                        else {
                            fetchAreas();
                            $('#deleteArea').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var area_id = $(this).val();
                $('#editArea').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'area/'+area_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editArea').modal('hide');
                        }
                        else {
                            var city_id = $('#edit_city_id');
                            $('#edit_city_id').children().remove().end()
                            $.each(response.cities, function (city) {
                                city_id.append($("<option />").val(response.cities[city].id).text(response.cities[city].name));
                            });
                            $('#area_id').val(response.area.id);
                            $('#edit_name').val(response.area.name);
                            $('#edit_city_id').val(response.area.city_id).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editAreaForm', function (e) {
                e.preventDefault();
                var area_id = $('#area_id').val();
                let EditFormData = new FormData($('#editAreaForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "area/"+area_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editArea').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editAreaForm')[0].reset();
                            $('#editArea').modal('hide');
                            fetchAreas();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editArea').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addAreaForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addAreaForm')[0]);
                $.ajax({
                    type: "post",
                    url: "area",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addArea').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addAreaForm')[0].reset();
                            $('#addArea').modal('hide');
                            fetchAreas();
                        }
                    },
                    error: function (error){
                        $('#addArea').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
