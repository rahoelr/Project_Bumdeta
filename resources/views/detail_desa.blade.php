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
    <section class="container product">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-9">
                @php
                $image = explode('|', $desas->images);
                @endphp
                <img class="img-fluid pb-1 w-100 products-details" id="MainImg"
                    src="{{asset("storage/product_images/".$image[0])}}" alt="" data-aos="zoom-in" data-aos-delay="200">
                <div class="small-img-group">
                    <div class="small-img-col thumb">
                        @foreach ($image as $item)
                        <img src="{{asset("storage/product_images/".$item)}}" class="small-img w-25 pb-1" alt=""
                            data-aos="zoom-in" data-aos-delay="200">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-3" data-aos="fade-up">
                <h3 class="pt-2">{{$desas->desa}}</h3>
                <h4 class="my-2" data-aos="fade-up">{{$desas->description}}</h4>
            </div>
        </div>
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
