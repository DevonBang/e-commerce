@extends('Template.Layouts.second')
@push('style')
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo2.css') }}">
@endpush
@section('content-product')
    <style>
        html,
        body {
            height: 100vh;
        }

        .container-product {
            margin: 50px 200px;
            display: flex;
        }

        .right-box {
            width: 50%;
            border: 1px solid;
            border-radius: 10px;
        }

        .main-image-box {
            padding: 30px 0px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-image {
            height: 200px;
            width: auto;
        }

        .details-box {
            width: 50%;
            padding-left: 50px;
        }

        .details-box h2 {}

        .inputs {
            width: 100%;
            justify-content: space-between;
        }

        td input {
            height: 30px;
        }

        button {
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            background-color: green;
            color: white;
            margin-top: 14px;
            cursor: pointer;
        }

        button:hover {
            background-color: navy;
        }
    </style>
    <a class="btn btn-primary mt-4" href="{{ route('product') }}">Back To Products</a>
    <div class="container-product">
        <div class="right-box">
            <div class="main-image-box">
                <img class="main-image" src="{{ asset('storage/foto-product') }}/{{ $product->image }}">
            </div>
        </div>
        <div class="details-box">
            <h1>{{ $product->name }}</h1>
            @if ($product->quantity > 0)
                <p>Tersedia</p>
            @else
                <p>Tidak Tersedia</p>
            @endif
            <h2 id="price">Rp {{ $product->price, 0, ',', '.' }}</h2>
            {{-- <form action="{{route('cart.add')}}" id="addcart" method="POST">
                @csrf --}}
            {{-- <table cellspacing="0" class="inputs">
                    <tr>
                        <td >Quantity</td>
                        <td align="right"><input type="number" id="first"></td>
                    </tr>
                    <tr class="mt-2">
                        <td>Total</td>
                        <td align="right"><input type="number" id="second"></td>
                    </tr>
                </table> --}}
            <h4 class="mt-3">Description</h4>
            <p>{{ $product->description }}</p>
            {{-- <button><a href="{{ route('add.to.cart', $product->id) }}" class="text-white text-decoration-none">Add To
                    Cart</a></button> --}}

            {{-- </form> --}}
        </div>
    </div>
    <script>
        // function cart() {
        //     var a,b;
        //     a = document.getElementById("first").value;
        //     b = a*{{ $product->price }};
        //     document.getElementById("second").value=b;
        // }
        // let ans = document.getElementById("first");
        // ans.addEventListener('keyup', cart);
    </script>
@endsection

@section('footer')
    <footer style="position: absolute; bottom: 0; width: 100%">
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
