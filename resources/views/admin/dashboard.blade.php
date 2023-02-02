@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2 class="fw-semibold mb-3">Dashboard</h2>

        <div class="d-flex justify-content-between flex-wrap">
            <div class="card w-25 p-3">
                <h5 class="fw-bold">Product</h5>
                <p class="fw-semibold">{{ $product }}</p>
            </div>
            <div class="card w-25 p-3">
                <h5 class="fw-bold">Platform</h5>
                <p class="fw-semibold">{{ $platform }}</p>
            </div>
            <div class="card w-25 p-3">
                <h5 class="fw-bold">Order</h5>
                <p class="fw-semibold">{{ $order }}</p>
            </div>
        </div>
    </div>
@endsection