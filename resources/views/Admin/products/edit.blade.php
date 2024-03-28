@extends('Template.Dashboard.index')

@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-6 col-ml-12">
                <div class="row">
                    <!-- basic form start -->
                    <div class="col-12 mt-5">
                        <a class="btn btn-primary mb-5" href="{{ route('admin.products') }}">Back To Products</a>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Form Edit Produk</h4>
                                <form method="POST" action="{{ route('admin.products.update', ['id' => $product->id]) }}"
                                    class="mb-5" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Product</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ $product->name }}" required autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            id="slug" name="slug" value="{{ $product->slug }}" required>
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">stok</label>
                                        <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                            id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                                        @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                                            id="price" name="price" value="{{ $product->price }}" required>
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">description</label>
                                        <div class="input-group mb-3">
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                aria-label="With textarea"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        @if ($product->image)
                                            <img src="{{ asset('storage/foto-product/' . $product->image) }}"
                                                alt="" width="100px" height="100px">
                                        @endif
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Input gambar</label>
                                            <img class="img-preview img-fluid mb-3 col-sm-5">
                                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                                id="image" name="image" onchange="previewImage()">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- basic form end -->
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    window.onload = function() {
        const nama_product = document.querySelector("#nama_product");
        const slug = document.querySelector("#slug");

        nama_product.addEventListener("keyup", function() {
            let preslug = nama_product.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    }

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
