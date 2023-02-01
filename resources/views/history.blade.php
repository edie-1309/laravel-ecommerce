@extends('layouts.main')

@section('container')
<div class="container py-4">
    <h2 class="fw-bold mb-3">History Order</h2>

    @if (session()->has('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($orders as $order)
        <div class="p-3 mb-3 rounded-3 border border-1">
            @foreach ($order->order_detail as $order_detail)
                <div class="d-flex justify-content-between mb-3">
                    <img src="{{ asset('storage') . '/' . $order_detail->product->image }}" class="rounded-3" width="150">
        
                    <div class="p-3 flex-grow-1">
                        <h4 class="fw-semibold">{{ $order_detail->product->name }}</h4>
                        <p class="text-muted">{{ $order_detail->platform->name }}</p>
                        @if ($order_detail->product->discount_id)
                            <p class="fw-semibold"><strike>@original_price($order_detail->product->price,$order_detail->product->discount->discount)</strike></p>
                        @endif
                        <p class="fw-semibold">@currency($order_detail->product->price)</p>
                    </div>

                    <div class="d-flex flex-column justify-content-center px-5">
                        <p class="fw-semibold">{{ $order_detail->qty }} Pcs</p>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-end align-items-baseline">
                <p class="mx-3 fw-bold">Total : @currency($order->total)</p>
                <a href="/history-detail/{{ $order->slug }}" class="btn button-primary py-2 px-3 fw-bold rounded-5">Detail</a>
            </div>
        </div>
    @endforeach

    @if ($orders->isEmpty())
        <p class="fw-bold my-5 text-center">History Empty</p>
    @endif
</div>
@endsection