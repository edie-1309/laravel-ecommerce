@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2 class="mb-4 fw-semibold">Detail Product</h2>

        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('storage') . '/' . $product->image }}" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8 p-4">
                <div class="card-body">
                  <h3 class="card-title fw-semibold">{{ $product->name }}</h3>
                  <p class="card-text">{!! $product->description !!}</p>
                  <p class="card-text">
                    @foreach ($product->category as $category)
                        <small class="badge bg-dark">{{ $category->name }}</small>
                    @endforeach
                  </p>
                  <p class="card-text">
                    @foreach ($product->platform as $platform)
                        <small class="badge bg-light text-dark">{{ $platform->name }}</small>
                    @endforeach
                  </p>
                  <p class="d-inline-block text-dark fw-semibold">
                    Price : @currency($product->price)
                  </p>
                  @isset($product->discount->discount)
                    <p class="d-block text-dark fw-semibold">
                      Discount : {{ $product->discount->discount }}%
                  @endisset
                </div>
              </div>
            </div>
        </div>

        <a href="/dashboard/products" class="btn btn-dark fw-semibold">Back</a>
    </div>
@endsection