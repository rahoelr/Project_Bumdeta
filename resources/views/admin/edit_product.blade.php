@extends('layouts.admin')

@section('content')
<div class="page-content page-home">
    <div class="container">
        <h1>Tambahkan Produk</h1>
        <form action="{{ route('admin-products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="content">
                <div class="kiri">
                    <label for="file-input"><input type="file" class="form-control 
                        @error('images')
                            is-invalid
                        @enderror" id="input-file" name="images[]" accept="image/*" onchange="previewImage()"
                            multiple><i class="fa-solid fa-upload"></i> &nbsp; Choose A Pictures</label>
                    <p id="num-of-files">No File Chosen</p>
                    <div id="images"></div>
                </div>
                <div class="kanan">
                    <div class="name">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" name="product_name" id="product_name" class="namaProduk @error('product_name')
                        is-invalid
                    @enderror" value="{{ $products->product_name }}">
                    </div>
                    <div class="category">
                        <label for="category">Kategori</label>
                        <select class="kategori @error('category')
                        is-invalid
                    @enderror" name="category" id="category">
                            @if(count($categories)>0)
                            @foreach ($categories as $category)
                            <option value='{{$category->category}}'
                                {{($products->category === $category->category) ? 'selected' : ''}}>
                                {{$category->category}}</option>
                            @endforeach
                            @else
                            <option value='No categories yet!!!' disabled>No categories yet!!!</option>
                            @endif
                            {{-- <option value='Pertanian' {{($products->category === 'Pertanian') ? 'selected' : ''}}>
                            Pertanian
                            </option>
                            <option value='Hasil Ternak' {{($products->category === 'Hasil Ternak') ? 'selected' : ''}}>
                                Hasil Ternak
                            </option>
                            <option value='Souvenir' {{($products->category === 'Souvenir') ? 'selected' : ''}}>Souvenir
                            </option>
                            <option value='Makanan' {{($products->category === 'Makanan') ? 'selected' : ''}}>
                                Makanan</option>
                            <option value='Non-Pangan' {{($products->category === 'Non-Pangan') ? 'selected' : ''}}>
                                Non-Pangan
                            </option>
                            <option value='Jasa' {{($products->category === 'Jasa') ? 'selected' : ''}}>Jasa
                            </option> --}}
                        </select>
                    </div>
                    <div class="Price">
                        <label for="price">Harga Produk</label>
                        <input type="text" name="price" id="price" class="harga @error('price')
                        is-invalid
                    @enderror" value="{{ $products->price }}">
                    </div>
                    <div class="desc">
                        <label for="description">Deskripsi Produk</label>
                        <textarea class="deskripsi @error('description')
                        is-invalid
                    @enderror" name="description" id="description" rows="5">{{ $products->description }}</textarea>
                    </div>
                    <div class="Phone">
                        <label for="p_number">Nomor Whatsapp</label>
                        <input type="text" name="p_number" id="p_number" class="phone @error('p_number')
                        is-invalid
                    @enderror" value="{{ $products->p_number }}">
                    </div>
                    <div class="Mitra">
                        <label for="mitra">Mitra</label>
                        <input type="text" name="mitra" id="mitra" class="mitra @error('mitra')
                        is-invalid
                    @enderror" value="{{ $products->mitra }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="buttonProd">Edit Produk</button>
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
