@extends('layout.base')

@section('section')
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <div class="iq-sidebar-logo">
                <div class="top-logo">
                    <a href="index.html" class="logo">
                        <img src="images/logo.gif" class="img-fluid" alt="">
                        <span>Metorik</span>
                    </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <h5 class="mb-0">Taxes</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('tax.index') }}">Taxes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ul>
                </nav>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light p-0">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list">




                    </ul>
                </div>
                <ul class="navbar-list">
                    <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="images/user/1.jpg" class="img-fluid rounded" alt="user"></a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white line-height">Hello Nik jone</h5>
                                        <span class="text-white font-size-12">Available</span>
                                    </div>
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <form action="{{ route('logout') }}"  style="display: none;" method="post" id="lgut">
                                            @csrf
                                            <input type="submit" id="logoutbtn">
                                        </form>
                                        <a class="iq-bg-danger iq-sign-btn" type="button" onclick="$('#lgut').submit()">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- TOP Nav Bar END -->
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <div class="row card-title">
                                    <h4>Taxes</h4>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <a class="btn btn-primary float-right mb-4 text-white" data-toggle="modal" data-target="#addTax"><i class="fa fa-plus"></i> New Tax </a>
                            <div class="modal fade" id="addTax" tabindex="-1" role="dialog" aria-labelledby="addTaxModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addTaxModal">Add Tax</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" id="addTaxForm">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Tax Name:</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="percentage">Tax Percentage:</label>
                                                    <input type="text" name="percentage" class="form-control" placeholder="Enter Name" value="{{ old('percentage') }}">
                                                    <span class="text-danger error-text percentage_error"></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editTax" tabindex="-1" role="dialog" aria-labelledby="editTaxModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editTaxModal">Edit Tax</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" id="editTaxForm">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" id="tax_id" name="tax_id">
                                                <div class="form-group">
                                                    <label for="name">Tax Name:</label>
                                                    <input type="text" name="name" id="edit_name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                                                    <span class="text-danger error-text name_update_error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="percentage">Tax Percentage:</label>
                                                    <input type="text" name="percentage" id="edit_percentage" class="form-control" placeholder="Enter Name" value="{{ old('percentage') }}">
                                                    <span class="text-danger error-text percentage_update_error"></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteTax" tabindex="-1" role="dialog" aria-labelledby="deleteTaxModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteTaxModal">Edit Tax</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" id="deleteTaxForm">
                                            <div class="modal-body">
                                                @csrf
                                                @method('DELETE')
                                                <h4 class="modal-title">Delete</h4>
                                                <input type="hidden" id="tax_id" name="tax_id">
                                                <p class="mb-4">Are you sure want to delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tax Name</th>
                                        <th scope="col">Tax Percentage(%)</th>
                                        <th scope="col" width="3%"><i class="fa fa-edit"></i></th>
                                        <th scope="col" width="3%"><i class="fa fa-trash-o"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <td>'+item.percentage+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash-o"></i></button></td>\
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
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                            $('#deleteTax').modal('hide');
                        }
                        else {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
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
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
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
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                            $('#editTaxForm')[0].reset();
                            $('#editTax').modal('hide');
                            fetchTaxes();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(error.message);
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
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                            $('#addTaxForm')[0].reset();
                            $('#addTax').modal('hide')
                            // alert("Lawyer Type Add Successfully")
                            fetchTaxes()
                        }
                    },
                    error: function (error){
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(error.message);
                        $('#addTax').modal('show')
                        // alert("Lawyer Type not added")
                    }
                });
            });
        });
    </script>
@endsection
