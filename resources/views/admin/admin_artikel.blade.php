@extends('layouts.admin')

@section('content')
<div class="page-content page-home">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> {{ $title }} </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body color_post">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                            @endif
                            <h1>Artikel</h1>
                            <a href="admin-articles/create">Create New Article</a>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gambar</th>
                                            <th>Judul Artikel</th>
                                            <th>Tanggal Upload</th>
                                            <th>Penulis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @if(count($articles)>0)
                                        @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td>
                                                <a href="{{asset("storage/article_images/".$article->images)}}"
                                                    class="example-image-link" data-lightbox="example-2"
                                                    data-title="{{ $article->images }}">
                                                    <img src="{{asset("storage/article_images/".$article->images)}}"
                                                        alt="image-1" class="card-img-top img-admin-data"></a>
                                            </td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->created_at }}</td>
                                            <td>{{ $article->author }}</td>
                                            <td>
                                                <a href="/admin-articles/{{$article->id}}/edit"
                                                    class="btn btn-primary my-2 btn-edit text-light">Edit</a>
                                                <form action="{{ route('admin-articles.destroy', $article->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $article->id }}">
                                                    <button type="submit" class="btn btn-danger btn-delete"
                                                        onclick="return confirm('Post akan dihapus')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" class="text-center">No articles yet!!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex">
                                {{ $articles->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
