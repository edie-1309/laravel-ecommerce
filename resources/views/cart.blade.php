@extends('layouts.main')

@section('container')
    <div class="container my-4">
        <h2 class="fw-semibold">Cart</h2>
        <div class="d-flex justify-content-between border border-1 rounded">
            {{-- Image --}}
            <div class="rounded" style="width: 200px; height: 300px; background: black;">
            </div>
            <div class="d-flex flex-column justify-content-center mx-3">
                <h3>Product Title</h3>
                <p>Platform</p>
                <p>Price</p>
            </div>
            <div class="qty d-flex align-items-center mx-4">
                <label for="">Qty :</label>
                <input type="number">
            </div>
            <div class="button-cart d-flex justify-content-center align-items-center px-5">
                <a href="">Update</a>
                <a href="">Delete</a>
            </div>
        </div>
    </div>
@endsection