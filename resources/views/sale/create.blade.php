@extends('layout.base')

@section('section')
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <div class="iq-sidebar-logo">
                <div class="top-logo">
                    <a href="index.html" class="logo">
                        <img src="{{ asset('images/logo.gif') }}" class="img-fluid" alt="">
                        <span>Metorik</span>
                    </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <h5 class="mb-0">Sale</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('sale.index') }}">Sale</a></li>
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
                                    <h4>Sale</h4>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form method="post" action="{{route('sale.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-3">
                                        <div>
                                            <label for="customer_id">Select Customer:</label>
                                            <select name="customer_id" id="customer_id" class="form-control">
                                                <option value="">Select Customer</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('customer_id') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <div>
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" class="form-control" readonly placeholder="Enter Name" value="{{ old('name') }}">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('name') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="father_name">Father Name:</label>
                                        <input type="text" name="father_name" id="father_name" class="form-control" readonly placeholder="Enter Father Name" value="{{ old('father_name') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('father_name') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="type">Customer Type:</label>
                                        <input type="text" name="type" id="type" class="form-control" readonly placeholder="Enter Type" value="{{ old('type') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('type') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="cell">Cell:</label>
                                        <input type="text" name="cell" id="cell" readonly class="form-control" placeholder="Enter Cell Number" value="{{ old('cell') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cell') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="cnic">CNIC:</label>
                                        <input type="text" name="cnic" id="cnic" readonly class="form-control" placeholder="Enter CNIC" value="{{ old('cnic') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cnic') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="material_status">Material Status:</label>
                                        <input type="text" name="material_status" id="material_status" readonly class="form-control" placeholder="Enter Material Status" value="{{ old('material_status') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('material_status') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="monthly_income">Monthly Income:</label>
                                        <input type="text" name="monthly_income" readonly id="monthly_income" class="form-control" placeholder="Enter Monthly Income" value="{{ old('monthly_income') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('monthly_income') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="residential_address">Residential Address:</label>
                                        <input type="text" name="residential_address" readonly id="residential_address" class="form-control" placeholder="Enter Residential Address" value="{{ old('residential_address') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('residential_address') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="residential_phone">Residential Phone:</label>
                                        <input type="text" name="residential_phone" id="residential_phone" readonly class="form-control" placeholder="Enter Residential Phone" value="{{ old('residential_phone') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('residential_phone') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="residential_since">Residential Since:</label>
                                        <input type="date" name="residential_since" id="residential_since" readonly class="form-control" placeholder="Enter Residential Since" value="{{ old('residential_since') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('residential_since') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="office_address">Office Address:</label>
                                        <input type="text" name="office_address" id="office_address" readonly class="form-control" placeholder="Enter Office Address" value="{{ old('office_address') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('office_address') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="office_phone">Office Phone:</label>
                                        <input type="text" name="office_phone" id="office_phone" readonly class="form-control" placeholder="Enter Office Phone" value="{{ old('office_phone') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('office_phone') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="caste">Caste:</label>
                                        <input type="text" name="caste" id="caste" readonly class="form-control" placeholder="Enter Caste" value="{{ old('caste') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('caste') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="cnic_expiry">CNIC Expiry:</label>
                                        <input type="date" name="cnic_expiry" id="cnic_expiry" readonly class="form-control" placeholder="Enter Office Address" value="{{ old('cnic_expiry') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cnic_expiry') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="dob">Date of Birth:</label>
                                        <input type="date" name="dob" class="form-control" id="dob" readonly placeholder="Enter Date of Birth" value="{{ old('dob') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('dob') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="occupation">Occupation:</label>
                                        <input type="text" name="occupation" id="occupation" readonly class="form-control" placeholder="Enter Occupation" value="{{ old('occupation') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('occupation') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="designation">Designation:</label>
                                        <input type="text" name="designation" id="designation" readonly class="form-control" placeholder="Enter Designation" value="{{ old('designation') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('designation') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="work_since">Work Since:</label>
                                        <input type="date" name="work_since" id="work_since" readonly class="form-control" placeholder="Enter Work Since" value="{{ old('work_since') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('work_since') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="sales_officer_id">Sales Officer:</label>
                                        <select class="form-control" name="sales_officer_id">
                                            <option value="">Select Sales Officer</option>
                                            @foreach($salesOfficers as $salesOfficer)
                                                <option value="{{ $salesOfficer->id }}">{{ $salesOfficer->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sales_officer_id') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="marketing_officer_id">Marketing Officer:</label>
                                        <select class="form-control" name="marketing_officer_id">
                                            <option value="">Select Marketing Officer</option>
                                            @foreach($marketingOfficers as $marketingOfficer)
                                                <option value="{{ $marketingOfficer->id }}">{{ $marketingOfficer->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('marketing_officer_id') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="inquiry_officer_id">Inquiry Officer:</label>
                                        <select class="form-control" name="inquiry_officer_id">
                                            <option value="">Select Inquiry Officer</option>
                                            @foreach($inquiryOfficers as $inquiryOfficer)
                                                <option value="{{ $inquiryOfficer->id }}">{{ $inquiryOfficer->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('inquiry_officer_id') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="recovery_officer_id">Recovery Officer:</label>
                                        <select class="form-control" name="recovery_officer_id">
                                            <option value="">Select Recovery Officer</option>
                                            @foreach($recoveryOfficers as $recoveryOfficer)
                                                <option value="{{ $recoveryOfficer->id }}">{{ $recoveryOfficer->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('recovery_officer_id') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="item_id">Select Item:</label>
                                        <select class="form-control" name="item_id" id="item_id">
                                            <option value="">Select Item</option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('item_id') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="item_code">Item Code:</label>
                                        <input type="text" name="item_code" id="item_code" readonly class="form-control" placeholder="Enter Item Code" value="{{ old('item_code') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('item_code') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="description">Description:</label>
                                        <input type="text" name="description" id="description" readonly class="form-control" placeholder="Enter Description" value="{{ old('description') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('description') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="category_id">Category:</label>
                                        <input type="text" name="category_id" id="category_id" readonly class="form-control" placeholder="Enter Category" value="{{ old('category_id') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('category_id') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="barcode_id">Sr. Code:</label>
                                        <select class="form-control" name="barcode_id" id="barcode_id">
                                            <option value="">Select Sr. code</option>

                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('barcode_id') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="cost_price">Cost:</label>
                                        <input type="text" name="cost_price" id="cost_price" readonly class="form-control" placeholder="Enter Cost Price" value="{{ old('cost_price') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cost_price') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="registration_remarks">Reg. Remarks:</label>
                                        <input type="text" name="registration_remarks" id="registration_remarks" class="form-control" placeholder="Enter Registration Remarks" value="{{ old('registration_remarks') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('registration_remarks') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="sale_price">Sale Price:</label>
                                        <input type="text" name="sale_price" id="sale_price" class="form-control" placeholder="Enter Sale Price" value="{{ old('sale_price') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_price') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="plan">Plan:</label>
                                        <input type="text" name="plan" id="plan" class="form-control" placeholder="Enter Plan" value="{{ old('plan') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('plan') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="percent">Percent:</label>
                                        <input type="text" name="percent" id="percent" class="form-control" placeholder="Enter Percent" value="{{ old('percent') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('percent') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="sale_value">Sale Value:</label>
                                        <input type="text" name="sale_value" id="sale_value" class="form-control" placeholder="Enter Sale Value" value="{{ old('sale_value') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_value') }}</div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="down_payment">Down Payment:</label>
                                        <input type="text" name="down_payment" id="down_payment" class="form-control" placeholder="Enter Down Payment" value="{{ old('down_payment') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('down_payment') }}</div>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="installment">Installment:</label>
                                        <input type="text" name="installment" id="installment" readonly class="form-control" placeholder="Enter Installment" value="{{ old('installment') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('installment') }}</div>
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
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('change', '#customer_id', function (e) {
                e.preventDefault();
                var customer_id = $('#customer_id').find(":selected").val();
                $.ajax({
                    type: "GET",
                    url: '/sale/'+customer_id,
                    success: function (response) {
                        if (response.status == 0) {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                        }
                        else {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success('Customer Selected');
                            $('#name').val(response.customer.name);
                            $('#father_name').val(response.customer.father_name);
                            $('#type').val(response.customer.type);
                            $('#cell').val(response.customer.cell);
                            $('#cnic').val(response.customer.cnic);
                            $('#material_status').val(response.customer.material_status);
                            $('#monthly_income').val(response.customer.monthly_income);
                            $('#residential_address').val(response.customer.residential_address);
                            $('#residential_phone').val(response.customer.residential_phone);
                            $('#residential_since').val(response.customer.residential_since);
                            $('#office_address').val(response.customer.office_address);
                            $('#office_phone').val(response.customer.office_phone);
                            $('#caste').val(response.customer.caste);
                            $('#cnic_expiry').val(response.customer.cnic_expiry);
                            $('#dob').val(response.customer.dob);
                            $('#occupation').val(response.customer.occupation);
                            $('#designation').val(response.customer.designation);
                            $('#work_since').val(response.customer.work_since);
                        }
                    }
                });
            });
            $(document).on('change', '#item_id', function (e) {
                e.preventDefault();
                var item_id = $('#item_id').find(":selected").val();
                $.ajax({
                    type: "GET",
                    url: '/sale/create/fetchItem/'+item_id,
                    success: function (response) {
                        if (response.status == 0) {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                        }
                        else {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success('Item Selected');
                            $('#item_code').val(response.item.item_code);
                            $('#description').val(response.item.description);
                            $('#category_id').val(response.item.category.name);
                            $('#cost_price').val(response.item.cost_price);
                            var barcode_id = $('#barcode_id');
                            $('#barcode_id').children().remove().end()
                            $.each(response.item.barcodes, function (barcode) {
                                barcode_id.append($("<option />").val(response.item.barcodes[barcode].id).text(response.item.barcodes[barcode].id+' - '+response.item.barcodes[barcode].item_id+':'+response.item.name));
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
