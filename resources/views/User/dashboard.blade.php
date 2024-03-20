<h1>ini halaman profile user {{ auth()->user()->name }}</h1>

<a href="{{ route('user.profile') }}">Profile User</a>
<a href="{{ route('user.history') }}">History </a>
<a href="{{ route('user.pesanans') }}">List Pesanans</a>