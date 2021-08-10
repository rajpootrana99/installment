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
                <h5 class="mb-0">Purchase</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">Purchase</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="{{ asset('images/user/1.jpg') }}" class="img-fluid rounded" alt="user"></a>
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
                                    <h4>Purchase</h4>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="invoice_no" class="col-4">Invoice No:</label>
                                            <input type="text" class="form-control col-8" id="invoice_no" readonly name="invoice_no" placeholder="Invoice No">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="vendor_id" class="col-4">Select Vendor:</label>
                                            <select name="vendor_id" id="vendor_id" class="form-control col-8">
                                                <option value="">Select Vendor</option>
                                                <option value="">Vendor1</option>
                                                <option value="">Vendor2</option>
                                                <option value="">Vendor6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="date" class="col-4">Date:</label>
                                            <input type="date" class="form-control col-8" id="date" name="date" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="vendor_invoice_no" class="col-4">Vendor Invoice No:</label>
                                            <input type="text" class="form-control col-8" id="vendor_invoice_no" name="vendor_invoice_no" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="vendor_name" class="col-4">Vendor Name:</label>
                                            <input type="text" class="form-control col-8" readonly id="vendor_name" name="vendor_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="goods-tab" data-toggle="tab" href="#goods" role="tab" aria-controls="goods" aria-selected="true">Goods</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="goods-detail-tab" data-toggle="tab" href="#goods-detail" role="tab" aria-controls="goods-detail" aria-selected="false">Goods Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="purchase-detail-tab" data-toggle="tab" href="#purchase-detail" role="tab" aria-controls="purchase-detail" aria-selected="false">Purchase Detail</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent-2">
                                <div class="tab-pane fade show active" id="goods" role="tabpanel" aria-labelledby="goods-tab">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="bilty_no" class="col-4">Bilty No:</label>
                                                    <input type="email" class="form-control col-8" id="bilty_no" name="bilty_no" placeholder="Bilty No">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="goods_name" class="col-4">Goods Name:</label>
                                                    <input type="text" class="form-control col-8" id="goods_name" name="goods_name" placeholder="Goods Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="shipment_date" class="col-4">Shipment Date:</label>
                                                    <input type="date" class="form-control col-8" id="shipment_date" name="shipment_date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="delivery_date" class="col-4">Delivery Date:</label>
                                                    <input type="date" class="form-control col-8" id="delivery_date" name="delivery_date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="broker_id" class="col-4">Select Broker:</label>
                                                    <select name="broker_id" id="broker_id" class="form-control col-8">
                                                        <option value="">Select Broker</option>
                                                        <option value="">Broker1</option>
                                                        <option value="">Broker2</option>
                                                        <option value="">Broker3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="broker_name" class="col-4">Broker Name:</label>
                                                    <input type="text" class="form-control col-8" id="broker_name" readonly name="broker_name" placeholder="Broker Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="user_id" class="col-4">Select User:</label>
                                                    <select name="user_id" id="user_id" class="form-control col-8">
                                                        <option value="">Select User</option>
                                                        <option value="">User1</option>
                                                        <option value="">User2</option>
                                                        <option value="">User3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="system_name" class="col-4">System Name:</label>
                                                    <input type="text" class="form-control col-8" id="system_name" readonly name="system_name" placeholder="System Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="goods-detail" role="tabpanel" aria-labelledby="goods-detail-tab">
                                    <form id="goodsDetailDynamicForm">
                                        <table class="table mt-2" id="goodsDetailDynamicTable">
                                            <thead>
                                            <tr>
                                                <th>Invoice No.</th>
                                                <th>Bilty No.</th>
                                                <th>Vehicle No.</th>
                                                <th>Qty</th>
                                                <th>Gate Pass No.</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="goodsDetailTableBody">
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="purchase-detail" role="tabpanel" aria-labelledby="purchase-detail-tab">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="purchase_master_id" class="col-4">Invoice No:</label>
                                                    <input type="text" class="form-control col-8" readonly id="purchase_master_id" name="purchase_master_id" placeholder="Invoice No.">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="row_no" class="col-4">Row No:</label>
                                                    <input type="text" class="form-control col-8" id="row_no" name="row_no" placeholder="Row No." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="item_id" class="col-4">Select Item:</label>
                                                    <select name="item_id" id="item_id" class="form-control col-8">
                                                        <option value="">Select Item</option>
                                                        <option value="">Item1</option>
                                                        <option value="">Item2</option>
                                                        <option value="">Item3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="item_name" class="col-4">Item Name:</label>
                                                    <input type="text" class="form-control col-8" id="item_name" name="item_name" placeholder="Item Name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="barcode" class="col-4">Barcode:</label>
                                                    <input type="text" class="form-control col-8" id="barcode" name="barcode" placeholder="Barcode." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="status_id" class="col-4">Select Status:</label>
                                                    <select name="status_id" id="status_id" class="form-control col-8">
                                                        <option value="">Select Status</option>
                                                        <option value="">Status1</option>
                                                        <option value="">Status2</option>
                                                        <option value="">Status3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="color_id" class="col-4">Select Color:</label>
                                                    <select name="color_id" id="color_id" class="form-control col-8">
                                                        <option value="">Select Color</option>
                                                        <option value="">Color1</option>
                                                        <option value="">Color2</option>
                                                        <option value="">Color3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="warranty_id" class="col-4">Select Warranty:</label>
                                                    <select name="warranty_id" id="warranty_id" class="form-control col-8">
                                                        <option value="">Select Warranty</option>
                                                        <option value="">Warranty1</option>
                                                        <option value="">Warranty2</option>
                                                        <option value="">Warranty3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="qty" class="col-4">Qty:</label>
                                                    <input type="text" class="form-control col-8" id="qty" name="qty" placeholder="Qty." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="rate" class="col-4">Rate:</label>
                                                    <input type="text" class="form-control col-8" id="rate" name="rate" placeholder="Rate." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="gross_total" class="col-4">Gross Total:</label>
                                                    <input type="text" class="form-control col-8" id="gross_total" name="gross_total" placeholder="Gross Total." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="discount_1" class="col-4">Discount 1:</label>
                                                    <input type="text" class="form-control col-8" id="discount_1" name="discount_1" placeholder="Discount 1." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="discount_2" class="col-4">Discount 2:</label>
                                                    <input type="text" class="form-control col-8" id="discount_2" name="discount_2" placeholder="Discount 2." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="tax" class="col-4">Tax:</label>
                                                    <input type="text" class="form-control col-8" id="tax" name="tax" placeholder="Tax." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="tax_percentage" class="col-4">Tax Percentage:</label>
                                                    <input type="text" class="form-control col-8" id="tax_percentage" name="tax_percentage" placeholder="Tax Percentage." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="tax_value" class="col-4">Tax Value:</label>
                                                    <input type="text" class="form-control col-8" id="tax_value" name="tax_value" placeholder="Tax Value." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="Total" class="col-4">Total:</label>
                                                    <input type="text" class="form-control col-8" id="Total" name="Total" placeholder="Total." />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                    <table class="table mt-2">
                                        <thead>
                                        <tr class="">
                                            <th scope="col">#</th>
                                            <th scope="col">Item Name.</th>
                                            <th scope="col">Barcode</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Rate</th>
                                            <th scope="col">Gross Total</th>
                                            <th scope="col">Discount 1</th>
                                            <th scope="col">Discount 2</th>
                                            <th scope="col">Tax</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="gross_value" class="col-4">Gross Value:</label>
                                            <input type="text" class="form-control col-8" id="gross_value" readonly name="gross_value" placeholder="Gross Value." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="discount_1_total" class="col-4">Discount 1 Total:</label>
                                            <input type="text" class="form-control col-8" id="discount_1_total" readonly name="discount_1_total" placeholder="Discount 1 Total." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="discount_2_total" class="col-4">Discount 2 Total:</label>
                                            <input type="text" class="form-control col-8" id="discount_2_total" readonly name="discount_2_total" placeholder="Discount 2 Total." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tax_total" class="col-4">Tax Total:</label>
                                            <input type="text" class="form-control col-8" id="tax_total" readonly name="tax_total" placeholder="Tax Total." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="other_expenses" class="col-4">Other Expenses:</label>
                                            <input type="text" class="form-control col-8" id="other_expenses" name="other_expenses" placeholder="Other Expenses." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="extra_discount" class="col-4">Extra Discount:</label>
                                            <input type="text" class="form-control col-8" id="extra_discount" name="extra_discount" placeholder="Extra Discount." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="net_value" class="col-4">Net Value:</label>
                                            <input type="text" class="form-control col-8" id="net_value" readonly name="net_value" placeholder="Net Value." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="remarks" class="col-4">Remarks:</label>
                                            <input type="text" class="form-control col-8" id="remarks" name="remarks" placeholder="Remarks." />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
             var count = 1;
             goodsDetailDynamicField(count);
             function goodsDetailDynamicField(number){
                 html = '<tr>';
                 html += '<td><input type="text" name="invoice_id[]" class="form-control" /></td>';
                 html += '<td><input type="text" name="bilty_id[]" class="form-control" /></td>';
                 html += '<td><input type="text" name="vehicle_no[]" class="form-control" /></td>';
                 html += '<td><input type="text" name="qty[]" class="form-control" /></td>';
                 html += '<td><input type="text" name="gate_pass_no[]" class="form-control" /></td>';
                 if (number > 1){
                     html += '<td><button style="border: none; background-color: #fff" name="add" id="add"><i class="fa fa-plus-circle"></i></button></td>';
                     html += '<td><button style="border: none; background-color: #fff" name="remove" id="remove"><i class="fa fa-trash-o"></i></button></td></tr>';
                     $('#goodsDetailTableBody').append(html);
                 }
                 else {
                     html += '<td><button style="border: none; background-color: #fff" name="add" id="add"><i class="fa fa-plus-circle"></i></button></td></tr>';
                     $('#goodsDetailTableBody').html(html);
                 }
             }

             $(document).on('click', '#add', function (e){
                 e.preventDefault();
                 count++;
                 goodsDetailDynamicField(count);

             });
             $(document).on('click', '#remove', function (e){
                 e.preventDefault();
                 count--;
                 goodsDetailDynamicField(count).remove();
             });
        });
    </script>
@endsection
