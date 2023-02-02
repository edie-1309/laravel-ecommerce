@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-3">Detail Order</h2>
    
    @if (session()->has('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- If error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul type="none">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    <div class="p-3 mb-3 rounded-3 border border-1">
        @foreach ($order->order_detail as $order_detail)
        <div class="order d-flex justify-content-between mb-3">
            <img src="{{ asset('storage') . '/' . $order_detail->product->image }}" class="rounded-3" width="150">

            <div class="p-3 flex-grow-1">
                <h4 class="fw-semibold">{{ $order_detail->product->name }}</h4>
                <p class="fs-6 text-muted">{{ $order_detail->platform->name }}</p>
                <p class="fs-6 fw-semibold">@currency($order_detail->product->price)</p>
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
            <p class="text-muted fs-6">{{ $order->user->address }}</p>
        </div>
        <div class="p-3 border-start flex-fill">
            <p class="d-inline fs-6">Status : </p>
            <div class="status">{{ $order->status }}</div>
            <p class="fs-6 mt-3">Total : @currency($order->total)</p>
            <a href="#" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#updateModal">Update Status</a>
        </div>
    </div>

    <a href="/dashboard/orders" class="btn btn-danger fw-bold">Back</a>
</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dashboard/orders/update-status/{{ $order->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <select class="form-select" name="status">
                        <option value="">Choose a status</option>
                        <option value="On Process">On Process</option>
                        <option value="On Delivery">On Delivery</option>
                    </select>
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