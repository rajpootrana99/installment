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
                <h5 class="mb-0">Route</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('route.index') }}">Route</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <form method="post" action="{{route('route.update', ['route' => $route])}}">
                        @method('PATCH')
                        @csrf
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <div class="row card-title">
                                        <h4>Route</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Name:</label>
                                        <div class="custom-file">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $route->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="item_id">Select Item:</label>
                                        <select name="area_id[]" class="form-control" multiple="multiple">
                                            @foreach($areas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('area_id') }}</div>
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
