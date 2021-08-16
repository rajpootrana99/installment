@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Items</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Items</a></li>
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
                        <div class="card-title mt-4">Items
                            <a href="" data-toggle="modal" data-target="#addItem" id="addItemButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Item </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="8%">Item Code</th>
                                    <th width="15%">Name</th>
                                    <th width="20%">Description</th>
                                    <th width="8%">Cost Price</th>
                                    <th width="10%">Sale Price 1</th>
                                    <th width="10%">Status</th>
                                    <th>Remarks</th>
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
    <div class="modal fade bd-example-modal-lg" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addItemLabel">Item</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addItemForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="item_code" class="col-form-label text-right">Item Code</label>
                                    <input class="form-control" type="text" name="item_code" id="item_code">
                                    <span class="text-danger error-text item_code_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="category_id" class="col-form-label text-right">Select Category</label>
                                    <select name="category_id" id="category_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text category_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="sub_category_id" class="col-form-label text-right">Select Sub Category</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text sub_category_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="manufacturer_id" class="col-form-label text-right">Select Manufacturer</label>
                                    <select name="manufacturer_id" id="manufacturer_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text manufacturer_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="warehouse_id" class="col-form-label text-right">Select Warehouse</label>
                                    <select name="warehouse_id" id="warehouse_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text warehouse_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-right">Item Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Name" id="name">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="image" class="col-form-label text-right">Item Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <span class="text-danger error-text image_error"></span>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description" class="col-form-label text-right">Description</label>
                                    <input class="form-control" type="text" name="description" placeholder="Enter Description" id="description">
                                    <span class="text-danger error-text description_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="company_price" class="col-form-label text-right">Company Price</label>
                                    <input class="form-control" type="text" name="company_price" placeholder="Enter Company Price" id="company_price">
                                    <span class="text-danger error-text company_price_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="purchase_price" class="col-form-label text-right">Purchase Price</label>
                                    <input class="form-control" type="text" name="purchase_price" placeholder="Enter Purchase Price" id="purchase_price">
                                    <span class="text-danger error-text purchase_price_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cost_price" class="col-form-label text-right">Cost Price</label>
                                    <input class="form-control" type="text" name="cost_price" placeholder="Enter Cost Price" id="cost_price">
                                    <span class="text-danger error-text cost_price_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="sale_price_format" class="col-form-label text-right">Sale Price In</label>
                                    <div class="row ml-1">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio7" name="sale_price_format" value="0" class="sale_price_format custom-control-input">
                                                <label class="custom-control-label" for="customRadio7">%</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio8" name="sale_price_format" value="1" class="sale_price_format custom-control-input">
                                                <label class="custom-control-label" for="customRadio8">Value</label>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text sale_price_format_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="sale_price_1" class="col-form-label text-right">Sale Price 1</label>
                                    <input class="form-control" type="text" name="sale_price_1" id="sale_price_1">
                                    <span class="text-danger error-text sale_price_1_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="sale_price_2" class="col-form-label text-right">Sale Price 2</label>
                                    <input class="form-control" type="text" name="sale_price_2" id="sale_price_2">
                                    <span class="text-danger error-text sale_price_2_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="sale_price_3" class="col-form-label text-right">Sale Price 3</label>
                                    <input class="form-control" type="text" name="sale_price_3" id="sale_price_3">
                                    <span class="text-danger error-text sale_price_3_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="sale_price_4" class="col-form-label text-right">Sale Price 4</label>
                                    <input class="form-control" type="text" name="sale_price_4" id="sale_price_4">
                                    <span class="text-danger error-text sale_price_4_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="sale_price_5" class="col-form-label text-right">Sale Price 5</label>
                                    <input class="form-control" type="text" name="sale_price_5" id="sale_price_5">
                                    <span class="text-danger error-text sale_price_5_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="is_sale_price_defined" class="col-form-label text-right">Sale Price defined on which price</label>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio9" name="is_sale_price_defined" value="0" class="is_sale_price_defined custom-control-input">
                                            <label class="custom-control-label" for="customRadio9">Purchase Price</label>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio10" name="is_sale_price_defined" value="1" class="is_sale_price_defined custom-control-input">
                                            <label class="custom-control-label" for="customRadio10">Company Price</label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text is_sale_price_defined_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="status" class="col-form-label text-right">Status</label>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio11" name="status" value="1" class="status custom-control-input">
                                            <label class="custom-control-label" for="customRadio11">Active</label>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio12" name="status" value="0" class="status custom-control-input">
                                            <label class="custom-control-label" for="customRadio12">Inactive</label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text status_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="remarks" class="col-form-label text-right">Remarks</label>
                                    <input class="form-control" type="text" name="remarks" placeholder="Enter Remarks" id="remarks">
                                    <span class="text-danger error-text remarks_error"></span>
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

    <div class="modal fade bd-example-modal-lg" id="editItem" tabindex="-1" role="dialog" aria-labelledby="editItemLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editItemLabel">Item</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editItemForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="item_id" id="item_id">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_item_code" class="col-form-label text-right">Item Code</label>
                                    <input class="form-control" type="text" name="item_code" id="edit_item_code">
                                    <span class="text-danger error-text item_code_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="edit_category_id" class="col-form-label text-right">Select Category</label>
                                    <select name="category_id" id="edit_category_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text category_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="edit_sub_category_id" class="col-form-label text-right">Select Sub Category</label>
                                    <select name="sub_category_id" id="edit_sub_category_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text sub_category_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_manufacturer_id" class="col-form-label text-right">Select Manufacturer</label>
                                    <select name="manufacturer_id" id="edit_manufacturer_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text manufacturer_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_warehouse_id" class="col-form-label text-right">Select Warehouse</label>
                                    <select name="warehouse_id" id="edit_warehouse_id" class="form-control">

                                    </select>
                                    <span class="text-danger error-text warehouse_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="edit_name" class="col-form-label text-right">Item Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Name" id="edit_name">
                                    <span class="text-danger error-text name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="image" class="col-form-label text-right">Item Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <span class="text-danger error-text image_update_error"></span>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_description" class="col-form-label text-right">Description</label>
                                    <input class="form-control" type="text" name="description" placeholder="Enter Description" id="edit_description">
                                    <span class="text-danger error-text description_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="edit_company_price" class="col-form-label text-right">Company Price</label>
                                    <input class="form-control" type="text" name="company_price" placeholder="Enter Company Price" id="edit_company_price">
                                    <span class="text-danger error-text company_price_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="edit_purchase_price" class="col-form-label text-right">Purchase Price</label>
                                    <input class="form-control" type="text" name="purchase_price" placeholder="Enter Purchase Price" id="edit_purchase_price">
                                    <span class="text-danger error-text purchase_price_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="edit_cost_price" class="col-form-label text-right">Cost Price</label>
                                    <input class="form-control" type="text" name="cost_price" placeholder="Enter Cost Price" id="edit_cost_price">
                                    <span class="text-danger error-text cost_price_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_sale_price_format" class="col-form-label text-right">Sale Price In</label>
                                    <div class="row ml-1">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio13" name="sale_price_format" value="0" class="edit_sale_price_format custom-control-input">
                                                <label class="custom-control-label" for="customRadio13">%</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio14" name="sale_price_format" value="1" class="edit_sale_price_format custom-control-input">
                                                <label class="custom-control-label" for="customRadio14">Value</label>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text sale_price_format_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_sale_price_1" class="col-form-label text-right">Sale Price 1</label>
                                    <input class="form-control" type="text" name="sale_price_1" id="edit_sale_price_1">
                                    <span class="text-danger error-text sale_price_1_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_sale_price_2" class="col-form-label text-right">Sale Price 2</label>
                                    <input class="form-control" type="text" name="sale_price_2" id="edit_sale_price_2">
                                    <span class="text-danger error-text sale_price_2_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_sale_price_3" class="col-form-label text-right">Sale Price 3</label>
                                    <input class="form-control" type="text" name="sale_price_3" id="edit_sale_price_3">
                                    <span class="text-danger error-text sale_price_3_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_sale_price_4" class="col-form-label text-right">Sale Price 4</label>
                                    <input class="form-control" type="text" name="sale_price_4" id="edit_sale_price_4">
                                    <span class="text-danger error-text sale_price_4_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_sale_price_5" class="col-form-label text-right">Sale Price 5</label>
                                    <input class="form-control" type="text" name="sale_price_5" id="edit_sale_price_5">
                                    <span class="text-danger error-text sale_price_5_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="edit_is_sale_price_defined" class="col-form-label text-right">Sale Price defined on which price</label>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio15" name="is_sale_price_defined" value="0" class="edit_is_sale_price_defined custom-control-input">
                                            <label class="custom-control-label" for="customRadio15">Purchase Price</label>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio16" name="is_sale_price_defined" value="1" class="edit_is_sale_price_defined custom-control-input">
                                            <label class="custom-control-label" for="customRadio16">Company Price</label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text is_sale_price_defined_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="edit_status" class="col-form-label text-right">Status</label>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio17" name="status" value="1" class="edit_status custom-control-input">
                                            <label class="custom-control-label" for="customRadio17">Active</label>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio18" name="status" value="0" class="edit_status custom-control-input">
                                            <label class="custom-control-label" for="customRadio18">Inactive</label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text status_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_remarks" class="col-form-label text-right">Remarks</label>
                                    <input class="form-control" type="text" name="remarks" placeholder="Enter Remarks" id="edit_remarks">
                                    <span class="text-danger error-text remarks_update_error"></span>
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

    <div class="modal fade" id="deleteItem" tabindex="-1" role="dialog" aria-labelledby="deleteItemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteItemLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteItemForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="item_id" name="item_id">
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

            fetchItems();

            function fetchItems()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchItems",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.items, function (key, item) {
                            if (item.is_sale_price_defined == 'Purchase Price'){
                                var salePrice = item.purchase_price/100 * item.sale_price_1;
                                salePrice = Number(salePrice) + Number(item.purchase_price);
                            }
                            else {
                                var salePrice = item.company_price/100 * item.sale_price_1;
                                salePrice = Number(salePrice) + Number(item.company_price);
                            }
                            $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.item_code+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.description+'</td>\
                            <td>'+item.cost_price+'</td>\
                            @if('+item.is_sale_price_defined+' == 'Purchase Price')\
                                <td>'+salePrice.toFixed(2)+'</td>\
                            @else\
                                <td>'+salePrice.toFixed(2)+'</td>\
                            @endif\
                            <td>'+item.status+'</td>\
                            <td>'+item.remarks+'</td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+item.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            function numberFormat(num){
                return parseFloat(num).toFixed(2);
            }

            $(document).on('click', '#addItemButton', function (e) {
                e.preventDefault();
                $('#addItem').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: 'get',
                    url: 'item/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addItem').modal('hide');
                        }
                        else {
                            var category_id = $('#category_id');
                            $('#category_id').children().remove().end()
                            $.each(response.categories, function (category) {
                                category_id.append($("<option />").val(response.categories[category].id).text(response.categories[category].name));
                            });
                            var sub_category_id = $('#sub_category_id');
                            $('#sub_category_id').children().remove().end()
                            $.each(response.subCategories, function (subCategory) {
                                sub_category_id.append($("<option />").val(response.subCategories[subCategory].id).text(response.subCategories[subCategory].name));
                            });
                            var manufacturer_id = $('#manufacturer_id');
                            $('#manufacturer_id').children().remove().end()
                            $.each(response.manufacturers, function (manufacturer) {
                                manufacturer_id.append($("<option />").val(response.manufacturers[manufacturer].id).text(response.manufacturers[manufacturer].name));
                            });
                            var warehouse_id = $('#warehouse_id');
                            $('#warehouse_id').children().remove().end()
                            $.each(response.warehouses, function (warehouse) {
                                warehouse_id.append($("<option />").val(response.warehouses[warehouse].id).text(response.warehouses[warehouse].name));
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var item_id = $(this).val();
                $('#deleteItem').modal('show');
                $('#item_id').val(item_id)
            });

            $(document).on('submit', '#deleteItemForm', function (e) {
                e.preventDefault();
                var item_id = $('#item_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'item/'+item_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteItem').modal('hide');
                        }
                        else {
                            fetchItems();
                            $('#deleteItem').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var item_id = $(this).val();
                $('#editItem').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'item/'+item_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editItem').modal('hide');
                        }
                        else {
                            var category_id = $('#edit_category_id');
                            $('#edit_category_id').children().remove().end()
                            $.each(response.categories, function (category) {
                                category_id.append($("<option />").val(response.categories[category].id).text(response.categories[category].name));
                            });
                            var sub_category_id = $('#edit_sub_category_id');
                            $('#edit_sub_category_id').children().remove().end()
                            $.each(response.subCategories, function (subCategory) {
                                sub_category_id.append($("<option />").val(response.subCategories[subCategory].id).text(response.subCategories[subCategory].name));
                            });
                            var manufacturer_id = $('#edit_manufacturer_id');
                            $('#edit_manufacturer_id').children().remove().end()
                            $.each(response.manufacturers, function (manufacturer) {
                                manufacturer_id.append($("<option />").val(response.manufacturers[manufacturer].id).text(response.manufacturers[manufacturer].name));
                            });
                            var warehouse_id = $('#edit_warehouse_id');
                            $('#edit_warehouse_id').children().remove().end()
                            $.each(response.warehouses, function (warehouse) {
                                warehouse_id.append($("<option />").val(response.warehouses[warehouse].id).text(response.warehouses[warehouse].name));
                            });
                            console.log(response);
                            $('#item_id').val(response.item.id);
                            $('#edit_item_code').val(response.item.item_code);
                            $('#edit_name').val(response.item.name);
                            $('#edit_description').val(response.item.description);
                            $('#edit_company_price').val(response.item.company_price);
                            $('#edit_purchase_price').val(response.item.purchase_price);
                            $('#edit_cost_price').val(response.item.cost_price);
                            $('#edit_category_id').val(response.item.category_id).change();
                            $('#edit_sub_category_id').val(response.item.sub_category_id).change();
                            $('#edit_manufacturer_id').val(response.item.manufacturer_id).change();
                            $('#edit_warehouse_id').val(response.item.warehouse_id).change();
                            $("input[name='is_sale_price_defined'][value="+response.is_sale_price_defined+"]").prop("checked", true);
                            $("input[name='sale_price_format'][value='0']").prop("checked", true);
                            $("input[name='status'][value="+response.status+"]").prop("checked", true);
                            $('#edit_remarks').val(response.item.remarks);
                            $('#edit_sale_price_1').val(numberFormat(response.item.sale_price_1));
                            $('#edit_sale_price_2').val(numberFormat(response.item.sale_price_2));
                            $('#edit_sale_price_3').val(numberFormat(response.item.sale_price_3));
                            $('#edit_sale_price_4').val(numberFormat(response.item.sale_price_4));
                            $('#edit_sale_price_5').val(numberFormat(response.item.sale_price_5));
                        }
                    }
                });
            });

            $(document).on('submit', '#editItemForm', function (e) {
                e.preventDefault();
                var item_id = $('#item_id').val();
                let EditFormData = new FormData($('#editItemForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "item/"+item_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editItem').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editItemForm')[0].reset();
                            $('#editItem').modal('hide');
                            fetchItems();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editItem').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addItemForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addItemForm')[0]);
                $.ajax({
                    type: "post",
                    url: "item",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addItem').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addItemForm')[0].reset();
                            $('#addItem').modal('hide')
                            fetchItems()
                        }
                    },
                    error: function (error){
                        $('#addItem').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
