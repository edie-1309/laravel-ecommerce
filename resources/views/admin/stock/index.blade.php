@extends('admin.layouts.main')

@section('content')
  <div class="container">
      <h2>Products</h2>

      {{-- <a href="/dashboard/stock/create" class="btn btn-primary my-3">Create new stock</a> --}}

      @if (session()->has('success'))
          <div class="alert alert-success mb-3">
            {{ session('success') }}
          </div>
      @endif

      {{-- If error --}}
      @if ($errors->any())
          <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  {{ $error }}
              @endforeach
          </div>
      @endif

      <table class="table">
          <thead>
            <tr class="table-dark">
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Platform</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->name }}</td>
                <td class="col-4">
                  @foreach ($product->platform as $platform)
                  <div class="badge bg-dark">
                    {{ $platform->name }}
                  </div>
                  @endforeach
                </td>
                <td class="col-2">
                  <a href="/dashboard/stock/{{ $product->slug}}" class="badge bg-primary text-decoration-none">Detail</a>
                  {{-- <form class="d-inline" action="/dashboard/stock/{{ $product->id }}" onsubmit="return confirm('Are you sure?');" method="POST">
                    @csrf
                    @method('delete')
                    <button class="badge bg-danger border-0" type="submit">Delete</button>
                  </form> --}}
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
  </div>
@endsection