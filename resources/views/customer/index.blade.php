@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Customers</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Customers</a></li>
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
                        <div class="card-title mt-4">Customers
                            <a href="" data-toggle="modal" data-target="#addCustomerDetail" id="addCustomerDetailButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Customer </a>
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
                                    <th width="15%">Customer Type</th>
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
    <div class="modal fade bd-example-modal-lg" id="addCustomerDetail" tabindex="-1" role="dialog" aria-labelledby="addCustomerDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addCustomerDetailLabel">Customer Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addCustomerDetailForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="type" class="col-form-label text-right">Customer Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="0">Cash</option>
                                        <option value="1">Credit</option>
                                        <option value="2">Installment</option>
                                    </select>
                                    <span class="text-danger error-text type_error"></span>
                                </div>
                            </div>
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
                                    <label for="dob" class="col-form-label text-right">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" id="dob">
                                    <span class="text-danger error-text dob_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
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
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="caste" class="col-form-label text-right">Caste</label>
                                    <input class="form-control" type="text" name="caste" placeholder="Enter Caste" id="caste">
                                    <span class="text-danger error-text caste_error"></span>
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
                                    <label for="cnic_expiry" class="col-form-label text-right">CNIC Expiry</label>
                                    <input class="form-control" type="date" name="cnic_expiry" id="cnic_expiry">
                                    <span class="text-danger error-text cnic_expiry_error"></span>
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

    <div class="modal fade bd-example-modal-lg" id="editCustomerDetail" tabindex="-1" role="dialog" aria-labelledby="editCustomerDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editCustomerDetailLabel">Customer Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editCustomerDetailForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="customer_id" id="customer_id">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_type" class="col-form-label text-right">Customer Type</label>
                                    <select name="type" id="edit_type" class="form-control">
                                        <option value="0">Cash</option>
                                        <option value="1">Credit</option>
                                        <option value="2">Installment</option>
                                    </select>
                                    <span class="text-danger error-text type_update_error"></span>
                                </div>
                            </div>
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
                                    <label for="edit_dob" class="col-form-label text-right">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" id="edit_dob">
                                    <span class="text-danger error-text dob_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
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
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_caste" class="col-form-label text-right">Caste</label>
                                    <input class="form-control" type="text" name="caste" placeholder="Enter Caste" id="edit_caste">
                                    <span class="text-danger error-text caste_update_error"></span>
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
                                    <label for="edit_cnic_expiry" class="col-form-label text-right">CNIC Expiry</label>
                                    <input class="form-control" type="date" name="cnic_expiry" id="edit_cnic_expiry">
                                    <span class="text-danger error-text cnic_expiry_update_error"></span>
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

    <div class="modal fade" id="deleteCustomerDetail" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteCustomerDetailLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteCustomerDetailForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="customer_id" name="customer_id">
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

            fetchCustomers();

            function fetchCustomers()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchCustomers",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.customers, function (key, customer) {
                            $('tbody').append('<tr>\
                            <td>'+customer.id+'</td>\
                            <td>'+customer.name+'</td>\
                            <td>'+customer.father_name+'</td>\
                            <td>'+customer.type+'</td>\
                            <td>'+customer.cell+'</td>\
                            <td>'+customer.cnic+'</td>\
                            <td><button value="'+customer.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+customer.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var customer_id = $(this).val();
                $('#deleteCustomerDetail').modal('show');
                $('#customer_id').val(customer_id)
            });

            $(document).on('submit', '#deleteCustomerDetailForm', function (e) {
                e.preventDefault();
                var customer_id = $('#customer_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'customer/'+customer_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteCustomerDetail').modal('hide');
                        }
                        else {
                            fetchCustomers();
                            $('#deleteCustomerDetail').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var customer_id = $(this).val();
                $('#editCustomerDetail').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'customer/'+customer_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editCustomerDetail').modal('hide');
                        }
                        else {
                            console.log(response.customer);
                            $('#customer_id').val(response.customer.id);
                            $('#edit_name').val(response.customer.name);
                            $('#edit_father_name').val(response.customer.father_name);
                            $('#edit_dob').val(response.customer.dob);
                            $('#edit_cell').val(response.customer.cell);
                            $('#edit_caste').val(response.customer.caste);
                            $('#edit_cnic').val(response.customer.cnic);
                            $('#edit_cnic_expiry').val(response.customer.cnic_expiry);
                            $('#edit_occupation').val(response.customer.occupation);
                            $('#edit_designation').val(response.customer.designation);
                            $('#edit_work_since').val(response.customer.work_since);
                            $('#edit_monthly_income').val(response.customer.monthly_income);
                            $('#edit_residential_address').val(response.customer.residential_address);
                            $('#edit_residential_phone').val(response.customer.residential_phone);
                            $('#edit_residential_since').val(response.customer.residential_since);
                            $('#edit_office_address').val(response.customer.office_address);
                            $('#edit_office_phone').val(response.customer.office_phone);
                            $('#edit_type').val(response.type).change();
                            $('#edit_marital_status').val(response.marital_status).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editCustomerDetailForm', function (e) {
                e.preventDefault();
                var customer_id = $('#customer_id').val();
                let EditFormData = new FormData($('#editCustomerDetailForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "customer/"+customer_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editCustomerDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editCustomerDetailForm')[0].reset();
                            $('#editCustomerDetail').modal('hide');
                            fetchCustomers();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editCustomerDetail').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addCustomerDetailForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addCustomerDetailForm')[0]);
                $.ajax({
                    type: "post",
                    url: "customer",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addCustomerDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addCustomerDetailForm')[0].reset();
                            $('#addCustomerDetail').modal('hide')
                            fetchCustomers()
                        }
                    },
                    error: function (error){
                        $('#addCustomerDetail').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
