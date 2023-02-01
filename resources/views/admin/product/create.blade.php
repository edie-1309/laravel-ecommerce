@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2 class="mb-3">Create product</h2>

        <form action="/dashboard/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div id="name" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>  

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="category_id[]" id="category{{ $category->id }}">
                        <label class="form-check-label" for="category{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
                @error('category_id')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Platform</label>
                @foreach ($platform as $platform)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $platform->id }}" name="platform_id[]" id="platform{{ $platform->id }}">
                        <label class="form-check-label" for="platform{{ $platform->id }}">
                            {{ $platform->name }}
                        </label>
                    </div>
                @endforeach
                @error('platform_id')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-3">
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputDiscount" class="form-label">Discount</label>
                <select class="form-select @error('discount_id') is-invalid @enderror" name="discount_id" id="inputDiscount">
                    <option value="">Choose discount</option>
                    @foreach ($discount as $discount)
                        <option value="{{ $discount->id }}">{{ $discount->discount }}%</option>
                    @endforeach 
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                @error('description')
                    <p class="text-danger"><small>{{ $message }}</small></p>           
                @enderror
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description"></trix-editor>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button> <a href="/dashboard/products" class="btn btn-danger d-inline-block">Back</a>
            </div>
        </form>
    </div>

    <script>
        // Configuration for trix
        document.addEventListener('trix-file-accept', function () {
            e.preventDefault();
        });

        // Preview image
        function previewImage(){
            const image = document.querySelector('#image');
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