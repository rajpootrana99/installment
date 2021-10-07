@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Installment</h4>
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
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="customer_id" class="col-form-label text-right">Select Customer</label>
                                        <select class="select2 mb-3 form-control custom-select" name="customer_id" id="customer_id" style="width: 100%; height:36px;" data-placeholder="Select Customer">

                                        </select>
                                        <span class="text-danger error-text customer_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="date" class="col-form-label text-right">Date</label>
                                        <input class="form-control" type="date" name="date" placeholder="Enter Vendor Invoice No." id="date">
                                        <span class="text-danger error-text date_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="type" class="col-form-label text-right">Select Customer Type</label>
                                        <select class="select2 mb-3 form-control custom-select" disabled name="type" id="type" style="width: 100%; height:36px;" data-placeholder="Select Customer Type">
                                            <option value="">Select Customer Type</option>
                                            <option value="0">Cash</option>
                                            <option value="1">Credit</option>
                                            <option value="2">Installment</option>
                                        </select>
                                        <span class="text-danger error-text type_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="father_name" class="col-form-label text-right">S/D/W of</label>
                                        <input class="form-control" type="text" readonly name="father_name" placeholder="Enter S/D/W of" id="father_name">
                                        <span class="text-danger error-text father_name_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="cell" class="col-form-label text-right">Cell No</label>
                                        <input class="form-control" type="text" readonly name="cell" placeholder="Enter Cell No" id="cell">
                                        <span class="text-danger error-text cell_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="cnic" class="col-form-label text-right">CNIC</label>
                                        <input class="form-control" type="text" readonly name="cnic" placeholder="Enter CNIC" id="cnic">
                                        <span class="text-danger error-text cnic_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="occupation" class="col-form-label text-right">Occupation</label>
                                        <input class="form-control" type="text" readonly name="occupation" placeholder="Enter Occupation" id="occupation">
                                        <span class="text-danger error-text occupation_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="monthly_income" class="col-form-label text-right">Monthly Income</label>
                                        <input class="form-control" type="text" readonly name="monthly_income" placeholder="Enter Monthly Income" id="monthly_income">
                                        <span class="text-danger error-text monthly_income_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="residential_address" class="col-form-label text-right">Residential Address</label>
                                        <input class="form-control" type="text" readonly name="residential_address" placeholder="Enter Residential Address" id="residential_address">
                                        <span class="text-danger error-text residential_address_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="office_address" class="col-form-label text-right">Office Address</label>
                                        <input class="form-control" type="text" readonly name="office_address" placeholder="Enter Office Address" id="office_address">
                                        <span class="text-danger error-text office_address_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="due_day" class="col-form-label text-right">Due Day/Month</label>
                                        <input class="form-control" type="text" name="due_day" placeholder="Enter Due Day/Month" id="due_day">
                                        <span class="text-danger error-text due_day_error"></span>
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="sale_officer_id" class="col-form-label text-right">Sale Officer</label>
                                        <select class="select2 mb-3 form-control custom-select" name="sale_officer_id" id="sale_officer_id" style="width: 100%; height:36px;" data-placeholder="Sale Officer">

                                        </select>
                                        <span class="text-danger error-text sale_officer_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="inquiry_officer_id" class="col-form-label text-right">Inquiry Officer</label>
                                        <select class="select2 mb-3 form-control custom-select" name="inquiry_officer_id" id="inquiry_officer_id" style="width: 100%; height:36px;" data-placeholder="Inquiry Officer">

                                        </select>
                                        <span class="text-danger error-text inquiry_officer_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="marketing_officer_id" class="col-form-label text-right">Marketing Officer</label>
                                        <select class="select2 mb-3 form-control custom-select" name="marketing_officer_id" id="marketing_officer_id" style="width: 100%; height:36px;" data-placeholder="Marketing Officer">

                                        </select>
                                        <span class="text-danger error-text marketing_officer_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="recovery_officer_id" class="col-form-label text-right">Recovery Officer</label>
                                        <select class="select2 mb-3 form-control custom-select" name="recovery_officer_id" id="recovery_officer_id" style="width: 100%; height:36px;" data-placeholder="Recovery Officer">

                                        </select>
                                        <span class="text-danger error-text recovery_officer_id_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="process_id" class="col-form-label text-right">Process ID</label>
                                        <input class="form-control" type="text" name="process_id" placeholder="Enter Process ID" id="process_id">
                                        <span class="text-danger error-text process_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="process_type" class="col-form-label text-right">Process Type</label>
                                        <input class="form-control" type="text" name="process_type" placeholder="Enter Process Type" id="process_type">
                                        <span class="text-danger error-text process_type_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="process_fee" class="col-form-label text-right">Process Fee</label>
                                        <input class="form-control" type="text" name="process_fee" placeholder="Enter Process Fee" id="process_fee">
                                        <span class="text-danger error-text process_fee_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="registration_fee" class="col-form-label text-right">Registration Fee</label>
                                        <input class="form-control" type="text" name="registration_fee" placeholder="Enter Registration Fee" id="registration_fee">
                                        <span class="text-danger error-text registration_fee_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="remarks" class="col-form-label text-right">Remarks</label>
                                        <input class="form-control" type="text" name="remarks" placeholder="Enter Remarks" id="remarks">
                                        <span class="text-danger error-text remarks_error"></span>
                                    </div>
                                </div>
                            </div>
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
                                        <th width="10%">Description</th>
                                        <th width="10%">Category</th>
                                        <th width="10%">Barcode</th>
                                        <th width="10%">Reg. Remarks</th>
                                        <th width="7%">Cost</th>
                                        <th width="7%">Rate</th>
                                        <th width="10%">Plan</th>
                                        <th width="7%">Per%</th>
                                        <th width="10%">Sale Val.</th>
                                        <th width="10%">Down Pay.</th>
                                        <th width="5%">Installment</th>
                                        <th width="3%"><i class="fa fa-plus-circle"></i></th>
                                        <th width="3%"><i class="fa fa-minus-circle"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody id="itemsDetailTableBody">

                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0 table-centered">
                                            <tbody>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label for="remarks" class="col-form-label text-right">Total Purchase</label></td>
                                                    <td><input class="form-control" style="height: 30px" readonly type="text" name="remarks" id="remarks"></td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label for="remarks" class="col-form-label text-right">Total Sales</label></td>
                                                    <td><input class="form-control" style="height: 30px" readonly type="text" name="remarks" id="remarks"></td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label for="remarks" class="col-form-label text-right">No. of Installment</label></td>
                                                    <td><input class="form-control" style="height: 30px" readonly type="text" name="remarks"  id="remarks"></td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label for="remarks" class="col-form-label text-right">Installment / Month</label></td>
                                                    <td><input class="form-control" style="height: 30px" readonly type="text" name="remarks" id="remarks"></td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label for="remarks" class="col-form-label text-right">Down Payment</label></td>
                                                    <td><input class="form-control" style="height: 30px" readonly type="text" name="remarks" id="remarks"></td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label for="remarks" class="col-form-label text-right">Total Balance</label></td>
                                                    <td><input class="form-control" style="height: 30px" readonly type="text" name="remarks" id="remarks"></td>
                                                </div>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mt-3 mb-0 table-centered">
                                            <thead>
                                            <tr>
                                                <th width="3%">#</th>
                                                <th>Guaranter</th>
                                                <th>Relation</th>
                                                <th width="3%"><i class="fa fa-plus-circle"></i></th>
                                                <th width="3%"><i class="fa fa-minus-circle"></i></th>
                                            </tr>
                                            </thead>
                                            <tbody id="goodsDetailTableBody">

                                            </tbody>
                                        </table><!--end /table-->
                                    </div><!--end /tableresponsive-->
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
        var itemsCount = 1;
        var guaranterCount = 1;

        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            guaranterDynamicField(guaranterCount);
            function guaranterDynamicField(number){
                html = '<tr>';
                html += '<td>'+number+'</td>';
                html += '<td><select class="select2 form-control custom-select" name="guaranter_id[]" id="guaranter_id_'+number+'" style="width: 100%; height:30px;" data-placeholder="Select Guaranter"></select></td>';
                html += '<td><input type="text" style="height: 30px" name="relation[]" class="form-control" /></td>';
                if (number > 1){
                    html += '<td><button style="border: none; background-color: #fff" name="addGuaranter" id="addGuaranter"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td><button style="border: none; background-color: #fff" name="removeGuaranter" id="removeGuaranter"><i class="fa fa-minus-circle"></i></button></td></tr>';
                    $('#goodsDetailTableBody').append(html);
                    fetchGuaranters();
                }
                else {
                    html += '<td><button style="border: none; background-color: #fff" name="addGuaranter" id="addGuaranter"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td></td></tr>';
                    $('#goodsDetailTableBody').html(html);
                    fetchGuaranters();
                }
            }
            $(document).on('click', '#addGuaranter', function (e){
                e.preventDefault();
                guaranterCount++;
                guaranterDynamicField(guaranterCount);
            });
            $(document).on('click', '#removeGuaranter', function (e){
                e.preventDefault();
                guaranterCount--;
                $(this).closest("tr").remove();
            });

            itemsDetailDynamicField(itemsCount);
            function itemsDetailDynamicField(number){
                html = '<tr>';
                html += '<td>'+number+'</td>';
                html += '<td><select class="select2 form-control custom-select" name="item_id[]" id="item_id_'+number+'" onchange="showItem('+number+')" style="width: 100%; height:30px;" data-placeholder="Select Item"></select></td>';
                html += '<td><input type="text" style="height: 30px" disabled name="description[]" id="description_'+number+'" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" disabled name="category[]" id="category_id_'+number+'" class="form-control" /></td>';
                html += '<td><select class="select2 form-control custom-select" name="barcode_id[]" id="barcode_id_'+number+'" style="width: 100%; height:30px;" data-placeholder="Select Sr. Code"></select></td>';
                html += '<td><input type="text" style="height: 30px" name="registration_remarks[]" id="registration_remarks_'+number+'" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" readonly name="cost[]" id="cost_'+number+'" class="form-control" />';
                html += '<td><input type="text" style="height: 30px" name="rate[]" id="rate_'+number+'" class="form-control" />';
                html += '<td><div class="row"><select class="select2 form-control custom-select" name="installment_plan_id[]" id="installment_plan_id_'+number+'" onchange="showInstallmentPlan('+number+')" style="width: 100%; height:30px;" data-placeholder="Select Plan"></select>';
                html += '<td><input type="text" style="height: 30px" disabled id="percentage_'+number+'" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="sale_value[]" id="sale_value_'+number+'" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="down_payment[]" id="down_payment_'+number+'" class="form-control" /></td>';
                html += '<td><input type="text" style="height: 30px" name="installment[]" readonly id="installment_'+number+'" class="form-control" /></td>';
                if (number > 1){
                    html += '<td><button style="border: none; background-color: #fff" name="addItems" id="addItems"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td><button style="border: none; background-color: #fff" name="removeItems" id="removeItems"><i class="fa fa-minus-circle"></i></button></td></tr>';
                    $('#itemsDetailTableBody').append(html);
                    fetchItems();
                    fetchInstallmentPlans();
                }
                else {
                    html += '<td><button style="border: none; background-color: #fff" name="addItems" id="addItems"><i class="fa fa-plus-circle"></i></button></td>';
                    html += '<td></td></tr>';
                    $('#itemsDetailTableBody').html(html);
                    fetchItems();
                    fetchInstallmentPlans();
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
            fetchGuaranters();
            fetchCustomers();
            fetchSaleOfficers();
            fetchInquiryOfficers();
            fetchMarketingOfficers();
            fetchRecoveryOfficers();

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

            function fetchSaleOfficers()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchSaleOfficers",
                    dataType: "json",
                    success: function (response) {
                        var sale_officer_id = $('#sale_officer_id');
                        $('#sale_officer_id').children().remove().end()
                        $.each(response.sale_officers, function (sale_officer) {
                            sale_officer_id.append($("<option />").val(response.sale_officers[sale_officer].id).text(response.sale_officers[sale_officer].name));
                        });
                    }
                });
            }

            function fetchInquiryOfficers()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchInquiryOfficers",
                    dataType: "json",
                    success: function (response) {
                        var inquiry_officer_id = $('#inquiry_officer_id');
                        $('#inquiry_officer_id').children().remove().end()
                        $.each(response.inquiry_officers, function (inquiry_officer) {
                            inquiry_officer_id.append($("<option />").val(response.inquiry_officers[inquiry_officer].id).text(response.inquiry_officers[inquiry_officer].name));
                        });
                    }
                });
            }

            function fetchMarketingOfficers()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchMarketingOfficers",
                    dataType: "json",
                    success: function (response) {
                        var marketing_officer_id = $('#marketing_officer_id');
                        $('#marketing_officer_id').children().remove().end()
                        $.each(response.marketing_officers, function (marketing_officer) {
                            marketing_officer_id.append($("<option />").val(response.marketing_officers[marketing_officer].id).text(response.marketing_officers[marketing_officer].name));
                        });
                    }
                });
            }

            function fetchRecoveryOfficers()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchRecoveryOfficers",
                    dataType: "json",
                    success: function (response) {
                        var recovery_officer_id = $('#recovery_officer_id');
                        $('#recovery_officer_id').children().remove().end()
                        $.each(response.recovery_officers, function (recovery_officer) {
                            recovery_officer_id.append($("<option />").val(response.recovery_officers[recovery_officer].id).text(response.recovery_officers[recovery_officer].name));
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
                            fetchSaleOfficers();
                            fetchInquiryOfficers();
                            fetchMarketingOfficers();
                            fetchRecoveryOfficers();
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
