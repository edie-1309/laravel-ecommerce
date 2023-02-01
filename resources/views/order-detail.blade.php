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
            @if ($order->status == "On Process")
                <a href="#" class="btn btn-danger rounded-5 fw-bold" data-bs-toggle="modal" data-bs-target="#deleteModal">Cancel Order</a>
            @endif

            @if ($order->status == "On Delivery")
                <form action="/orders/confirm-status/{{ $order->id }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="Already Received">

                    <button type="submit" class="btn btn-primary rounded-5 px-4 fw-bold  mb-3">Package Received</button>
                </form>
                <p class="text-muted"><small>Please confirm if the package has arrived, with the click of a button "Package Received"</small></p>
            @endif
        </div>
    </div>

    <a href="/orders" class="btn button-primary rounded-5 fw-bold">Back</a>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Cancel Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/orders/{{ $order->id }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>Are you sure?</p>          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection