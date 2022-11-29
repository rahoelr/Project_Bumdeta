<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="/home" class="navbar brand">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{($title === "") ? 'active' : ''}}">
                    <a href="/admin/landing_page" class="nav-link">Landing Page</a>
                </li>
                <li class="nav-item {{($title === "| Product") ? 'active' : ''}}">
                    <a href="/admin-products" class="nav-link">Produk</a>
                </li>
                <li class="nav-item {{($title === "| Mitra") ? 'active' : ''}}">
                    <a href="/admin-mitras" class="nav-link">Mitra</a>
                </li>
                <li class="nav-item {{($title === "| Article") ? 'active' : ''}}">
                    <a href="/admin-articles" class="nav-link">Artikel</a>
                </li>
                <li class="nav-item {{($title === "| About Us") ? 'active' : ''}}">
                    <a href="/admin-about_us" class="nav-link">Tentang Kami</a>
                </li>
                <li class="nav-item {{($title === "| Team") ? 'active' : ''}}">
                    <a href="/admin-teams" class="nav-link">Anggota</a>
                </li>
                <li class="nav-item {{($title === "| Category") ? 'active' : ''}}">
                    <a href="/admin-categories" class="nav-link">Category</a>
                </li>
                <li class="nav-item {{($title === "| Tentang Kami") ? 'active' : ''}}">
                    <a href="/admin/pesan" class="nav-link">Pesan</a>
                </li>
            </ul>
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="{{asset("storage/user_images/".Auth::user()->images)}}" alt=""
                            class="rounded-circle mr-2 profile-picture" />
                        Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="/admin-products" class="dropdown-item">Dashboard</a>
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
