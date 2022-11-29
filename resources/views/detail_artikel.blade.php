@extends('layouts.base')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/home">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Article Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <h2 class="second-title" data-aos="fade-up">{{$article->title}}</h2>
        <div class="meta-post post-author" data-aos="fade-up">
            <span><i class="fa-solid fa-calendar-days"></i> {{$article->created_at}}</span>
            <span><i class="fa-solid fa-user"></i> Penulis: {{$article->author}}</span>
        </div>
        <img class="img-article" data-aos="zoom-in" src="{{asset("storage/article_images/".$article->images)}}" alt="">
        <div data-aos="fade-up">
            @php
            $paragraph = explode('<br />', $article->description);
            @endphp
            @foreach ($paragraph as $item)
            <p>{{$item}}</p>
            @endforeach
        </div>
        <hr>
        <h3 class="third-title" data-aos="fade-up">Latest Article</h3>
        <div class="grid-horizontal">
            @php
            $i = 100;
            $j = 3;
            @endphp
            @if (count($articles) > 3)
            @for ($k = 0; $k < $j; $k++) <div class="team" data-aos="fade-up" data-aos-delay="{{$i+=200}}">
                <a href="/detail-artikel/{{$articles[$k]->id}}">
                    <img src="{{asset("storage/article_images/".$articles[$k]->images)}}">
                    <h4 class="fourth-title">{{$articles[$k]->title}}</h4>
                    <p>{{substr($articles[$k]->description, 0, 200)}}</p>
                </a>
        </div>
        @endfor
        @else
        @foreach ($articles as $item)
        <div class="team" data-aos="fade-up" data-aos-delay="{{$i+=200}}">
            <a href="/detail-artikel/{{$item->id}}">
                <img src="{{asset("storage/article_images/".$item->images)}}">
                <h4 class="fourth-title">{{$item->title}}</h4>
                <p>{{substr($item->description, 0, 100)}}</p>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>
@endsection
