@extends('Template.Layouts.second')

@section('content-product')
    <style>
        :root {
            --pink: #00fff0;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif, rubik;
        }

        .contanier {
            width: 100%;
            height: 100vh;
            padding: 0 5px 0;
        }

        .bi-x {
            color: #333;
            border-radius: 1rem;
            display: flex;
            position: fixed;
            z-index: 1000;
            justify-content: space-around;
            margin: 10px 0px;
            opacity: 0.5;
            font-size: 15px;
        }

        .cart ul {
            position: absolute;
            font-size: 20px;
            font-weight: bolder;
            top: -20%;
            left: 40%;
        }

        .bi-x {
            color: #333;
            border-radius: 1rem;
            position: fixed;
            top: 30%;
            z-index: 1000;
            justify-content: space-around;
            margin: 10px 0px;
            opacity: 0.5;
            font-size: 15px;
        }

        .bar {
            position: absolute;
            top: 25%;
            left: 15%;
            width: 70%;
        }

        hr {
            position: relative;
            margin-top: -80px;
        }

        .bar th {
            background: #DaDaDa;
            width: 100px;
        }

        .btn-checkout {}

        .fa-times {
            cursor: pointer;
        }
    </style>
    <div class="bar">
        <hr>
        <div class="cart">
            {{-- <ul>Keranjang Belanja</ul> --}}
        </div>
        <table style="width: 100%;" class="table table-bordered border-secondary" id="cart">
            <thead>
                <tr>
                    <th style="width: 150px; padding: 20px;" class="text-center">Product Name</th>
                    <th style="width: 80px; padding: 20px;" class="text-center">Price</th>
                    <th style="width: 80px; padding: 20px;" class="text-center">Quantity</th>
                    <th style="width: 100px; padding: 20px;"class="text-center">SubTotal</th>
                    <th style="width: 50px; padding: 20px;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ asset('storage/foto-product') }}/{{ $details['image'] }}" width="80px"
                                            height="80px" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">Rp {{ $details['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}"
                                    class="form-control quantity cart_update">
                            </td>
                            <td data-th="Subtotal">Rp {{ $details['price'] * $details['quantity'] }}
                            </td>
                            <td class="actions">
                                <button class="btn btn-danger btn-sm delete-product"><i class="fa fa-trash-o"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;">
                        <h3><strong>Total Rp{{ $total }}</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right;">
                        <form method="POST">
                            <a href="{{ route('product') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i>
                                Continue
                                Shopping</a>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i
                                    class="fa fa-money"></i>
                                Checkout</button>
                        </form>
                    </td>
                </tr>
            </tfoot>
        </table>
        <button type="button" class="btn btn-primary mt-3 mb-3 btn-checkout" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Checkout
        </button>
    </div>
@endsection
<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="font-size: 20px;">Cart Totals</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <h6 style="font-size: 12px;">Sub Total
                        <span style="padding-left: 80px;">Rp
                            <input type="number" id="second" style="margin-left:12px; width:80px;" readonly>
                        </span>
                    </h6>
                    <h6 style="font-size: 12px;">Diskon
                        <span style="padding-left: 92.5px;">Rp
                            <input type="number" id="second" style="margin-left:12px; width:80px;">
                        </span>
                    </h6>
                    <h6 style="font-size: 12px;">Total
                        <span style="padding-left: 103px;">Rp
                            <input type="number" id="second" style="margin-left:12px; width:80px;" readonly>
                        </span>
                    </h6>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> --}}

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.cart.product') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".delete-product").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

        // var price = $('#price').data('th');
        // var quantity = $('#first').val();
        // console.log(price);
        // console.log(quantity);
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
