@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <div class="card p-2 col-6">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Edit Profile</h5>

                    <form action="/update-profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="oldImage" value="{{ $user->user_image }}">

                        <div class="mb-3">
                            <label for="user_image" class="form-label">Profile Picture</label>
                            @if ($user->user_image)
                                <img src="{{ asset('storage') . '/' . $user->user_image }}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-3">
                            @endif
                            <input class="form-control @error('user_image') is-invalid @enderror" name="user_image" type="file" id="user_image" onchange="previewImage()">
                            @error('user_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3">{{ $user->address }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary fw-bold rounded-5 float-end">Update</button>
                        <a href="/user-profile/{{ $user->username }}" class="btn btn-danger me-2 fw-bold rounded-5 float-end">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Preview image
    function previewImage(){
        const image = document.querySelector('#user_image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endsection