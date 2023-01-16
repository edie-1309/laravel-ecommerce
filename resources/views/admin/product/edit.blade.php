@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Product</h2>

    <form action="/dashboard/products/{{ $product->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $product->name) }}">
            @error('name')
                <div id="name" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>  

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" readonly>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="category_id[]" id="category{{ $category->id }}" 
                    @foreach ($product->category as $product_category) 
                        {{ (old('category_id', $product_category->id) == $category->id) ? 'checked' : '' }} 
                    @endforeach>
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
            <label for="formFile" class="form-label">Image</label>
            
            <input type="hidden" name="oldImage" value="{{ $product->image }}">

            @if ($product->image)
                <img src="{{ asset('storage') . '/' . $product->image }}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-3">
            @endif

            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            @error('description')
                <p class="text-danger"><small>{{ $message }}</small></p>           
            @enderror
            <input id="description" type="hidden" name="description" value="{{ old('description', $product->description) }}">
            <trix-editor input="description"></trix-editor>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button> <a href="/dashboard/products" class="btn btn-danger d-inline-block">Back</a>
        </div>
    </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug'); 

    name.addEventListener('change', function() {
        fetch('/dashboard/products/checkSlug?name=' + name.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
    });

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