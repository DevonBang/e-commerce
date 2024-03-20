@extends('Template.Dashboard.index')

@section('content')
<div class="welcome">
    <ul>
        <h1>form edit data product</h1>
        <div class="col-lg-8">
            <form method="post" action="{{ route('admin.products.update', ['id' => $product->id]) }}" class="mb-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_product" class="form-label">Nama Product</label>
                    <input type="text" class="form-control @error('nama_product') is-invalid @enderror" id="nama_product" name="nama_product" value="{{ $product->nama_product }}" required autofocus>
                    @error('nama_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ $product->slug }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">stok</label>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required value="{{ $product->quantity }}">
                    @error('quantity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ $product->price }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required value="{{ $product->description }}">
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @if ($product->image)
                <img src="{{ asset('storage/foto-product/' . $product->image) }}" alt="" width="100px" height="100px">
                @endif
                <div class="mb-3">
                    <label for="image" class="form-label">Input gambar</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit Product</button>
            </form>
        </div>
    </ul>
    @endsection 
<script>
    const nama_product = document.querySelector("#nama_product");
    const slug = document.querySelector("#slug");

    nama_product.addEventListener("keyup", function() {
        let preslug = nama_product.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>