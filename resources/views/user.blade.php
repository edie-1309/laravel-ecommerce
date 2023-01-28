@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <div class="d-flex">
            <div class="img" style="width: 200px; height: 200px; background-color: red; border-radius: 50%;">

            </div>
            <div class="w-50 ms-5 mb-4 mt-3">
                <p>Name : Edi Nugroho</p>
                <p>Username : Edie</p>
                <p>Email : edinugroho514@gmail.com</p>
                <p>Phone Number : 089539846008</p>
                <p>Address : Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio recusandae consequuntur eligendi! Corrupti inventore eveniet amet similique fugiat vel minus dolor, harum obcaecati neque accusantium aliquam corporis molestias odit facilis?</p>
            </div>
        </div>

        <div>
            <a href="/orders" class="btn btn-primary fw-bold rounded-5 me-3">My Orders</a>
            <a href="/update-profile" class="text-decoration-none text-dark fw-bold">Update Profile</a>
        </div>
    </div>
@endsection