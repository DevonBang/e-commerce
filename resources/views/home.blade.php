@extends('Template.Home.index')

@section('content')
    <div class="content">
        <div class="div-text">
            <span>outfit of the day</span>
            <h3>all your</h3>
            <h1>styles are here</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br>
                Doloremque unde sunt eum illum ab tempora illo iure sequi <br> minus culpa.</p>
            <a href="{{ route('product') }}" class="btn">Explore Now</a>
        </div>

        <div class="div-img">
            <img id="big-img" src="{{ asset('img/jacket1.png') }}" alt="">
            <div class="small-img">
                <img onclick="myTshirt(this.src)" src="{{ asset('img/jacket1.png') }}" alt="">
                <img onclick="myTshirt(this.src)" src="{{ asset('img/jacket2.png') }}" alt="">
                <img onclick="myTshirt(this.src)" src="{{ asset('img/jacket3.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection

@section('content-product')
    <div class="row">
        <h1 class="mb-4 text-center">New Products</h1>
        @foreach ($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/foto-product/' . $product->image) }}" height="300px">
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
        <a href="{{ route('product') }}" class="btn btn-primary">view more products</a>
    </div>
@endsection
