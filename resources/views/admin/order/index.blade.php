@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Order List</h2>

    @if (session()->has('success'))
        <div class="alert alert-success mb-3">
          {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
          <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Customer name</th>
            <th scope="col">Status</th>
            <th scope="col">Total</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $order->user->name }}</td>
              <td>{{ $order->status }}</td>
              <td class="col-4">@currency($order->total)</td>
              <td class="col-2">
                <a href="/dashboard/orders/detail/{{ $order->slug}}" class="badge bg-primary text-decoration-none">Detail</a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection