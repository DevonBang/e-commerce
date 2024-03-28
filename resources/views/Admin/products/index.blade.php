@extends('Template.Dashboard.index')

@section('content')
    <div class="main-content-innere" style="z-index: 999;">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-center mt-3">Halaman Product</h1>
                            <button type="button" class="btn btn-primary mb-3" style="font-size: 14px;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Product
                            </button>
                            <div class="data-tables">
                                <table width="100%" id="dataTable" class="table dt-responsive">
                                    <thead class="bg-light text-capitalize">
                                        <tr>
                                            <th>No</th>
                                            <th>image</th>
                                            <th>Name product</th>
                                            <th>Price</th>
                                            <th>Stok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/foto-product/' . $item->image) }}"
                                                        width="100px"></td>
                                                <td>{{ $item->name }}</td>
                                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>
                                                    {{-- <a class="btn btn-sm btn-warning"
                                                        href="{{ route('admin.products.edit', ['id' => $item->id]) }}">edit</a> --}}
                                                    <button type="button" class="btn btn-sm btn-warning edit-product"
                                                        value="{{ $item->id }}">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('admin.products.delete', ['id' => $item->id]) }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are You Sure?')">hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah product -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Product</h1>
                    <h4 class="header-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_store" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Product</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name_create"
                                name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug_create"
                                name="slug" required>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Stok</label>
                            <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                id="quantity" name="quantity" required>
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" required>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Product-->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModal2Label">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_update" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit_product_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Product</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="edit_slug" name="slug" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">stok</label>
                            <input type="text" class="form-control" id="edit_quantity" name="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                id="edit_price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <div class="input-group mb-3">
                                <textarea class="form-control" id="edit_description" name="description" aria-label="With textarea"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Input gambar</label>
                                <input class="form-control" type="file" id="edit_image" name="image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary update-product">Edit Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.edit-product', function(e) {
                e.preventDefault();
                var product_id = $(this).val();
                // console.log(product_id);
                $('#edit_product_id').val(product_id);
                $('#staticBackdrop').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/admin/product/edit/" + product_id,
                    success: function(response) {
                        // console.log(response);
                        if (response.status === 200) {
                            $('#edit_name').val(response.product.name);
                            $('#edit_slug').val(response.product.slug);
                            $('#edit_quantity').val(response.product.quantity);
                            $('#edit_price').val(response.product.price);
                            $('#edit_description').val(response.product.description);
                        } else {

                        }
                    }
                })
            });
            $(document).on('submit', '#form_update', function(e) {
                e.preventDefault();
                var product_id = $('#edit_product_id').val();
                $.ajax({
                    type: "POST",
                    url: "/admin/product/update/" + product_id,
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            $('#staticBackdrop').modal('hide');
                            window.location.reload();
                        } else {
                            response.error;
                        }
                    }
                });
            });
            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/admin/product/create-proses",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            $('#staticBackdrop').modal('hide');
                            window.location.reload();
                        } else {
                            response.error;
                        }
                    }
                });

            });

            window.onload = function() {
                const nama = document.querySelector("#name-create");
                const slug = document.querySelector("#slug-create");

                nama.addEventListener("keyup", function() {
                    let preslug = nama.value;
                    preslug = preslug.replace(/ /g, "-");
                    slug.value = preslug.toLowerCase();
                });
            }

            window.onload = function() {
                const nama_product = document.querySelector("#edit_name");
                const slug = document.querySelector("#edit_slug");

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
    @endsection
