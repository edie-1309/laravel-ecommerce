@extends('layouts.main')
@section('container')
    <div class="container my-4">
        <h2 class="fw-semibold mb-3">Cart</h2>
        @if ($cart->isNotEmpty())
            @foreach ($cart as $c)
                <div class="content d-flex justify-content-between mb-4 border border-1 rounded">
                    {{-- Image --}}
                    <div class="img-cart rounded">
                        <img src="{{ asset('storage') . '/' .  $c->product->image}}" class="rounded">
                    </div>
                    <div class="cart-product d-flex flex-column justify-content-center">
                        <h4 class="fw-bold">{{ $c->product->name }}</h4>
                        <p class="fw-semibold">{{ $c->platform->name }}</p>
                        @if ($c->product->discount_id)
                            <p class="fw-semibold"><strike>@original_price($c->product->price,$c->product->discount->discount)</strike></p>
                        @endif
                            <p class="fw-semibold" id="product-price">@currency($c->product->price)</p>
                    </div>
                    <div class="qty d-flex align-items-center mx-4">
                        <label for="qty" class="fw-semibold">Qty :</label>
                        <input type="number" class="qty-input fw-bold"value="{{ $c->qty }}" min="1">
                    </div>
                    <div class="button-cart d-flex justify-content-center align-items-center px-5">
                        <button class="update-button" data-id="{{ $c->id }}"">Update</button>
                        <form action="{{ route('delete.cart', $c->id) }}" onsubmit="return confirm('Are you sure?');" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-end">
                <p class="total">Total : @currency($cart->sum('total'))</p>
                <a href="/checkout" class="checkout-button">Checkout</a>
            </div>
            
        @else
            <p class="fw-bold my-5 text-center">Cart Empty</p>
        @endif
    </div>

    <script>
        $(document).on('click', '.update-button', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = "{{ url('/cart/update') }}" + '/' + id;
            let token = "{{ csrf_token() }}";

            let qty = $(this).closest('.content').find(".qty").find("input").val();
            let price = removeRupiahFormat($(this).closest('.content').find(".cart-product").find("#product-price").text()) * qty;

            $.ajax({
                type: "PATCH", 
                url: url,
                data: {
                    _token: token,
                    qty: qty,
                    total: price
                },
                success: function (data) {
                    window.location.reload();
                },
                error: function (data) {
                    console.log('error');
                }
            });
        });

        function removeRupiahFormat(rupiah) {
            return rupiah.replace(/[Rp.,]/g, '');
        }
    </script>
@endsection