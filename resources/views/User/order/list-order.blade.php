@extends('Template.Dashboard.index')
@section('content')
<div class="main-content-innere">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center mt-3">Halaman {{ $title }},  {{ auth()->user()->name }}</h1>
                    <div class="data-tables">
                        <table width="100%" id="dataTable" class="table dt-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->products->nama_product }}</td>
                                        <td>Rp {{ $order->price, 0, ',', '.' }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>kosong nih</td>
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