@extends('admin.layouts.main')
{{-- @dd($products[0]->platform[0]->name) --}}
@section('content')
    <div class="container">
        <h2 class="mb-3">Create stock</h2>

        <form action="/dashboard/stock" method="post">
            @csrf
            <div class="mb-3">
                <div class="mb-3">
                    <label for="inputProduct" class="form-label">Product</label>
                    <select class="form-select @error('product_id') is-invalid @enderror" name="product_id" id="inputProduct">
                        <option value="">Choose a product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-slug="{{ $product->slug }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div id="inputProduct" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputPlatform" class="form-label">Platform</label>
                    <select class="form-select @error('platform_id') is-invalid @enderror" name="platform_id" id="inputPlatform">
                        <option value="">Choose a product first</option>
                    </select>
                    @error('platform_id')
                        <div id="inputPlatform" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="inputStock" class="form-label">Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="inputStock" name="stock">       
                @error('stock')
                <div id="inputStock" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror      
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/dashboard/stock" class="btn btn-danger">Back</a>
        </form>
    </div>

    <script>
        const select = document.getElementById("inputProduct");
        let platformSelect = document.getElementById("inputPlatform");
        let optionPlatform = document.getElementsByClassName("optionPlatform");

        // Set an event listener for when the value of the select changes
        select.addEventListener('change', function() {
            // Get the value of the "data-platform" attribute of the selected option
            const platform =  select.options[select.selectedIndex].getAttribute("data-slug");

            // Use fetch() to send a GET request to the server to get the platform
            // for the selected product
            fetch(`/dashboard/products/platform/${platform}`)
              .then(response => response.json())
              .then(data => {
                platformData = data.platform;
 
                platformSelect.innerHTML = "";

                // Add new options to the platform select
                platformData.forEach(item => {
                    let option = document.createElement("option");
                    option.value = item.id;
                    option.innerHTML = item.name;
                    option.classList.add("optionPlatform");
                    platformSelect.appendChild(option);
                });
            })
        });
    </script>
@endsection