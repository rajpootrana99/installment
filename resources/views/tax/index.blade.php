@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Taxes</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Taxes</a></li>
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
                        <div class="card-title mt-4">Taxes
                            <a href="" data-toggle="modal" data-target="#addTax" id="addTaxButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Tax </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
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
    <div class="modal fade" id="addTax" tabindex="-1" role="dialog" aria-labelledby="addTaxLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addTaxLabel">Tax</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addTaxForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Tax Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Tax Name" id="name">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="percentage" class="col-form-label text-right">Tax Percentage</label>
                                    <input class="form-control" type="text" name="percentage" placeholder="Enter Tax Percentage" id="percentage">
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

    <div class="modal fade" id="editTax" tabindex="-1" role="dialog" aria-labelledby="editTaxLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editTaxLabel">Tax</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editTaxForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="tax_id" name="tax_id">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Tax Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Tax Name" id="edit_name">
                                    <span class="text-danger error-text name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="percentage" class="col-form-label text-right">Tax Percentage</label>
                                    <input class="form-control" type="text" name="percentage" placeholder="Enter Tax Percentage" id="edit_percentage">
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

    <div class="modal fade" id="deleteTax" tabindex="-1" role="dialog" aria-labelledby="deleteTaxLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteTaxLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteTaxForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="tax_id" name="tax_id">
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

            fetchTaxes();

            function fetchTaxes()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchTax",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('tbody').html("");
                        $.each(response.taxes, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.percentage+'%</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var tax_id = $(this).val();
                $('#deleteTax').modal('show');
                $('#tax_id').val(tax_id)
            });

            $(document).on('submit', '#deleteTaxForm', function (e) {
                e.preventDefault();
                var tax_id = $('#tax_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'tax/'+tax_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteTax').modal('hide');
                        }
                        else {
                            fetchTaxes();
                            $('#deleteTax').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var tax_id = $(this).val();
                $('#editTax').modal('show');
                $.ajax({
                    type: "GET",
                    url: 'tax/'+tax_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editTax').modal('hide');
                        }
                        else {
                            $('#tax_id').val(response.tax.id);
                            $('#edit_name').val(response.tax.name);
                            $('#edit_percentage').val(response.tax.percentage);
                        }
                    }
                });
            });

            $(document).on('submit', '#editTaxForm', function (e) {
                e.preventDefault();
                var tax_id = $('#tax_id').val();
                let EditFormData = new FormData($('#editTaxForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "tax/"+tax_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editTax').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editTaxForm')[0].reset();
                            $('#editTax').modal('hide');
                            fetchTaxes();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editTax').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addTaxForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addTaxForm')[0]);
                $.ajax({
                    type: "post",
                    url: "tax",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addTax').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addTaxForm')[0].reset();
                            $('#addTax').modal('hide')
                            // alert("Lawyer Type Add Successfully")
                            fetchTaxes()
                        }
                    },
                    error: function (error){
                        $('#addTax').modal('show')
                        // alert("Lawyer Type not added")
                    }
                });
            });
        });
    </script>
@endsection
