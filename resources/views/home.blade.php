@extends('layouts.main')

@section('container')
    <div class="dashboard d-flex flex-column justify-content-center align-items-center">
        <h1 class="fw-bolder text-white">Find your favorite game!</h1>
        <p class="fw-semibold text-white">PS4 - PS5 - XBOX - NINTENDO</p>
    </div>
    <div class="container mt-5">
        <div class="games">
            <div class="category">
                <h1 class="fw-bold mb-5 text-center">Playstation 4</h1>
                <div class="list-games d-flex justify-content-between">
                    @foreach ($products as $product)
                        <div class="card image-product">
                            <img src="{{ asset('storage') . '/' . $product->image }}" class="card-img-top" alt="{{ $product->slug }}">
                        </div>
                    @endforeach
                    {{-- <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                    </div> --}}
                </div>

                <h1 class="fw-bold my-5 text-center">Nintendo Switch</h1>
                <div class="list-games d-flex justify-content-between">
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection