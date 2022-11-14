@extends('layouts.base')

@section('content')
<div class="container">
    <h1 class="title">Tentang Kami</h1>
    <h2 class="second-title">Sejarah Singkat</h2>
    <p>Badan Usaha Milik Desa Tawangsari adalah sebuah badan usaha yang didirikan Pemerintah Desa Tawangsari,
        Kabupaten Sleman, Yogyakarta. Proses pendiriannya sudah berjalan sejak tahun 2020, namun karena terkendala
        pandemi, sehingga baru resmi terbentuk pada tahun 2021. Proses pendirian Bumdes tidak terlepas dari dukungan
        Pemerintahan Desa Tawangsari (Pemerintah Desa, BPD, LPMD), tokoh-tokoh masyarakat, Pemerintah Kabupaten
        Sleman, khususnya Dinas Pemberdayaan Masyarakat serta dari Kementerian Desa, Pembangunan Daerah Tertinggal
        dan Transmigrasi yang dalam hal ini melalui para pendamping desa. Pada tahun 2022 Bumdes edsa Tawangsari
        meluncurkan sebuah website yang bernama Berdesa TWG.</p>
    <h2 class="second-title">Nama dan Logo</h2>
    <img class="contents-img" src="{{ asset('img/Logo.png') }}" alt="">
    <p class="item-list">Nama BUMDes adalah Berkah Torongrejo atau disingkat Bejo (dalam Bahasa Indonesia bejo
        berarti beruntung), memiliki makna bahwa kami berharap kegiatan yang kami lakukan bisa menjadikan berkah dan
        keberuntungan khususnya bagi seluruh masyarakat Desa Torongrejo. Logo BUMDes Bejo memiliki makna, yaitu :
    </p>
    <p class="item-list"><span><i class="fa-solid fa-circle fa-2xs dot"></i></span>Berbentuk lingkaran, bermakna
        aliran keuangan yang berputar terus menerus, tidak terputus untuk membantu perekonomian warga.</p>
    <p class="item-list"><span><i class="fa-solid fa-circle fa-2xs dot"></i></span>Tanaman berwarna hijau yang
        tumbuh di atas tanah, berarti bahwa usaha yang dikerjakan berkaitan dengan hasil alam seperti dalam bidang
        pertanian, peternakan, dll.
    </p>
    <p class="item-list item-end"><span><i class="fa-solid fa-circle fa-2xs dot"></i></span>Background warna oranye,
        melambangkan Bumdes Tawangsari ini yang selalu ada seperti sinar matahari yang terus bersinar.</p>
    <h2 class="second-title">Visi</h2>
    <p>Meningkatkan kesejahteraan masyarakat Desa Tawangsari dalam bidang perekonomian.</p>
    <h2 class="second-title">Misi</h2>
    <p class="item-list"><span><i class="fa-solid fa-circle fa-2xs dot"></i></span>Menjalin kemitraan khususnya
        dengan masyarakat Desa Tawangsari serta memajukan usaha mitra.
    </p>
    <p class="item-list"><span><i class="fa-solid fa-circle fa-2xs dot"></i></span>Membuat usaha baru sesuai
        kebutuhan pasar dan potensi yang dimiliki tetapi diupayakan tidak mematikan usaha masyarakat yang sudah ada.
    </p>
    <p class="item-list"><span><i class="fa-solid fa-circle fa-2xs dot"></i></span>Menjalankan usaha dengan
        prinsip-prinsip pengelolaan usaha yang baik dan benar.
    </p>
    <p class="item-list item-end"><span><i class="fa-solid fa-circle fa-2xs dot"></i></span>Menjalankan usaha untuk
        memperoleh keuntungan dengan tetap memperhatikan kearifan lokal, norma sosial, budaya, agama serta
        kelestarian lingkungan.</p>
    <h2 class="second-title">Anggota</h2>
    <div class="flex-horizontal">
        <div class="team">
            <img src="{{asset("img/Darmaji.png")}}">
            <h4 class="fourth-title">Darmaji</h4>
            <p>Direktur</p>
        </div>
        <div class="team">
            <img src="{{asset("img/Yanto.png")}}">
            <h4 class="fourth-title">Yanto</h4>
            <p>Sekretaris 1</p>
        </div>
        <div class="team">
            <img src="{{asset("img/Agus.png")}}">
            <h4 class="fourth-title">Agus</h4>
            <p>Sekretaris 2</p>
        </div>
        <div class="team">
            <img src="{{asset("img/Agus 2.png")}}">
            <h4 class="fourth-title">Agus</h4>
            <p>Bendahara</p>
        </div>
        <div class="team">
            <img src="{{asset("img/Rani.png")}}">
            <h4 class="fourth-title">Rani</h4>
            <p>Manager Unit Pangan</p>
        </div>
        <div class="team">
            <img src="{{asset("img/Anisa.png")}}">
            <h4 class="fourth-title">Anisa</h4>
            <p>Manager Unit Barang & Jasa</p>
        </div>
    </div>
</div>
@endsection
