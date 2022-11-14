@extends('layouts.base')

@section('content')
<div class="container">
    <h1 class="title">Mitra</h1>
    <div class="flex-vertical">
        <h2 class="second-title">1. Toko Subur</h2>
        <div class="desc-mitra">
            <img src="{{asset("img/Toko Subur.png")}}" alt="">
            <p>Nama Toko: Toko Subur <br>
                Nama Pemilik: Pak Subur <br>
                Jenis Usaha: Peralatan sawah dan pupuk <br>
                Tanggal Bergabung: 27 September 2022 <br>
                Alamat: Desa Tawangsari, RT 1 RW 1, Caturtunggal, Sleman, Yogyakarta</p>
        </div>
    </div>
    <div class="flex-vertical">
        <h2 class="second-title">2. Fotocopy Kurnia</h2>
        <div class="desc-mitra">
            <img src="{{asset("img/Fotocopy Kurnia.png")}}" alt="">
            <p>Nama Toko: Fotocopy Kurnia <br>
                Nama Pemilik: Pak Kurnia <br>
                Jenis Usaha: Fotocopy <br>
                Tanggal Bergabung: 28 September 2022 <br>
                Alamat: Desa Tawangsari, RT 2 RW 1, Caturtunggal, Sleman, Yogyakarta</p>
        </div>
    </div>
    <div class="flex-vertical">
        <h2 class="second-title">3. Toko Mentari</h2>
        <div class="desc-mitra">
            <img src="{{asset("img/Toko Mentari.png")}}" alt="">
            <p>Nama Toko: Toko Mentari <br>
                Nama Pemilik: Pak Darsono <br>
                Jenis Usaha: Material bangunan <br>
                Tanggal Bergabung: 29 September 2022 <br>
                Alamat: Desa Tawangsari, RT 3 RW 1, Caturtunggal, Sleman, Yogyakarta</p>
        </div>
    </div>
    <div class="flex-vertical">
        <h2 class="second-title">4. Percetakan Arjuna</h2>
        <div class="desc-mitra">
            <img src="{{asset("img/Percetakan Arjuna.png")}}" alt="">
            <p>Nama Toko: Percetakan Arjuna <br>
                Nama Pemilik: Mas Agus <br>
                Jenis Usaha: Percetakan <br>
                Tanggal Bergabung: 30 September 2022 <br>
                Alamat: Desa Tawangsari, RT 4 RW 1, Caturtunggal, Sleman, Yogyakarta</p>
        </div>
    </div>
    <div class="flex-vertical">
        <h2 class="second-title">5. Warung Barokah</h2>
        <div class="desc-mitra">
            <img src="{{asset("img/Warung Barokah.png")}}" alt="">
            <p>Nama Toko: Warung Barokah <br>
                Nama Pemilik: Bu Darmi <br>
                Jenis Usaha: Sembako <br>
                Tanggal Bergabung: 1 Oktober 2022 <br>
                Alamat: Desa Tawangsari, RT 5 RW 1, Caturtunggal, Sleman, Yogyakarta</p>
        </div>
    </div>
    <div class="m-4">
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a href="#" class="page-link">&laquo</a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">&raquo</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
