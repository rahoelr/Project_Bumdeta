@extends('layouts.admin')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <h1>Tambahkan About Us</h1>
        <form action="{{ route('admin-about_us.update', $about_us->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
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
                    <div class="name">
                        <label for="history">Sejarah Singkat</label>
                        <textarea class="deskripsi @error('history')
                        is-invalid
                    @enderror" placeholder="Masukkan Sejarah Singkat Organisasi" name="history" id="history"
                            rows="5">{{ $about_us->history }}</textarea>
                    </div>
                    <div class="name">
                        <label for="description">Deskripsi Organisasi</label>
                        <textarea class="deskripsi @error('description')
                        is-invalid
                    @enderror" placeholder="Masukkan Deskripsi Singkat Organisasi" name="description" id="description"
                            rows="5">{{ $about_us->description }}</textarea>
                        <div class="desc">
                            <label for="logo_meaning">Makna Logo</label>
                            <textarea class="deskripsi @error('logo_meaning')
                        is-invalid
                    @enderror" placeholder="Masukkan Makna Logo Organisasi" name="logo_meaning" id="logo_meaning"
                                rows="5">{{ $about_us->logo_meaning }}</textarea>
                        </div>
                        <div class="desc">
                            <label for="visi">Visi</label>
                            <textarea class="deskripsi @error('visi')
                        is-invalid
                    @enderror" placeholder="Masukkan Visi Organisasi" name="visi" id="visi"
                                rows="5">{{ $about_us->visi }}</textarea>
                        </div>
                        <div class="desc">
                            <label for="misi">Misi</label>
                            <textarea class="deskripsi @error('misi')
                        is-invalid
                    @enderror" placeholder="Masukkan Misi Organisasi" name="misi" id="misi"
                                rows="5">{{ $about_us->misi }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="buttonProd">Simpan Data</button>
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
