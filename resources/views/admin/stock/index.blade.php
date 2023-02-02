@extends('admin.layouts.main')

@section('content')
  <div class="container">
      <h2>Products</h2>

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

      <table class="table" id="stockTable">
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
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
  </div>

  <script>
    $(document).ready(function () {
      $('#stockTable').DataTable();
    });
  </script>
@endsection