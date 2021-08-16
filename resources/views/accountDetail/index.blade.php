@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Account Details</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Account Details</a></li>
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
                        <div class="card-title mt-4">Account Details
                            <a href="" data-toggle="modal" data-target="#addAccountDetail" id="addAccountDetailButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Account Detail </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%">Account Code</th>
                                    <th width="20%">Account Detail Name</th>
                                    <th width="15%">Head</th>
                                    <th width="15%">Sub Head</th>
                                    <th width="20%">Account Nature</th>
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
    <div class="modal fade" id="addAccountDetail" tabindex="-1" role="dialog" aria-labelledby="addAccountDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addAccountDetailLabel">Account Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addAccountDetailForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="serial_number" id="serial_number">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="head_id" class="col-form-label text-right">Select Head</label>
                                    <select name="head_id" id="head_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text head_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="sub_head_id" class="col-form-label text-right">Select Sub Head</label>
                                    <select name="sub_head_id" id="sub_head_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text sub_head_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="account_code" class="col-form-label text-right">Account Code</label>
                                    <input class="form-control" type="text" name="account_code" id="account_code" readonly>
                                    <span class="text-danger error-text account_code_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="account_detail_name" class="col-form-label text-right">Name</label>
                                    <input class="form-control" type="text" name="account_detail_name" placeholder="Enter Name" id="account_detail_name">
                                    <span class="text-danger error-text account_detail_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="account_nature" class="col-form-label text-right">Select Account Nature</label>
                                    <select name="account_nature" id="account_nature" class="form-control">
                                        <option value="0">Other</option>
                                        <option value="1">Is Process Account</option>
                                        <option value="2">Is Inventory Account</option>
                                        <option value="3">Is Cash Account</option>
                                        <option value="4">Is Customer Header</option>
                                        <option value="5">Is Employee</option>
                                        <option value="6">Is COGS Account</option>
                                        <option value="7">Is Sales Account</option>
                                        <option value="8">Is Bank Account</option>
                                        <option value="9">Is Vendor Header</option>
                                    </select>
                                    <span class="text-danger error-text account_nature_error"></span>
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

    <div class="modal fade" id="editAccountDetail" tabindex="-1" role="dialog" aria-labelledby="editAccountDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editAccountDetailLabel">Account Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editAccountDetailForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="account_detail_id" name="account_detail_id">
                            <input type="hidden" name="serial_number" id="edit_serial_number">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_head_id" class="col-form-label text-right">Select Head</label>
                                    <select name="head_id" id="edit_head_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text head_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_sub_head_id" class="col-form-label text-right">Select Sub Head</label>
                                    <select name="sub_head_id" id="edit_sub_head_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text sub_head_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_account_code" class="col-form-label text-right">Account Code</label>
                                    <input class="form-control" type="text" name="account_code" id="edit_account_code" readonly>
                                    <span class="text-danger error-text account_code_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_account_detail_name" class="col-form-label text-right">Name</label>
                                    <input class="form-control" type="text" name="account_detail_name" placeholder="Enter Name" id="edit_account_detail_name">
                                    <span class="text-danger error-text account_detail_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_account_nature" class="col-form-label text-right">Select Account Nature</label>
                                    <select name="account_nature" id="edit_account_nature" class="form-control">
                                        <option value="0">Other</option>
                                        <option value="1">Is Process Account</option>
                                        <option value="2">Is Inventory Account</option>
                                        <option value="3">Is Cash Account</option>
                                        <option value="4">Is Customer Header</option>
                                        <option value="5">Is Employee</option>
                                        <option value="6">Is COGS Account</option>
                                        <option value="7">Is Sales Account</option>
                                        <option value="8">Is Bank Account</option>
                                        <option value="9">Is Vendor Header</option>
                                    </select>
                                    <span class="text-danger error-text account_nature_update_error"></span>
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

    <div class="modal fade" id="deleteAccountDetail" tabindex="-1" role="dialog" aria-labelledby="deleteAccountDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteAccountDetailLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteAccountDetailForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="account_detail_id" name="account_detail_id">
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

            fetchAccountDetails();

            function pad(number, length) {

                var str = '' + number;
                while (str.length < length) {
                    str = '0' + str;
                }

                return str;

            }

            function fetchAccountDetails()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchAccountDetails",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.accountDetails, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.account_code+'</td>\
                            <td>'+item.account_detail_name+'</td>\
                            <td>'+item.head.name+'</td>\
                            <td>'+item.sub_head.name+'</td>\
                            <td>'+item.account_nature+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '#addAccountDetailButton', function (e) {
                e.preventDefault();
                $('#addAccountDetail').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: 'get',
                    url: 'accountDetail/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addAccountDetail').modal('hide');
                        }
                        else {
                            var head_id = $('#head_id');
                            $('#head_id').children().remove().end()
                            $.each(response.heads, function (head) {
                                head_id.append($("<option />").val(response.heads[head].id).text(response.heads[head].name));
                            });
                            $('#serial_number').val(pad(response.serial_number,4));
                        }
                    }
                });
            });

            $(document).on('change', '#head_id', function (e) {
                e.preventDefault();
                var head_id = $('#head_id').val();
                $.ajax({
                    type: 'get',
                    url: 'accountDetail/fetchSubHeads/'+head_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addAccountDetail').modal('hide');
                        }
                        else {
                            var sub_head_id = $('#sub_head_id');
                            $('#sub_head_id').children().remove().end()
                            $.each(response.subHeads, function (subHead) {
                                sub_head_id.append($("<option />").val(response.subHeads[subHead].id).text(response.subHeads[subHead].name));
                            });
                            var sub_head_id = $('#sub_head_id').val();
                            var serial_number = $('#serial_number').val();
                            $.each(response.subHeads, function (subHead) {
                                if (response.subHeads[subHead].id == sub_head_id){
                                    $('#account_code').val(response.head.serial_code+response.subHeads[subHead].serial_code+serial_number);
                                }
                            });
                        }
                    }
                });
            });

            $(document).on('change', '#sub_head_id', function (e) {
                e.preventDefault();
                var sub_head_id = $('#sub_head_id').val();
                $.ajax({
                    type: 'get',
                    url: 'accountDetail/fetchBoth/'+sub_head_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addAccountDetail').modal('hide');
                        }
                        else {
                            var head_id = $('#head_id').val();
                            var serial_number = $('#serial_number').val();
                            $.each(response.heads, function (head) {
                                if (response.heads[head].id == head_id){
                                    $('#account_code').val(response.heads[head].serial_code+response.subHead.serial_code+serial_number);
                                }
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var account_detail_id = $(this).val();
                $('#deleteAccountDetail').modal('show');
                $('#account_detail_id').val(account_detail_id)
            });

            $(document).on('submit', '#deleteAccountDetailForm', function (e) {
                e.preventDefault();
                var account_detail_id = $('#account_detail_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'accountDetail/'+account_detail_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteAccountDetail').modal('hide');
                        }
                        else {
                            fetchAccountDetails();
                            $('#deleteAccountDetail').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var account_detail_id = $(this).val();
                $('#editAccountDetail').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'accountDetail/'+account_detail_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editAccountDetail').modal('hide');
                        }
                        else {
                            var head_id = $('#edit_head_id');
                            $('#edit_head_id').children().remove().end()
                            $.each(response.heads, function (head) {
                                head_id.append($("<option />").val(response.heads[head].id).text(response.heads[head].name));
                            });
                            var sub_head_id = $('#edit_sub_head_id');
                            $('#edit_sub_head_id').children().remove().end()
                            $.each(response.subHeads, function (subHead) {
                                sub_head_id.append($("<option />").val(response.subHeads[subHead].id).text(response.subHeads[subHead].name));
                            });
                            $('#account_detail_id').val(response.accountDetail.id);
                            $('#edit_account_detail_name').val(response.accountDetail.account_detail_name);
                            $('#edit_serial_number').val(response.accountDetail.serial_number);
                            $('#edit_account_code').val(response.accountDetail.account_code);
                            $('#edit_head_id').val(response.accountDetail.head_id).change();
                            $('#edit_sub_head_id').val(response.accountDetail.sub_head_id).change();
                            $('#edit_account_nature').val(response.account_nature).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editAccountDetailForm', function (e) {
                e.preventDefault();
                var account_detail_id = $('#account_detail_id').val();
                let EditFormData = new FormData($('#editAccountDetailForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "accountDetail/"+account_detail_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editAccountDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editAccountDetailForm')[0].reset();
                            $('#editAccountDetail').modal('hide');
                            fetchAccountDetails();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editAccountDetail').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addAccountDetailForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addAccountDetailForm')[0]);
                $.ajax({
                    type: "post",
                    url: "accountDetail",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addAccountDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addAccountDetailForm')[0].reset();
                            $('#addAccountDetail').modal('hide')
                            fetchAccountDetails()
                        }
                    },
                    error: function (error){
                        $('#addAccountDetail').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
