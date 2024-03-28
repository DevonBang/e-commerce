@extends('Template.Layouts.second')
@section('content-product')
    <div class="row">
        @if (session('success'))
            <div class="mt-5 alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="mt-3 mb-4 text-center">All Products</h1>
        @foreach ($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/foto-product') }}/{{ $product->image }}" height="320px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp {{ $product->price, 0, ',', '.' }}</p>
                        <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="btn btn-primary">Read
                            More</a>
                        <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-outline-danger">Add to cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
@endsection
@section('footer')
    <footer style="margin-top: 100px;">
        <style>
            .content-bot {
                color: #f2f2f2;
                display: flex;
                background-color: #668A89;
                width: 100%;
            }
        </style>
        <div class="content-bot mt-3">
            <p class="text-center mt-3" style="font-size: 16px; padding: 0; padding-left: 39.5%; margin-bottom: 20px;">©
                Copyright Saudagar 2024. All right reserved.</p>
        </div>
    </footer>
@endsection
