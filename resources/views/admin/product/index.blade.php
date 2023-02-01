@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2>Products</h2>

        <a href="/dashboard/products/create" class="btn btn-primary my-3">Create new product</a>

        @if (session()->has('success'))
            <div class="alert alert-success mb-3">
              {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
              <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $product->name }}</td>
                  <td class="col-3">
                    @foreach ($product->category as $category)
                    <div class="badge bg-dark">
                      {{ $category->name }}
                    </div>
                    @endforeach
                  </td>
                  <td>@currency($product->price)</td>
                  <td>
                    <a href="/dashboard/products/{{ $product->slug }}" class="badge bg-success text-decoration-none">Detail</a>
                    <a href="/dashboard/products/{{ $product->slug }}/edit" class="badge bg-primary text-decoration-none">Update</a>
                    <form class="d-inline" action="/dashboard/products/{{ $product->slug }}" onsubmit="return confirm('Are you sure?');" method="POST">
                      @csrf
                      @method('delete')
                      <button class="badge bg-danger border-0" type="submit">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection