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
                            <h1>Product</h1>
                            <a href="admin-products/create">Create New Product</a>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga Produk</th>
                                            <th>Mitra</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @if(count($products)>0)
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td>
                                                <a href="/admin-products/{{$product->id}}"
                                                    class="btn btn-outline-dark">view</a>
                                            </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->mitra }}</td>
                                            <td>
                                                <a href="/admin-products/{{$product->id}}/edit"
                                                    class="btn btn-primary my-2 btn-edit text-light">Edit</a>
                                                <form action="{{ route('admin-products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-danger btn-delete"
                                                        onclick="return confirm('Post akan dihapus')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7" class="text-center">No products yet!!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex">
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
