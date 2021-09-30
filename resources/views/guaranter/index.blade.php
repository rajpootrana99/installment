@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Guaranters</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Guaranters</a></li>
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
                        <div class="card-title mt-4">Guaranters
                            <a href="" data-toggle="modal" data-target="#addGuaranterDetail" id="addGuaranterDetailButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Guaranter </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">S/D/W of</th>
                                    <th width="15%">Marital Status</th>
                                    <th width="15%">Phone</th>
                                    <th width="20%">CNIC</th>
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
    <div class="modal fade bd-example-modal-lg" id="addGuaranterDetail" tabindex="-1" role="dialog" aria-labelledby="addGuaranterDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addGuaranterDetailLabel">Guaranter Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addGuaranterDetailForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Name" id="name" >
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="father_name" class="col-form-label text-right">S/D/W of</label>
                                    <input class="form-control" type="text" name="father_name" placeholder="Enter S/D/W of" id="father_name">
                                    <span class="text-danger error-text father_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label text-right">Phone No</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter Phone No" id="phone">
                                    <span class="text-danger error-text phone_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="marital_status" class="col-form-label text-right">Marital Status</label>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option value="0">Single</option>
                                        <option value="1">Married</option>
                                    </select>
                                    <span class="text-danger error-text marital_status_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="cnic" class="col-form-label text-right">CNIC</label>
                                    <input class="form-control" type="text" name="cnic" placeholder="Enter CNIC" id="cnic">
                                    <span class="text-danger error-text cnic_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="occupation" class="col-form-label text-right">Occupation</label>
                                    <input class="form-control" type="text" name="occupation" placeholder="Enter Occupation" id="occupation">
                                    <span class="text-danger error-text occupation_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="designation" class="col-form-label text-right">Designation</label>
                                    <input class="form-control" type="text" name="designation" placeholder="Enter Designation" id="designation">
                                    <span class="text-danger error-text designation_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="work_since" class="col-form-label text-right">Work Since</label>
                                    <input class="form-control" type="date" name="work_since" id="work_since">
                                    <span class="text-danger error-text work_since_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="monthly_income" class="col-form-label text-right">Monthly Income</label>
                                    <input class="form-control" type="text" name="monthly_income" placeholder="Enter Monthly Income" id="monthly_income">
                                    <span class="text-danger error-text monthly_income_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="residential_address" class="col-form-label text-right">Residential Address</label>
                                    <input class="form-control" type="text" name="residential_address" placeholder="Enter Residential Address" id="residential_address">
                                    <span class="text-danger error-text residential_address_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="office_address" class="col-form-label text-right">Office Address</label>
                                    <input class="form-control" type="text" name="office_address" placeholder="Enter Office Address" id="office_address">
                                    <span class="text-danger error-text office_address_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="image" class="col-form-label text-right">Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <span class="text-danger error-text image_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="cnic_front" class="col-form-label text-right">CNIC Front</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="cnic_front" id="cnic_front">
                                    <label class="custom-file-label" for="cnic_front">Choose file</label>
                                </div>
                                <span class="text-danger error-text cnic_front_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="cnic_back" class="col-form-label text-right">CNIC Back</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="cnic_back" id="cnic_back">
                                    <label class="custom-file-label" for="cnic_back">Choose file</label>
                                </div>
                                <span class="text-danger error-text cnic_back_error"></span>
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

    <div class="modal fade bd-example-modal-lg" id="editGuaranterDetail" tabindex="-1" role="dialog" aria-labelledby="editGuaranterDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editGuaranterDetailLabel">Guaranter Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editGuaranterDetailForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="guaranter_id" id="guaranter_id">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="edit_name" class="col-form-label text-right">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Name" id="edit_name" >
                                    <span class="text-danger error-text name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_father_name" class="col-form-label text-right">S/D/W of</label>
                                    <input class="form-control" type="text" name="father_name" placeholder="Enter S/D/W of" id="edit_father_name">
                                    <span class="text-danger error-text father_name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_phone" class="col-form-label text-right">Phone No</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter Phone No" id="edit_phone">
                                    <span class="text-danger error-text phone_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_marital_status" class="col-form-label text-right">Marital Status</label>
                                    <select name="marital_status" id="edit_marital_status" class="form-control">
                                        <option value="0">Single</option>
                                        <option value="1">Married</option>
                                    </select>
                                    <span class="text-danger error-text marital_status_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_cnic" class="col-form-label text-right">CNIC</label>
                                    <input class="form-control" type="text" name="cnic" placeholder="Enter CNIC" id="edit_cnic">
                                    <span class="text-danger error-text cnic_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_occupation" class="col-form-label text-right">Occupation</label>
                                    <input class="form-control" type="text" name="occupation" placeholder="Enter Occupation" id="edit_occupation">
                                    <span class="text-danger error-text occupation_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_designation" class="col-form-label text-right">Designation</label>
                                    <input class="form-control" type="text" name="designation" placeholder="Enter Designation" id="edit_designation">
                                    <span class="text-danger error-text designation_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_work_since" class="col-form-label text-right">Work Since</label>
                                    <input class="form-control" type="date" name="work_since" id="edit_work_since">
                                    <span class="text-danger error-text work_since_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_monthly_income" class="col-form-label text-right">Monthly Income</label>
                                    <input class="form-control" type="text" name="monthly_income" placeholder="Enter Monthly Income" id="edit_monthly_income">
                                    <span class="text-danger error-text monthly_income_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="edit_residential_address" class="col-form-label text-right">Residential Address</label>
                                    <input class="form-control" type="text" name="residential_address" placeholder="Enter Residential Address" id="edit_residential_address">
                                    <span class="text-danger error-text residential_address_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="edit_office_address" class="col-form-label text-right">Office Address</label>
                                    <input class="form-control" type="text" name="office_address" placeholder="Enter Office Address" id="edit_office_address">
                                    <span class="text-danger error-text office_address_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="edit_image" class="col-form-label text-right">Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="edit_image">
                                    <label class="custom-file-label" for="edit_image">Choose file</label>
                                </div>
                                <span class="text-danger error-text image_update_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="edit_cnic_front" class="col-form-label text-right">CNIC Front</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="cnic_front" id="edit_cnic_front">
                                    <label class="custom-file-label" for="edit_cnic_front">Choose file</label>
                                </div>
                                <span class="text-danger error-text cnic_front_update_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="edit_cnic_back" class="col-form-label text-right">CNIC Back</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="cnic_back" id="edit_cnic_back">
                                    <label class="custom-file-label" for="edit_cnic_back">Choose file</label>
                                </div>
                                <span class="text-danger error-text cnic_back_update_error"></span>
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

    <div class="modal fade" id="deleteGuaranterDetail" tabindex="-1" role="dialog" aria-labelledby="deleteGuaranterDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteGuaranterDetailLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteGuaranterDetailForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="guaranter_id" name="guaranter_id">
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

            fetchGuaranters();

            function fetchGuaranters()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchGuaranters",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.guaranters, function (key, guaranter) {
                            $('tbody').append('<tr>\
                            <td>'+guaranter.id+'</td>\
                            <td>'+guaranter.name+'</td>\
                            <td>'+guaranter.father_name+'</td>\
                            <td>'+guaranter.marital_status+'</td>\
                            <td>'+guaranter.phone+'</td>\
                            <td>'+guaranter.cnic+'</td>\
                            <td><button value="'+guaranter.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+guaranter.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var guaranter_id = $(this).val();
                $('#deleteGuaranterDetail').modal('show');
                $('#guaranter_id').val(guaranter_id)
            });

            $(document).on('submit', '#deleteGuaranterDetailForm', function (e) {
                e.preventDefault();
                var guaranter_id = $('#guaranter_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'guaranter/'+guaranter_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteGuaranterDetail').modal('hide');
                        }
                        else {
                            fetchGuaranters();
                            $('#deleteGuaranterDetail').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var guaranter_id = $(this).val();
                $('#editGuaranterDetail').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'guaranter/'+guaranter_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editGuaranterDetail').modal('hide');
                        }
                        else {
                            console.log(response.guaranter);
                            $('#guaranter_id').val(response.guaranter.id);
                            $('#edit_name').val(response.guaranter.name);
                            $('#edit_father_name').val(response.guaranter.father_name);
                            $('#edit_phone').val(response.guaranter.phone);
                            $('#edit_cnic').val(response.guaranter.cnic);
                            $('#edit_occupation').val(response.guaranter.occupation);
                            $('#edit_designation').val(response.guaranter.designation);
                            $('#edit_work_since').val(response.guaranter.work_since);
                            $('#edit_monthly_income').val(response.guaranter.monthly_income);
                            $('#edit_residential_address').val(response.guaranter.residential_address);
                            $('#edit_office_address').val(response.guaranter.office_address);
                            $('#edit_marital_status').val(response.marital_status).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editGuaranterDetailForm', function (e) {
                e.preventDefault();
                var guaranter_id = $('#guaranter_id').val();
                let EditFormData = new FormData($('#editGuaranterDetailForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "guaranter/"+guaranter_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editGuaranterDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editGuaranterDetailForm')[0].reset();
                            $('#editGuaranterDetail').modal('hide');
                            fetchGuaranters();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editGuaranterDetail').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addGuaranterDetailForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addGuaranterDetailForm')[0]);
                $.ajax({
                    type: "post",
                    url: "guaranter",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addGuaranterDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addGuaranterDetailForm')[0].reset();
                            $('#addGuaranterDetail').modal('hide')
                            fetchGuaranters()
                        }
                    },
                    error: function (error){
                        $('#addGuaranterDetail').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
