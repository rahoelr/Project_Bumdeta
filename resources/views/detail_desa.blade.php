@extends('layouts.base')

@section('content')
<div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <h1 class="title" data-aos="fade-up">Detail Desa</h1>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/desa">Desa</a>
                            </li>
                            <li class="breadcrumb-item active">Detail Desa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Start section gallery -->
    <section class="container">
        <div class="col details-desa-section">
            <div class="col-lg-12 col-md-12 col-12 details-desa-section">
                @php
                $image = explode('|', $desas->images);
                @endphp
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-9">
                        <img class="img-fluid pb-1 w-100 products-details" id="MainImg"
                            src="{{asset("storage/desa_images/".$image[0])}}" alt="" data-aos="zoom-in"
                            data-aos-delay="200">
                    </div>
                    <div class="col-lg-4 col-md-3 col-3" data-aos="fade-up">
                        <div class="small-img-group">
                            <div class="small-img-col thumb">
                                @foreach ($image as $item)
                                <img src="{{asset("storage/desa_images/".$item)}}" class="small-img w-100 pb-3" alt=""
                                    data-aos="zoom-in" data-aos-delay="200">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-3 details-desa-section" data-aos="fade-up">
                <h3 class="pt-2">{{$desas->desa}}</h3>
                <h4 class="my-2" data-aos="fade-up">{{$desas->description}}</h4>
            </div>
        </div>
    </section>
    <section class="container">
        <hr class="hr-artikel">
        <h3 class="third-title" data-aos="fade-up">Daftar Mitra</h3>
        <div class="row">
            @php
            $i = 200;
            $j = 200;
            @endphp
            @if (count($mitras) > 2)
            @for ($k = 0; $k < 3; $k++) <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up"
                data-aos-delay="{{$i+=200}}">
                @if ($mitras[$k]->desa == $desas->desa)
                @php
                $image = explode('|', $mitras[$k]->images);
                @endphp
                <a href="/detail_mitra/{{$mitras[$k]->id}}" class="component-products d-block">
                    <div class="products-thumbnail">
                        <div class="products-image"
                            style="background-image: url('{{asset("storage/mitra_images/".$image[0])}}')">
                        </div>
                    </div>
                    <div class="products-text">
                        {{$mitras[$k]->mitra_name}}
                    </div>
                </a>
                @endif
        </div>
        @endfor
        @else
        @foreach ($mitras as $mitra)
        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$j+=200}}">
            @if ($mitra->desa == $desas->desa)
            <a href="/detail-mitra/{{$mitra->id}}" class="component-products d-block">
                @php
                $image = explode('|', $mitra->images);
                @endphp
                <div class="products-thumbnail">
                    <div class="products-image"
                        style="background-image: url('{{asset("storage/mitra_images/".$image[0])}}')"></div>
                </div>
                <div class="products-text">
                    {{$mitra->mitra_name}}
                </div>
            </a>
            @endif
        </div>
        @endforeach
        @endif
    </section>
</div>
<!-- Start script Vue js gallery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function () {
        $('.thumb img').click(function (e) {
            e.preventDefault();
            $('#MainImg').attr("src", $(this).attr("src"));
        })
    })

</script>
<script src="{{asset("template_1/script/navbar-scroll.js")}}"></script>
<!-- End script Vue js gallery -->
@endsection
