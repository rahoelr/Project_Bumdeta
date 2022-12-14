@extends('layouts.admin')

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
                <h2 class="dashboard-title">Category</h2>
                <p class="dashboard-subtitle">Kelola Semua Category</p>
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="admin-categories/create" class="btn btn-success btn-dashboard">Tambah Category</a>
                    </div>
                </div>
                <div class="row mt-4">
                    @if(count($categories)>0)
                    @foreach ($categories as $category)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a class="card card-dashboard-product d-block"
                            href="/db_admin-category-detail/{{$category->id}}">
                            <div class="card-body">
                                <img src="{{asset("storage/category_images/".$category->images)}}" alt=""
                                    class="w-100 mb-2" />
                                <div class="product-title text-center">
                                    {{ $category->category }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <h3 class="text-center">No categories yet!!!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
