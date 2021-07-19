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
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    <form method="post" action="{{route('accountDetail.store')}}" >
                        @csrf
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <div class="row card-title">
                                        <h4>Account Detail</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="form-group">
                                    <label for="head_id">Head:</label>
                                    <select name="head_id" class="form-control">
                                        @foreach($heads as $head)
                                            <option value="{{ $head->id }}">{{ $head->name }}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('head_id') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="head_id">Sub Head:</label>
                                    <select name="sub_head_id" class="form-control">
                                        @foreach($subHeads as $subHead)
                                            <option value="{{ $subHead->id }}">{{ $subHead->name }}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sub_head_id') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="account_detail_name">A/C Name:</label>
                                    <input type="text" name="account_detail_name" class="form-control" placeholder="Enter Account Detail Name" value="{{ old('account_detail_name') }}">
                                    <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('account_detail_name') }}</div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="account_code" class="form-control" value="{{ sprintf('%04d', $accountCode) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <div class="row card-title">
                                        <h4>Account Nature</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="form-group row">
                                    @foreach($accountDetail->accountNatureOptions() as $accountNatureOptionKey => $accountNatureOptionValue)
                                        <div class="col-6">
                                            <input type="radio" name="account_nature" value="{{ $accountNatureOptionKey }}" id="radio1" checked="">
                                            <label for="radio1">{{ $accountNatureOptionValue }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
