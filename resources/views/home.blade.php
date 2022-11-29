@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                            <li data-target="#storeCarousel" data-slide-to="1"></li>
                            <li data-target="#storeCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset("img/banner 1.jpg")}}" alt="Carousel Image" class="d-block w-100" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset("img/banner 1.jpg")}}" alt="Carousel Image" class="d-block w-100" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset("img/banner 1.jpg")}}" alt="Carousel Image" class="d-block w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Kategori</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{asset("img/categories-agriculture.svg")}}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Pertanian</p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{asset("img/categories-livestock.svg")}}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Ternak</p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{asset("img/categories-souvenir.svg")}}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Souvenir</p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{asset("img/categories-food.svg")}}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Makanan</p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{asset("img/categories_goods.svg")}}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Barang</p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{asset("img/categories-service.svg")}}" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Jasa</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Produk Baru</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                    background-image: url('{{asset("img/products-mentimun.jpg")}}');"></div>
                        </div>
                        <div class="products-text">Mentimun</div>
                        <div class="products-price">Rp 13.000/kg</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                    background-image: url('{{asset("img/products-telur-ayam.jpg")}}');"></div>
                        </div>
                        <div class="products-text">Telur Ayam</div>
                        <div class="products-price">Rp 30.000/kg</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{asset("img/products-mangga.jpg")}}')">
                            </div>
                        </div>
                        <div class="products-text">Mangga</div>
                        <div class="products-price">Rp 18.000/kg</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                    background-image: url('{{asset("img/products-rambutan.jpg")}}');"></div>
                        </div>
                        <div class="products-text">Rambutan</div>
                        <div class="products-price">Rp 30.000/kg</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                    background-image: url('{{asset("img/products-kentang.jpg")}}');"></div>
                        </div>
                        <div class="products-text">Kentang</div>
                        <div class="products-price">Rp 17.000/kg</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{asset("img/products-ikan.jpg")}}')">
                            </div>
                        </div>
                        <div class="products-text">Ikan</div>
                        <div class="products-price">Rp 35.000/kg</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="700">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                    background-image: url('{{asset("img/products-semangka.jpg")}}');"></div>
                        </div>
                        <div class="products-text">Semangka</div>
                        <div class="products-price">Rp 21.000/buah</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                    <a href="/detail_produk" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                    background-image: url('{{asset("img/products-cabai-merah.jpg")}}');"></div>
                        </div>
                        <div class="products-text">Cabai Merah</div>
                        <div class="products-price">Rp 40.000/kg</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Mitra</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                      background-image: url('{{asset('img/Toko Mentari.png')}}');
                    "></div>
                        </div>
                        <div class="products-text">Toko Mentari</div>
                        <div class="products-price">Material Bangunan</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                      background-image: url('/images/mitra-toko-buah-abc.jpg');
                    "></div>
                        </div>
                        <div class="products-text">Toko Buah ABC</div>
                        <div class="products-price">Buah-buahan</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                      background-image: url('/images/mitra-percetakan-arjuna.jpg');
                    "></div>
                        </div>
                        <div class="products-text">Percetakan Arjuna</div>
                        <div class="products-price">Percetakan</div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                      background-image: url('/images/mitra-warung-barokah.jpg');
                    "></div>
                        </div>
                        <div class="products-text">Warung Barokah</div>
                        <div class="products-price">Sembako</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="testimoni-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div id="testimoniCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#testimoniCarousel" data-slide-to="0"></li>
                            <li data-target="#testimoniCarousel" data-slide-to="1"></li>
                            <li data-target="#testimoniCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('img/testimoni 1.jpg')}}" alt="Carousel Image"
                                    class="d-block w-100" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('img/testimoni 1.jpg')}}" alt="Carousel Image"
                                    class="d-block w-100" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('img/testimoni 1.jpg')}}" alt="Carousel Image"
                                    class="d-block w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4" data-aos="fade-up">
                    <h5>Artikel</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="background-image: url('{{asset('img/Artikel-1.png')}}')">
                            </div>
                        </div>
                        <div class="products-text">
                            Update Harga Barang Kebutuhan Pokok
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="background-image: url('/images/artikel-2.jpg')"></div>
                        </div>
                        <div class="products-text">
                            Pemanfaatan Lahan untuk Hidroponik
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="background-image: url('/images/artikel-3.jpg')"></div>
                        </div>
                        <div class="products-text">
                            Pembekalan Budidaya Bawang untuk Petani
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="/details-mitra.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="background-image: url('/images/artikel-4.jpg')"></div>
                        </div>
                        <div class="products-text">
                            Desa Tawangsari Gelar Rapat Rutin Bersama
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4" data-aos="fade-up">
                    <h5>Hubungi Kami</h5>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp"
                            name="fullname" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subject">Subjek Pesan</label>
                        <input type="text" class="form-control" id="subject" aria-describedby="emailHelp"
                            name="subject" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subject">Isi Pesan</label>
                        <textarea type="text" class="form-control" id="messagevalue" rows="5"
                            aria-describedby="emailHelp" name="messagevalue"></textarea>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success btn-block px-5 btn-send">
                        Kirim Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
