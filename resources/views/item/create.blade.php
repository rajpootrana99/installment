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
                <h5 class="mb-0">Item</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Item</a></li>
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
                    <form method="post" action="{{route('item.store')}}" >
                        @csrf
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <div class="row card-title">
                                        <h4>Item</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="item_code">Item Code:</label>
                                        <input type="text" name="item_code" class="form-control" placeholder="Enter Item Code" value="{{ old('item_code') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('item_code') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Item Name" value="{{ old('name') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('name') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="category_id">Category:</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('category_id') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sub_category_id">Sub Category:</label>
                                        <select name="sub_category_id" class="form-control">
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sub_category_id') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="manufacturer_id">Manufacturer:</label>
                                        <select name="manufacturer_id" class="form-control">
                                            @foreach($manufacturers as $manufacturer)
                                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('manufacturer_id') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cost_price">Cost Price:</label>
                                        <input type="text" name="cost_price" class="form-control" placeholder="Enter Cost Price" value="{{ old('cost_price') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cost_price') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sale_price_1">Sale Price 1:</label>
                                        <input type="text" name="sale_price_1" class="form-control" placeholder="Enter Sale Price 1" value="{{ old('sale_price_1') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_price_1') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sale_price_2">Sale Price 2:</label>
                                        <input type="text" name="sale_price_2" class="form-control" placeholder="Enter Sale Price 2" value="{{ old('sale_price_2') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_price_2') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sale_price_3">Sale Price 3:</label>
                                        <input type="text" name="sale_price_3" class="form-control" placeholder="Enter Sale Price 3" value="{{ old('sale_price_3') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_price_3') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sale_price_4">Sale Price 4:</label>
                                        <input type="text" name="sale_price_4" class="form-control" placeholder="Enter Sale Price 4" value="{{ old('sale_price_4') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_price_4') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sale_price_5">Sale Price 5:</label>
                                        <input type="text" name="sale_price_5" class="form-control" placeholder="Enter Sale Price 5" value="{{ old('sale_price_5') }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_price_5') }}</div>
                                    </div>
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
