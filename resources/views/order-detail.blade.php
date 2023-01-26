@extends('layouts.main')

@section('container')
<div class="container py-4">
    <h2 class="fw-bold mb-3">Detail Order</h2>

    <div class="p-3 mb-3 rounded-3 border border-1">
        <div class="d-flex justify-content-between mb-3">
            <div class="rounded-3" style="background-color: crimson; width: 200px; height: 200px;">

            </div>

            <div class="p-3 flex-grow-1">
                <h2>Product</h2>
                <p>Platform</p>
            </div>

            <div class="d-flex flex-column justify-content-center px-5">
                <p>Price</p>
                <p>2 Pcs</p>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <div class="rounded-3" style="background-color: crimson; width: 200px; height: 200px;">

            </div>

            <div class="p-3 flex-grow-1">
                <h2>Product</h2>
                <p>Platform</p>
            </div>

            <div class="d-flex flex-column justify-content-center px-5">
                <p>Price</p>
                <p>2 Pcs</p>
            </div>
        </div>
    </div>
    {{-- <div class="d-flex justify-content-end align-items-baseline">
        <p class="mx-3 fw-bold">Total : Rp. 1.200.00</p>
        <a href="/order-detail" class="btn btn-primary py-2 px-3 fw-bold rounded-5">Detail</a>
    </div> --}}

    <div class="p-3 d-flex justify-content-between">
        <div class="w-50 pr-3">
            <h5 class="fw-semibold">Address</h5>
            <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, sint obcaecati impedit libero hic eum aspernatur quo necessitatibus amet placeat illo, at magnam natus voluptas harum velit? Vel nobis dolorum aspernatur atque, laudantium illum quam officia maxime placeat odio sapiente ex! Impedit nesciunt fuga repellat corporis ipsum in harum vero.</p>
        </div>
        <div class="p-3 border-start flex-fill">
            <p class="d-inline fw-semibold">Status : </p>
            <div class="status">On Delivery</div>
            <p class="fw-semibold mt-3">Total : Rp. 1.000.000</p>
        </div>
    </div>

    <a href="/orders" class="btn btn-primary rounded-5 fw-bold">Back</a>
</div>
@endsection