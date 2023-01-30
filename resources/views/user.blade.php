@extends('layouts.main')

@section('container')
    <div class="container my-5">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex">
            <div class="img-profile">
                <img src="{{ asset('storage') . '/' . $user->user_image }}" width="150">
            </div>
            <div class="w-50 ms-5 mb-4 mt-3">
                <p>Name : {{ $user->name }}</p>
                <p>Username : {{ $user->username }}</p>
                <p>Email : {{ $user->email }}</p>
                <p>Phone Number : {{ $user->phone_number }}</p>
                <p>Address : {{ $user->address }}</p>
            </div>
        </div>

        <div>
            <a href="/orders" class="btn btn-primary fw-bold rounded-5 me-3">My Orders</a>
            <a href="/edit-profile/{{ $user->username }}" class="text-decoration-none text-dark fw-bold">Edit Profile</a>
            <a href="/change-password" class="ms-2 text-decoration-none text-dark fw-bold">Change Password</a>
        </div>
    </div>
@endsection