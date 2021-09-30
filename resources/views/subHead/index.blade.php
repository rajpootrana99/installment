@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Sub Heads</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Heads</a></li>
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
                        <div class="card-title mt-4">Sub Heads
                            <a href="" data-toggle="modal" data-target="#addSubHead" id="addSubHeadButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Sub Head </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%">Serial Code</th>
                                    <th width="20%">Head</th>
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
    <div class="modal fade" id="addSubHead" tabindex="-1" role="dialog" aria-labelledby="addSubHeadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addSubHeadLabel">Sub Head</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addSubHeadForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="serial_code" class="col-form-label text-right">Serial Code</label>
                                    <input class="form-control" type="text" name="serial_code" id="serial_code" readonly>
                                    <span class="text-danger error-text serial_code_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="serial_code" class="col-form-label text-right">Select Head</label>
                                    <select name="head_id" id="head_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text head_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Name</label>
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

    <div class="modal fade" id="editSubHead" tabindex="-1" role="dialog" aria-labelledby="editSubHeadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editSubHeadLabel">Sub Head</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editSubHeadForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="sub_head_id" name="sub_head_id">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="serial_code" class="col-form-label text-right">Serial Code</label>
                                    <input class="form-control" type="text" name="serial_code" id="edit_serial_code" readonly>
                                    <span class="text-danger error-text serial_code_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="serial_code" class="col-form-label text-right">Select Head</label>
                                    <select name="head_id" id="edit_head_id" class="form-control edit_head_id">

                                    </select>
                                    <span class="text-danger error-text head_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Name</label>
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

    <div class="modal fade" id="deleteSubHead" tabindex="-1" role="dialog" aria-labelledby="deleteSubHeadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteSubHeadLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteSubHeadForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="sub_head_id" name="sub_head_id">
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

            fetchSubHeads();

            function pad(number, length) {

                var str = '' + number;
                while (str.length < length) {
                    str = '0' + str;
                }

                return str;

            }

            function fetchSubHeads()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchSubHeads",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.subHeads, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.serial_code+'</td>\
                            <td>'+item.head.name+'</td>\
                            <td>'+item.name+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '#addSubHeadButton', function (e) {
                e.preventDefault();
                $('#addSubHead').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: 'get',
                    url: 'subHead/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addSubHead').modal('hide');
                        }
                        else {
                            var head_id = $('#head_id');
                            $('#head_id').children().remove().end()
                            $.each(response.heads, function (head) {
                                head_id.append($("<option />").val(response.heads[head].id).text(response.heads[head].name));
                            });
                            $('#serial_code').val(pad(response.serial_code,2));
                        }
                    }
                });
            })

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var sub_head_id = $(this).val();
                $('#deleteSubHead').modal('show');
                $('#sub_head_id').val(sub_head_id)
            });

            $(document).on('submit', '#deleteSubHeadForm', function (e) {
                e.preventDefault();
                var sub_head_id = $('#sub_head_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'subHead/'+sub_head_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteSubHead').modal('hide');
                        }
                        else {
                            fetchSubHeads();
                            $('#deleteSubHead').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var sub_head_id = $(this).val();
                $('#editSubHead').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'subHead/'+sub_head_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editSubHead').modal('hide');
                        }
                        else {
                            var head_id = $('#edit_head_id');
                            $('#edit_head_id').children().remove().end()
                            $.each(response.heads, function (head) {
                                head_id.append($("<option />").val(response.heads[head].id).text(response.heads[head].name));
                            });
                            $('#sub_head_id').val(response.subHead.id);
                            $('#edit_name').val(response.subHead.name);
                            $('#edit_serial_code').val(response.subHead.serial_code);
                            $('#edit_head_id').val(response.subHead.head_id).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editSubHeadForm', function (e) {
                e.preventDefault();
                var sub_head_id = $('#sub_head_id').val();
                let EditFormData = new FormData($('#editSubHeadForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "subHead/"+sub_head_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editSubHead').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editSubHeadForm')[0].reset();
                            $('#editSubHead').modal('hide');
                            fetchSubHeads();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editSubHead').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addSubHeadForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addSubHeadForm')[0]);
                $.ajax({
                    type: "post",
                    url: "subHead",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addSubHead').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addSubHeadForm')[0].reset();
                            $('#addSubHead').modal('hide')
                            fetchSubHeads()
                        }
                    },
                    error: function (error){
                        $('#addSubHead').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
