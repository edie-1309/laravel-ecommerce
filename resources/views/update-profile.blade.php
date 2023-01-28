@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <div class="card p-2 col-6">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Update Profile</h5>

                    <form>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number">
                        </div>
                        <div class="mb-3">
                            <label for="addredd" class="form-label">Address</label>
                            <textarea class="form-control" id="addredd" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary fw-bold rounded-5 float-end">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection