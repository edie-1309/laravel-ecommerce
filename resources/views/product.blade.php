@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <div class="mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('storage') . '/' . $product->image }}" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8 p-4">
                  <h3 class="fw-semibold">{{ $product->name }}</h3>
                  <p>{!! $product->description !!}</p>

                  <p class="fw-semibold">Genre : </p>
                  <p class="mb-5">
                    @foreach ($product->category as $category)
                        <small class="badge bg-blue">{{ $category->name }}</small>
                    @endforeach
                  </p>

                  <div class="d-block mb-5">
                      <p class="fw-semibold">Platform : </p>
                      @foreach ($product->platform as $platform)
                        <input type="radio" class="btn-check" name="platform" id="option{{ $platform->id }}" autocomplete="off" checked>
                        <label class="btn fw-semibold" for="option{{ $platform->id }}">{{ $platform->name }}</label>
                      @endforeach
                  </div>

                  <p class="d-inline-block text-dark fw-semibold">
                    Price : {{ $product->price }}
                  </p>

                  <button type="submit" class="py-2 px-3 button-primary rounded-2 d-block">Add To Cart</button>
              </div>
            </div>
        </div>
    </div>
@endsection