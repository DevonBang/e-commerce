@extends('Template.Dashboard.index')

@section('content')
<div class="welcome">
<a class="btn btn-info" href="{{ route('admin.order') }}">Back To Order</a>
<h1 class="text-center mb-3">Detail Order</h1>

<table class="table">
    <thead>
        <th>No</th>
        <th>Nama Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->products->nama_product }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->quantity }}</td>
            <td>kosong nih</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection