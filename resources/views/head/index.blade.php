@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Heads</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Heads</a></li>
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
                        <div class="card-title mt-4">Heads
                            <a href="" data-toggle="modal" data-target="#addHead" id="addHeadButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Head </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%">Serial Code</th>
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
    <div class="modal fade" id="addHead" tabindex="-1" role="dialog" aria-labelledby="addHeadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addHeadLabel">Head</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addHeadForm">
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

    <div class="modal fade" id="editHead" tabindex="-1" role="dialog" aria-labelledby="editHeadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editHeadLabel">Head</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editHeadForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="head_id" name="head_id">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="serial_code" class="col-form-label text-right">Serial Code</label>
                                    <input class="form-control" type="text" name="serial_code" id="edit_serial_code" readonly>
                                    <span class="text-danger error-text serial_code_update_error"></span>
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

    <div class="modal fade" id="deleteHead" tabindex="-1" role="dialog" aria-labelledby="deleteHeadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteHeadLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteHeadForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="head_id" name="head_id">
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

            fetchHeads();

            function pad(number, length) {

                var str = '' + number;
                while (str.length < length) {
                    str = '0' + str;
                }

                return str;

            }

            function fetchHeads()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchHeads",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.heads, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.serial_code+'</td>\
                            <td>'+item.name+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '#addHeadButton', function (e) {
                e.preventDefault();
                $('#addHead').modal('show');
                $.ajax({
                    type: 'get',
                    url: 'head/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addHead').modal('hide');
                        }
                        else {
                            $('#serial_code').val(pad(response.serial_code,2));
                        }
                    }
                });
            })

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var head_id = $(this).val();
                $('#deleteHead').modal('show');
                $('#head_id').val(head_id)
            });

            $(document).on('submit', '#deleteHeadForm', function (e) {
                e.preventDefault();
                var head_id = $('#head_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'head/'+head_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteHead').modal('hide');
                        }
                        else {
                            fetchHeads();
                            $('#deleteHead').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var head_id = $(this).val();
                $('#editHead').modal('show');
                $.ajax({
                    type: "GET",
                    url: 'head/'+head_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                            $('#editHead').modal('hide');
                        }
                        else {
                            $('#head_id').val(response.head.id);
                            $('#edit_name').val(response.head.name);
                            $('#edit_serial_code').val(response.head.serial_code);
                        }
                    }
                });
            });

            $(document).on('submit', '#editHeadForm', function (e) {
                e.preventDefault();
                var head_id = $('#head_id').val();
                let EditFormData = new FormData($('#editHeadForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "head/"+head_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editHead').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editHeadForm')[0].reset();
                            $('#editHead').modal('hide');
                            fetchHeads();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editHead').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addHeadForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addHeadForm')[0]);
                $.ajax({
                    type: "post",
                    url: "head",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addHead').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addHeadForm')[0].reset();
                            $('#addHead').modal('hide')
                            fetchHeads()
                        }
                    },
                    error: function (error){
                        $('#addHead').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
