@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Purchase</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Purchase</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
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
                        <div class="card-title mt-4">Purchase</div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="invoice_no" class="col-form-label text-right">Invoice Number</label>
                                    <input class="form-control" type="text" name="invoice_no" placeholder="Enter Invoice No." id="invoice_no">
                                    <span class="text-danger error-text invoice_no_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="date" class="col-form-label text-right">Date</label>
                                    <input class="form-control" type="date" name="date" id="date">
                                    <span class="text-danger error-text date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="vendor_id" class="col-form-label text-right">Select Vendor</label>
                                    <select class="select2 mb-3 form-control custom-select" name="vendor_id" id="vendor_id" style="width: 100%; height:36px;" data-placeholder="Select Vendor">
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text vendor_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="vendor_invoice_no" class="col-form-label text-right">Vendor Invoice Number</label>
                                    <input class="form-control" type="text" name="vendor_invoice_no" placeholder="Enter Vendor Invoice No." id="vendor_invoice_no">
                                    <span class="text-danger error-text vendor_invoice_no_error"></span>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-4">Goods</div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="bilty_no" class="col-form-label text-right">Bilty No</label>
                                    <input class="form-control" type="text" name="bilty_no" placeholder="Enter Bilty No." id="bilty_no">
                                    <span class="text-danger error-text bilty_no_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="goods_name" class="col-form-label text-right">Goods Name</label>
                                    <input class="form-control" type="text" name="goods_name" placeholder="Enter Goods Name" id="goods_name">
                                    <span class="text-danger error-text goods_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="shipment_date" class="col-form-label text-right">Shipment Date</label>
                                    <input class="form-control" type="date" name="shipment_date" id="shipment_date">
                                    <span class="text-danger error-text shipment_date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="delivery_date" class="col-form-label text-right">Delivery Date</label>
                                    <input class="form-control" type="date" name="delivery_date" id="delivery_date">
                                    <span class="text-danger error-text delivery_date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="broker_id" class="col-form-label text-right">Select Broker</label>
                                    <select class="select2 mb-3 form-control custom-select" name="broker_id" id="broker_id" style="width: 100%; height:36px;" data-placeholder="Select Broker">

                                    </select>
                                    <span class="text-danger error-text broker_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="user_id" class="col-form-label text-right">Select User</label>
                                    <select class="select2 mb-3 form-control custom-select" name="user_id" id="user_id" style="width: 100%; height:36px;" data-placeholder="Select User">

                                    </select>
                                    <span class="text-danger error-text user_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="system_name" class="col-form-label text-right">System Name</label>
                                    <input class="form-control" type="text" name="system_name" placeholder="Enter System Name" id="system_name">
                                    <span class="text-danger error-text system_name_error"></span>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-4">Goods Detail</div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="10%">Invoice No</th>
                                    <th width="10%">Bilty No</th>
                                    <th width="10%">Vehicle No</th>
                                    <th width="5%">Qty</th>
                                    <th width="25%">Gate Pass No</th>
                                    <th width="3%"><i class="fa fa-plus-circle"></i></th>
                                    <th width="3%"><i class="fa fa-minus-circle"></i></th>
                                </tr>
                                </thead>
                                <tbody id="goodsDetailTableBody">

                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-4">Purchase Detail</div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th width="15%">Item</th>
                                    <th width="10%">Barcode</th>
                                    <th width="5%">Qty</th>
                                    <th width="10%">Rate</th>
                                    <th width="10%">Gross Total</th>
                                    <th width="10%">Discount 1</th>
                                    <th width="10%">Discount 2</th>
                                    <th width="15%">Tax</th>
                                    <th width="10%">Total</th>
                                    <th width="3%"><i class="fa fa-plus-circle"></i></th>
                                    <th width="3%"><i class="fa fa-minus-circle"></i></th>
                                </tr>
                                </thead>
                                <tbody id="itemsDetailTableBody">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td><input type="text" style="height: 30px" name="gross_value" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="discount_1_total" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="discount_2_total" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="tax_total" class="form-control" /></td>
                                        <td colspan="3"></td>
                                    </tr>
                                </tfoot>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>

    <script>
        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var goodsCount = 1;
            goodsDetailDynamicField(goodsCount);
            function goodsDetailDynamicField(number){
                html = '<tr>';
                html += '<td>'+number+'</td>';
                html += '<td><input type="text" style="height: 30px" name="invoice_id[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="bilty_id[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="vehicle_no[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="qty[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="gate_pass_no[]" class="form-control" /></td>';
                if (number > 1){
                    html += '<td><button style="border: none; background-color: #fff" name="addGoods" id="addGoods"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td><button style="border: none; background-color: #fff" name="removeGoods" id="removeGoods"><i class="fa fa-minus-circle"></i></button></td></tr>';
                    $('#goodsDetailTableBody').append(html);
                }
                else {
                    html += '<td><button style="border: none; background-color: #fff" name="addGoods" id="addGoods"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td></td></tr>';
                    $('#goodsDetailTableBody').html(html);
                }
            }
            $(document).on('click', '#addGoods', function (e){
                e.preventDefault();
                goodsCount++;
                goodsDetailDynamicField(goodsCount);
            });
            $(document).on('click', '#removeGoods', function (e){
                e.preventDefault();
                goodsCount--;
                $(this).closest("tr").remove();
            });

            var itemsCount = 1;
            itemsDetailDynamicField(itemsCount);
            function itemsDetailDynamicField(number){
                html = '<tr>';
                html += '<td>'+number+'</td>';
                html += '<td><select class="select2 form-control custom-select" name="item_id[]" id="item_id" style="width: 100%; height:30px;" data-placeholder="Select Item"></select></td>';
                html += '<td><input type="text" style="height: 30px" name="barcode[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="qty[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="rate[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="gross_total[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="discount_1[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="discount_2[]" class="form-control" /></td>';
                html += '<td><select class="select2 form-control custom-select" name="tax_id[]" id="tax_id" style="width: 100%; height:30px;" data-placeholder="Select Tax"></select></td>';
                html += '<td><input type="text" style="height: 30px" name="total[]" class="form-control" /></td>';
                if (number > 1){
                    html += '<td><button style="border: none; background-color: #fff" name="addItems" id="addItems"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td><button style="border: none; background-color: #fff" name="removeItems" id="removeItems"><i class="fa fa-minus-circle"></i></button></td></tr>';
                    $('#itemsDetailTableBody').append(html);
                }
                else {
                    html += '<td><button style="border: none; background-color: #fff" name="addItems" id="addItems"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td></td></tr>';
                    $('#itemsDetailTableBody').html(html);
                }
            }
            $(document).on('click', '#addItems', function (e){
                e.preventDefault();
                itemsCount++;
                itemsDetailDynamicField(itemsCount);
            });
            $(document).on('click', '#removeItems', function (e){
                e.preventDefault();
                itemsCount--;
                $(this).closest("tr").remove();
            });

            fetchItems();

            function fetchItems()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchItems",
                    dataType: "json",
                    success: function (response) {

                        var item_id = $('#item_id');
                        $('#item_id').children().remove().end()
                        $.each(response.items, function (item) {
                            item_id.append($("<option />").val(response.items[item].id).text(response.items[item].name));
                        });
                    }
                });
            }

            fetchTaxes();

            function fetchTaxes()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchTax",
                    dataType: "json",
                    success: function (response) {

                        var tax_id = $('#tax_id');
                        $('#tax_id').children().remove().end()
                        $.each(response.taxes, function (tax) {
                            tax_id.append($("<option />").val(response.taxes[tax].id).text(response.taxes[tax].name+' '+response.taxes[tax].percentage+'%'));
                        });
                    }
                });
            }

            $(document).on('click', '#addSubHeadButton', function (e) {
                e.preventDefault();
                $('#addSubHead').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: 'get',
                    url: 'subHead/create',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#addSubHead').modal('hide');
                        }
                        else {
                            var head_id = $('#head_id');
                            $('#head_id').children().remove().end()
                            $.each(response.heads, function (head) {
                                head_id.append($("<option />").val(response.heads[head].id).text(response.heads[head].name));
                            });
                            $('#serial_code').val(pad(response.serial_code,2));
                        }
                    }
                });
            })

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var sub_head_id = $(this).val();
                $('#deleteSubHead').modal('show');
                $('#sub_head_id').val(sub_head_id)
            });

            $(document).on('submit', '#deleteSubHeadForm', function (e) {
                e.preventDefault();
                var sub_head_id = $('#sub_head_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'subHead/'+sub_head_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteSubHead').modal('hide');
                        }
                        else {
                            fetchSubHeads();
                            $('#deleteSubHead').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var sub_head_id = $(this).val();
                $('#editSubHead').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'subHead/'+sub_head_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editSubHead').modal('hide');
                        }
                        else {
                            var head_id = $('#edit_head_id');
                            $('#edit_head_id').children().remove().end()
                            $.each(response.heads, function (head) {
                                head_id.append($("<option />").val(response.heads[head].id).text(response.heads[head].name));
                            });
                            $('#sub_head_id').val(response.subHead.id);
                            $('#edit_name').val(response.subHead.name);
                            $('#edit_serial_code').val(response.subHead.serial_code);
                            $('#edit_head_id').val(response.subHead.head_id).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editSubHeadForm', function (e) {
                e.preventDefault();
                var sub_head_id = $('#sub_head_id').val();
                let EditFormData = new FormData($('#editSubHeadForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "subHead/"+sub_head_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editSubHead').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editSubHeadForm')[0].reset();
                            $('#editSubHead').modal('hide');
                            fetchSubHeads();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editSubHead').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addSubHeadForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addSubHeadForm')[0]);
                $.ajax({
                    type: "post",
                    url: "subHead",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addSubHead').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addSubHeadForm')[0].reset();
                            $('#addSubHead').modal('hide')
                            fetchSubHeads()
                        }
                    },
                    error: function (error){
                        $('#addSubHead').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
