@extends('layouts.admin')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <h1>Edit Mitra</h1>
        <form action="{{ route('admin-mitras.update', $mitras->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="mitra_name">Nama Toko</label>
                        <input type="text" name="mitra_name" id="mitra_name" class="namaProduk @error('mitra_name')
                        is-invalid
                    @enderror" value="{{ $mitras->mitra_name }}">
                    </div>
                    <div class="Owner">
                        <label for="owner">Pemilik Toko</label>
                        <input type="text" name="owner" id="owner" class="namaProduk @error('owner')
                        is-invalid
                    @enderror" value="{{ $mitras->owner }}">
                    </div>
                    <div class="type-of-business">
                        <label for="t_o_business">Jenis Usaha</label>
                        <input type="text" name="t_o_business" id="t_o_business" class="harga @error('t_o_business')
                        is-invalid
                    @enderror" value="{{ $mitras->t_o_business }}">
                    </div>
                    <div class="Address">
                        <label for="address">Alamat Toko</label>
                        <input type="text" name="address" id="address" class="phone @error('address')
                        is-invalid
                    @enderror" value="{{ $mitras->address }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="buttonProd">Simpan Mitra</button>
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
