@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Stock</h2>

    <a href="/dashboard/stock/create" class="btn btn-primary my-3">Create new stock</a>

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
            <th scope="col">Stock</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($stock as $s)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $s->product->name }}</td>
              <td>{{ $s->stock }}</td>
              <td>
                <a href="/dashboard/stock/{{ $s->id }}/edit" class="badge bg-primary text-decoration-none">Update</a>
                <form class="d-inline" action="/dashboard/stock/{{ $s->id }}" onsubmit="return confirm('Are you sure?');" method="POST">
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