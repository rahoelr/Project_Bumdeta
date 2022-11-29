@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <h1 class="title" data-aos="fade-up">Mitra</h1>
            @php
            $i = 50;
            $j = 1;
            @endphp
            @foreach ($mitras as $object)
            <div class="flex-vertical" data-aos="fade-up" data-aos-delay="{{$i+=50}}">
                <h2 class="second-title">{{$j++}}. {{$object->mitra_name}}</h2>
                <div class="desc-mitra">
                    <img class="img-mitra" src="{{asset("storage/mitra_images/".$object->images)}}" alt=""
                        data-aos="zoom-in">
                    <p>Nama Toko: {{$object->mitra_name}} <br>
                        Nama Pemilik: {{$object->owner}} <br>
                        Jenis Usaha: {{$object->t_o_business}} <br>
                        Tanggal Bergabung: {{$object->created_at}} <br>
                        Alamat: {{$object->address}}</p>
                </div>
            </div>
            @endforeach
            <div class="d-flex">
                {{ $mitras->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
</div>
@endsection
