@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center mt-5 mb-4">
    <div class="col-lg-4">
        <h2 class="mb-5 text-center fw-bolder">Login</h2>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{ session('loginError') }}
            </div>
        @endif
          
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
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
            <button type="submit" class="d-block mb-3 btn btn-primary rounded-5 fw-bold">Login</button>
            <a href="/register" class="d-block mb-2 text-decoration-none fw-semibold font-small">Register</a>
            <a href="/forgot-password" class="text-decoration-none fw-semibold font-small">Forgot Password</a>
        </form>
    </div>
</div>
@endsection