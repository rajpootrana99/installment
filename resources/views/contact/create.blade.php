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
                <h5 class="mb-0">Account Detail</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('accountDetail.index') }}">Account Detail</a></li>
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
                                    <h4>Contact</h4>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="account_number">Account No:</label>
                                        <input type="text" name="account_number" class="form-control" value="{{ old('account_number') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('account_number') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="contact_name">Contact Name:</label>
                                        <input type="text" name="contact_name" class="form-control" placeholder="Enter Contact Name" value="{{ old('contact_name') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('contact_name') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="company_name">Company Name:</label>
                                        <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" value="{{ old('company_name') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('company_name') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="name">Address:</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('address') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="city">City:</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter City" value="{{ old('city') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('city') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cell">Cell:</label>
                                        <input type="text" name="cell" class="form-control" placeholder="Enter Cell" value="{{ old('cell') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cell') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cnic">CNIC:</label>
                                        <input type="text" name="cnic" class="form-control" placeholder="Enter CNIC" value="{{ old('cnic') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cnic') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone">Phone:</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ old('phone') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('phone') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="second_phone">Phone2:</label>
                                        <input type="text" name="second_phone" class="form-control" placeholder="Enter Phone2" value="{{ old('second_phone') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('second_phone') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="fax">Fax:</label>
                                        <input type="text" name="fax" class="form-control" placeholder="Enter Fax" value="{{ old('fax') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('fax') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="web">Web:</label>
                                        <input type="text" name="web" class="form-control" placeholder="Enter Web" value="{{ old('web') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('web') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="ntn">NTN:</label>
                                        <input type="text" name="ntn" class="form-control" placeholder="Enter NTN" value="{{ old('ntn') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('ntn') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="credit_limit">Credit Limit:</label>
                                        <input type="text" name="credit_limit" class="form-control" placeholder="Enter Credit Limit" value="{{ old('credit_limit') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('credit_limit') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="recovery_day">Recover Day:</label>
                                        <input type="text" name="recovery_day" class="form-control" placeholder="Enter Recover Day" value="{{ old('recovery_day') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('recovery_day') }}</div>
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
@endsection
