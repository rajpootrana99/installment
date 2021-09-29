@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Sale Invoice</h4>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <form method="post" id="saleForm">
            @csrf
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
                                        <label for="customer_id" class="col-form-label text-right">Select Customer</label>
                                        <select class="select2 mb-3 form-control custom-select" name="customer_id" id="customer_id" style="width: 100%; height:36px;" data-placeholder="Select Customer">

                                        </select>
                                        <span class="text-danger error-text customer_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="site_id" class="col-form-label text-right">Select Site</label>
                                        <select class="select2 mb-3 form-control custom-select" name="site_id" id="site_id" style="width: 100%; height:36px;" data-placeholder="Select Site">

                                        </select>
                                        <span class="text-danger error-text site_id_error"></span>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!-- end col -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Sale Detail</div>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-centered">
                                    <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="15%">Item</th>
                                        <th width="5%">Qty</th>
                                        <th width="10%">Rate</th>
                                        <th width="10%">Gross Total</th>
                                        <th width="11%">Discount</th>
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
                                        <td colspan="4" class="text-right"><strong>Sub Total</strong></td>
                                        <td><input type="text" style="height: 30px" name="gross_value" readonly id="gross_value" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="discount_total" readonly id="discount_total" class="form-control" /></td>
                                        <td><input type="text" style="height: 30px" name="tax_total" readonly id="tax_total" class="form-control" /></td>
                                        <td colspan="3"><input type="text" style="height: 30px" name="sub_total" readonly id="sub_total" class="form-control" /></td>
                                    </tr>
                                    </tfoot>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                            <div class="float-right mt-3">
                                <span class="text-danger error-text other_expenses_error"></span>
                                <div class="form-group">
                                    <label for="user_id" class="col-form-label text-right" style="color: #000000"><i data-toggle="modal" data-target="#extraDiscount" id="extraDiscountButton" class="fa fa-plus-circle" style="color: #000000"></i><strong> Extra Discount</strong></label>
                                    <input type="text" style="height: 30px" name="extra_discount_amount" readonly id="extra_discount_amount" class="form-control" /><input type="hidden" style="height: 30px" name="extra_discount" id="extra_discount" class="form-control" />
                                    <label id="extra_discount_label"></label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="net_value" class="col-form-label text-right" style="color: #000000"><strong>Net Value</strong></label>
                                    </div>
                                    <div class="form-group col-8">
                                        <input type="text" style="height: 30px" name="net_value" readonly id="net_value" class="form-control" />
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
        <div class="modal fade" id="selectDiscount" tabindex="-1" role="dialog" aria-labelledby="selectDiscountLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="selectDiscountLabel">Discount Percentage</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <form method="post" id="selectDiscountForm">
                        @csrf
                        <input type="hidden" id="discount_field_id">
                        <div class="form-group p-3">
                            <label for="discount_percentage" class="col-form-label text-right">Enter Discount Percentage</label>
                            <input class="form-control" type="text" name="discount_percentage" id="discount_percentage" placeholder="Enter Percentage">
                            <span class="text-danger error-text discount_percentage_error"></span>
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
                            <label for="extra_discount_percentage" class="col-form-label text-right">Enter Discount Percentage</label>
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
        var itemsCount = 1;
        var goodsCount = 1;

        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            itemsDetailDynamicField(itemsCount);
            function itemsDetailDynamicField(number){
                html = '<tr>';
                html += '<td>'+number+'</td>';
                html += '<td><select class="select2 form-control custom-select" name="item_id[]" id="item_id_'+number+'" style="width: 100%; height:30px;" data-placeholder="Select Item"></select></td>';
                html += '<td><input type="text" style="height: 30px" name="qty[]" id="qty_'+number+'" onchange="gross_total('+number+')" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="rate[]" id="rate_'+number+'" onchange="gross_total('+number+')" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="gross_total[]" readonly id="gross_total_'+number+'" class="form-control" /></td>';
                html += '<td><div class="row"><input type="text" style="height: 30px" readonly id="discount_amount_'+number+'" class="form-control col-8 ml-2" /><input type="hidden" name="discount[]" id="discount_'+number+'"><button class="col-2" data-toggle="modal" data-target="#selectDiscount" id="selectDiscountButton" value="'+number+'" style="border: none; background: #FFFFFF;"><i class="fa fa-plus-circle"></i></button></div><label id="discount_percentage_'+number+'"></label></td>';
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

            fetchItems();
            fetchTaxes();
            fetchCustomers();
            fetchSites();

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

            function fetchCustomers()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchCustomers",
                    dataType: "json",
                    success: function (response) {
                        var customer_id = $('#customer_id');
                        $('#customer_id').children().remove().end()
                        $.each(response.customers, function (customer) {
                            customer_id.append($("<option />").val(response.customers[customer].id).text(response.customers[customer].name));
                        });
                    }
                });
            }

            function fetchSites()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchSites",
                    dataType: "json",
                    success: function (response) {
                        var site_id = $('#site_id');
                        $('#site_id').children().remove().end()
                        $.each(response.sites, function (site) {
                            site_id.append($("<option />").val(response.sites[site].id).text(response.sites[site].name));
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
                            fetchCustomers();
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
                            fetchSites();
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

            $(document).on('click', '#selectDiscountButton', function (e){
                e.preventDefault();
                var discount_field_id = $(this).val();
                $('#selectDiscount').modal('show');
                $('#discount_field_id').val(discount_field_id);
            });

            $(document).on('submit', '#selectDiscountForm', function (e){
                e.preventDefault();
                let discount_field_id = $('#discount_field_id').val();
                let discount_percentage = $('#discount_percentage').val();
                let gross_total = $('#gross_total_'+discount_field_id+'').val();
                let discount_amount = parseFloat(gross_total)/100 * parseFloat(discount_percentage)
                $('#discount_amount_'+discount_field_id+'').val(discount_amount);
                $('#discount_percentage_'+discount_field_id+'').text('discount @'+discount_percentage+'%');
                $('#discount_'+discount_field_id+'').val(discount_percentage);
                $('#selectDiscountForm')[0].reset();
                $('#selectDiscount').modal('hide');
                total(discount_field_id)
            });

            $(document).on('submit', '#extraDiscountForm', function (e){
                e.preventDefault();
                let sub_total = $('#sub_total').val();
                let extra_discount_percentage = $('#extra_discount_percentage').val();
                let extra_discount = parseFloat(sub_total)/100 * parseFloat(extra_discount_percentage)
                $('#extra_discount_amount').val(extra_discount);
                $('#extra_discount_label').text('discount @'+extra_discount_percentage+'%');
                $('#extra_discount').val(extra_discount_percentage);
                $('#extraDiscountForm')[0].reset();
                $('#extraDiscount').modal('hide');
                subTotal();
            });

            $(document).on('submit', '#saleForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#saleForm')[0]);
                $.ajax({
                    type: "post",
                    url: "sale",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#saleForm')[0].reset();
                            location.reload();
                            console.log(response.message);
                            fetchItems();
                            fetchTaxes();
                            fetchCustomers();
                            fetchSites();
                        }
                    },
                    error: function (error){

                    }
                });
            });
        });

        function gross_total(number){
            var qty = $('#qty_'+number+'').val() == '' ? 1 : $('#qty_'+number+'').val();
            var rate = $('#rate_'+number+'').val() == '' ? 0 : $('#rate_'+number+'').val();
            var gross_total = parseInt(qty) * parseInt(rate);
            if (!isNaN(gross_total)){
                $('#gross_total_'+number+'').val(gross_total);
                total(number);
                subTotal();
            }
            else {
                $('#gross_total_'+number+'').val(0.00);
                total(number);
                subTotal();
            }
        }

        function total(number){
            var gross_total = $('#gross_total_'+number+'').val() == '' ? 0 : $('#gross_total_'+number+'').val();
            var discount_amount = $('#discount_amount_'+number+'').val() == '' ? 0 : $('#discount_amount_'+number+'').val();
            var tax_amount = $('#tax_amount_'+number+'').val() == '' ? 0 : $('#tax_amount_'+number+'').val();
            var total = (parseFloat(gross_total) - parseFloat(discount_amount)) + parseFloat(tax_amount);
            if (!isNaN(total)){
                $('#total_'+number+'').val(total.toFixed(2));
                subTotal();
            }
            else {
                $('#total_'+number+'').val(0);
                subTotal();
            }
        }

        function subTotal(){
            let gross_value = 0;
            let discount_total = 0;
            let tax_total = 0;
            let sub_total = 0;
            let extra_discount_amount = $('#extra_discount_amount').val() == '' ? 0 : $('#extra_discount_amount').val();
            let net_value = 0;
            for (let i = 1; i <= itemsCount; i++) {
                gross_value = gross_value + parseFloat($('#gross_total_'+i+'').val() == '' ? 0 : $('#gross_total_'+i+'').val());
                discount_total = discount_total + parseFloat($('#discount_amount_'+i+'').val() == '' ? 0 : $('#discount_amount_'+i+'').val());
                tax_total = tax_total + parseFloat($('#tax_amount_'+i+'').val() == '' ? 0 : $('#tax_amount_'+i+'').val());
                sub_total = sub_total + parseFloat($('#total_'+i+'').val() == '' ? 0 : $('#total_'+i+'').val());
            }
            net_value = parseFloat(sub_total) - parseFloat(extra_discount_amount);
            console.log(net_value);
            $('#gross_value').val(gross_value.toFixed(2));
            $('#discount_total').val(discount_total.toFixed(2));
            $('#tax_total').val(tax_total.toFixed(2));
            $('#sub_total').val(sub_total.toFixed(2));
            $('#net_value').val(net_value.toFixed(2));
        }
    </script>
@endsection
