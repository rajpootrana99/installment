@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Installment Plans</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Installment Plans</a></li>
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
                        <div class="card-title mt-4">Installment Plans
                            <a href="" data-toggle="modal" data-target="#addInstallmentPlan" id="addInstallmentPlanButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Installment Plan </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Plan</th>
                                    <th>Duration</th>
                                    <th>Percentage(%)</th>
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
    <div class="modal fade" id="addInstallmentPlan" tabindex="-1" role="dialog" aria-labelledby="addInstallmentPlanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addInstallmentPlanLabel">Installment Plan</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addInstallmentPlanForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="plan" class="col-form-label text-right">Plan</label>
                                    <input class="form-control" type="text" name="plan" placeholder="Enter Plan Name" id="plan">
                                    <span class="text-danger error-text plan_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-">
                                <div class="form-group">
                                    <label for="duration" class="col-form-label text-right">Duration</label>
                                    <input class="form-control" type="number" name="duration" placeholder="Enter Duration" id="duration">
                                    <span class="text-danger error-text duration_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="percentage" class="col-form-label text-right">Percentage</label>
                                    <input class="form-control" type="text" name="percentage" placeholder="Enter Percentage" id="percentage">
                                    <span class="text-danger error-text percentage_error"></span>
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

    <div class="modal fade" id="editInstallmentPlan" tabindex="-1" role="dialog" aria-labelledby="editInstallmentPlanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editInstallmentPlanLabel">Installment Plan</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editInstallmentPlanForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="installment_plan_id" name="installment_plan_id">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="plan" class="col-form-label text-right">Plan</label>
                                    <input class="form-control" type="text" name="plan" placeholder="Enter Plan Name" id="edit_plan">
                                    <span class="text-danger error-text plan_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="duration" class="col-form-label text-right">Duration</label>
                                    <input class="form-control" type="text" name="duration" placeholder="Enter Duration" id="edit_duration">
                                    <span class="text-danger error-text duration_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="percentage" class="col-form-label text-right">Percentage</label>
                                    <input class="form-control" type="text" name="percentage" placeholder="Enter Percentage" id="edit_percentage">
                                    <span class="text-danger error-text percentage_update_error"></span>
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

    <div class="modal fade" id="deleteInstallmentPlan" tabindex="-1" role="dialog" aria-labelledby="deleteInstallmentPlanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteInstallmentPlanLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteInstallmentPlanForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="installment_plan_id" name="installment_plan_id">
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

            fetchInstallmentPlans();

            function fetchInstallmentPlans()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchInstallmentPlans",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('tbody').html("");
                        $.each(response.installmentPlans, function (key, installmentPlan) {
                            $('tbody').append('<tr>\
                            <td>'+installmentPlan.id+'</td>\
                            <td>'+installmentPlan.plan+'</td>\
                            <td>'+installmentPlan.duration+'</td>\
                            <td>'+installmentPlan.percentage+'%</td>\
                            <td><button value="'+installmentPlan.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+installmentPlan.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var installment_plan_id = $(this).val();
                $('#deleteInstallmentPlan').modal('show');
                $('#installment_plan_id').val(installment_plan_id)
            });

            $(document).on('submit', '#deleteInstallmentPlanForm', function (e) {
                e.preventDefault();
                var installment_plan_id = $('#installment_plan_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'installmentPlan/'+installment_plan_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteInstallmentPlan').modal('hide');
                        }
                        else {
                            fetchInstallmentPlans();
                            $('#deleteInstallmentPlan').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var installment_plan_id = $(this).val();
                $('#editInstallmentPlan').modal('show');
                $.ajax({
                    type: "GET",
                    url: 'installmentPlan/'+installment_plan_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editInstallmentPlan').modal('hide');
                        }
                        else {
                            $('#installment_plan_id').val(response.installmentPlan.id);
                            $('#edit_plan').val(response.installmentPlan.plan);
                            $('#edit_duration').val(response.installmentPlan.duration);
                            $('#edit_percentage').val(response.installmentPlan.percentage);
                        }
                    }
                });
            });

            $(document).on('submit', '#editInstallmentPlanForm', function (e) {
                e.preventDefault();
                var installment_plan_id = $('#installment_plan_id').val();
                let EditFormData = new FormData($('#editInstallmentPlanForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "installmentPlan/"+installment_plan_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editInstallmentPlan').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editInstallmentPlanForm')[0].reset();
                            $('#editInstallmentPlan').modal('hide');
                            fetchInstallmentPlans();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editInstallmentPlan').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addInstallmentPlanForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addInstallmentPlanForm')[0]);
                $.ajax({
                    type: "post",
                    url: "installmentPlan",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addInstallmentPlan').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addInstallmentPlanForm')[0].reset();
                            $('#addInstallmentPlan').modal('hide')
                            // alert("Lawyer Type Add Successfully")
                            fetchInstallmentPlans()
                        }
                    },
                    error: function (error){
                        $('#addInstallmentPlan').modal('show')
                        // alert("Lawyer Type not added")
                    }
                });
            });
        });
    </script>
@endsection
