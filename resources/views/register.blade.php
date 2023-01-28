@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center my-5">
    <div class="col-lg-6">
        <h2 class="mb-5 text-center fw-bolder">Register</h2>

        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div id="floatingNameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                    <div id="floatingNameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="
                {{ old('email') }}">
                @error('email')
                    <div id="floatingNameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="
                {{ old('phone_number') }}">
                @error('phone_number')
                    <div id="floatingNameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div id="floatingNameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password">
                @error('confirm_password')
                    <div id="floatingNameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="addredd" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
            </div>            
            <button type="submit" class="btn btn-primary rounded-5 fw-bold">Register</button>
            <a href="/login" class="ms-2 text-decoration-none fw-semibold">Login</a>
        </form>
    </div>
</div>
@endsection