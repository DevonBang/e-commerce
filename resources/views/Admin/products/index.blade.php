@extends('Template.Dashboard.index')

@section('content')
<div class="welcome">
    <h1 class="text-center mt-3">Halaman Product</h1>
    <a class="btn btn-primary mt-3 mb-3" href="{{ route('admin.products.create') }}">Tambah Product</a>
    
    <table id="myTable" class="table">
        <thead>
            <th>No</th>
            <th>image</th>
            <th>Name product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stok</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/foto-product/'.$item->image) }}" width="100px"></td>
                <td>{{ $item->nama_product }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a class="badge bg-info" href="{{ route('admin.products.edit', ['id' => $item->id ]) }}">edit</a>
                    <form action="{{ route('admin.products.delete', ['id' => $item->id ]) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger" onclick="return confirm('Are You Sure?')">hapus</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

@endsection