@extends('layouts.admin')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <h1>Tambahkan Anggota</h1>
        <form action="{{ route('admin-teams.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="name">Nama Anggota</label>
                        <input type="text" name="name" id="name" class="namaProduk @error('name')
                        is-invalid
                    @enderror" placeholder="Masukkan Nama Toko">
                    </div>
                    <div class="Position">
                        <label for="position">Jabatan</label>
                        <select class="position @error('position')
                        is-invalid
                    @enderror" name="position" id="position">
                            <option value='Ketua'>Ketua</option>
                            <option value='Sekretaris 1'>Sekretaris 1</option>
                            <option value='Sekretaris 2'>Sekretaris 2</option>
                            <option value='Bendahara'>Bendahara</option>
                            <option value='Manager Unit Pangan'>Manager Unit Pangan</option>
                            <option value='Manager Unit Barang & Jasa'>Manager Unit Barang & Jasa</option>
                        </select>
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
