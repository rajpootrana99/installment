@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Financial Years</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Financial Years</a></li>
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
                        <div class="card-title mt-4">Financial Years
                            <a href="" data-toggle="modal" data-target="#addFinancialYear" id="addFinancialYearButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Financial Year </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Year String</th>
                                    <th width="10%">Status</th>
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
    <div class="modal fade" id="addFinancialYear" tabindex="-1" role="dialog" aria-labelledby="addFinancialYearLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addFinancialYearLabel">Financial Year</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addFinancialYearForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="start_date" class="col-form-label text-right">Start Date</label>
                                    <input class="form-control" type="date" name="start_date" id="start_date">
                                    <span class="text-danger error-text start_date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="end_date" class="col-form-label text-right">Start Date</label>
                                    <input class="form-control" type="date" name="end_date" id="end_date">
                                    <span class="text-danger error-text end_date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="year_string" class="col-form-label text-right">Year String</label>
                                    <input class="form-control" type="text" name="year_string" id="year_string">
                                    <span class="text-danger error-text year_string_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="status" class="col-form-label text-right">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">Open</option>
                                        <option value="1">Active</option>
                                    </select>
                                    <span class="text-danger error-text status_error"></span>
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

    <div class="modal fade" id="editFinancialYear" tabindex="-1" role="dialog" aria-labelledby="editFinancialYearLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editFinancialYearLabel">Financial Year</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editFinancialYearForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_start_date" class="col-form-label text-right">Start Date</label>
                                    <input class="form-control" type="date" name="start_date" id="edit_start_date">
                                    <span class="text-danger error-text start_date_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_end_date" class="col-form-label text-right">Start Date</label>
                                    <input class="form-control" type="date" name="end_date" id="edit_end_date">
                                    <span class="text-danger error-text end_date_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="edit_year_string" class="col-form-label text-right">Year String</label>
                                    <input class="form-control" type="text" name="year_string" id="edit_year_string">
                                    <span class="text-danger error-text year_string_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="edit_status" class="col-form-label text-right">Status</label>
                                    <select name="status" id="edit_status" class="form-control">
                                        <option value="0">Open</option>
                                        <option value="1">Active</option>
                                    </select>
                                    <span class="text-danger error-text status_update_error"></span>
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

    <div class="modal fade" id="deleteFinancialYear" tabindex="-1" role="dialog" aria-labelledby="deleteFinancialYearLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteFinancialYearLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteFinancialYearForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="financial_year_id" name="financial_year_id">
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

            fetchFinancialYears();

            function fetchFinancialYears()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchFinancialYears",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.financialYears, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.start_date+'</td>\
                            <td>'+item.end_date+'</td>\
                            <td>'+item.year_string+'</td>\
                            <td>'+item.status+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var financial_year_id = $(this).val();
                $('#deleteFinancialYear').modal('show');
                $('#financial_year_id').val(financial_year_id)
            });

            $(document).on('submit', '#deleteFinancialYearForm', function (e) {
                e.preventDefault();
                var financial_year_id = $('#financial_year_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'financialYear/'+financial_year_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteFinancialYear').modal('hide');
                        }
                        else {
                            fetchFinancialYears();
                            $('#deleteFinancialYear').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var financial_year_id = $(this).val();
                $('#editFinancialYear').modal('show');
                $.ajax({
                    type: "GET",
                    url: 'financialYear/'+financial_year_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                            $('#editFinancialYear').modal('hide');
                        }
                        else {
                            $('#financial_year_id').val(response.financialYear.id);
                            $('#edit_start_date').val(response.financialYear.start_date);
                            $('#edit_end_date').val(response.financialYear.end_date);
                            $('#edit_year_string').val(response.financialYear.year_string);
                            $('#edit_status').val(response.status).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editFinancialYearForm', function (e) {
                e.preventDefault();
                var financial_year_id = $('#financial_year_id').val();
                let EditFormData = new FormData($('#editFinancialYearForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "financialYear/"+financial_year_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editFinancialYear').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editFinancialYearForm')[0].reset();
                            $('#editFinancialYear').modal('hide');
                            fetchFinancialYears();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editFinancialYear').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addFinancialYearForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addFinancialYearForm')[0]);
                $.ajax({
                    type: "post",
                    url: "financialYear",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addFinancialYear').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addFinancialYearForm')[0].reset();
                            $('#addFinancialYear').modal('hide')
                            fetchFinancialYears()
                        }
                    },
                    error: function (error){
                        $('#addFinancialYear').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
