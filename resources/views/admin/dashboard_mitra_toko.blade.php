@extends('layouts.mitra')

@section('content')
<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
            &laquo; Menu
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="/images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture" />
                        Hi, James
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/index.html">Back to Store</a>
                        <a class="dropdown-item" href="/dashboard-account.html">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/">Logout</a>
                    </div>
                </li>
            </ul>
            <!-- Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                    <a class="nav-link" href="#"> Hi, James </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nama Toko</label>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="emailHelp" name="name" value="Toko Subur" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="owner">Nama Pemilik</label>
                                                <input type="text" class="form-control" id="owner"
                                                    aria-describedby="emailHelp" name="owner" value="James" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="business">Jenis Usaha</label>
                                                <input type="text" class="form-control" id="business"
                                                    aria-describedby="emailHelp" name="business"
                                                    value="Peralatan sawah dan pupuk" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneNumber">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="phoneNumber"
                                                    aria-describedby="emailHelp" name="phoneNumber"
                                                    value="08123456789" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <input type="text" class="form-control" id="address"
                                                    aria-describedby="emailHelp" name="address"
                                                    value="Desa Tawangsari, RT 1 RW 1, Caturtunggal, Sleman, Yogyakarta" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5 btn-dashboard">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
