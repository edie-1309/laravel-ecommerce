@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center">
    <div class="col-lg-6">
        <h2 class="mb-5 text-center fw-bolder">Login</h2>

        <form action="/login" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/register" class="d-block mt-3">Register</a>
        </form>
    </div>
</div>
@endsection