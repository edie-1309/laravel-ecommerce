@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <h2 class="mb-4 text-center fw-bold">Forgot Password</h2>

        
        <div class="row justify-content-center">
            <div class="col-6">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <p class="mt-3 text-muted">Please enter your email, so we can send you a password reset form</p>
                    <button type="submit" class="btn btn-primary fw-bold rounded-5">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection