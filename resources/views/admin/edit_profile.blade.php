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
            </div>
        </div>
    </nav>
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
            @endif
            <h1>Edit Profile</h1>
            <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="content">
                    <div class="kiri">
                        <label for="file-input"><input type="file" class="form-control 
                        @error('images')
                            is-invalid
                        @enderror" id="input-file" name="images" accept="image/*" onchange="previewImage()"><i
                                class="fa-solid fa-upload"></i> &nbsp; Choose A Profile Photo</label>
                        <p id="num-of-files">No File Chosen</p>
                        <div id="images"></div>
                    </div>
                    <div class="kanan">
                        <div class="form-group">
                            <label for="name" class="label-auth">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $users->name }}" required autocomplete="name" autofocus>
                            @error('name')
                            <div class="invalid-feedback ml-4">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="buttonProd">Simpan Data</button>
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
