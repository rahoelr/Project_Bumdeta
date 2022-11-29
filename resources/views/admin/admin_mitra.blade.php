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
                            <h1>Mitra</h1>
                            <a href="admin-mitras/create">Create New Mitra</a>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gambar</th>
                                            <th>Nama Toko</th>
                                            <th>Nama Pemilik</th>
                                            <th>Jenis Usaha</th>
                                            <th>Tanggal Bergabung</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @if(count($mitras)>0)
                                        @foreach ($mitras as $mitra)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td>
                                                <a href="{{asset("storage/mitra_images/".$mitra->images)}}"
                                                    class="example-image-link" data-lightbox="example-2"
                                                    data-title="{{ $mitra->images }}">
                                                    <img src="{{asset("storage/mitra_images/".$mitra->images)}}"
                                                        alt="image-1" class="card-img-top img-admin-data"></a>
                                            </td>
                                            <td>{{ $mitra->mitra_name }}</td>
                                            <td>{{ $mitra->owner }}</td>
                                            <td>{{ $mitra->t_o_business }}</td>
                                            <td>{{ $mitra->created_at }}</td>
                                            <td>{{ $mitra->address }}</td>
                                            <td>
                                                <a href="/admin-mitras/{{$mitra->id}}/edit"
                                                    class="btn btn-primary my-2 btn-edit text-light">Edit</a>
                                                <form action="{{ route('admin-mitras.destroy', $mitra->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $mitra->id }}">
                                                    <button type="submit" class="btn btn-danger btn-delete"
                                                        onclick="return confirm('Post akan dihapus')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="8" class="text-center">No mitras yet!!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex">
                                {{ $mitras->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
