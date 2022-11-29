@extends('layouts.admin')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <h1>Tambahkan Artikel</h1>
        <form action="{{ route('admin-articles.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="content">
                <div class="kiri">
                    <label for="file-input"><input type="file" class="form-control 
                        @error('images')
                            is-invalid
                        @enderror" id="input-file" name="images" accept="image/*" onchange="previewImage()"><i
                            class="fa-solid fa-upload"></i> &nbsp; Choose A Pictures</label>
                    <p id="num-of-files">No File Chosen</p>
                    <div id="images"></div>
                </div>
                <div class="kanan">
                    <div class="Title">
                        <label for="title">Judul Artikel</label>
                        <input type="text" name="title" id="title" class="namaProduk @error('title')
                        is-invalid
                    @enderror" placeholder="Masukkan Judul Artikel">
                    </div>
                    <div class="Author">
                        <label for="author">Penulis</label>
                        <input type="text" name="author" id="author" class="namaProduk @error('author')
                        is-invalid
                    @enderror" placeholder="Masukkan Nama Penulis">
                    </div>
                    <div class="desc">
                        <label for="description">Deskripsi Artikel</label>
                        <textarea class="deskripsi @error('description')
                        is-invalid
                    @enderror" placeholder="Masukkan Deskripsi Produk" name="description" id="description"
                            rows="5"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="buttonProd">Simpan Artikel</button>
        </form>
    </div>
</div>
<script>
    let fileInput = document.getElementById("input-file");
    let imageContainer = document.getElementById("images")
    let numOfFiles = document.getElementById("num-of-files");

    function previewImage() {
        imageContainer.innerHTML = "";
        numOfFiles.textContent = '';

        for (i of fileInput.files) {
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = '';
            figure.appendChild(figCap);
            reader.onload = () => {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                figure.insertBefore(img, figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

</script>
@endsection
