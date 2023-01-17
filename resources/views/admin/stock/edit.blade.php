@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2 class="mb-3">Create stock</h2>

        <form action="/dashboard/stock/{{ $stock->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <div class="mb-3">
                    <label for="inputProduct" class="form-label">Product</label>
                    <select class="form-select @error('product_id') is-invalid @enderror" name="product_id" id="inputProduct" aria-label="Default select example">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ (old('product_id', $stock->product_id)) == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach 
                    </select>
                    @error('product_id')
                        <div id="inputProduct" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="inputStock" class="form-label">Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="inputStock" name="stock" value="{{ old('stock', $stock->stock) }}">       
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
@endsection