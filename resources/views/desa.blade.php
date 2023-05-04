@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <h1 class="title" data-aos="fade-up">Desa</h1>
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2>Filter Berdasarkan Kecamatan</h2>
                </div>
            </div>
            <div class="row">
                <form action="/sort-desa" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-4" data-aos="fade-up">
                            <input type="checkbox" name="Kecamatan Kotagede" id="Kecamatan Kotagede" value="yes"><span
                                class="inpt-sort">Kecamatan Kotagede</span>
                        </div>
                        <div class="col-4" data-aos="fade-up">
                            <input type="checkbox" name="Kecamatan Kotagede" id="Kecamatan Kotagede" value="yes"><span
                                class="inpt-sort">Kecamatan Kotagede</span>
                        </div>
                        <div class="col-4" data-aos="fade-up">
                            <input type="checkbox" name="Kecamatan Kotagede" id="Kecamatan Kotagede" value="yes"><span
                                class="inpt-sort">Kecamatan Kotagede</span>
                        </div>
                    </div>
                    <button type="submit" class="btn-sort">Sortir</button>
                </form>
            </div>
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2>Semua Desa</h2>
                </div>
            </div>
            <div class="row">
                @php
                $i = 100;
                @endphp
                @foreach ($desas as $desa)
                <div class="col-6 col-md-4 col-lg-6" data-aos="fade-up" data-aos-delay="{{$i+=50}}">
                    <a href="/detail_desa/{{$desa->id}}" class="component-products d-block">
                        <div class="products-thumbnail mitra-thumbnail">
                            <div class="products-image" style="
                                background-image: url('{{asset("storage/mitra_images/".$desa->images)}}');
                            "></div>
                        </div>
                        <div class="products-title">Desa {{$desa->desa}}</div>
                        <div class="products-desc">{{$desa->description}}</div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $desas->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
