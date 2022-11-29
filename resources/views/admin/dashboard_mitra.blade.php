@extends('layouts.mitra')

@section('content')
<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
        <div class="container-fluid">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Desktop Menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="{{asset('img/icon-user.png')}}" alt=""
                                class="rounded-circle mr-2 profile-picture" />
                            Hi, James
                        </a>
                        <div class="dropdown-menu">
                            <a href="/dashboard.html" class="dropdown-item">Back to Store</a>
                            <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="/" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="#" class="nav-link"> Hi, James </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-inline-block"> Cart </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recently Added</h5>
                        <a class="card card-list d-block" href="/dashboard-product-details.html">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{asset('img/dashboard-icon-product-1.png')}}" alt="" />
                                    </div>
                                    <div class="col-md-4">Mentimun</div>
                                    <div class="col-md-3">Rp 13.000/kg</div>
                                    <div class="col-md-3">28 November 2022</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="{{asset('img/dashboard-arrow-right.svg')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="card card-list d-block" href="/dashboard-product-details.html">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-2.png" alt="" />
                                    </div>
                                    <div class="col-md-4">Telur Ayam</div>
                                    <div class="col-md-3">Rp 30.000/kg</div>
                                    <div class="col-md-3">27 November 2022</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="card card-list d-block" href="/dashboard-product-details.html">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-3.png" alt="" />
                                    </div>
                                    <div class="col-md-4">Mangga</div>
                                    <div class="col-md-3">Rp 18.000/kg</div>
                                    <div class="col-md-3">26 November 2022</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
