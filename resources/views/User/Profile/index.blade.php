@extends('Template.Dashboard.index')
@section('content')
    <div class="main-content-inner">
        {{-- cut dari sini --}}
        <div class="row">
            <div class="col-lg-6 col-ml-12">
                <div class="row">
                    <!-- basic form start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">My Profile</h4>
                                <h5 class="mt-3 mb-3 text-capitalize"> Nama: {{ $profile->name }}</h3>
                                    <h5 class="mt-3 mb-3 text-capitalize">Email: {{ $profile->email }}</h3>
                                        <h6 class="mb-3">Profile</h6>
                                        <div class="mb-3">
                                            @if ($profile->image)
                                                <img class="card-img-top img-fluid roundend-circle mt-4"
                                                    style="border-radius:50%;height:80px;width:80px;margin:auto;"
                                                    src="{{ asset('storage/foto-user/' . $profile->image) }}"
                                                    alt="profile picture">
                                            @else
                                                <img src="{{ asset('/assets/img/user/avatar.png') }}" alt="Profile User">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            {{-- <a class="btn btn-primary" href="{{ route('user.edit-profile') }}">change profile</a> --}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Edit Profile
                                            </button>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Change Password
                                            </button>
                                        </div>
                            </div>
                        </div>
                    </div>
                    <!-- basic form end -->
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit profile -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="header-title">Edit Profile</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('user.update-profile', ['id' => $profile->id]) }}" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $profile->name }}" required autofocus>
                          @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">email</label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ $profile->email }}">
                          @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                        </div>
                        @if ($profile->image)
                          <img src="{{ asset('storage/foto-user/' . $profile->image) }}" alt="" width="100px" height="100px">
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
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
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
