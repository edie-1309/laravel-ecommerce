@extends('layouts.main')

@section('container')
    <div class="container my-4">
        <div class="row justify-content-center">
            <h2 class="fw-bold text-center my-5">Change Password</h2>
            <div class="col-6">
                @if (session()->has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('fail') }}
                    </div>
                @endif

                <form action="/update-password/{{ auth()->user()->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="current-password" class="form-label">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current-password">
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new-password">
                        @error('new_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold rounded-5 ms-2 float-end">Update</button>
                    <a href="/user-profile/{{ auth()->user()->username }}" class="btn btn-danger fw-bold rounded-5 float-end">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection