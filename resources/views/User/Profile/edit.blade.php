<a href="{{ route('user.profile') }}">back to profile</a>

{{-- <form method="post" action="{{ route('user.update-profile', ['id' => $profile->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="inputTitle" class="col-form-label">Name</label>
    <input id="inputTitle" type="text" name="name" placeholder="Enter name" class="form-control" value="{{$profile->name}}">
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group">
        <label for="Email" class="col-form-label">Email</label>
      <input id="Email" type="email" name="email" placeholder="Enter email"   class="form-control" value="{{$profile->email}}">
      @error('email')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
    <label for="Photo" class="col-form-label">Photo</label>
    <input type="file" name="image">
    <div class="input-group">

    </div>
    <img id="holder" style="margin-top:15px;max-height:100px;">
      @error('photo')
      <span class="text-danger">{{$message}}</span>
      @enderror

    <div class="form-group mb-3">
       <button class="btn btn-success" type="submit">Update</button>
    </div>
</form> --}}

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
  <button type="submit" class="btn btn-primary">Edit Profile</button>
</form>

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