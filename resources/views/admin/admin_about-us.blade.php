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
                            <h1>About Us</h1>
                            <a href="admin-about_us/create">Create About Us</a>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th text-align="center">#</th>
                                            <th>Logo</th>
                                            <th>Sejarah</th>
                                            <th>Deskripsi</th>
                                            <th>Makna logo</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @if(count($about_us)>0)
                                        @foreach ($about_us as $ab_us)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td>
                                                <a href="{{asset("storage/aboutUs_images/".$ab_us->images)}}"
                                                    class="example-image-link" data-lightbox="example-2"
                                                    data-title="{{ $ab_us->images }}">
                                                    <img src="{{asset("storage/aboutUs_images/".$ab_us->images)}}"
                                                        alt="image-1" class="card-img-top img-admin-data"></a>
                                            </td>
                                            <td>{{ substr($ab_us->history, 0, 20) }}</td>
                                            <td>{{ substr($ab_us->description, 0, 20) }}</td>
                                            <td>{{ substr($ab_us->logo_meaning, 0, 20) }}</td>
                                            <td>{{ substr($ab_us->visi, 0, 20) }}</td>
                                            <td>{{ substr($ab_us->misi, 0, 20) }}</td>
                                            <td>
                                                <a href="/admin-about_us/{{$ab_us->id}}/edit"
                                                    class="btn btn-primary my-2 btn-edit text-light">Edit</a>
                                                <form action="{{ route('admin-about_us.destroy', $ab_us->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $ab_us->id }}">
                                                    <button type="submit" class="btn btn-danger btn-delete"
                                                        onclick="return confirm('Data akan dihapus')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="8" class="text-center">No data yet!!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex">
                                {{ $about_us->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
