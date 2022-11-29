@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <h1 class="title" data-aos="fade-up">Artikel</h1>
        @php
        $i = 50;
        @endphp
        @foreach ($articles as $object)
        <a href="/detail-artikel/{{$object->id}}">
            <div class="grid-horizontal-artikel" data-aos="fade-up" data-aos-delay="{{$i+=50}}">
                <div class="desc-gambar">
                    <img src="{{asset("storage/article_images/".$object->images)}}" alt="" data-aos="zoom-in">
                </div>
                <div class="flex-vertical-articel">
                    <h2 class="sub-title">{{$object->title}}</h2>
                    <div class="flex-date">
                        <div class="date">
                            {{$object->created_at}}
                        </div>
                        <div class="penulis">
                            Penulis: {{$object->author}}
                        </div>
                    </div>
                    <p>{{substr($object->description, 0, 200)}}<br></p>
                </div>
            </div>
        </a>
        @endforeach
        <div class="d-flex">
            {{ $articles->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
