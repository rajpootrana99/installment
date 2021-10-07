@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Installment Schedule</h4>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <form method="post" id="installmentForm">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <tbody>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="item_id" class="col-form-label text-right">Select Item</label></td>
                                                <td><select class="select2 mb-3 form-control custom-select" name="item_id" id="item_id" style="width: 100%; height:30px;" data-placeholder="Select Item"></select></td>
                                                <td><label for="site_id" class="col-form-label text-right">Site</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="site_id" id="site_id"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="customer_id" class="col-form-label text-right">Select Customer</label></td>
                                                <td><select class="select2 mb-3 form-control custom-select" name="customer_id" id="customer_id" style="width: 100%; height:30px;" data-placeholder="Select Customer"></select></td>
                                                <td><label for="sales_officer_id" class="col-form-label text-right">Sales Officer</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="sales_officer_id" id="sales_officer_id"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="cnic" class="col-form-label text-right">CNIC</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="cnic" id="cnic"></td>
                                                <td><label for="inquiry_officer_id" class="col-form-label text-right">Inquiry Officer</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="inquiry_officer_id" id="inquiry_officer_id"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="cell" class="col-form-label text-right">Cell</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="cell" id="cell"></td>
                                                <td><label for="marketing_officer_id" class="col-form-label text-right">Marketing Officer</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="marketing_officer_id" id="marketing_officer_id"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="inv_no" class="col-form-label text-right">Inv. No</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="inv_no" id="inv_no"></td>
                                                <td><label for="recovery_officer_id" class="col-form-label text-right">Recovery Officer</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" disabled name="recovery_officer_id" id="recovery_officer_id"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="date" class="col-form-label text-right">Inv. Date</label></td>
                                                <td><input class="form-control" style="height: 30px" type="date" disabled name="date" id="date"></td>
                                            </div>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!-- end col -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Installment Detail</div>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-centered">
                                    <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="10%">Due Date</th>
                                        <th width="10%">Due Amount</th>
                                        <th width="10%">Paid Date</th>
                                        <th width="10%">Paid Amount</th>
                                        <th width="7%">Balance</th>
                                        <th width="10%">Rec. Officer</th>
                                        <th width="10%">Rec. By</th>
                                        <th width="10%">Remarks</th>
                                        <th width="7%">Fine</th>
                                        <th width="10%">Location</th>
                                    </tr>
                                    </thead>
                                    <tbody id="itemsDetailTableBody">

                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                            <div class="row mt-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <tbody>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="plan" class="col-form-label text-right">Plan</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="plan" id="plan"></td>
                                                <td><label for="total_installment_due" class="col-form-label text-right">Total Installment Due</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="total_installment_due" id="total_installment_due"></td>
                                                <td><label for="received" class="col-form-label text-right">Received</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" name="received" id="received"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="percentage" class="col-form-label text-right">Percentage</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="percentage" id="percentage"></td>
                                                <td><label for="total_paid_amount" class="col-form-label text-right">Total Paid Amount</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="total_paid_amount" id="total_paid_amount"></td>
                                                <td><label for="fine" class="col-form-label text-right">Fine</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" name="fine" id="fine"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="sale_value" class="col-form-label text-right">Sale Value</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="sale_value"  id="sale_value"></td>
                                                <td><label for="total_missed" class="col-form-label text-right">Total Missed</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="total_missed" id="total_missed"></td>
                                                <td><label for="received_by" class="col-form-label text-right">Received By</label></td>
                                                <td><input class="form-control" style="height: 30px" type="text" name="received_by" id="received_by"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="down_payment" class="col-form-label text-right">Down Payment</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="down_payment" id="down_payment"></td>
                                                <td><label for="missed_value" class="col-form-label text-right">Missed Value</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="missed_value" id="missed_value"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td><label for="installment_per_month" class="col-form-label text-right">Installment / Month</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="installment_per_month" id="installment_per_month"></td>
                                                <td><label for="total_balance_amount" class="col-form-label text-right">Total Balance Amount</label></td>
                                                <td><input class="form-control" style="height: 30px" readonly type="text" name="total_balance_amount" id="remarks"></td>
                                            </div>
                                        </tr>
                                        </tbody>
                                    </table>
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
    </div>

    <script>

        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            fetchItems();
            fetchGuaranters();
            fetchCustomers();

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

            function fetchInstallmentPlans()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchInstallmentPlans",
                    dataType: "json",
                    success: function (response) {
                        var installment_plan_id = $('#installment_plan_id_'+itemsCount+'');
                        $('#installment_plan_id_'+itemsCount+'').children().remove().end()
                        $.each(response.installmentPlans, function (installmentPlan) {
                            installment_plan_id.append($("<option />").val(response.installmentPlans[installmentPlan].id).text(''+response.installmentPlans[installmentPlan].plan+' ('+response.installmentPlans[installmentPlan].duration+')'));
                        });
                    }
                });
            }

            function fetchGuaranters()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchGuaranters",
                    dataType: "json",
                    success: function (response) {
                        var guaranter_id = $('#guaranter_id_'+guaranterCount+'');
                        $('#guaranter_id_'+guaranterCount+'').children().remove().end()
                        $.each(response.guaranters, function (guaranter) {
                            guaranter_id.append($("<option />").val(response.guaranters[guaranter].id).text(response.guaranters[guaranter].name));
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

            $(document).on('change', '#customer_id', function (e) {
                e.preventDefault();
                var customer_id = $('#customer_id').val();
                $.ajax({
                    type: 'get',
                    url: 'customer/'+customer_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            console.log(response.message);
                        }
                        else {
                            $('#father_name').val(response.customer.father_name);
                            $('#cell').val(response.customer.cell);
                            $('#cnic').val(response.customer.cnic);
                            $('#occupation').val(response.customer.occupation);
                            $('#monthly_income').val(response.customer.monthly_income);
                            $('#residential_address').val(response.customer.residential_address);
                            $('#office_address').val(response.customer.office_address);
                            $('#type').val(response.type).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#installmentForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#installmentForm')[0]);
                $.ajax({
                    type: "post",
                    url: "purchase",
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
                            $('#installmentForm')[0].reset();
                            console.log(response.message);
                            fetchItems();
                            fetchInstallmentPlans();
                            fetchGuaranters()
                            fetchCustomers();
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

        function showItem(number){
            var item_id = $('#item_id_'+number+'').val();
            $.ajax({
                type: 'get',
                url: 'item/'+item_id,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 0) {
                        console.log(response.message);
                    }
                    else {
                        $('#description_'+number+'').val(response.item.description);
                        $('#category_id_'+number+'').val(response.item.category.name);
                        $('#cost_'+number+'').val(response.item.cost_price);
                        var barcode_id = $('#barcode_id_'+number+'');
                        $('#barcode_id_'+number+'').children().remove().end()
                        $.each(response.barcodes, function (barcode) {
                            barcode_id.append($("<option />").val(response.barcodes[barcode].id).text(response.barcodes[barcode].barcode));
                        });
                    }
                }
            });
        }

        function showInstallmentPlan(number){
            var installment_plan_id = $('#installment_plan_id_'+number+'').val();
            $.ajax({
                type: 'get',
                url: 'installmentPlan/'+installment_plan_id,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 0) {
                        console.log(response.message);
                    }
                    else {
                        $('#percentage_'+number+'').val(response.installmentPlan.percentage);
                    }
                }
            });
        }

        function total(number){
            var gross_total = $('#gross_total_'+number+'').val() == '' ? 0 : $('#gross_total_'+number+'').val();
            var discount_1_amount = $('#discount_1_amount_'+number+'').val() == '' ? 0 : $('#discount_1_amount_'+number+'').val();
            var discount_2_amount = $('#discount_2_amount_'+number+'').val() == '' ? 0 : $('#discount_2_amount_'+number+'').val();
            var tax_amount = $('#tax_amount_'+number+'').val() == '' ? 0 : $('#tax_amount_'+number+'').val();
            var total = (parseFloat(gross_total) - parseFloat(discount_1_amount) - parseFloat(discount_2_amount)) + parseFloat(tax_amount);
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
            let discount_1_total = 0
            let discount_2_total = 0
            let tax_total = 0
            let sub_total = 0
            let other_expenses = $('#other_expenses').val() == '' ? 0 : $('#other_expenses').val();
            let extra_discount_amount = $('#extra_discount_amount').val() == '' ? 0 : $('#extra_discount_amount').val();
            let net_value = 0;
            for (let i = 1; i <= itemsCount; i++) {
                gross_value = gross_value + parseFloat($('#gross_total_'+i+'').val() == '' ? 0 : $('#gross_total_'+i+'').val());
                discount_1_total = discount_1_total + parseFloat($('#discount_1_amount_'+i+'').val() == '' ? 0 : $('#discount_1_amount_'+i+'').val());
                discount_2_total = discount_2_total + parseFloat($('#discount_2_amount_'+i+'').val() == '' ? 0 : $('#discount_2_amount_'+i+'').val());
                tax_total = tax_total + parseFloat($('#tax_amount_'+i+'').val() == '' ? 0 : $('#tax_amount_'+i+'').val());
                sub_total = sub_total + parseFloat($('#total_'+i+'').val() == '' ? 0 : $('#total_'+i+'').val());
            }
            net_value = parseFloat(sub_total) + parseFloat(other_expenses) - parseFloat(extra_discount_amount);
            $('#gross_value').val(gross_value.toFixed(2));
            $('#discount_1_total').val(discount_1_total.toFixed(2));
            $('#discount_2_total').val(discount_2_total.toFixed(2));
            $('#tax_total').val(tax_total.toFixed(2));
            $('#sub_total').val(sub_total.toFixed(2));
            $('#net_value').val(net_value.toFixed(2));
        }
    </script>
@endsection
