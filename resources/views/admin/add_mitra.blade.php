@extends('layouts.crud')

@section('content')
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
                            <img src="{{asset("storage/user_images/".Auth::user()->images)}}" alt=""
                                class="rounded-circle mr-2 profile-picture" />
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="/home" class="dropdown-item">Back To Home</a>
                            <a href="/users/{{Auth::user()->id}}/edit" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route("logout")}}" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>Hi, <b>{{ Auth::user()->name }}</b></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container">
            <h1>Tambahkan Mitra</h1>
            @if (Auth::user()->level == 'admin')
            <a href="/db_admin-mitra" class="btn btn-info btn-edit text-light">Back</a>
            @else
            <a href="/db_mitra-toko/{{Auth::user()->name}}" class="btn btn-info btn-edit text-light">Back</a>
            @endif
            <form action="{{ route('admin-mitras.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="content">
                    <div class="kiri">
                        <label for="file-input"><input type="file" class="form-control 
                        @error('images')
                            is-invalid
                        @enderror" id="input-file" name="images" accept="image/*" onchange="previewImage()"><i
                                class="fa-solid fa-upload"></i> &nbsp; Choose A Pictures</label>
                        <p id="num-of-files">No File Chosen</p>
                        <div id="images"></div>
                    </div>
                    <div class="kanan">
                        <div class="name">
                            <label for="mitra_name">Nama Toko</label>
                            <input type="text" name="mitra_name" id="mitra_name" class="form-control @error('mitra_name')
                        is-invalid
                    @enderror" placeholder="Masukkan Nama Toko" value="{{ old('mitra_name') }}">
                            @error('mitra_name')
                            <div class="invalid-feedback ml-4">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="Owner">
                            <label for="owner">Pemilik Toko</label>
                            <input type="text" name="owner" id="owner" class="form-control mb-0 @error('owner')
                        is-invalid
                    @enderror" placeholder="Masukkan Nama Pemilik Toko" value="{{ old('owner') }}">
                            <small class="form-text text-muted ml-4 mb-1">*Nama pemilik toko harus sama dengan
                                username.</small>
                            @error('owner')
                            <div class="invalid-feedback ml-4">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="type-of-business">
                            <label for="t_o_business">Jenis Usaha</label>
                            <input type="text" name="t_o_business" id="t_o_business" class="form-control @error('t_o_business')
                        is-invalid
                    @enderror" placeholder="Masukkan Jenis Usaha" value="{{ old('t_o_business') }}">
                            @error('t_o_business')
                            <div class="invalid-feedback ml-4">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="Address">
                            <label for="address">Alamat Toko</label>
                            <input type="text" name="address" id="address" class="form-control @error('address')
                        is-invalid
                    @enderror" placeholder="Masukkan Alamat Toko" value="{{ old('address') }}">
                            @error('address')
                            <div class="invalid-feedback ml-4">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="buttonProd">Simpan Mitra</button>
            </form>
        </div>
    </div>
</div>
<script>
    let fileInput = document.getElementById("input-file");
    let imageContainer = document.getElementById("images")
    let numOfFiles = document.getElementById("num-of-files");

    function previewImage() {
        imageContainer.innerHTML = "";
        numOfFiles.textContent = '';

        for (i of fileInput.files) {
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = '';
            figure.appendChild(figCap);
            reader.onload = () => {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                figure.insertBefore(img, figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

</script>
@endsection
