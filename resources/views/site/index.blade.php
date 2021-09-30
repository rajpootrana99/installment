@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Sites</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Sites</a></li>
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
                        <div class="card-title mt-4">Sites
                            <a href="" data-toggle="modal" data-target="#addSite" id="addSiteButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Site </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Site Name</th>
                                    <th>Company Name</th>
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
    <div class="modal fade" id="addSite" tabindex="-1" role="dialog" aria-labelledby="addSiteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addSiteLabel">Site</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addSiteForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="company_id" class="col-form-label text-right">Select Company</label>
                                    <select name="company_id" id="company_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text company_id_error"></span>
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

    <div class="modal fade" id="editSite" tabindex="-1" role="dialog" aria-labelledby="editSiteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editSiteLabel">Site</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editSiteForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="site_id" name="site_id">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="company_id" class="col-form-label text-right">Select Company</label>
                                    <select name="company_id" id="edit_company_id" class="form-control edit_company_id">

                                    </select>
                                    <span class="text-danger error-text company_id_update_error"></span>
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

    <div class="modal fade" id="deleteSite" tabindex="-1" role="dialog" aria-labelledby="deleteSiteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteSiteLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteSiteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="site_id" name="site_id">
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

            fetchSites();

            function fetchSites()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchSites",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.sites, function (key, item) {
                            console.log(response.sites);
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.company.name+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '#addSiteButton', function (e) {
                e.preventDefault();
                $('#addSite').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: 'get',
                    url: 'site/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addSite').modal('hide');
                        }
                        else {
                            var company_id = $('#company_id');
                            $('#company_id').children().remove().end()
                            $.each(response.companies, function (company) {
                                company_id.append($("<option />").val(response.companies[company].id).text(response.companies[company].name));
                            });
                        }
                    }
                });
            })

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var site_id = $(this).val();
                $('#deleteSite').modal('show');
                $('#site_id').val(site_id)
            });

            $(document).on('submit', '#deleteSiteForm', function (e) {
                e.preventDefault();
                var site_id = $('#site_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'site/'+site_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteSite').modal('hide');
                        }
                        else {
                            fetchSites();
                            $('#deleteSite').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var site_id = $(this).val();
                $('#editSite').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'site/'+site_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editSite').modal('hide');
                        }
                        else {
                            var company_id = $('#edit_company_id');
                            $('#edit_company_id').children().remove().end()
                            $.each(response.companies, function (company) {
                                company_id.append($("<option />").val(response.companies[company].id).text(response.companies[company].name));
                            });
                            $('#site_id').val(response.site.id);
                            $('#edit_name').val(response.site.name);
                            $('#edit_company_id').val(response.site.company_id).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editSiteForm', function (e) {
                e.preventDefault();
                var site_id = $('#site_id').val();
                let EditFormData = new FormData($('#editSiteForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "site/"+site_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editSite').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editSiteForm')[0].reset();
                            $('#editSite').modal('hide');
                            fetchSites();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editSite').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addSiteForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addSiteForm')[0]);
                $.ajax({
                    type: "post",
                    url: "site",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addSite').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addSiteForm')[0].reset();
                            $('#addSite').modal('hide')
                            fetchSites()
                        }
                    },
                    error: function (error){
                        $('#addSite').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
