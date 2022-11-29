@extends('layouts.base')

@section('content')
<div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/home">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Start section gallery -->
    <section class="store-gallery my-2" id="gallery">
        <div class="container">
            <div class="row">
                @php
                $image = explode('|', $products->images);
                @endphp
                <div class="col-lg-8 imgBox" data-aos="zoom-in">
                    <img src="{{asset("storage/product_images/".$image[0])}}" class="w-100 main-image" alt="" />
                </div>
                <div class="col-lg-2 thumb">
                    @foreach ($image as $item)
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0 my-2" data-aos="zoom-in" data-aos-delay="100">
                            <a href="{{asset("storage/product_images/".$item)}}" target="imgBox">
                                <img src="{{asset("storage/product_images/".$item)}}" alt="" />
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>{{$products->product_name}}</h1>
                        <div class="owner">By: {{$products->mitra}}</div>
                        <div class="price">Rp {{$products->price}}</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        <a href="https://wa.link/cxs25l" target="_blank"
                            class="btn btn-success px4 text-white btn-block mb-3">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        @php
                        $paragraph = explode('<br />', $products->description);
                        @endphp
                        @foreach ($paragraph as $item)
                        <p>{{$item}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End section gallery -->
</div>
<!-- Start script Vue js gallery -->
<script src="{{("template_1/vendor/vue/vue.js")}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function () {
        $('.thumb a').mouseover(function (e) {
            e.preventDefault();
            $('.imgBox img').attr("src", $(this).attr("href"));
        })
    })

</script>
<script src="{{asset("template_1/script/navbar-scroll.js")}}"></script>
<!-- End script Vue js gallery -->
@endsection
