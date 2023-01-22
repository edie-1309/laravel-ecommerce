@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <h2 class="fw-bold mb-4">All Games</h2>

        <div class="list-games row justify-content-start">
            @foreach ($products as $product)
                <div class="col-md-3 d-flex justify-content-start mb-5">
                    <a href="/product/{{ $product->slug }}">
                        <div class="image-product overflow-hidden">
                            <img src="{{ asset('storage') . '/' . $product->image }}" class="card-img-top" alt="{{ $product->slug }}">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection