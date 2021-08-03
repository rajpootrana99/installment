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
                <h5 class="mb-0">Employee</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employee</a></li>
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
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <div class="row card-title">
                                    <h4>Employee</h4>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form method="post" action="{{route('employee.update', ['employee' => $employee])}}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6 text-center">
                                        <div class="add-img-user profile-img-edit">
                                            <img id="output_image" class="profile-pic" width="150px" height="150px" src="{{ asset('storage/'.$employee->image) }}" alt="profile-pic">
                                            <div class="p-image">
                                                <!-- <h5 class="upload-button">file upload</h5> -->
                                                <input  type="file" onchange="loadFile(event)" id="image" name="image" style="display: none">
                                                <label for="image" class="upload-button btn iq-bg-primary">File Upload</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <div>
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $employee->name }}">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="mt-4">
                                            <label for="father_name">Father Name:</label>
                                            <input type="text" name="father_name" class="form-control" placeholder="Enter Father Name" value="{{ $employee->father_name }}">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('father_name') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="type">Customer Type:</label>
                                        <select class="form-control" name="type">
                                            @foreach($employee->typeOptions() as $typeOptionsKey => $typeOptionssValue)
                                                <option value="{{ $typeOptionsKey }}" {{ $employee->type == $typeOptionsKey ? 'selected' : '' }}>{{ $typeOptionssValue }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('type') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cell">Cell:</label>
                                        <input type="text" name="cell" class="form-control" placeholder="Enter Cell Number" value="{{ $employee->cell }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cell') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cnic">CNIC:</label>
                                        <input type="text" name="cnic" class="form-control" placeholder="Enter CNIC" value="{{ $employee->cnic }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cnic') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="material_status">Material Status:</label>
                                        <select class="form-control" name="material_status">
                                            @foreach($employee->materialStatusOptions() as $materialStatusOptionsKey => $materialStatusOptionssValue)
                                                <option value="{{ $materialStatusOptionsKey }}"{{ $employee->material_status = $materialStatusOptionsKey ? 'selected' : '' }}>{{ $materialStatusOptionssValue }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('material_status') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="monthly_income">Monthly Income:</label>
                                        <input type="text" name="monthly_income" class="form-control" placeholder="Enter Monthly Income" value="{{ $employee->monthly_income }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('monthly_income') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="residential_address">Residential Address:</label>
                                        <input type="text" name="residential_address" class="form-control" placeholder="Enter Residential Address" value="{{ $employee->residential_address }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('residential_address') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="residential_phone">Residential Phone:</label>
                                        <input type="text" name="residential_phone" class="form-control" placeholder="Enter Residential Phone" value="{{ $employee->residential_phone }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('residential_phone') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="residential_since">Residential Since:</label>
                                        <input type="date" name="residential_since" class="form-control" placeholder="Enter Residential Since" value="{{ $employee->residential_since }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('residential_since') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="caste">Caste:</label>
                                        <input type="text" name="caste" class="form-control" placeholder="Enter Caste" value="{{ $employee->caste }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('caste') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cnic_expiry">CNIC Expiry:</label>
                                        <input type="date" name="cnic_expiry" class="form-control" placeholder="Enter Office Address" value="{{ $employee->cnic_expiry }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cnic_expiry') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="dob">Date of Birth:</label>
                                        <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth" value="{{ $employee->dob }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('dob') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="work_since">Work Since:</label>
                                        <input type="date" name="work_since" class="form-control" placeholder="Enter Work Since" value="{{ $employee->work_since }}">
                                        <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('work_since') }}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cnic_front">CNIC Front:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cnic_front" name="cnic_front">
                                            <label class="custom-file-label" for="cnic_front">CNIC Front</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cnic_back">CNIC Back:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cnic_back" name="cnic_back">
                                            <label class="custom-file-label" for="cnic_back">CNIC Back</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="document">Document:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="document" name="document">
                                            <label class="custom-file-label" for="cnic_back">Upload Document</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
