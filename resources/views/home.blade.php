@extends('layouts.base')

@section('content')
<header class="header">
    <div class="container">
        <div>
            <h1>Selamat datang di
                web Bumdeta</h1>
            <p>
                Berdesa adalah sebuah website yang menampilkan berbagai seluk beluk tentang Bumdes Tawangsari seperti
                profil, produk, berita, dan lain-lain.
            </p>
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Cari barang yang dibutuhkan">
                    <button type="submit" class="searchButton">
                        Cari
                    </button>
                </div>
            </div>
        </div>
        <img src="{{asset("img/gunungHD.png")}}" alt="gunung" />
    </div>
</header>

<section class="produk">
    <h1>Produk</h1>
    <div class="container">
        <h2>Kategori</h2>
        <div class="kategori">
            <div class="item">Pertanian</div>
            <div class="item">Hasil Ternak</div>
            <div class="item">Souvenir</div>
            <div class="item">Makanan</div>
            <div class="item">Non-Pangan</div>
            <div class="item">Jasa</div>
        </div>
        <div class="produkTerbaru">

        </div>
    </div>
</section>

</body>

</html>
@endsection
