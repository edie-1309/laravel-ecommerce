@extends('layouts.main')

@section('container')
    <div class="container py-4">
        <h2 class="fw-bold mb-3">My Order</h2>

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
            <div class="d-flex justify-content-end align-items-baseline">
                <p class="mx-3 fw-bold">Total : Rp. 1.200.00</p>
                <a href="/order-detail" class="btn btn-primary py-2 px-3 fw-bold rounded-5">Detail</a>
            </div>
        </div>
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
            <div class="d-flex justify-content-end align-items-baseline">
                <p class="mx-3 fw-bold">Total : Rp. 1.200.00</p>
                <button class="btn btn-primary py-2 px-3 fw-bold rounded-5">Detail</button>
            </div>
        </div>
    </div>
@endsection