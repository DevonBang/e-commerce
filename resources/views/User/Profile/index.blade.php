<h1>haloo</h1>

<h3>{{ $profile->name }}</h3>
<h3>{{ $profile->email }}</h3>

@if($profile->image)
<img class="card-img-top img-fluid roundend-circle mt-4" style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{ asset('storage/foto-user/'.$profile->image) }}" alt="profile picture">
@else 
<img src="{{asset('/img/avatar.png')}}" alt="profile picture">
@endif

<a href="{{ route('user.edit-profile') }}">change profile</a>