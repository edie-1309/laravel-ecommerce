@extends('layouts.main')

@section('container')
    <div class="w-100 p-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body p-4">
                <h5 class="card-title fw-bolder mb-4">Checkout</h5>
                <form action="/checkout" method="POST" class="d-inline">
                    @csrf
                    <p class="card-text">
                        <div>
                            <span class="fw-semibold">Nama</span>
                            <p class="text-muted">{{ auth()->user()->name }}</p>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        </div>
                        <div class="w-85">
                            <span class="fw-semibold">Alamat</span>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dolor error. Cumque id modi voluptatum provident, officia iusto numquam enim ipsum est culpa unde possimus iure ipsam maxime doloribus qui?</p>
                        </div>
                        <div>
                            <span class="fw-semibold">Metode Pembayaran</span>
                            <p class="text-muted">COD (Cash On Delivery)</p>
                            <input type="hidden" name="payment" value="COD">
                        </div>
                        <div class="mb-3">
                            <span class="fw-semibold">Produk</span>
                            @foreach($data as $data)
                                <p class="text-muted mb-0">{{ $data->product->name }} - {{ $data->platform->name }} ({{ $data->qty }} Pcs)</p>
                                {{-- For Product Id --}}
                                <input type="hidden" name="product_id[]" value="{{ $data->product->id }}">
                                
                                {{-- For Qty --}}
                                <input type="hidden" name="qty[]" value="{{ $data->qty }}">

                                {{-- For Platform --}}
                                <input type="hidden" name="platform_id[]" value="{{ $data->platform->id }}">
                            @endforeach
                        </div>
                        <div>
                            <span class="fw-semibold">Ongkir</span>
                            <p class="text-muted">Rp. 10.000</p>
                        </div>
                        <div>
                            <span class="fw-semibold">Total</span>
                            <p class="text-muted">@currency($data->sum('total') + 10000)</p>
                            <input type="hidden" name="total" value="{{ $data->sum('total') + 10000 }}">
                        </div>
                    </p>
                    <button type="submit" class="btn btn-primary py-2 px-3 rounded-5 fw-bolder float-end">Continue</button>
                </form>
            </div>
        </div>       
    </div>
@endsection