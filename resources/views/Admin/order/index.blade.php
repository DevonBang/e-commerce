@extends('Template.Dashboard.index')
@section('content')
<div class="main-content-innere">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center mt-3">Halaman Orders</h1>
                    <div class="data-tables">
                        <a href="{{ route('admin.export') }}" class="btn btn-primary mb-3">Export</a>
                        <table width="100%" id="dataTable" class="table dt-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Subtotal</th>
                                    <th>Diskon</th>
                                    <th>Total</th>
                                    <th>Delivered Date</th>
                                    <th>Canceled Date</th>
                                    <th>Status Order</th>
                                    <th>Pembeli</th>
                                    <th>Action</th>
                                </tr>
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
                            </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection