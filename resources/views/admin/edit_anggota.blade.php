@extends('layouts.admin')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <h1>Tambahkan Anggota</h1>
        <form action="{{ route('admin-teams.update', $teams->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="name">Nama Anggota</label>
                        <input type="text" name="name" id="name" class="namaProduk @error('name')
                        is-invalid
                    @enderror" value="{{ $teams->name }}">
                    </div>
                    <div class="Position">
                        <label for="position">Jabatan</label>
                        <select class="position @error('position')
                        is-invalid
                    @enderror" name="position" id="position">
                            <option value='Ketua' {{($teams->position === 'Ketua') ? 'selected' : ''}}>Ketua</option>
                            <option value='Sekretaris 1' {{($teams->position === 'Sekretaris 1') ? 'selected' : ''}}>
                                Sekretaris 1</option>
                            <option value='Sekretaris 2' {{($teams->position === 'Sekretaris 2') ? 'selected' : ''}}>
                                Sekretaris 2</option>
                            <option value='Bendahara' {{($teams->position === 'Bendahara') ? 'selected' : ''}}>Bendahara
                            </option>
                            <option value='Manager Unit Pangan'
                                {{($teams->position === 'Manager Unit Pangan') ? 'selected' : ''}}>Manager Unit Pangan
                            </option>
                            <option value='Manager Unit Barang & Jasa'
                                {{($teams->position === 'Manager Unit Barang & Jasa') ? 'selected' : ''}}>Manager Unit
                                Barang & Jasa</option>
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
