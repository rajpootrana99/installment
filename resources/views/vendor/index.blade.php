@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Vendors</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Vendors</a></li>
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
                        <div class="card-title mt-4">Vendors
                            <a href="" data-toggle="modal" data-target="#addVendorDetail" id="addVendorDetailButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Vendor </a>
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
                                    <th width="15%">Cell</th>
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
    <div class="modal fade bd-example-modal-lg" id="addVendorDetail" tabindex="-1" role="dialog" aria-labelledby="addVendorDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addVendorDetailLabel">Vendor Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addVendorDetailForm" enctype="multipart/form-data">
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
                                    <label for="cell" class="col-form-label text-right">Cell No</label>
                                    <input class="form-control" type="text" name="cell" placeholder="Enter Cell No" id="cell">
                                    <span class="text-danger error-text cell_error"></span>
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="residential_address" class="col-form-label text-right">Residential Address</label>
                                    <input class="form-control" type="text" name="residential_address" placeholder="Enter Residential Address" id="residential_address">
                                    <span class="text-danger error-text residential_address_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="residential_phone" class="col-form-label text-right">Residential Phone</label>
                                    <input class="form-control" type="text" name="residential_phone" placeholder="Enter Residential Phone" id="residential_phone">
                                    <span class="text-danger error-text residential_phone_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="residential_since" class="col-form-label text-right">Residential Since</label>
                                    <input class="form-control" type="date" name="residential_since" id="residential_since">
                                    <span class="text-danger error-text residential_since_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="office_address" class="col-form-label text-right">Office Address</label>
                                    <input class="form-control" type="text" name="office_address" placeholder="Enter Office Address" id="office_address">
                                    <span class="text-danger error-text office_address_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="office_phone" class="col-form-label text-right">Office Phone</label>
                                    <input class="form-control" type="text" name="office_phone" placeholder="Enter Office Phone" id="office_phone">
                                    <span class="text-danger error-text office_phone_error"></span>
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

    <div class="modal fade bd-example-modal-lg" id="editVendorDetail" tabindex="-1" role="dialog" aria-labelledby="editVendorDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editVendorDetailLabel">Vendor Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editVendorDetailForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="vendor_id" id="vendor_id">
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
                                    <label for="edit_cell" class="col-form-label text-right">Cell No</label>
                                    <input class="form-control" type="text" name="cell" placeholder="Enter Cell No" id="edit_cell">
                                    <span class="text-danger error-text cell_update_error"></span>
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_residential_address" class="col-form-label text-right">Residential Address</label>
                                    <input class="form-control" type="text" name="residential_address" placeholder="Enter Residential Address" id="edit_residential_address">
                                    <span class="text-danger error-text residential_address_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_residential_phone" class="col-form-label text-right">Residential Phone</label>
                                    <input class="form-control" type="text" name="residential_phone" placeholder="Enter Residential Phone" id="edit_residential_phone">
                                    <span class="text-danger error-text residential_phone_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_residential_since" class="col-form-label text-right">Residential Since</label>
                                    <input class="form-control" type="date" name="residential_since" id="edit_residential_since">
                                    <span class="text-danger error-text residential_since_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_office_address" class="col-form-label text-right">Office Address</label>
                                    <input class="form-control" type="text" name="office_address" placeholder="Enter Office Address" id="edit_office_address">
                                    <span class="text-danger error-text office_address_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="edit_office_phone" class="col-form-label text-right">Office Phone</label>
                                    <input class="form-control" type="text" name="office_phone" placeholder="Enter Office Phone" id="edit_office_phone">
                                    <span class="text-danger error-text office_phone_update_error"></span>
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

    <div class="modal fade" id="deleteVendorDetail" tabindex="-1" role="dialog" aria-labelledby="deleteVendorDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteVendorDetailLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteVendorDetailForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="vendor_id" name="vendor_id">
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

            fetchVendors();

            function fetchVendors()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchVendors",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.vendors, function (key, vendor) {
                            $('tbody').append('<tr>\
                            <td>'+vendor.id+'</td>\
                            <td>'+vendor.name+'</td>\
                            <td>'+vendor.father_name+'</td>\
                            <td>'+vendor.cell+'</td>\
                            <td>'+vendor.cnic+'</td>\
                            <td><button value="'+vendor.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+vendor.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var vendor_id = $(this).val();
                $('#deleteVendorDetail').modal('show');
                $('#vendor_id').val(vendor_id)
            });

            $(document).on('submit', '#deleteVendorDetailForm', function (e) {
                e.preventDefault();
                var vendor_id = $('#vendor_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'vendor/'+vendor_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteVendorDetail').modal('hide');
                        }
                        else {
                            fetchVendors();
                            $('#deleteVendorDetail').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var vendor_id = $(this).val();
                $('#editVendorDetail').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'vendor/'+vendor_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editVendorDetail').modal('hide');
                        }
                        else {
                            console.log(response.vendor);
                            $('#vendor_id').val(response.vendor.id);
                            $('#edit_name').val(response.vendor.name);
                            $('#edit_father_name').val(response.vendor.father_name);
                            $('#edit_cell').val(response.vendor.cell);
                            $('#edit_cnic').val(response.vendor.cnic);
                            $('#edit_residential_address').val(response.vendor.residential_address);
                            $('#edit_residential_phone').val(response.vendor.residential_phone);
                            $('#edit_residential_since').val(response.vendor.residential_since);
                            $('#edit_office_address').val(response.vendor.office_address);
                            $('#edit_office_phone').val(response.vendor.office_phone);
                            $('#edit_marital_status').val(response.marital_status).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editVendorDetailForm', function (e) {
                e.preventDefault();
                var vendor_id = $('#vendor_id').val();
                let EditFormData = new FormData($('#editVendorDetailForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "vendor/"+vendor_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editVendorDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editVendorDetailForm')[0].reset();
                            $('#editVendorDetail').modal('hide');
                            fetchVendors();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editVendorDetail').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addVendorDetailForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addVendorDetailForm')[0]);
                $.ajax({
                    type: "post",
                    url: "vendor",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addVendorDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addVendorDetailForm')[0].reset();
                            $('#addVendorDetail').modal('hide')
                            fetchVendors()
                        }
                    },
                    error: function (error){
                        $('#addVendorDetail').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
