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
                            <h1>Product Category</h1>
                            <a href="admin-categories/create">Create New Product Category</a>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gambar</th>
                                            <th>Category</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @if(count($categories)>0)
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td>
                                                <a href="{{asset("storage/category_images/".$category->images)}}"
                                                    class="example-image-link" data-lightbox="example-2"
                                                    data-title="{{ $category->images }}">
                                                    <img src="{{asset("storage/category_images/".$category->images)}}"
                                                        alt="image-1" class="card-img-top img-admin-data"></a>
                                            </td>
                                            <td>{{ $category->category }}</td>
                                            <td>
                                                <a href="/admin-categories/{{$category->id}}/edit"
                                                    class="btn btn-primary my-2 btn-edit text-light">Edit</a>
                                                <form action="{{ route('admin-categories.destroy', $category->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                                    <button type="submit" class="btn btn-danger btn-delete"
                                                        onclick="return confirm('Data akan dihapus')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">No categories yet!!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex">
                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
