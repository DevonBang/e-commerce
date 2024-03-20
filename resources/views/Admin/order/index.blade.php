@extends('Template.Dashboard.index')

@section('content')
<div class="welcome">

<h1 class="text-center mt-3 mb-3">List Order</h1>

<table class="table">
    <thead>
        <th>No</th>
        <th>Subtotal</th>
        <th>Diskon</th>
        <th>Total</th>
        <th>Delivered Date</th>
        <th>Canceled Date</th>
        <th>Status Order</th>
        <th>Pembeli</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->subtotal }}</td>
            <td>{{ $order->discount }}%</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->delivered_date }}</td>
            <td>{{ $order->canceled_date }}</td>
            <td>{{ $order->status_order }}</td>
            <td>{{ $order->user->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('admin.order-detail', ['id' => $order->id]) }}">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection