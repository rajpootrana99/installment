@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Purchase Invoice</h4>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                            <div class="card-title">Goods</div>
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
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="goods_id" class="col-form-label text-right">Select Goods</label>
                                        <select class="select2 mb-3 form-control custom-select" name="goods_id" id="goods_id" style="width: 100%; height:36px;" data-placeholder="Select Goods">

                                        </select>
                                        <span class="text-danger error-text goods_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="shipment_date" class="col-form-label text-right text-white">New Good</label>
                                        <button data-toggle="modal" data-target="#addGood" id="addGoodButton" style="border: 1px solid #E3EBF6; background: #FFFFFF; height: 38px; width: 38px; border-radius: 5px;"><i class="fas fa-cogs"></i></button>
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
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="shipment_date" class="col-form-label text-right text-white">New Good</label>
                                        <button data-toggle="modal" data-target="#addBroker" id="addBrokerButton" style="border: 1px solid #E3EBF6; background: #FFFFFF; height: 38px; width: 38px; border-radius: 5px;"><i class="fas fa-cogs"></i></button>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!-- end col -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Goods Detail</div>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-centered">
                                    <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="10%">Invoice No</th>
                                        <th width="20%">Bilty No</th>
                                        <th width="20%">Vehicle No</th>
                                        <th width="5%">Qty</th>
                                        <th width="15%">Gate Pass No</th>
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
                            <div class="card-title">Purchase Detail</div>
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
                                        <th width="11%">Discount 1</th>
                                        <th width="11%">Discount 2</th>
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
                                        <td colspan="5" class="text-right"><strong>Sub Total</strong></td>
                                        <td><input type="text" style="height: 30px" name="gross_value" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="discount_1_total" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="discount_2_total" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="tax_total" class="form-control" /></td>
                                        <td colspan="3"><input type="text" style="height: 30px" name="sub_total" class="form-control" /></td>
                                    </tr>
                                    </tfoot>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                            <div class="float-right mt-3">
                                <div class="row">
                                    <div class="form-group col-5">
                                        <label for="other_expenses" class="col-form-label text-right" style="color: #000000"><strong>Other Expenses</strong></label>
                                    </div>
                                    <div class="form-group col-7">
                                        <input type="text" style="height: 30px" name="other_expenses" class="form-control" />
                                    </div>
                                </div>
                                <span class="text-danger error-text other_expenses_error"></span>
                                <div class="form-group">
                                    <label for="user_id" class="col-form-label text-right" style="color: #000000"><i data-toggle="modal" data-target="#extraDiscount" id="extraDiscountButton" class="fa fa-plus-circle" style="color: #000000"></i><strong> Extra Discount</strong></label>
                                    <input type="text" style="height: 30px" name="extra_discount" class="form-control" />
                                    <span class="text-danger error-text extra_discount_error"></span>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="net_value" class="col-form-label text-right" style="color: #000000"><strong>Net Value</strong></label>
                                    </div>
                                    <div class="form-group col-8">
                                        <input type="text" style="height: 30px" name="net_value" class="form-control" />
                                    </div>
                                </div>
                                <span class="text-danger error-text net_value_error"></span>
                                <div class="form-group">
                                    <label for="user_id" class="col-form-label text-right" style="color: #000000"><strong>Remarks</strong></label>
                                    <input type="text" style="height: 30px" name="remarks" class="form-control" />
                                    <span class="text-danger error-text remarks_error"></span>
                                </div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </div><!--end card-->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </form>

        <div class="modal fade" id="selectTax" tabindex="-1" role="dialog" aria-labelledby="selectTaxLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="selectTaxLabel">Taxes</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <form method="post" id="selectTaxForm">
                        @csrf
                        <input type="hidden" id="tax_field_id">
                        <div class="form-group p-3">
                            <label for="tax_id" class="col-form-label text-right">Select Tax</label>
                            <select class="select2 mb-3 form-control custom-select" name="tax_id" id="tax_id" style="width: 100%; height:36px;" data-placeholder="Select Tax">

                            </select>
                            <span class="text-danger error-text tax_id_error"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div><!--end modal-footer-->
                    </form>
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div>
        <div class="modal fade" id="selectDiscountOne" tabindex="-1" role="dialog" aria-labelledby="selectDiscountOneLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="selectDiscountOneLabel">Discount 1 Percentage</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <form method="post" id="selectDiscountOneForm">
                        @csrf
                        <input type="hidden" id="discount_1_field_id">
                        <div class="form-group p-3">
                            <label for="discount_1_percentage" class="col-form-label text-right">Enter Discount Percentage</label>
                            <input class="form-control" type="text" name="discount_1_percentage" id="discount_1_percentage" placeholder="Enter Percentage">
                            <span class="text-danger error-text discount_1_percentage_error"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div><!--end modal-footer-->
                    </form>
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div>
        <div class="modal fade" id="selectDiscountTwo" tabindex="-1" role="dialog" aria-labelledby="selectDiscountTwoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="selectDiscountTwoLabel">Discount 2 Percentage</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <form method="post" id="selectDiscountTwoForm">
                        @csrf
                        <input type="hidden" id="discount_2_field_id">
                        <div class="form-group p-3">
                            <label for="discount_2_percentage" class="col-form-label text-right">Enter Discount Percentage</label>
                            <input class="form-control" type="text" name="discount_2_percentage" id="discount_2_percentage" placeholder="Enter Percentage">
                            <span class="text-danger error-text discount_2_percentage_error"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div><!--end modal-footer-->
                    </form>
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div>
        <div class="modal fade" id="addBroker" tabindex="-1" role="dialog" aria-labelledby="addBrokerLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="addBrokerLabel">Broker</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <form method="post" id="addBrokerForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-right">Broker Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Enter Name" id="broker_name">
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
        <div class="modal fade" id="addGood" tabindex="-1" role="dialog" aria-labelledby="addGoodLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="addGoodLabel">Goods</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <form method="post" id="addGoodForm">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-right">Goods Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Enter Name" id="goods_name">
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
        <div class="modal fade" id="extraDiscount" tabindex="-1" role="dialog" aria-labelledby="extraDiscountLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="extraDiscountLabel">Extra Discount Percentage</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <form method="post" id="extraDiscountForm">
                        @csrf
                        <div class="form-group p-3">
                            <label for="discount_1_percentage" class="col-form-label text-right">Enter Discount Percentage</label>
                            <input class="form-control" type="text" name="extra_discount_percentage" id="extra_discount_percentage" placeholder="Enter Percentage">
                            <span class="text-danger error-text extra_discount_percentage_error"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div><!--end modal-footer-->
                    </form>
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div>
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
                html += '<td><select class="select2 form-control custom-select" name="item_id[]" id="item_id_'+number+'" style="width: 100%; height:30px;" data-placeholder="Select Item"></select></td>';
                html += '<td><input type="text" style="height: 30px" name="barcode[]" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="qty[]" id="qty_'+number+'" onchange="gross_total('+number+')" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="rate[]" id="rate_'+number+'" onchange="gross_total('+number+')" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="gross_total[]" readonly id="gross_total_'+number+'" class="form-control" /></td>';
                html += '<td><div class="row"><input type="text" style="height: 30px" readonly id="discount_1_amount_'+number+'" class="form-control col-8 ml-2" /><input type="hidden" name="discount_1[]" id="discount_1_'+number+'"><button class="col-2" data-toggle="modal" data-target="#selectDiscountOne" id="selectDiscountOneButton" value="'+number+'" style="border: none; background: #FFFFFF;"><i class="fa fa-plus-circle"></i></button></div><label id="discount_1_percentage_'+number+'"></label></td>';
                html += '<td><div class="row"><input type="text" style="height: 30px" readonly id="discount_2_amount_'+number+'" class="form-control col-8 ml-2" /><input type="hidden" name="discount_2[]" id="discount_2_'+number+'"><button class="col-2" data-toggle="modal" data-target="#selectDiscountTwo" id="selectDiscountTwoButton" value="'+number+'" style="border: none; background: #FFFFFF;"><i class="fa fa-plus-circle"></i></button></div><label id="discount_2_percentage_'+number+'"></label></td>';
                html += '<td><div class="row"><input type="text" style="height: 30px" readonly id="tax_amount_'+number+'" class="form-control col-8 ml-2" /><input type="hidden" name="tax_id[]" id="tax_id_'+number+'"><button class="col-2" data-toggle="modal" data-target="#selectTax" id="selectTaxButton" value="'+number+'" style="border: none; background: #FFFFFF;"><i class="fa fa-plus-circle"></i></button></div><label id="tax_name_'+number+'"></label></td>';
                html += '<td><input type="text" style="height: 30px" name="total[]" readonly id="total_'+number+'" class="form-control" /></td>';
                if (number > 1){
                    html += '<td><button style="border: none; background-color: #fff" name="addItems" id="addItems"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td><button style="border: none; background-color: #fff" name="removeItems" id="removeItems"><i class="fa fa-minus-circle"></i></button></td></tr>';
                    $('#itemsDetailTableBody').append(html);
                    fetchItems();
                    fetchTaxes();
                }
                else {
                    html += '<td><button style="border: none; background-color: #fff" name="addItems" id="addItems"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td></td></tr>';
                    $('#itemsDetailTableBody').html(html);
                    fetchItems();
                    fetchTaxes();
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

            function subTotal(){
                for (let i = 0; i < itemsCount; i++){

                }
            }

            fetchItems();
            fetchTaxes();
            fetchGoods();
            fetchBrokers();

            function fetchItems()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchItems",
                    dataType: "json",
                    success: function (response) {
                        var item_id = $('#item_id_'+itemsCount+'');
                        $('#item_id_'+itemsCount+'').children().remove().end()
                        $.each(response.items, function (item) {
                            item_id.append($("<option />").val(response.items[item].id).text(response.items[item].name));
                        });
                    }
                });
            }

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

            function fetchGoods()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchGoods",
                    dataType: "json",
                    success: function (response) {
                        var goods_id = $('#goods_id');
                        $('#goods_id').children().remove().end()
                        $.each(response.goods, function (good) {
                            goods_id.append($("<option />").val(response.goods[good].id).text(response.goods[good].name));
                        });
                    }
                });
            }

            function fetchBrokers()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchBrokers",
                    dataType: "json",
                    success: function (response) {
                        var broker_id = $('#broker_id');
                        $('#broker_id').children().remove().end()
                        $.each(response.brokers, function (broker) {
                            broker_id.append($("<option />").val(response.brokers[broker].id).text(response.brokers[broker].name));
                        });
                    }
                });
            }

            $(document).on('submit', '#addGoodForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addGoodForm')[0]);
                $.ajax({
                    type: "post",
                    url: "goods",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addGood').modal('show');
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addGoodForm')[0].reset();
                            $('#addGood').modal('hide');
                            fetchGoods();
                        }
                    },
                    error: function (error){
                        $('#addGood').modal('show');
                    }
                });
            });

            $(document).on('submit', '#addBrokerForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addBrokerForm')[0]);
                $.ajax({
                    type: "post",
                    url: "broker",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addBroker').modal('show');
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addBrokerForm')[0].reset();
                            $('#addBroker').modal('hide');
                            fetchBrokers();
                        }
                    },
                    error: function (error){
                        $('#addBroker').modal('show');
                    }
                });
            });

            $(document).on('click', '#selectTaxButton', function (e){
                e.preventDefault();
                var tax_field_id = $(this).val();
                $('#selectTax').modal('show');
                $('#tax_field_id').val(tax_field_id);
            });

            $(document).on('submit', '#selectTaxForm', function (e){
                e.preventDefault();
                let tax_field_id = $('#tax_field_id').val();
                let tax_name = $('#tax_id option:selected').text();
                let tax_id = $('#tax_id').val();
                let gross_total = $('#gross_total_'+tax_field_id+'').val();
                $('#tax_id_'+tax_field_id+'').val(tax_id);
                $('#tax_name_'+tax_field_id+'').text(tax_name);
                $.ajax({
                    type: "GET",
                    url: "fetchTaxPercentage/"+tax_id,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 0) {
                            $('#selectTax').modal('hide');
                        }
                        else {
                            let tax_amount = parseFloat(gross_total)/100 * parseFloat(response.tax.percentage);
                            $('#tax_amount_'+tax_field_id+'').val(tax_amount);
                            $('#selectTax').modal('hide');
                            total(tax_field_id);
                        }
                    }
                });
            });

            $(document).on('click', '#selectDiscountOneButton', function (e){
                e.preventDefault();
                var discount_1_field_id = $(this).val();
                $('#selectDiscountOne').modal('show');
                $('#discount_1_field_id').val(discount_1_field_id);
            });

            $(document).on('submit', '#selectDiscountOneForm', function (e){
                e.preventDefault();
                let discount_1_field_id = $('#discount_1_field_id').val();
                let discount_1_percentage = $('#discount_1_percentage').val();
                let gross_total = $('#gross_total_'+discount_1_field_id+'').val();
                let discount_1_amount = parseFloat(gross_total)/100 * parseFloat(discount_1_percentage)
                $('#discount_1_amount_'+discount_1_field_id+'').val(discount_1_amount);
                $('#discount_1_percentage_'+discount_1_field_id+'').text('discount @'+discount_1_percentage+'%');
                $('#discount_1_'+discount_1_field_id+'').val(discount_1_percentage);
                $('#selectDiscountOneForm')[0].reset();
                $('#selectDiscountOne').modal('hide');
                total(discount_1_field_id)
            });

            $(document).on('click', '#selectDiscountTwoButton', function (e){
                e.preventDefault();
                var discount_2_field_id = $(this).val();
                $('#selectDiscountTwo').modal('show');
                $('#discount_2_field_id').val(discount_2_field_id);
            });

            $(document).on('submit', '#selectDiscountTwoForm', function (e){
                e.preventDefault();
                let discount_2_field_id = $('#discount_2_field_id').val();
                let discount_2_percentage = $('#discount_2_percentage').val();
                let discount_1_amount = $('#discount_1_amount_'+discount_2_field_id+'').val();
                let gross_total = $('#gross_total_'+discount_2_field_id+'').val();
                gross_total = parseFloat(gross_total) - parseFloat(discount_1_amount);
                let discount_2_amount = parseFloat(gross_total)/100 * parseFloat(discount_2_percentage)
                $('#discount_2_amount_'+discount_2_field_id+'').val(discount_2_amount);
                $('#discount_2_percentage_'+discount_2_field_id+'').text('discount @'+discount_2_percentage+'%');
                $('#discount_2_'+discount_2_field_id+'').val(discount_2_percentage);
                $('#selectDiscountTwoForm')[0].reset();
                $('#selectDiscountTwo').modal('hide');
                total(discount_2_field_id)
            });
        });

        function gross_total(number){
            var qty = $('#qty_'+number+'').val();
            var rate = $('#rate_'+number+'').val();
            var gross_total = parseInt(qty) * parseInt(rate);
            if (!isNaN(gross_total)){
                $('#gross_total_'+number+'').val(gross_total);
                total(number);
            }
            else {
                $('#gross_total_'+number+'').val(0.00);
                total(number);
            }
        }

        function total(number){
            var gross_total = $('#gross_total_'+number+'').val();
            if (gross_total == ''){
                gross_total = 0;
            }
            var discount_1_amount = $('#discount_1_amount_'+number+'').val();
            if (discount_1_amount == ''){
                discount_1_amount = 0;
            }
            var discount_2_amount = $('#discount_2_amount_'+number+'').val();
            if (discount_2_amount == ''){
                discount_2_amount = 0;
            }
            var tax_amount = $('#tax_amount_'+number+'').val();
            if (tax_amount == ''){
                tax_amount = 0;
            }
            console.log(gross_total);
            console.log(discount_1_amount);
            console.log(discount_2_amount);
            console.log(tax_amount);
            var total = (parseFloat(gross_total) - parseFloat(discount_1_amount) - parseFloat(discount_2_amount)) + parseFloat(tax_amount);
            console.log(total);
            if (!isNaN(total)){
                $('#total_'+number+'').val(total.toFixed(2));
            }
            else {
                $('#total_'+number+'').val(0);
            }
        }
    </script>
@endsection
