@extends('layouts.main')

@section('container')
    <div class="container py-4">
        <h2 class="fw-bold mb-3">Detail Order</h2>

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
        </div>

        <div class="p-3 d-flex justify-content-between">
            <div class="w-50 pr-3">
                <h5 class="fw-semibold">Address</h5>
                <p class="text-muted">{{ auth()->user()->address }}</p>
            </div>
            <div class="p-3 border-start flex-fill">
                <p class="d-inline fw-semibold">Status : </p>
                <div class="status">{{ $order->status }}</div>
                <p class="fw-semibold mt-3">Total : @currency($order->total)</p>
            </div>
        </div>

        <a href="/history" class="btn button-primary rounded-5 fw-bold">Back</a>
    </div>
@endsection