@extends('layouts.admin')

@section('content')
<style type="text/css">
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }

</style>
<div class="page-content page-home">
    <div class="container">
        <h2>Images for product <span class="text-primary">{{ $products->product_name }}</span></h2>
        <a href="/admin-products" class="btn btn-primary btn-edit text-light">Back</a>
        <div class="row mt-4">
            @php
            $image = explode('|', $products->images);
            @endphp
            @foreach ($image as $item)
            <div class="col-md-3">
                <div class="card mb-5" style="max-width: 20rem;">
                    <a href="{{asset("storage/product_images/".$item)}}" class="example-image-link"
                        data-lightbox="example-2" data-title="{{ $item }}">
                        <img src="{{asset("storage/product_images/".$item)}}" alt="image-1" class="card-img-top"></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
