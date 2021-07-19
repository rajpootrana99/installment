@extends('layout.base')

@section('section')
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <div class="iq-sidebar-logo">
                <div class="top-logo">
                    <a href="index.blade.php" class="logo">
                        <img src="images/logo.gif" class="img-fluid" alt="">
                        <span>Metorik</span>
                    </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <h5 class="mb-0">Dashboard</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.blade.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
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
                        <a href="#" class="search-toggle iq-waves-effect text-white"><img src="images/user/1.jpg" class="img-fluid rounded" alt="user"></a>
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

    <div id="content-page" class="content-page">
        <div class="container-fluid">
           <div class="row">
              <div class="col-md-6 col-lg-3">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                    <div class="iq-card-body">
                       <div class="text-center mb-2">
                       <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="ri-user-line"></i></div></div>
                       <div class="clearfix"></div>
                       <div class="text-center">
                          <h2 class="mb-0"><span class="counter">440</span></h2>
                          <h6 class="mb-2">Customers</h6>
                          <p class="mb-0 text-secondary line-height"><i class="ri-arrow-up-line text-success mr-1"></i><span class="text-success">10%</span> Increased</p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-3">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                    <div class="iq-card-body">
                       <div class="text-center mb-2">
                       <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-product-hunt-line"></i></div></div>
                       <div class="clearfix"></div>
                       <div class="text-center">
                          <h2 class="mb-0"><span class="counter">1000</span></h2>
                          <h6 class="mb-2">Products</h6>
                          <p class="mb-0 text-secondary line-height"><i class="ri-arrow-up-line text-success mr-1"></i><span class="text-success">22%</span> Increased</p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-3">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                    <div class="iq-card-body">
                       <div class="text-center mb-2">
                       <div class="rounded-circle iq-card-icon iq-bg-success"><i class="ri-shopping-cart-2-line"></i></div></div>
                       <div class="clearfix"></div>
                       <div class="text-center">
                          <h2 class="mb-0"><span class="counter">376</span></h2>
                          <h6 class="mb-2">Dealers</h6>
                          <p class="mb-0 text-secondary line-height"><i class="ri-arrow-up-line text-success mr-1"></i><span class="text-success">8%</span> Increased</p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-3">
                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                    <div class="iq-card-body p-0" style="background: url(images/page-img/01.png) no-repeat scroll center center; background-size: contain; min-height: 202px;">
                    </div>
                 </div>
              </div>


           </div>
        </div>
     </div>
@endsection
