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
                <h5 class="mb-0">Barcode</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('barcode.index') }}">Barcode</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
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
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="images/user/1.jpg" class="img-fluid rounded" alt="user"></a>
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
                                    <h4>Barcode</h4>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <a href="{{ route('barcode.create') }}" class="btn btn-primary float-right mb-4"><i class="fa fa-plus"></i> New Barcode </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Item Code</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($barcodes as $barcode)
                                        <tr class="text-center">
                                            <td>{{ $barcode->id }}</td>
                                            <td>{{ $barcode->item->item_code }}</td>
                                            <td>{{ $barcode->item->name }}</td>
                                            @if(isset($barcode->barcode))
                                                <td><img src="{{ asset('storage/'.$barcode->barcode) }}" height="50px"></td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>
                                                <div class="row justify-content-center">
                                                    <a href="{{ route('barcode.edit', ['barcode' => $barcode]) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form id="{{ 'delete_'.$barcode->id }}" method="post" action="{{ route('barcode.destroy', ['barcode' => $barcode]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a onclick="document.getElementById('{{ 'delete_'.$barcode->id }}').submit()" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
